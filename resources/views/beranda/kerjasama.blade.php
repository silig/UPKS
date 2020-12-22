@extends('template.master')
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3>Cari data kerjasama</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">kerjasama</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
@endpush

@section('content')
<div class="container">
      <div class="row">
        <div class="span12" style="font-size: 16px">
           <p>Untuk melakukan pencarian kerjasama apa saja yang berhubungan dengan fakultas teknik undip dapat dilihat pada website siker <a href="http://kerjasama.ft.undip.ac.id/" target="_blank">kerjasama.ft.undip.ac.id</a></p>
           <p>masukkan username dan password berikut :</p>
           <p>username : guest</p>
           <p>password : guest123</p>
           atau bisa langsung akses dibawah ini
           <br>
           <br>
           <br>
           <iframe src="http://kerjasama.ft.undip.ac.id/" style="border:2px solid red;" width="100%" height="750px"></iframe>
        </div>
        
      </div>
    </div>
@endsection