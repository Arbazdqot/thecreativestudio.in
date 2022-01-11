@extends('admin/layout')
@section('page_title','Story Edit')
@section('container')
@section('dashboard_select','active')



{{-- <div class="row"> --}}
    <div class="col-lg-12"> 
        <div class="card">
            <div class="card-header py-3">
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif
           
                <a href="{{url('admin/dashboard')}}">
                    <button type="button" class="btn btn-primary " style="float:right;"> Back</button> 
                </a>
                <h1>Update Password</h1>
            </div>
            <div class="card-body">
                
                <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_pass" class="control-label mb-1">Current Password</label>
                                <input id="current_pass" name="current_pass" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                                @error('current_pass')
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
                                <label for="new_pass" class="control-label mb-1">New Password</label>
                                <input id="new_pass" name="new_pass" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                                @error('new_pass')
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
                                <label for="confirm_pass" class="control-label mb-1">Confirm Password</label>
                                <input id="confirm_pass" name="confirm_pass" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                                @error('confirm_pass')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
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