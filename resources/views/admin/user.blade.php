@extends('admin/layout')
@section('page_title','User ')

@section('container')
@section('user_select','active')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <h1>Contact Us Detail</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
               
                <tbody>
                    @if($user->count() > 0)
                        @foreach($user as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->subject }}</td>
                            <td>{{ $data->message }}</td>
                            <td>{{ $data->date }}</td>
                            <td>
                                <a href="{{url('admin/user/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12"><center>Records not available!</center></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {!! $user->links() !!}
</div>

@endsection