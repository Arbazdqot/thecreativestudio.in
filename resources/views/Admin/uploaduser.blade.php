@extends('admin/layout')
@section('page_title','Upload File ')

@section('container')
@section('uploaduser_select','active')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session()->has('message'))
            <div class="alert alert-success">
                    {{-- {{session('error')}} --}}
                {{ session()->get('message') }}
            </div>
        @endif
            <button type="button" class="btn btn-success pull-right openButton" id="category" style="float:right;"> Add File</button> 
        <h1>File Details</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $i=1
                    @endphp
                    @if($uploaduser->count() > 0)
                        @foreach($uploaduser as $data)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{asset('http://192.168.0.49:8000/admin/uploaduser/download/'.$data->file)}}</td>
                            <td >
                                {{-- <a href="{{url('admin/uploaduser/uploaduseredit/')}}/{{$data->id}}"><button type="button" class="btn btn-primary">Edit</button></a> --}}
                                <a href="{{url('admin/uploaduser/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @php 
                        $i++
                        @endphp
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
    {!! $uploaduser->links() !!}
</div>


{{-- Popup Form  --}}
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ADD User File</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            
			<div class="modal-body">
		
                <form method="post" id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered responsive">
                        <tr>
                            <th>User Name</th>
                            <td>
                                <input id="name" name="name" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>User File</th>
                            <td>
                                <input id="file" type="file" name="file" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                            </td>
                        </tr>
                    </table>
                    <span id='usubmitrBtn'  class="btn btn-lg btn-info btn-block w-100  mt-3">
                        submit
                    </span>
                </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal_edit" role="dialog">

</div>
@endsection 

