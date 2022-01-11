@extends('admin/layout')
@section('page_title','Story Add')
@section('container')
@section('team_select','active')

{{-- <div class="row"> --}}
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                <a href="{{url('admin/team')}}">
                    <button type="button" class="btn btn-primary " style="float:right;"> Back</button> 
                </a>
                <h1>Team Add</h1>
            </div>
            <div class="card-body">
                
                <form action="{{route('team.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="{{$team->name}}">
                                @error('name')
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
                                <label for="designation" class="control-label mb-1">Designation</label>
                                <input id="designation" name="designation" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="{{$team->designation}}">
                                @error('designation')
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
                                <label for="about" class="control-label mb-1">About</label>
                                <textarea id="about" name="about" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" rows="6" cols="50">{{$team->about}}</textarea>
                                @error('about')
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
                                <label for="image" class="control-label mb-1">Image</label>
                                <input type="file" name="image" id="image" class="form-control w-100">
                                <input type="hidden" id='img' name='img' value='{{$team->image}}'>
                                @error('image')
                                <span class="alert alert-danger">
                                    {{$message}}
                                </span> 
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id='id' name='id' value='{{$team->id}}'>
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