@extends('admin/layout')
@section('page_title','Category ')

@section('container')
@section('category_select','active')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
            <button type="button" class="btn btn-success pull-right openButton" id="category" style="float:right;"> Add category</button> 
        <h1>Category Details</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $i=1
                    @endphp
                    @if($category->count() > 0)
                        @foreach($category as $data)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{ $data->category_name }}</td>
                            <td >
                                <a href="{{url('admin/category/categoryedit/')}}/{{$data->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="{{url('admin/category/delete/')}}/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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
        {!! $category->links() !!} 
    </div>
    
</div>


{{-- Popup Form  --}}
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ADD CATEGORY</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            
			<div class="modal-body">
		
                <form method="post" id="cat_form">
                    @csrf
                    <table class="table table-bordered responsive">
                        <tr>
                            <th>Category Name *</th>
                            <td>
                                <input id="category_name" name="category_name" type="text" class="form-control w-100" aria-required="true" aria-invalid="false" value="">
                            </td>
                        </tr>
                    </table>
                    <span id='submitBtn'  class="btn btn-lg btn-info btn-block w-100  mt-3">
                        submit
                    </span>
                </form>
			</div>
		</div>
	</div>
</div>


@endsection 