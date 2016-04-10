@if (Auth::check())
    <ul class="nav navbar-nav">
        <li @if (Request::is('admin/article*')) class="active" @endif>
            <a href="/admin/article">Articles</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="active" @endif>
            <a href="/admin/tag">Tags</a>
        </li>
        <li @if (Request::is('admin/user*')) class="active" @endif>
            <a href="/admin/user">Users</a>
        </li>
        <li @if (Request::is('admin/ad*')) class="active" @endif>
            <a href="/admin/ad">Ads</a>
        </li>
    </ul>
@endif

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/login">Sign in</a></li>
        <li><a href="/register">Sign up</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/logout">Log out</a></li>
                <li><a href="/system/profile">Profile</a></li>
            </ul>
        </li>
    @endif
</ul>
