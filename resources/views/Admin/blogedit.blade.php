@extends('admin/layout')
@section('page_title','Blog Edit')
@section('container')
@section('blog_select','active')

<div class="row">
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                <a href="{{url('admin/blog')}}">
                    <button type="button" class="btn btn-primary" style="float:right;"> Back</button> 
                </a>
                <h1>Blog Edit</h1>
            </div>
            <div class="card-body">
                <form action="{{route('blog.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_title" class="control-label mb-1">Title</label>
                                <input id="blog_title" name="blog_title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$blog->blog_title}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="description" class="control-label mb-1">Description</label>
                              
                                <textarea name="blog_desc" id="editor" class="form-control w-100" id="blog_desc" cols="30" rows="10" >{{$blog->blog_desc}}</textarea>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_img" class="control-label mb-1">Image</label>
                                <input type="file" name="blog_img" id="blog" class="form-control w-100" >
                                <input type="hidden" id='img' name='img' value='{{$blog->blog_img}}'>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="recent" type="checkbox" value="0" id="recent" >
                                    <label class="form-check-label" for="recent">
                                    Recent
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id='id' name='id' value='{{$blog->id}}'>
                   
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


@endsection