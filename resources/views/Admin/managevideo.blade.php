@extends('admin/layout')
@section('page_title','Video Add')
@section('container')
@section('video_select','active')

{{-- <div class="row"> --}}
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                <a href="{{url('admin/video')}}">
                    <button type="button" class="btn btn-primary " style="float:right;"> Back</button> 
                </a>
                <h1>Video Add</h1>
            </div>
            <div class="card-body">
                
                <form action="{{route('video.insert')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                                @error('title')
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
                                <label for="url" class="control-label mb-1">URL</label>
                                <input id="url" name="url" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                                @error('url')
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