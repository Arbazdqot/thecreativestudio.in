@extends('admin/layout')
@section('page_title','Blog Add')
@section('container')
@section('blog_select','active')

{{-- <div class="row"> --}}
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                <a href="{{url('admin/blog')}}">
                    <button type="button" class="btn btn-primary " style="float:right;"> Back</button> 
                </a>
                <h1>Blog Add</h1>
            </div>
            
            <div class="card-body">
               
                <form action="{{route('blog.insert')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_title" class="control-label mb-1">Title</label>
                                <input id="blog_title" name="blog_title" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="{{old('blog_title')}}">
                                @error('blog_title')
                                <span class="alert alert-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_desc" class="control-label mb-1">Description</label>
                              
                                <textarea name="blog_desc" class="form-control w-100" id="blog_desc" cols="30" rows="10">{{old('blog_desc')}}</textarea>
                                @error('blog_desc')
                                <span class="alert alert-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        
                    
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_img" class="control-label mb-1">Image</label>
                                <input type="file" name="blog_img" id="blog_img" class="form-control w-100" value="{{old('blog_desc')}}">
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

   

@endsection