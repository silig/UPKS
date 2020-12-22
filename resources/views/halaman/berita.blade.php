@extends('layouts.admin')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('title', 'Pengumuman')

@section('content_header')
    <h1>Berita</h1>
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
                    <th>Action</th>
                </tr>
            </thead>
            <thead id="searchid">
                  <tr>
                      <td width="5px"></td>
                      <td width="70%"></td>
                      <td></td>
                  </tr>
              </thead>
        </table>
    </div>
  </div>
 
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

      @can('create-berita')
          create += '<a class="btn btn-success btn-sm" href="berita/create"><i class="fa fa-plus"></i> Create</a>';
          @endcan

        var tb = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, "desc" ]],
            language: {
              search: "",
              lengthMenu: '_MENU_ &nbsp; '+create
            },
            ajax: "{{route('berita.index')}}",
            columns: [
              { data: 'id', name: 'id'},
              { data: 'judul', name: 'judul'},
              {render: function (data, type, row, meta) {
                    var buttons = '';
                    buttons += '<a href="berita/'+row.id+'/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>edit</a> ';
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
  function hapus(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href'); 
      var id = ev.currentTarget.getAttribute('data-unge');
      console.log(id);
      Swal.fire({
          title: 'Apa benar ingin menghapus berita ini?',
          showCancelButton: true,
          cancelButtonText: 'Batal',
          confirmButtonText: 'Ya, hapus!'
          
      })
      .then(function(willDelete) {
          if (willDelete.value) {
              $.ajax({
                url : "berita/"+ id+"/delete",
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
                      type: 'warning',
                      title: 'terhapus!'
                  })
                }
              })
          }
      });
    }
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>

@stop
