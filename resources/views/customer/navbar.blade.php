<nav class="navbar navbar-expand-lg bg-dark sticky-top">
    <a class="navbar-brand" href="{{url('/home')}}">Perjalananku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"  >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/home/booking') }}">Tickets </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
        </li>
      </ul>
    </div>
    <div>
    @if ($currentUserInfo)
                            <li class="nav-item">
                                <a class="nav-link active scrollTo" aria-current="page" href="#">Lokasi Anda :
                                    {{ $currentUserInfo->cityName }}</a>
                            </li>
                        @endif
    </div>

</nav>