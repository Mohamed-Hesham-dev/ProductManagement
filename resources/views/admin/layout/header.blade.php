<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>ProductManagement Admin Dashboard 
  </title>
  <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

  @if(App::getLocale() == 'en')
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">

  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->

  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/extensions/autoFill.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/extensions/fixedColumns.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/select.dataTables.min.css')}}">


  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
@else
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/vendors.css')}}">
<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/app.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/morris.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
<!-- END Custom CSS-->
@endif
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="{{asset('app-assets/images/logo/logo.png')}}">
              <h3 class="brand-text">{{Auth::guard('admin')->user()->name}}</h3>
            </a>
          </li>
          <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-language nav-item">
              @if(App::getLocale() == 'en')
              <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
              @else
              <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-eg"></i><span class="selected-language"></span></a>
              @endif
              <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                {{-- <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-eg"></i> Arabic</a> --}}
                @php
                $currentLocale = app()->getLocale();
                $supportedLocales = LaravelLocalization::getSupportedLocales();
            @endphp
        
            @foreach($supportedLocales as $localeCode => $properties)
                @if($localeCode != $currentLocale)
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="search-overlay-menu-btn text-black-50 d-flex justify-content-start gap-lg-3 py-lg-2 align-items-center">
                  @if($localeCode == 'ar')
                  <i class="flag-icon flag-icon-eg"></i>
                  @else
                  <i class="flag-icon flag-icon-gb"></i>
                  @endif
                  <p class="mb-0">{{ $properties['native'] }}</p>
              </a>
                @endif
            @endforeach
              </div>
            </li>
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link"  data-toggle="dropdown">
                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <i class="ft-power"></i> {{ __('Logout') }}
             </a>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
              

             <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
             
              </div>
            </li>
           
             
          </ul>
        </div>
      </div>
    </div>
  </nav>