@extends('admin/layout')
@section('page_title','Blog ')

@section('container')
@section('blog_select','active')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{url('admin/blog/manageblog')}}">
            <button type="button" class="btn btn-success pull-right" style="float:right;"> Add Blog</button> 
        </a>
        <h1>Blogs Details</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($blog->count() > 0)
                    @php
                            $i= 1;   
                        @endphp
                        @foreach($blog as $data)
                        <tr>
                            <td>
                                <img src=" {{asset('/uploads/'.$data->blog_img)}}" alt="" title="" style="width: 150px; height:150px;">
                            </td>
                            <td>{{ Str::limit( $data->blog_title , 40)}}</td>
                            <td>{{ Str::limit($data->blog_desc, 40) }}</td>
                            <td>
                                @if($data->status == 0)
                                    <a href="{{url('admin/blog/status/1')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Deactive</button></a>
                                    @elseif($data->status == 1)
                                        <a href="{{url('admin/blog/status/0')}}/{{$data->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                @endif
                            </td>
                            <td >
                                <a href="{{url('admin/blog/blogedit/')}}/{{$data->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="{{url('admin/blog/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                
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
    {!! $blog->links() !!}
</div>

@endsection 