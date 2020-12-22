@extends('layouts.admin')

@section('title', 'Menus')

@section('content_header')
    <h1>Kontak</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      @include('widgets.message')
      <div class="row">
          <div class="col-12" style="margin-bottom: 20px;">
            
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Create</button>
            
          </div>
          <div class="col-12">
                 <table class="table table-bordered table-striped">
                    <tr>
                        <th >No HP</th>
                        <th >Email</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                    @foreach($data as $data)
                        <tr>
                            <td>{!! $data->hp !!}</td>
                            <td>{!! $data->email !!}</td>
                            <td style="text-align: center;">
                              @can('edit-menus')
                              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit{{$data->id}}"><i class="fa fa-edit"></i> Edit</button>
                              @endcan
                        
                              @can('delete-menus')
                              <a href="kontak/{{$data->id}}/delete" class="btn btn-info btn-sm" onclick="confirmation(event)">delete</a>
                              @endcan
                            </td>

                            <!-- modal edit -->
                            <div class="modal fade" id="modal-edit{{$data->id}}">
                                  <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Edit Kontak</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form id="kontak-formU" method="post" action="{{route('kontak.update', $data->id)}}">
                                          {{ csrf_field() }}
                                            @include('widgets.error')
                                            <div class="row">
                                              <div class="col-12">
                                              <div class="form-group">
                                                  <label>No Hp*</label>
                                                  <input type="text" value="{{$data->hp}}" name="nohp" class="form-control"></input>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-12">
                                              <div class="form-group">
                                                  <label>Email*</label>
                                                  <input type="email" value="{{$data->email}}" name="email" class="form-control email"></input>
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
                    @endforeach
                 </table>
              </div>
            </div>
    </div>
  </div>

  <!-- modal create -->
  <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kontak</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
           
                <!-- {{ Form::open(['id' => 'pengumuman-form','files' => true, 'enctupe' => 'multipart/form-data']) }} -->
                <form id="kontak-form" enctype="multipart" method="post" action="{{route('kontak.store')}}">
                {{ csrf_field() }}
                  @include('widgets.error')
                  <div class="row">
                    <div class="col-12">
                    <div class="form-group">
                        <label>No Hp*</label>
                        {!! Form::text('nohp',null, ['class' => 'form-control hp']) !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                    <div class="form-group">
                        <label>Email*</label>
                        {!! Form::email('email',null, ['class' => 'form-control email']) !!}
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

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
      $(function() {
        alertAutoCLose()
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){

        

      })
    </script>
@stop