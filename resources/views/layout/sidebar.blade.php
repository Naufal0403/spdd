<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="/template" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="{{asset('paper-dashboard-master/assets/img/logo-small.png')}}">
        </div>


      </a>
      <a href="/template" class="simple-text logo-normal"></a>
      <div class="info ">
                      <a data-toggle="collapse" href="#collapseExample" class="" aria-expanded="true">
                      <span> {{Auth::user()->name}}
                              <b class="caret"></b>
                          </span>
                      </a>

                      <div class="collapse show" id="collapseExample" style="">
                          <ul class="nav">
                              <li>
                                  <a class="profile-dropdown" href="{{route('myprofile.show', Auth::user()->id)}}">

                                      <span class="sidebar-normal">My Profile</span>
                                  </a>
                              </li>


                          </ul>
                      </div>
                  </div>
      </a>
    </div>

    <div class="sidebar-wrapper">
      <ul class="nav">
    @if (Auth::user()->role == 0)
        <li class="{{ Request::segment(1) == 'dashboard' ? 'active' : ''}}">
          <a href="{{route('dashboard.index')}}">
            <i class="nc-icon nc-bank"></i>
            <p>Dashboard</p>
          </a>
        </li>


        <li class="{{ Request::segment(1) == 'berkas' ? 'active' : ''}}  ">
          <a href="{{route('buat', Auth::user()->id)}}">
            <i class="nc-icon nc-paper"></i>
            <p>Pendaftaran Berkas</p>
          </a>
        </li>

        <li class="{{ Request::segment(1) == 'laporan' ? 'active' : ''}} ">
          <a href="{{route('laporan-masyarakat')}}">
            <i class="nc-icon nc-support-17"></i>
            <p>Pelaporan</p>
          </a>
        </li>
        <li {{ Request::segment(1) == 'daftar' ? 'active' : ''}}>
          <a href="{{route('pemberitahuan.index')}}">
            <i class="nc-icon nc-tv-2"></i>
            <p>Pemberitahuan</p>

          </a>
        </li>

        <li class="{{ Request::segment(1) == 'keuangan' ? 'active' : ''}} ">
            <a href="{{route('keuangan.index')}}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Keuangan</p>
            </a>
          </li>
        @elseif (Auth::user()->role ==1)
        <li class="{{ Request::segment(1) == 'setting' ? 'active' : ''}} ">
            <a href="{{route('dashboard-admin')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
        <li class="{{ Request::segment(1) == 'list-user' ? 'active' : ''}} ">
            <a href="{{route('list-user.index')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>User</p>
            </a>
          </li>
        <li class="{{ Request::segment(1) == 'berkas' ? 'active' : ''}} ">
            <a href="{{route('berkas.index')}}">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Berkas</p>
            </a>
          </li>
          {{-- <li class="{{ Request::segment(1) == 'rinci-uang' ? 'active' : ''}} ">
            <a href="{{route('rinci-uang')}}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Keuangan Desa</p>
            </a>
          </li>
        <li class="{{ Request::segment(1) == 'daftar-laporan' ? 'active' : ''}} ">
            <a href="{{route('daftar-laporan.index')}}">
              <i class="nc-icon nc-support-17"></i>
              <p>Laporan</p>
            </a>
          </li> --}}


        @endif
        <li {{ Request::segment(1) == 'daftar' ? 'active' : ''}}>
          <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                         document.getElementById('logout').submit();">
            <i class="nc-icon nc-button-power"></i>
            <p>Logout</p>
          </a>

          <form action="{{route('logout')}}" id="logout" method="POST">
            @csrf
        </form>
        </li>


      </ul>

    </div>

  </div>

