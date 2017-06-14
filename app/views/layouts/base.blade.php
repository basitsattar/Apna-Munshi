<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Apna Munshi</title>
        <meta name="description" content="description">
        <meta name="author" content="Apna Munshi">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @section('head')
        {{ HTML::style('plugins/bootstrap/bootstrap.css'); }}
        {{ HTML::style('plugins/jquery-ui/jquery-ui.min.css'); }}
        <link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        {{ HTML::style('plugins/fancybox/jquery.fancybox.css'); }}
        {{ HTML::style('plugins/fullcalendar/fullcalendar.css'); }}
        {{ HTML::style('plugins/xcharts/xcharts.min.css'); }}
        {{ HTML::style('plugins/select2/select2.css'); }}
        {{ HTML::style('css/style.css'); }}
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src='http://getbootstrap.com/docs-assets/js/html5shiv.js/>
                <script src='http://getbootstrap.com/docs-assets/js/respond.min.js'/>
        <![endif]-->
        @show
    </head>
<body>
<!--Start Header-->

<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                <a href="/">Apna Munshi</a>
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        <a href="#" class="show-sidebar">
                          <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                    <i class="fa fa-angle-down pull-right"></i>
                                    <div class="user-mini pull-right">
                                        <span class="welcome">Welcome,</span>
                                        <span>Abdul Basit</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ajax/calendar" class="ajax-link">
                                            <i class="fa fa-tasks"></i>
                                            <span>Tasks</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-cog"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::route('logout')}}">
                                            <i class="fa fa-power-off"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Header-->
@yield('generic');
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src='http://code.jquery.com/jquery.js'/>-->
{{ HTML::script('plugins/jquery/jquery-2.1.0.min.js'); }}
{{ HTML::script('plugins/jquery-ui/jquery-ui.min.js'); }}
{{ HTML::script('plugins/select2/select2.js'); }}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('plugins/bootstrap/bootstrap.min.js'); }}
<!-- All functions for this theme + document.ready processing -->
{{ HTML::script('js/devoops.js'); }}
{{ HTML::script('js/apnamunshi.js'); }}
</body>
</html>
