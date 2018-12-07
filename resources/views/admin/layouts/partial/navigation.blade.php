<nav class="side-navbar navbar navbar-expand-lg navbar-dark flex-column">
    <a class="navbar-brand m-0 mt-md-4" href="{{ route('admin.rates.index') }}">
        <img class="img-fluid d-none d-md-block" src="/images/etc/icon.png" alt="">
        <strong class="d-block d-md-none">@appName</strong>
    </a>

    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse align-items-start w-100" id="navbarSupportedContent">
        <ul class="navbar-nav flex-column text-md-center w-100 mt-3 mt-md-0">
            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), 'versions') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.versions.index') }}">
                    <i class="fa fa-code-fork d-none d-md-block" aria-hidden="true"></i>
                    버전
                </a>
            </li>

            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), 'rates') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.rates.index') }}">
                    <i class="fa fa-star d-none d-md-block" aria-hidden="true"></i>
                    등급
                </a>
            </li>

            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), 'units') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.units.index') }}">
                    <i class="fa fa-universal-access d-none d-md-block" aria-hidden="true"></i>
                    유닛
                </a>
            </li>

            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), 'formulas') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.formulas.index') }}">
                    <i class="fa fa-recycle d-none d-md-block" aria-hidden="true"></i>
                    조합
                </a>
            </li>

            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), 'characteristics') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.characteristics.index') }}">
                    <i class="fa fa-id-card-o d-none d-md-block" aria-hidden="true"></i>
                    특성
                </a>
            </li>

            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), ['avatars', 'users']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user d-none d-md-block" aria-hidden="true"></i>
                    회원
                </a>
            </li>

            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), 'themes') ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="fa fa-themeisle d-none d-md-block" aria-hidden="true"></i>
                    테마
                </a>
            </li>

            <li class="nav-item mt-md-4 {{ str_contains(request()->path(), 'changes') ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="fa fa-pencil d-none d-md-block" aria-hidden="true"></i>
                    업데이트
                </a>
            </li>
        </ul>

        <ul class="navbar-nav d-flex d-md-none">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    홈페이지로
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">로그아웃</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-light d-none d-md-flex" style="box-shadow: none;">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="versionDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                {{ version()->version }}
            </a>

            <div class="dropdown-menu dropdown-primary" aria-labelledby="versionDropdownMenuLink">
                @forelse ($versions as $version)
                    <a class="dropdown-item {{ version()->id === $version->id ? 'disabled' : '' }}" href="{{ route('version', ['version' => $version->version, 'return' => urlencode($currentUrl)]) }}">
                        {{ $version->version }}
                    </a>
                @empty
                @endforelse
            </div>
        </li>
    </ul>

    <ul class="navbar-nav d-none d-md-flex flex-row ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <small>홈페이지로</small>
            </a>
        </li>
        <li class="nav-item dropdown ml-4">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>{{ auth()->user()->name }}</small>
            </a>

            <div class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                    <small>로그아웃</small>
                </a>
            </div>
        </li>
    </ul>
</nav>
