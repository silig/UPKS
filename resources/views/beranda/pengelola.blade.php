@extends('template.master')
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3> <strong>Pengelola</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">Pengelola</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
@endpush

@section('content')
<div class="container">
      
      <div class="row">
      
        <ul class="portfolio-area da-thumbs">
        @foreach($pengelola as $pengelola)
          <li class="portfolio-item" data-id="id-0" data-type="web">
            <div class="span4">
              <div class="thumbnail">
                <div class="image-wrapp">
                  <img src="{{asset('storage/uploads/pengelola/'.$pengelola->foto)}}" alt="{{$pengelola->name}}" title="{{$pengelola->name}}" width="50" height="50"/>
                  <article class="da-animate da-slideFromRight">
                    <a class="zoom" data-pretty="prettyPhoto" href="{{asset('storage/uploads/pengelola/'.$pengelola->foto)}}">
							<i class="icon-bg-light icon-zoom-in icon-circled icon-2x"></i>
							</a>
                  </article>
                </div>
                <div class="desc">
                  <h5><strong>{{$pengelola->nama}}</strong></h5>
                  <p> {{$pengelola->jabatan}}</p>
                </div>
              </div>

            </div>
          </li>
         @endforeach 
        </ul>
        
      </div>
</div>
@endsection