@extends('admin/layout')
@section('page_title','Category Edit')
@section('container')
@section('story_select','active')



<div class="row">
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <a href="{{url('admin/story')}}">
                    <button type="button" class="btn btn-primary " style="float: right"> Back</button> 
                </a>
                <h1>Gallery</h1>
            </div>
            <div class="card-body">
                
                <form action="{{route('story.galleryinsert')}}" method="post" id="ajax-multiple-file-upload" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center" id="maintr_1">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="file" name="image[]"  class="form-control " multiple="">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id='id' name='id' value='{{$id}}'>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <button id="submit" type="submit" class="btn btn-lg btn-info btn-block w-100  mt-3">
                                submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($gallery as $data)
    <div class="col-md-3"> 
        <div class="card">
            <div class="card-body">
                <div class="card-imgs">
                    
                    <img src=" {{asset('/uploads/'.$data->image_name)}}" alt="" title="" class="img-fluid card-img">
                    <a href="{{url('admin/story/imgdelete/')}}/{{$data->id}}">
                        <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </a>
                </div>
               
            </div><br>
        </div>
    </div>
    @endforeach
</div>

            
@endsection

