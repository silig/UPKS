<div class="cbp-af-header">
      <div class=" cbp-af-inner">
        <div class="container">
          <div class="row">
            <div class="span4">
              <!-- logo -->
              <br>
              <br>
              <!-- end logo -->
            </div>
          </div>

          <div class="row">

            <div class="span12">
              <!-- top menu -->
              <div class="navbar" >
                <div class="navbar-inner">
                  <nav>
                    <ul class="nav topnav">
                      <li class="dropdown {{ url()->current() == route('teras') ? 'active':'' }} ">
                        <a href="{{ route('teras') }}">Home</a>
                      </li>
                      <li class="dropdown {{ url()->current() == route('profil') ? 'active':'' }}
                      {{ url()->current() == route('pengelola') ? 'active':'' }}">
                        <a href="#">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profil') }}">Tentang Kami</a></li>
                            <li><a href="{{ route('pengelola') }}">Pengelola</a></li>
                        </ul>
                      </li>
                      <li class="dropdown {{ url()->current() == route('pengumuman') ? 'active':'' }}
                      {{ url()->current() == route('berita') ? 'active':'' }}">
                        <a href="#">Info Terkini</a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ route('berita') }}">Berita</a></li>
                          <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                        </ul>
                      </li>
                      <li class="dropdown {{ url()->current() == route('kerjasama') ? 'active':'' }}">
                        <a href="{{ route('kerjasama')}} ">Kerjasama</a>
                      </li>
                      <li class="dropdown {{ url()->current() == route('panduan') ? 'active':'' }}">
                        <a href="{{ route('panduan')}}">Panduan</a>
                      </li>
                      <li class="dropdown {{ url()->current() == route('kontak') ? 'active':'' }}">
                        <a href="{{ route('kontak') }}">Kontak</a>
                      </li>
                      @if (Route::has('login'))
                      <li>
                          @auth
                              <a href="{{ url('/admin') }}">Masuk Sistem</a>
                          @else
                              <a href="{{ route('login') }}">Login</a>
                          @endauth
                      </li>
                  @endif
                    </ul>
                  </nav>                  
                </div>
              </div>
              <!-- end menu -->
            </div>

            

            

          </div>
        </div>
      </div>
</div>