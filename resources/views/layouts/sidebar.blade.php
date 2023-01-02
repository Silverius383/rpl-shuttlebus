{{-- @include('layouts.app') --}}
<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{  request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
          {{-- <i class="material-icons">dashboard</i> --}}
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link">
          {{-- <i class="material-icons">person</i> --}}
          <p>{{ Auth::user()->name }}</p>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('bus-schedule.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('bus-schedule.index')}}">
            {{-- <i class="material-icons">content_paste</i> --}}
            <p>Jadwal Bus</p>
          </a>
        </li>
      <li class="nav-item {{  request()->routeIs('pesanan.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('pesanan.index')}}">
          {{-- <i class="material-icons">content_paste</i> --}}
          <p>Pemesanan</p>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('bus.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('bus.index')}}">
          {{-- <i class="material-icons">library_books</i> --}}
          <p>Daftar Bus</p>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('station.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('station.index')}}">
          {{-- <i class="material-icons">library_books</i> --}}
          <p>Stasiun</p>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('admin.indexbus') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.indexbus') }}">
          {{-- <i class="material-icons">person</i> --}}
          <p>Validasi</p>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('manager.register') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('manager.register') }}">
          {{-- <i class="material-icons">person</i> --}}
          <p>Register Manager Baru</p>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('admin.logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="get" style="display: none;">
            @csrf
        </form>
    </li>
    </ul>
  </div>