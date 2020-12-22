@extends('layouts.admin')

@section('title', 'Pengelola')

@section('content_header')
    <h1><a href="{{ url('admin/pengelola') }}">Pengelola</a> / {!! (isset($model)) ? 'Edit' : 'Create' !!}</h1>
@stop

@section('content')
   <div class="card">
      <div class="card-body">
         <form name="model-form" action="{{ route('pengelola.store') }}" method="POST">
         @csrf()
         <div class="row">
            <div class="col-6">
               <div class="form-group">
                  <label>Nama*</label>
                  <input type="text" name="nama" class="form-control"></input>
               </div>
            </div>
            <div class="col-6">
            </div>
            <div class="col-6">
               <div class="form-group">
                  <label>Foto*</label>
                <input class=" form-control" name="file" type="file"></input>
               </div>
            </div>
         </div>
      </div>
      <div class="card-footer">
         @include('widgets.submit_button')
      </div>
      </form>
   </div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
@endsection