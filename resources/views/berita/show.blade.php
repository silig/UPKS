@extends('template.master')
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3><strong>Berita</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">Berita</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
@endpush

@section('content')
<div class="container">
      <div class="row">
        <div class="span4">
          <aside>
            <div class="widget">
              <h4>Recent posts</h4>
              <ul class="recent-posts">
              <!-- perulangan -->
              @foreach($newer as $k => $new)
                <li><a href="{{ route('show',$new->id) }}"><img src="{{ asset('halaman/berita/'.$new->gambar)}}" alt="" width="50px" height="50px" /> {!! $new->judul !!}</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> {{$new->created_at}}</span>
                </li>
              @endforeach  
               <!-- end perulangan --> 
              </ul>
            </div>
          </aside>
        </div>
        <div class="span8">
          <!-- start article full post -->
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">{{$berita->judul}}</a></h3>
            </div>
            <div class="clearfix">
            </div>
           
            <div class="row">
              <div class="span2">
                <div class="post-icon">
                  <i class="icon-bg-dark icon-circled icon-file icon-3x active"></i>
                </div>
                <ul class="post-meta">
                  <li class="first"><i class="icon-calendar"></i><span> Posted on {{$berita->created_at}}</span></li>
                  
                </ul>
                <div class="clearfix">
                </div>
              </div>

              <div class="span6">
              <!-- isi berita -->
                
              {!! $berita->konten !!}

              </div>

            </div>
          </article>

          <!-- end article full post -->
          
        </div>
      </div>
</div>
@endsection