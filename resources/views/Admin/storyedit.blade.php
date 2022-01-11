@extends('admin/layout')
@section('page_title','Story Add')
@section('container')
@section('story_select','active')

{{-- <div class="row"> --}}
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                <a href="{{url('admin/story')}}">
                    <button type="button" class="btn btn-primary " style="float:right;"> Back</button> 
                </a>
                <h1>Stories Add</h1>
            </div>
            <div class="card-body">
                
                <form action="{{route('story.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id" class="control-label mb-1">Category</label>
                                    <select class="form-control w-100" aria-required="true" aria-invalid="false" name="category_id">
                                        <option value="">Select</option>
                                        @foreach ($category as $data)
                                            <option value="{{$data->id}}" >{{ $data->category_name }} </option>               
                                        @endforeach   
                                    </select>
                                    <input type="hidden" id='id' name='id' value='{{$story->category_id}}'>
                                @error('category_id')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="{{$story->title}}">
                                @error('title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_title" class="control-label mb-1">Sub Title</label>
                                <input id="sub_title" name="sub_title" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="{{$story->sub_title}}">
                                @error('sub_title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                <input type="file" name="image" id="image" class="form-control w-100">
                                <input type="hidden" id='img' name='img' value='{{$image[0]['image_name']}}'>
                                @error('image')
                                <span class="alert alert-danger">
                                    {{$message}}
                                </span> 
                                @enderror
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