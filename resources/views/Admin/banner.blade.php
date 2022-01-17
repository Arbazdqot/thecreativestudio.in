@extends('admin/layout')
@section('page_title','Banner ')

@section('container')
@section('banner_select','active')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <a href="{{url('admin/banner/managebanner')}}">
            <button type="button" class="btn btn-success pull-right" style="float:right;"> Add Banner</button> 
        </a>
        <h1>Banner Details</h1>
    </div>  
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Image</th>
                        <th>Which</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i =1 
                    @endphp
                     @if($banner->count() > 0)
                    @foreach($banner as $data)

                        
                    <tr>
                        <td>{{$i}}</td>
                        <td><img src=" {{asset('/uploads/'.$data->image)}}" alt="" title="" class="img-fluid card-img" ></td>
                        <td>
                            @if($data->recent == 0)
                                <strong>Recent</strong>
                            @else
                                <strong>Banner  </strong>
                            @endif
                        </td>
                        
                        <td>
                            {{-- <a href="{{url('admin/banner/banneredit/')}}/{{$data->id}}"><button type="button" class="btn btn-primary">Edit</button></a> --}}
                            <a href="{{url('admin/banner/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            {{-- <a href="{{url('admin/banner/gallery/')}}/{{$data->id}}"><button type="button" class="btn btn-info">Gallery</button></a> --}}
                        </td>
                       
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                    @else
                        <tr>
                            <td colspan="15"><center>Records not available!</center></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {!! $banner->links() !!}
</div>

@endsection 