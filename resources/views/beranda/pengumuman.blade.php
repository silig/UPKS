@extends('template.master')
@push('styles')
  <!-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css')}} "> -->
  <style type="text/css">
    .timeline {
  margin: 0 0 45px;
  padding: 0;
  position: relative;
}

.timeline::before {
  border-radius: 0.25rem;
  background: #dee2e6;
  bottom: 0;
  content: '';
  left: 31px;
  margin: 0;
  position: absolute;
  top: 0;
  width: 4px;
}

.timeline > div {
  margin-bottom: 15px;
  margin-right: 10px;
  position: relative;
}

.timeline > div::before, .timeline > div::after {
  content: "";
  display: table;
}

.timeline > div > .timeline-item {
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
  border-radius: 0.25rem;
  background: #ffffff;
  color: #495057;
  margin-left: 60px;
  margin-right: 15px;
  margin-top: 0;
  padding: 0;
  position: relative;
}

.timeline > div > .timeline-item > .time {
  color: #999;
  float: right;
  font-size: 12px;
  padding: 10px;
}

.timeline > div > .timeline-item > .timeline-header {
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  color: #495057;
  font-size: 16px;
  line-height: 1.1;
  margin: 0;
  padding: 10px;
}

.timeline > div > .timeline-item > .timeline-header > a {
  font-weight: 600;
}

.timeline > div > .timeline-item > .timeline-body,
.timeline > div > .timeline-item > .timeline-footer {
  padding: 10px;
}

.timeline > div > .timeline-item > .timeline-body > img {
  margin: 10px;
}

.timeline > div > .timeline-item > .timeline-body > dl, .timeline > div > .timeline-item > .timeline-body ol, .timeline > div > .timeline-item > .timeline-body ul {
  margin: 0;
}

.timeline > div > .timeline-item > .timeline-footer > a {
  color: #ffffff;
}

.timeline > div > .fa,
.timeline > div > .fas,
.timeline > div > .far,
.timeline > div > .fab,
.timeline > div > .glyphicon,
.timeline > div > .ion {
  background: #adb5bd;
  border-radius: 50%;
  font-size: 15px;
  height: 30px;
  left: 18px;
  line-height: 30px;
  position: absolute;
  text-align: center;
  top: 0;
  width: 30px;
}

.timeline > .time-label > span {
  border-radius: 4px;
  background-color: #ffffff;
  display: inline-block;
  font-weight: 600;
  padding: 5px;
}

.timeline-inverse > div > .timeline-item {
  box-shadow: none;
  background: #f8f9fa;
  border: 1px solid #dee2e6;
}

.timeline-inverse > div > .timeline-item > .timeline-header {
  border-bottom-color: #dee2e6;
}
.bg-red {
  background-color: #dc3545 !important;
}

.bg-red,
.bg-red > a {
  color: #ffffff !important;
}

.bg-red.btn:hover {
  border-color: #bd2130;
  color: #ececec;
}

.bg-red.btn:not(:disabled):not(.disabled):active, .bg-red.btn:not(:disabled):not(.disabled).active, .bg-red.btn:active, .bg-red.btn.active {
  background-color: #bd2130 !important;
  border-color: #b21f2d;
  color: #ffffff;
}
  </style>
@endpush
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3><strong>Pengumuman</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">Pengumuman</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
@endpush

@section('content')
<div class="container">
      <div class="row">
          <div class="span2">
          </div>
          <div class="span8">
                <div class="timeline">
                @foreach($data as $pengumuman)
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-red">{{Tanggal::Indo($pengumuman->tanggal)}}</span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-blue"></i>
                      <div class="timeline-item">
                        
                        <h3 class="timeline-header"><a>{{$pengumuman->judul}}</a></h3>

                        <div class="timeline-body">
                          {{$pengumuman->pengumuman}}
                        </div>
                        <div class="timeline-footer">
                          Lampiran : <a href="{{asset('storage/uploads/pengumuman/'.$pengumuman->lampiran)}}" style="color: red">{{$pengumuman->lampiran}}</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                  @endforeach 
                    
                    
                    <div>
                      <i class="fas fa-clock bg-gray"></i>
                    </div>
                    
                  </div>

          </div>
      </div>
    </div>
@endsection