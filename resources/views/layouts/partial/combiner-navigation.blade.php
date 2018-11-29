<nav id="combiner-nav" class="navbar navbar-expand-lg navbar-dark black lighten-3 fixed-bottom">
    <a class="navbar-brand" onclick="menuToggle()">
        <img src="{{ asset('images/etc/icon.png') }}" height="30" alt="">
    </a>

    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    조합기
                </a>
            </li>

            <li class="nav-item dropup">
                <a class="nav-link dropdown-toggle" id="versionDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                    {{ version() }}
                </a>

                <div class="dropdown-menu dropdown-primary" aria-labelledby="versionDropdownMenuLink">
                    @forelse ($versions as $version)
                        <a class="dropdown-item {{ version()->id === $version->id ? 'disabled' : '' }}" href="{{ route('version', ['version' => $version->version, 'return' => urlencode($currentUrl)]) }}">
                            {{ $version }}
                        </a>
                    @empty
                    @endforelse
                </div>
            </li>
        </ul>

        @if (auth()->user()->loads->count())
            <loads-component :loads="{{ auth()->user()->loads }}" :max-load="{{ auth()->user()->maxLoad() }}"></loads-component>
        @endif

        <ul class="navbar-nav">
            <li class="nav-item dropup">
                <a class="nav-link dropdown-toggle" id="authDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="authDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('loads.index', auth()->user()->name) }}">
                        코드 설정
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}">
                        로그아웃
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" onclick="menuToggle()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

@section('script')
    <script>
        function menuToggle() {
            $('#combiner-nav').toggleClass('smaller');
        }
    </script>
@stop
