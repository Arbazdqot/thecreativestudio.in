@extends('admin/layout')
@section('page_title','Story ')

@section('container')
@section('story_select','active')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <a href="{{url('admin/story/managestory')}}">
            <button type="button" class="btn btn-success pull-right" style="float:right;"> Add Story</button> 
        </a>
        <h1>Stories Details</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Sub_title</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i =1 
                    @endphp
                     @if($story->count() > 0)
                    @foreach($story as $data)

                        
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->category_name}}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->sub_title }}</td>
                        
                        <td>
                            @if($data->status == 1)
                                <a href="{{url('admin/story/status/0')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Deactive</button></a>
                                @elseif($data->status ==0)
                                    <a href="{{url('admin/story/status/1')}}/{{$data->id}}"><button type="button" class="btn btn-success">Active</button></a>
                            
                            @endif
                        </td>
                        <td>
                            <a href="{{url('admin/story/storyedit/')}}/{{$data->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            <a href="{{url('admin/story/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="{{url('admin/story/gallery/')}}/{{$data->id}}"><button type="button" class="btn btn-info">Gallery</button></a>
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
    {!! $story->links() !!}
</div>

@endsection 