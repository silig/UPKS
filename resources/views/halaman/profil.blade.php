@extends('layouts.admin')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>Profil</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Cerita singkat profil
                
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <form action="{{route('profil.store')}}" method="POST">
                    {{ csrf_field() }}
                    <textarea class="textarea" placeholder="Place some text here" name="profil" 
                  style="width: 100%; height: 200px; font-size: 14px; 
                      line-height: 18px; border: 1px solid #dddddd;
                      padding: 10px;">
                      {{$model->keterangan}}
                    </textarea>
              </div>
              <div class="card-footer">
                @include('widgets.submit_button')
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>

      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @include('widgets.message')
                <h3 class="card-title">
                Keterangan service
                </h3>
                <div class="card-tools">
                <button tupe="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Create</button>
                </div>
                
                </div>
                <div class="card-body">
                     <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th width="30%">Judul</th>
                            <th width="50%">Keterangan</th>
                            <th width="20%">Action</th>
                        </tr>
                        @php
                          $no =1;
                        @endphp
                        @foreach($service as $service)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    <input type="text" class="form-control" name="judul" value="{{$service->judul}}" id="judul{{$service->id}}" data-id="{{$service->id}}" onblur="simpanJudul({{$service->id}})"></input>
                                </td>
                                <td>
                                   <!--  <input type="text" class="form-control" name="keterangan" value="{{$service->keterangan}}" id="keterangan{{$service->id}}" data-id="{{$service->id}}" onclick="edit()" onblur="simpanKet({{$service->id}})"></input>  -->
                                   <textarea class="form-control keterangan hah" id="keterangan{{$service->id}}" data-id="{{$service->id}}">{!! $service->keterangan !!}</textarea>
                                   
                                </td>
                                <td><button class="btn btn-info btn-sm" id="save{{$service->id}}" data-id="{{$service->id}}" onclick="simpanKet({{$service->id}})">save</button>
                                <a href="{{route('profil.hapusservice', $service->id )}}" class="btn btn-danger btn-sm" onclick="confirmation(event)">delete</a></td>
                                      
                            </tr>
                        @endforeach
                        
                        </form>
                     </table>
                </div>
            </div>     
        </div>
      </div>


      <!-- modal create -->
  <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Service</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- {{ Form::open(['id' => 'pengumuman-form','files' => true, 'enctupe' => 'multipart/form-data']) }} -->
              <form id="service-form" enctype="multipart" method="post" action="{{route('profil.service')}}">
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
                      <label>Keterangan*</label>
                      {!! Form::textarea('keterangan',null, ['class' => 'form-control keterangan']) !!}
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

@section('plugins.Summernote', true)
@section('plugins.Toastr', true)
@section('plugins.Sweetalert2', true)

@section('js')
<script>
      $(function() {
        alertAutoCLose()
    });
</script>

<script type="text/javascript">
  $(function () {
    // Summernote
    $('.textarea').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });

    $('.keterangan').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['fontsize', ['fontsize']],
        ['view', ['fullscreen', 'codeview']],
      ]
    });
  })
</script>

<script type="text/javascript"> //untuk simpan
      function simpanJudul(id){
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          }); 
          var judul = document.getElementById('judul'+id).value;
        
             
              $.post("{{route('profil.update')}}",
              {
             '_token': $('meta[name="csrf-token"]').attr('content'),
                id: id,
                judul: judul
              },
              function(data){
                Toast.fire({
                  type: 'success',
                  title: 'tersimpan!'
                })
                
              });
        });
      }

      function simpanKet(id){
        
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          }); 
         
          var keterangan = document.getElementById('keterangan'+id).value;
              
              $.post("{{route('profil.update')}}",
              {
             '_token': $('meta[name="csrf-token"]').attr('content'),
                id: id,
                keterangan: keterangan
              },
              function(data){
                Toast.fire({
                  type: 'success',
                  title: 'tersimpan!'
                })
              
              });
        });

        
      }
</script>

@stop