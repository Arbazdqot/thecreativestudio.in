@extends('admin/layout')
@section('page_title','Team ')

@section('container')
@section('team_select','active')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{url('admin/team/manageteam')}}">
            <button type="button" class="btn btn-success pull-right" style="float:right;"> Add team</button> 
        </a>
        <h1>Teams Details</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>About</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($team->count() > 0)
                    @php
                            $i= 1;   
                        @endphp
                        @foreach($team as $data)
                        <tr>
                            <td>
                                <img src=" {{asset('/uploads/'.$data->image)}}" alt="" title="" style="width: 150px; height:150px;">
                            </td>
                            <td>{{  $data->name }} </td>
                            <td>{{ Str::limit($data->designation, 50) }}</td>
                            <td>{{ Str::limit($data->about, 50) }}</td>
                            <td >
                                <a href="{{url('admin/team/teamedit/')}}/{{$data->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="{{url('admin/team/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                
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
    {!! $team->links() !!}
</div>

@endsection 