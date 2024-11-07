@php
    $dir = 'ltr';
    $lang = session('language');
    if(!isset($lang) || empty($lang)){
    $lang = 'en';
    }
    if($lang == 'ar'){
    $dir = 'rtl';
    }else{
    $dir = 'ltr';
    }
@endphp
<!DOCTYPE html>
<html  lang="{{$lang}}" dir="{{$dir}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('cruds.site_title') }}</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/report.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="app pace-done sidebar-lg-show">

    <div class="{{$dir}} light-theme app-body">
        <main class="main" style="margin-left: 0!important;">

            <div  class="container-fluid">

                @yield('content')

            </div>


        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script type="text/javascript">
            $('.window_print_button').on('click', function() {
                $(this).hide();
                $('.window_cross_button').hide();
                window.print();
                $(this).show();
                $('.window_cross_button').show();
            });
            $('.window_cross_button').on('click', function() {
                window.close();
            });
        </script>
</body>

</html>
