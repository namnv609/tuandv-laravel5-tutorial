<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title', 'Admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/css/libs/bootstrap/bootstrap.min.css?v=<?php echo time()?>" rel="stylesheet" type="text/css" />
    <link href="libs/font-awesome/css/font-awesome.min.css?v=<?php echo time()?>" rel="stylesheet" type="text/css" />
    @yield('css')
</head>
<body>
    <div id="wrapper">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                </li>
            </ul>
        </div>
        @show
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @yield('top_buttons')
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            @yield('page_header')
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/jquery.js?v=<?php echo time()?>"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js?v=<?php echo time()?>"></script>
    <script type="text/javascript" src="/js/admins/backend.js?v=<?php echo time()?>"></script>
    
    @yield('script')
</body>

</html>
