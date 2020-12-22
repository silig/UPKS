@extends('template.master')
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3>Get <strong>in touch</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">Contact</li>
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
            <div class="widget" >
              <h4>Hubungi kami</h4>
              <ul style="font-size: 14px">
                <li><label><strong>Phone : </strong></label>
                  @foreach($hp as $hp)
                  <p>
                    {{ $hp->hp }}
                  </p>
                  @endforeach
                </li>
                <li><label><strong>Email : </strong></label>
                  @foreach($email as $email)
                  <p>
                    {{ $email->email }}
                  </p>
                  @endforeach
                </li>
                <li><label><strong>Alamat Kantor : </strong></label>
                  <p>
                    Gedung Dekanat Baru Fakultas Teknik <br>
          					Universitas Diponegoro <br>
          					Lantai 2, Ruang Kerjasama UPPM dan TPMF
                  </p>
                </li>
              </ul>
            </div>
            <!-- <div class="widget">
              <h4>Social network</h4>
              <ul class="social-links">
                <li><a href="#" title="Twitter"><i class="icon-bg-light icon-twitter icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Facebook"><i class="icon-bg-light icon-facebook icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Google plus"><i class="icon-bg-light icon-google-plus icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="icon-bg-light icon-linkedin icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Pinterest"><i class="icon-bg-light icon-pinterest icon-circled icon-1x active"></i></a></li>
              </ul>
            </div> -->
          </aside>
        </div>
        <div class="span8">
          <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1664.826629335678!2d110.43850556052148!3d-7.050660412903726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c1b512ef20b%3A0xcb858b2ff8548af9!2sDean%20of%20the%20Faculty%20of%20Engineering!5e0!3m2!1sen!2sid!4v1582008860061!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
          <div class="spacer30">
          </div>

        </div>
      </div>
    </div>
@endsection