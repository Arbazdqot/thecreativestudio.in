@extends('admin/layout')
@section('page_title','Blog Edit')
@section('container')
@section('category_select','active')

<div class="row">
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                <a href="{{url('admin/category')}}">
                    <button type="button" class="btn btn-primary" style="float:right;"> Back</button> 
                </a>
                <h1>Blog Edit</h1>
            </div>
            <div class="card-body">
                <form action="{{route('category.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_name" class="control-label mb-1">Title</label>
                                <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category->category_name}}">
                            </div>
                        </div>
                    </div>
                   <input type="hidden" name="id" value="{{$category->id}}">
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