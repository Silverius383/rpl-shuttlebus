{{-- @include('layouts.app') --}}
<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{  request()->routeIs('manager.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/manager">
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
      <li class="nav-item {{  request()->routeIs('bus-schedulemg.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('bus-schedulemg.index')}}">
            {{-- <i class="material-icons">content_paste</i> --}}
            <p>Jadwal Bus</p>
          </a>
        </li>
      <li class="nav-item ">
      <a class="nav-link" href="#">
          {{-- <i class="material-icons">content_paste</i> --}}
          <p>Pemesanan</p>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('busmg.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('busmg.index')}}">
          {{-- <i class="material-icons">library_books</i> --}}
          <p>Daftar Bus</p>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('stationmg.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('stationmg.index')}}">
          {{-- <i class="material-icons">library_books</i> --}}
          <p>Stasiun</p>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('manager.logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('manager.logout') }}" method="get" style="display: none;">
            @csrf
        </form>
    </li>
    </ul>
  </div>