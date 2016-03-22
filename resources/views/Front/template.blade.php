<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('news.title')}}</title>

    <link href="/assets/css/index.css" rel="stylesheet">
    @yield('styles')

</head>
<body>

{{-- Navigation Bar --}}
<header class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../"><img src="/assets/image/logo.png"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="visible-xs">
                    <form action="" method="GET" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Search for snippets">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
									<button class="btn btn-danger" type="reset">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
								</span>
                        </div>
                    </form>
                </li>
                @include('front.nav')
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-xs">
                    <a href="#toggle-search" class="animate">
                        <span class="iconfont">&#xe600;</span>
                    </a>
                </li>
            </ul>
            <div class="news-search animate">
                <div class="container">
                    <form action="" method="GET" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="Search for snippets and hit enter">
						<span class="input-group-btn">
							<button class="btn btn-danger" type="reset">
                                <span class="iconfont">&#xe6f5;</span>
                            </button>
						</span>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>


@yield('content')

<script src="/assets/js/libraries.min.js"></script>
<script src="/assets/js/index.js"></script>

@yield('scripts')

</body>
</html>