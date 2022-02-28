@extends('admin/layout')
@section('page_title','Video ')

@section('container')
@section('video_select','active')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <a href="{{url('admin/video/managevideo')}}">
            <button type="button" class="btn btn-success pull-right" style="float:right;"> Add Youtube</button> 
        </a>
        <h1>Video Details</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($video->count() > 0)
                        @php
                            $i= 1;   
                        @endphp
                        @foreach($video as $data)
                        <tr>
                            <td>
                                {{$i}}
                            </td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->url }}</td>
                            <td>
                                @if($data->status == 1)
                                    <a href="{{url('admin/video/status/0')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Deactive</button></a>
                                    @elseif($data->status == 0)
                                        <a href="{{url('admin/video/status/1')}}/{{$data->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                @endif
                            </td>
                            <td >
                                <a href="{{url('admin/video/videoedit/')}}/{{$data->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="{{url('admin/video/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                
                            </td>
                        
                        </tr>
                        @php 
                        $i++
                        @endphp
                        @endforeach
                    @else 
                        <tr>
                            <td ><center>Records not available!</center></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {!! $video->links() !!}
</div>

@endsection 