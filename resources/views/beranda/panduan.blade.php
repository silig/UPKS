@extends('template.master')
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3>Panduan</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">panduan</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
@endpush
@section('content')
<div class="container">
	<div class="row">
		<div class="span12">
			Berikut ini merupakan beberapa panduan atau pun form untuk kerjasama :
		</div>
	</div>

	
      <div class="row">
        <div class="span6">
	        <div class="cta-box">
	            <div class="cta-text"  id="profil" >
	            <ol>
	            @foreach($panduan as $panduan)
	              	<li>
			           <p><strong>{{$panduan->judul}}</strong></p>
			           
			           <p>lampiran : <a href="{{ asset('storage/uploads/pengumuman/.$panduan->file')}} ">{{$panduan->file}}</a></p>
			           <hr>
			        </li>
		        @endforeach
		        </ol>
		        </div>
		    </div>
        </div>
	  </div>
	
</div>
@endsection