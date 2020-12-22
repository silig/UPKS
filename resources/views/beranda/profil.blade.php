@extends('template.master')
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3>About <strong>UPKS</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">About</li>
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
	          <div class="cta-box">
	            <div class="cta-text"  id="profil" >
	              	{!!$profil->keterangan !!}
	            </div>
	          </div>
	          <!-- end tagline -->
	        </div>
	  </div>
      <div class="row">
	        <div class="span4">
	          <div class="well">
	            <div class="centered e_bounce">
	              <i class="icon-bg-light icon-circled icon-group icon-3x active"></i>
	              <h4><strong>Best team</strong> </h4>
	              <p style="font-size: 16px;text-align: justify;">
	                Jutaan orang menginginkan team yang sempurna, namun sedikit yang mengetahui bahwa Solidaritas team dan dedikasi tinggi adalah kunci kesuksesan sebuah tim dan kami adalah salah satunya.
	              </p>
	            </div>
	          </div>
	        </div>
	        <div class="span4">
	          <div class="well">
	            <div class="centered e_bounce">
	              <i class="icon-bg-light icon-circled icon-rocket icon-3x active"></i>
	              <h4><strong>High dedication</strong> </h4>
	              <p style="font-size: 16px;text-align: justify;">
	               Terus bergerak untuk melangkah maju dan fokus pada tujuan merupakan dedikasi kami dalam memberikan mutu pelayanan yang terbaik bagi customer.
	              </p>
	            </div>
	          </div>
	        </div>
	        <div class="span4">
	          <div class="well">
	            <div class="centered e_bounce">
	              <i class="icon-bg-light icon-circled icon-heart icon-3x active"></i>
	              <h4><strong>Work with heart</strong> </h4>
	              <p style="font-size: 16px;text-align: justify;">
	                Meski keringat sudah dikerah, otak sudah dikuras, namun bila semua dikerjakan tanpa hati yang tulus maka kesuksesan belum tercapai. Bekerja dengan cinta menjadi modal kami untuk bergerak maju.
	              </p>
	            </div>
	          </div>
	        </div>
      </div>
      <div class="row">
	        <div class="span12">
	          <div class="solid_line">
	          </div>
	        </div>
      </div>
      <div class="row">
	        <div class="span12">
	          <h4>Our services</h4>
	          <!-- start: Accordion -->
	          <div class="accordion" id="accordion2">
	          
	          @foreach($service as $service)
	            <div class="accordion-group">
	              <div class="accordion-heading">
	                <a class="accordion-toggle {{$service->id == $id ? 'active':''}}" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$service->id}}">
							<i class="icon-minus"></i> {{$service->judul}}</a>
	              </div>
	              <div id="collapse{{$service->id}}" class="accordion-body collapse {{$service->id == $id ? 'in':''}}">
	                <div class="accordion-inner">
	                  {!! $service->keterangan !!}
	                </div>
	              </div>
	            </div>
	          @endforeach
	            
	          </div>
	          <!--end: Accordion -->
	        </div>
      </div>
    </div>
@endsection

@push('js')

@endpush