@extends('layouts.admin')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('title', 'Pengelola')

@section('content_header')
    <h1>Pengelola</h1>
@stop

@section('css')
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('content')
<div class="card">
		<div class="card-header">
			<!-- <a class="btn btn-success btn-sm" href="pengelola/create"><i class="fa fa-plus"></i> Create</a> -->
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Create</button>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        @include('widgets.message')
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="20%">#</th>
                                            <th width="30%">Nama Pengelola</th>
                                            <th width="30%">Jabatan</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $row)
                                        <tr>
                                            <td>
                                                @if (file_exists( public_path().'/storage/uploads/pengelola/' . $row->foto))
                                                    <img src="{{ asset('/storage/uploads/pengelola/' . $row->foto) }}" 
                                                        alt="{{ $row->foto }}" width="50px" height="50px">
                                                @else
                                                    <img src="https://image.flaticon.com/icons/svg/21/21104.svg" alt="{{ $row->foto }}" width="50px" height="50px">
                                                @endif
                                            </td>
                                            
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->jabatan }}</td>
                                            <td>
                                            	<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit{{$row->id}}">edit</button>
                                                <a href="pengelola/{{$row->id}}/delete" class="btn btn-info btn-sm" onclick="confirmation(event)">delete</a>
                                            </td>

                                            <!-- modal edit -->
												<div class="modal fade" id="modal-edit{{$row->id}}">
											        <div class="modal-dialog modal-lg">
											          <div class="modal-content">
											            <div class="modal-header">
											              <h4 class="modal-title">Update pengelola</h4>
											              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											            </div>
											            <div class="modal-body">
											           
														{{ Form::open(['files' => true, 'enctype' => 'multipart/form-data', 'route' => 'pengelola.update' ]) }}
														<!-- <form id="pengelola-form" enctype="multipart/form-data" method="post" action="{{ route('pengelola.create')}} "> -->
														
												  		@include('widgets.error')
												  		<div class="row">
													  		<div class="col-12">
																<div class="form-group">
														    		<label>Nama *</label>
														    		{!! Form::text('nama',$row->nama, ['class' => 'form-control judul']) !!}
														    		<input type="hidden" name="id" value="{{$row->id}}"></input>
														  		</div>
													  		</div>
												  		</div>
												  		<div class="row">
													  		<div class="col-12">
																<div class="form-group">
														    		<label>Jabatan *</label>
														    		{!! Form::text('jabatan',$row->jabatan, ['class' => 'form-control judul']) !!}
														  		</div>
													  		</div>
												  		</div>
												  		<div class="row">
													  		<div class="col-12">
																<div class="form-group">
														    		<label>Foto *</label>
														    		<input type="file" name="foto" class="lampiran"></input>
														  		</div>
													  		</div>
												  		</div>
												  		<div class="row">
													  		<div class="col-12">
																<div class="form-group">
														    		
														    		<img src="{{ asset('/storage/uploads/pengelola/' . $row->foto) }}" 
                                                        alt="{{ $row->foto }}" width="150px" height="150px">
														  		</div>
													  		</div>
												  		</div>

											            </div>
											            <div class="modal-footer justify-content-between">
											              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											              <button type="submit" class="btn btn-primary">Save changes</button>
											            </div>
											           <!--  {!! Form::close() !!} -->
											           </form>
											          </div>
											          <!-- /.modal-content -->
											        </div>
											        <!-- /.modal-dialog -->
											    </div>
											    <!-- end modal edit -->
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                {!! $data->links() !!}
                            </div>
                            
                    </div>
                </div>
            </div>
     </div>
</div>

	<!-- modal create -->
	<div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah pengelola</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
           
			<!-- {{ Form::open(['id' => 'pengelola-form','files' => true, 'enctype' => 'multipart/form-data']) }} -->
			<form id="pengelola-form" enctype="multipart/form-data" method="post">
			{{ csrf_field() }}
	  		@include('widgets.error')
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>Nama *</label>
			    		{!! Form::text('nama',null, ['class' => 'form-control nama']) !!}
			  		</div>
		  		</div>
	  		</div>
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>Jabatan *</label>
			    		{!! Form::text('jabatan',null, ['class' => 'form-control jabatan']) !!}
			  		</div>
		  		</div>
	  		</div>
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>Foto *</label>
			    		<input type="file" name="foto" class="foto"></input>
			  		</div>
		  		</div>
	  		</div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
           <!--  {!! Form::close() !!} -->
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- end modal create -->

    
@stop

@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
@section('plugins.Sweetalert2', true)

@section('js')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
	$(document).ready(function(){
		$('#pengelola-form').on('submit', function(event){ //Submit create
        event.preventDefault();
       	$.ajax({
    			url : "{{ route('pengelola.store') }}",
    			method : "POST",
    			data: new FormData(this),
    			dataType: "JSON",
    			contentType: false,
    			cache: false,
    			processData: false,
    			success: function(data){
    				if(data.success){
    				window.location.replace("{{route('pengelola.index')}}");
    				}
    				if(data.error){
    					alert(error);
    				}
    			},
    			error: function (jqXHR, textStatus, errorThrown, data) {
		            alert("Error:" + jQuery.parseJSON(jqXHR.responseText).Info); //Error
		 
		        }
    		})

    	});
    });
</script>
<script>
    	$(function() {
    		alertAutoCLose()
		});
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#pengelola-form') !!}
@stop