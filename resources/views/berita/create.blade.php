@extends('layouts.admin')

@section('title', 'Dashboard')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content_header')
    <h1>Berita</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Berita baru</h3>
                @include('widgets.error')
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Berita</label>
                    <textarea class="textarea" placeholder="Place some text here" class="form-control" name="berita" id="berita" >
                      
                    </textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  @include('widgets.submit_button')
                </div>
              </form>
            </div>
        </div>
        <!-- /.col-->
      </div>

      



@stop

@section('plugins.Summernote', true)
@section('plugins.Toastr', true)
@section('plugins.Sweetalert2', true)

@section('js')

<script type="text/javascript">
      $(document).ready(function() {
           $('.textarea').summernote({
            height: 200,
            dialogsInBody: true,
            callbacks:{
                onInit:function(){
                $('body > .note-popover').hide();
                }
             },
         });
    });
</script>

<script>
$(document).ready(function(){
  $('#form').on('submit', function(event){ //Submit create
        event.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
        var judul = $('#judul').val();
        var berita = $('#berita').val();
        var sumari;
        var hmm = $($("#berita").summernote("code")).text();
        if (hmm == ''){
          sumari = berita.substring(0, 150);
        } else {
          sumari = hmm.substring(0, 150);
        }
       
        // var token = $('meta[name="csrf-token"]').attr('content');
        var token = $('#token').val();
        console.log('berita = '+berita);
        console.log('hmm = '+hmm);
        console.log('sumari = '+sumari);
            
            if(berita === 'undefined'){
              alert ("isi tidak boleh kosong!");
            } 

            $.post("{{route('berita.store')}}",
              {
             '_token': $('meta[name="csrf-token"]').attr('content'),
                judul : judul,
                berita: berita,
                summary: sumari
              },
              function(data){
                console.log(data.gambar);
                window.location.href = "{{route('berita.index')}}";
                Toast.fire({
                  type: 'success',
                  title: 'tersimpan!'
                })
              
              });
      });

});
</script>


@stop
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#form') !!}
@endsection