<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Story;
use App\Models\Image;
use App\models\Blog;
use App\models\User;


class ApiController extends Controller{

    function home_event($id = null){
        $data   = array();
        if(empty($id )){
            $data['story'] = DB::table('stories')
            ->join('images','stories.id',"=",'images.story_id')
            ->where(['recent'=>0,'status'=>0])
            ->groupBy('images.story_id')
            ->get();
            
        }else{
            $data['story'] = DB::table('stories')
            ->join('images','stories.id',"=",'images.story_id')
            ->where(['recent'=>0,'status'=>0])
            ->get();
        }
        return $data;
        
    }

    function home_recent_event(){
        $recentEvent = DB::table('stories')
        ->join('images','stories.id',"=",'images.story_id')
        ->where(['recent'=>0,'status'=>0])
        ->groupBy('images.story_id')
        ->get();
        return $recentEvent;
    } 

    function home_blog(){
        $data         = array();
        $data['blog'] = DB::table('blogs')->get();
        return $data;
    }

    function home_category($id = null){

        if(empty($id )){
            $data['category'] = DB::table('categories')->select('id','category_name')->where('is_deleted',0)->get();
            $story            = DB::table('stories')
                                 ->join('images','stories.id',"=",'images.story_id')
                                 ->where(['status'=>0])
                                 ->groupBy('images.story_id')
                                 ->get();     
            $data['story']    = $story; 
           
        }else{
            $story            = DB::table('stories')
            ->join('images','stories.id',"=",'images.story_id')
            ->where(['status'=>0 , 'images.story_id'=>$id])
            ->get();     
            $data['story']    = $story; 
            // echo '<pre>';
            // print_r($story);die;
           
        }
       
        return $data;
    }

    function home_video(){
        $data          = array();
        $data['video'] = DB::table('videos')
                          ->where(['recent'=>0, 'status' => 0 ])
                          ->take(3)
                          ->get();
        return $data;
    }

    function home_image(){
        // $data          = array();
        $image= DB::table('banners')
                            ->inRandomOrder()
                            ->where('recent',0)
                            ->select('path')
                            ->get();
        return $image;

    }

    function banner(){
        $banner= DB::table('banners')
                            ->inRandomOrder()
                            ->where('recent',1)
                            ->select('path')
                            ->get();
        return $banner;
    }

    function event_list(){
        $data['story'] = DB::table('stories')
                        ->join('images','stories.id',"=",'images.story_id')
                        ->where(['status'=>0])
                        ->get();
        return $data;
    }

    function contact_us(Request $request){

        $data = new User;
        $data->name    = $request->name;
        $data->subject = $request->subject;
        $data->email   = $request->email;
        $data->message = $request->message;
        $data->date    = date("Y/m/d");

    //    echo '<pre>';
    //     print_r($request);die;
        $data->save();
        return ['message'=>'Form is Submited', "status"=> True];    
    }

    function team(){
        return DB::table('teams')
                    ->select('name','designation','about','path')
                    ->get();
    }

    // http://192.168.0.49:8000/api/home_event
    // http://192.168.0.49:8000/api/home_blog
    // http://192.168.0.49:8000/api/home_category
    // http://192.168.0.49:8000/api/home_video
    // http://192.168.0.49:8000/api/home_image
    // http://192.168.0.49:8000/api/home_recent_event
    // http://192.168.0.49:8000/api/contact_us   
    // http://192.168.0.49:8000/api/banner   
    // http://192.168.0.49:8000/api/team   



}