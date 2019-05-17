<?php use App\Http\Controllers\ProduitController; ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GPAO</title>
    <meta name="description" content="GPAO">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="_token" content="{{csrf_token()}}" />

    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
   


    

</head>

<body>

    @if(Auth::user()->role == "administrateur")
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="acceuil"><img src="images/header-light.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="acceuil"><img src="" alt="Logo"></a>
            </div>
            
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="acceuil"> <i class="menu-icon fa fa-dashboard"></i>Tableau de bord </a>
                    </li>
                    
                    <li class="active">
                        <a href="produits">  <i class="menu-icon fa fa-laptop"></i>Gestion de projet <span class="count bg-primary">4</span></a>
                    </li>

                    <li class="active">
                        <a href="clients">  <i class="menu-icon fa fa-laptop"></i>Gestion de client</a>
                    </li>

                    <li class="active">
                        <a href="ateliers">  <i class="menu-icon fa fa-laptop"></i>Gestion d'atelier</a>
                    </li>

                    <li class="active">
                        <a href="poste_charges">  <i class="menu-icon fa fa-laptop"></i>Gestion de personnel</a>
                    </li>

                    <li class="active">
                        <a href="stocks">  <i class="menu-icon fa fa-laptop"></i>Gestion de stock</a>
                    </li>

                    <li class="active">
                        <a href="users">  <i class="menu-icon fa fa-laptop"></i>Utilisateurs <span class="count bg-primary">1</span></a>
                    </li>

                    
                </ul>
            </div><!-- /.navbar-collapse -->
            </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

    <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                       
                    </div>
                </div>

                <div class="col-sm-5">
                
                    <div class="user-area dropdown float-right">

                        
                    
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         
                            <img class="user-avatar rounded-circle" src="images/default.png" alt="User Avatar">
                        </a>
                        
                        <h5 class="text-sm-center mt-2 mb-1">{{ Auth::user()->name }} </h5>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="login"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>                       </div>
                    </div>

                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->


            @elseif(Auth::user()->role == "chef d'atelier")
            <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="acceuil"><img src="images/header-light.png" alt="Logo"></a>
            </div>
            
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="acceuil"> <i class="menu-icon fa fa-dashboard"></i>Tableau de bord </a>
                    </li>
                    
                    <li class="active">
                        <a href="produits">  <i class="menu-icon fa fa-laptop"></i>Gestion de projet</a>
                    </li>

                    <li class="active">
                        <a href="ateliers">  <i class="menu-icon fa fa-laptop"></i>Gestion d'atelier</a>
                    </li>



                </ul>
            </div><!-- /.navbar-collapse -->
            </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

    <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                       
                    </div>
                </div>

                <div class="col-sm-5">
                
                    <div class="user-area dropdown float-right">

                        
                    
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         
                            <img class="user-avatar rounded-circle" src="images/default.png" alt="User Avatar">
                        </a>
                        
                        <h5 class="text-sm-center mt-2 mb-1">{{ Auth::user()->name }} </h5>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="login"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>                       </div>
                    </div>

                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        @elseif(Auth::user()->role == "utilisateur")
                <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

<!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            

            <div class="col-sm-12">
            
                <div class="user-area dropdown float-right">

                    
                
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     
                        <img class="user-avatar rounded-circle" src="images/default.png" alt="User Avatar">
                    </a>
                    
                    <h5 class="text-sm-center mt-2 mb-1">{{ Auth::user()->name }} </h5>

                    <div class="user-menu dropdown-menu">

                        <a class="nav-link" href="login"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a> 
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>                       </div>
                </div>

                

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->
        @endif

            
        



    @yield('content')




    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script src="{{ asset('vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/widgets.js') }}"></script> -->
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

    
    @yield('javascript')

</body>

</html>

