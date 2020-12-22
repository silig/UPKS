@extends('template.master')
@push('intro')
<section id="intro">
  <div class="container">
      <div class="row">
        <div class="span6">
          <h2><strong><span class="highlight primary">SELAMAT DATANG</span> di UPKS</strong></h2>
          <p class="lead">
            Selamat datang di website Unit Pengelola Kerja Sama Fakultas Teknik Universitas Diponegoro<br/>
            <br/>
            UPKS-FT bersinergi dengan Visi dan Misi Fakultas Teknik
          </p>
          <p class="lead">UPKS FT mengelola kerjasama Fakultas Teknik UNDIP melalui sebuah system informasi bernama SIKER (Sistem Informasi Kerjasama) yang berfungsi sebagai pusat informasi, komunikasi dan proses pengusulan yang berkaitan dengan kerjasama baik itu kerjasama luar negeri maupun dalam negeri.</p>
          

        </div>
        <div class="span6">

          <div class="group section-wrap upper" id="upper">
            <div class="section-2 group">
              <ul id="images" class="rs-slider">
                <li class="group">
                  
                    <img src="{{ asset('Plato/assets/img/slides/refine/slider.png')}}" alt="" />
                </a>
                </li>
                <li class="group">
                  
                    <img src="{{ asset('Plato/assets/img/slides/refine/triwulan1.png')}}" alt=""/>
                </a>
                </li>
                <li class="group">
                  <img src="{{ asset('Plato/assets/img/slides/refine/triwulan2.png')}}" alt="" />
                </li>
                <li class="group">
                  <img src="{{ asset('Plato/assets/img/slides/refine/triwulan3.png')}}" alt="" />
                </li>
                <li class="group">
                  <img src="{{ asset('Plato/assets/img/slides/refine/triwulan4.png')}}" alt="" />
                </li>
              </ul>
            </div>
            <!-- /.section-2 -->
          </div>
        </div>

      </div>
  </div>
</section>    
@endpush

@section('content')
      <div class="row">
        <div class="span12">
          <h2><center><strong><span class="highlight" style="background: #4eb478">Berita Terbaru</span></strong></center></h2>
        </div>
      </div>
      <div class="row">
      @foreach($news as $new => $berita)
          <div class="span4">
            <div class="features">
              <div class="icon">
                @if (isset($berita->gambar))
                 <i class="icon-bg-light icon-circled icon-5x active"> <img class="icon-circled icon-5x" src="{{ asset('halaman/berita/'.$berita->gambar)}}"/></i>
                @elseif(!isset($berita->gambar))
                  <i class="icon-bg-light icon-circled icon-5x active"></i>
                @endif
              </div>
              <div class="features_content">
                <h3>{!! $berita->judul !!}</h3>
                <i class="icon-calendar"></i><span> Posted on {{ $berita->created_at }}</span>
                <br>
                <br>
                 <p class="left">
                  {!! $berita->summary !!}&hellip;
                </p>
                <a href="{{ route('show', $berita->id)}}" class="btn btn-color btn-rounded"><i class="icon-angle-right"></i> Read more</a>
              </div>
            </div>
          </div>
      @endforeach
      </div>

      <!-- blank divider -->
      <div class="row">
        <div class="span12">
          <div class="blank10"></div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <div class="cta-box">
            <div class="cta-text">
             
            </div>
          </div>
          <!-- end tagline -->
        </div>
      </div>

      <div class="row">
        <div class="span6">
          <h4><span class="highlight" style="background: #e2b12d">Pengumuman Terbaru</span></h4>
          <div class="testmonial_slider">
            <ul class="slides">
            @foreach($pengumuman as $data)
              <li>
                <div class="testimonial_item">
                  <p>
                    Tanggal : {{$data->tanggal}}<br>
                    <strong>Judul : {{$data->judul}}</strong> <br><br>
                    {{$data->pengumuman}}
                  </p>
                  <span class="author">Lampiran</span>
                  <span class="occupation">
                        @if(isset($data->lampiran))
                          <a href="{{asset('storage/uploads/pengumuman/'.$data->lampiran)}}">{{$data->lampiran}}</a>
                        @else
                          -
                        @endif
                  </span>
                  <!-- end testmonial -->
                </div>
              </li>
              @endforeach
            </ul>
            <!-- end testmonial slider -->
          </div>
          <div class="blank"></div>

        </div>

        <div class="span6">
          <h4><span class="highlight" style="background: #6F00FF">Our services</span></h4>
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
                    {!!$service->keterangan!!}
                  </div>
                </div>
              </div>
            @endforeach
            

          </div>
          <!--end: Accordion -->
        </div>
      </div>
 @endsection