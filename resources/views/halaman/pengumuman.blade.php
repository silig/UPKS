@extends('layouts.admin')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('title', 'Pengumuman')

@section('content_header')
    <h1>Pengumuman</h1>
@stop

@section('css')
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('content')
	<div class="card">
		<div class="card-body">
			@include('widgets.message')
		    <table class="table table-striped" id="data-table" width="100%">
	            <thead>
		            <tr>
		                <th>ID</th>
		                <th>Judul</th>
		                <th>Pengumuman</th>
		                <th>Lampiran</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <thead id="searchid">
	               	<tr>
	                  	<td></td>
	                  	<td></td>
	                  	<td></td>
	                  	<td></td>
	                  	<td></td>
	               	</tr>
	            </thead>
		    </table>
		</div>
	</div>

	<!-- modal create -->
	<div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Pengumuman</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
           
			<!-- {{ Form::open(['id' => 'pengumuman-form','files' => true, 'enctupe' => 'multipart/form-data']) }} -->
			<form id="pengumuman-form" enctype="multipart" method="post">
			{{ csrf_field() }}
	  		@include('widgets.error')
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>Judul*</label>
			    		{!! Form::text('judul',null, ['class' => 'form-control judul']) !!}
			  		</div>
		  		</div>
	  		</div>
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>Pengumuman*</label>
			    		{!! Form::textarea('pengumuman',null, ['class' => 'form-control pengumuman']) !!}
			  		</div>
		  		</div>
	  		</div>
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>lampiran *</label>
			    		<input type="file" name="lampiran" class="lampiran"></input>
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

      <!-- modal edit -->
	<div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Pengumuman</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
           
			<form id="pengumuman1-form" enctype="multipart" method="put">
			{{ csrf_field() }}
	  		@include('widgets.error')
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>Judul*</label>
			    		{!! Form::text('judul',null, ['class' => 'form-control', 'id' => 'judul']) !!}
			    		{!! Form::text('id',null, ['class' => 'form-control', 'id' => 'id', 'hidden'=>'']) !!}
			  		</div>
		  		</div>
	  		</div>
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>Pengumuman*</label>
			    		{!! Form::textarea('pengumuman',null, ['class' => 'form-control', 'id' => 'pengumuman']) !!}
			  		</div>
		  		</div>
	  		</div>
	  		<div class="row">
		  		<div class="col-12">
					<div class="form-group">
			    		<label>lampiran *</label>
			    		{!! Form::file('lampiran',null, ['class' => 'form-control', 'id' => 'lampiran']) !!}
			    		<br>
			    		Lampiran  : <a href="" id="lampiran1"></a>
			  		</div>
		  		</div>
	  		</div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- end modal edit -->
    
@stop

@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
@section('plugins.Sweetalert2', true)

@section('js')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script> //datatable
    	$(function() {
    		alertAutoCLose()
    		var create = '';

			@can('create-users')
	        create += '<button tupe="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Create</button>';
	        @endcan

		    var tb = $('#data-table').DataTable({
		        processing: true,
		        serverSide: true,
		        language: {
		         	search: "",
		         	lengthMenu: '_MENU_ &nbsp; '+create
		      	},
		        ajax: 'pengumuman',
		        columns: [
		        	{ data: 'id', name: 'id'},
		        	{ data: 'judul', name: 'judul'},
		            { data: 'pengumuman', name: 'pengumuman'},
		            { data: 'lampiran', name: 'lampiran', render: function (data, type, row, meta) {
		           		var path = "{{asset('storage/uploads/pengumuman')}}/";
		           		return '<a href="'+path+row.lampiran+'">'+row.lampiran+'</a>';
		           	}},		
		           	       
		            {render: function (data, type, row, meta) {
		           	   	var buttons = '';
		           	   	buttons += '<button type="button" data-id="'+row.id+'" class="btn btn-info btn-sm edit"><i class="fa fa-edit"></i>Edit</button>';
		           	   	buttons += '<button class="btn btn-danger btn-sm hapus" data-unge="'+row.id+'" onclick="hapus(event)"><i class="fa fa-trash"></i> Delete</button>';

		           	   	return '<div class="action-button"> '+buttons+' </div>';
		            }},
		        ]
		    });

		    

		   	$('#data-table #searchid input').keyup(debounce(function () {
		      	tb.columns($(this).data('id')).search(this.value).draw();
		   	}, 500));
		});
    </script>
<script type="text/javascript"> 
	$(document).ready(function(){
	$(document).on('click', '.edit', function(){ //Modal Edit
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
            url:"{{route('pengumuman.find')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#judul').val(data.judul);
                $('#pengumuman').val(data.pengumuman);
                $('#id').val(id);
                $('#lampiran1').attr("href","{{asset('storage/uploads') }}/"+data.lampiran);
                $('#lampiran1').html('');
                $('#lampiran1').append(data.lampiran);
                $('#modal-edit').modal('show');
            }
        })
		
	});

	$('#pengumuman-form').on('submit', function(event){ //Submit create
        event.preventDefault();
       	$.ajax({
    			url : "{{ route('pengumuman.simpan') }}",
    			method : "POST",
    			data: new FormData(this),
    			dataType: "JSON",
    			contentType: false,
    			cache: false,
    			processData: false,
    			success: function(data){
    				
	                document.getElementById("pengumuman-form").reset();
	                $('#modal-create').modal('hide');
					$('#data-table').DataTable().ajax.reload();

					const Toast = Swal.mixin({
				      toast: true,
				      position: 'top-end',
				      showConfirmButton: false,
				      timer: 3000
				    });
					Toast.fire({
				        type: 'success',
				        title: 'ditambahkan!'
				    })
    			}
    		})

    });

	$('#pengumuman1-form').on('submit', function(event){ //Submit create
        event.preventDefault();
       	$.ajax({
    			url : "{{ route('pengumuman.update') }}",
    			method : "POST",
    			data: new FormData(this),
    			dataType: "JSON",
    			contentType: false,
    			cache: false,
    			processData: false,
    			success: function(data){
    				
	                document.getElementById("pengumuman1-form").reset();
	                $('#lampiran1').html('');
	                $('#modal-edit').modal('hide');
					$('#data-table').DataTable().ajax.reload();

					const Toast = Swal.mixin({
							      toast: true,
							      position: 'top-end',
							      showConfirmButton: false,
							      timer: 3000
							    });
								Toast.fire({
							        type: 'success',
							        title: 'tersimpan!'
							    })
    			}
    		})

    });

});

</script>
 <script type="text/javascript">
	function hapus(ev) {
			ev.preventDefault();
			var urlToRedirect = ev.currentTarget.getAttribute('href'); 
			var id = ev.currentTarget.getAttribute('data-unge');
			console.log(id);
			Swal.fire({
			  	title: 'Apa benar ingin menghapus pengumuman ini?',
			  	showCancelButton: true,
			  	cancelButtonText: 'Batal',
			  	confirmButtonText: 'Ya, hapus!'
			  	
			})
			.then(function(willDelete) {
			  	if (willDelete.value) {
			    		$.ajax({
			    			url : "pengumuman/delete/"+ id,
			    			method : "get",
			    			dataType: "JSON",
			    			contentType: false,
			    			cache: false,
			    			processData: false,
			    			success: function(data){
								$('#data-table').DataTable().ajax.reload();
								const Toast = Swal.mixin({
							      toast: true,
							      position: 'top-end',
							      showConfirmButton: false,
							      timer: 3000
							    });
								Toast.fire({
							        type: 'success',
							        title: 'terhapus!'
							    })
			    			}
			    		})
			  	}
			});
		}
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#pengumuman-form') !!}
@stop
