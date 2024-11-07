@php

$user_name = '' ;
$currency = '' ;

$photo = '/assets/images/avatar.png' ;
if(Auth::check()){
$user = Auth::user() ;
$user_name = isset( $user)?$user->name:'' ;
if(checkExist($user->photo)){
$photo = $user->photo ;
}


$office_name = isset($user->office)?$user->office->branch_name:'';

$currency = "" ; //
isset($user->office)?(isset($user->office->country)?(isset($user->office->country->currency)?$user->office->country->currency->short_currency_name:''):''):'';

$slug = "" ;

/*isset($user->office)?(isset($user->office->country)?(isset($user->office->country->currency)?$user->office->country->currency->slug:''):''):'';*/

$branch = [] ; //\App\Currency::whereNotIn('slug',['sar',$slug])->get();

}


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

$flag = "/assets/images/$lang"."_flag.jpg";

$link = request()->path();
$sub_menu = \App\Menu::where('menu_link', $link)->first();
$main_menu = \App\Menu::where('id', isset($sub_menu) ? $sub_menu->parent_id : 0)->first();

@endphp
<!DOCTYPE html>
<html lang="{{$lang}}" dir="{{$dir}}">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="BITAC IMS - Customer Relationship Management (CRM)">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="BITAC IMS">
    <meta name="keywords" content="BITAC IMS - {{isset($sub_menu)?$sub_menu->en:''}}">

    <!-- FAVICON -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- TITLE -->
    <title> BITAC IMS - {{isset($sub_menu)?$sub_menu->en:""}}@yield('title')</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="/assets/css/datatable/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="/assets/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/css/datatable/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="/assets/css/datatable/select.dataTables.min.css" rel="stylesheet" />
    <link href="/assets/css/jquery.toast.css" rel="stylesheet" />
    <link href="/assets/css/sweetalert.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />

    <!-- ICONS CSS -->
    <link href="/assets/css/icons.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/plugin.css" rel="stylesheet">

    <!-- APP CSS & APP SCSS -->
    <link rel="stylesheet" href="/assets/css/app.0dd9712c.css">
    <link rel="stylesheet" href="/assets/css/app.4b443544.css">
    <!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
        integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="/assets/css/custom.min.css">


</head>

<body class="{{$dir}} light-theme horizontalmenu dark-menu">

    <input type="hidden" id="hdSaveBtn" value="{{trans('cruds.save')}}">
    <input type="hidden" id="hdUpdateBtn" value="{{trans('cruds.update')}}">
    <input type="hidden" id="hdSelect" value="{{trans('cruds.select')}}">
    <input type="hidden" id="hdRequiredField" value="{{trans('cruds.required_field_message')}}">

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <!-- SWITCHER -->
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="form_holder sidebar-right1">
                <div class="row">
                    <div class="predefined_styles">
                        <div class="swichermainleft text-center">
                            <div class="p-3 d-grid gap-2">
                                <a href="https://laravel8.spruko.com/dashplex/" class="btn ripple btn-primary mt-0">View
                                    Demo</a>
                                <a href="https://themeforest.net/user/spruko/portfolio"
                                    class="btn ripple btn-secondary">Buy Now</a>
                                <a href="https://themeforest.net/user/spruko/portfolio" class="btn ripple btn-info">Our
                                    Portfolio</a>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>LTR and RTL Versions</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">LTR</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                id="myonoffswitch19" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch19" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">RTL</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                id="myonoffswitch20" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch20" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Navigation Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Vertical Menu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch01"
                                                id="myonoffswitch01" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch01" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Horizontal Click Menu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch01"
                                                id="myonoffswitch02" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch02" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Horizontal Hover Menu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch01"
                                                id="myonoffswitch03" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch03" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Light Theme Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Light Theme</span>
                                        <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch1"
                                                id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Dark Theme</span>
                                        <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch1"
                                                id="myonoffswitch2" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Theme Primary Color</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Primary Color</span>
                                        <div class>
                                            <input class=" input-color-picker color-primary-light" value="#4454c3"
                                                id="colorID" (change)="changePrimaryColor()" type="color"
                                                data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
                                                name="lightPrimary">
                                        </div>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Background Color</span>
                                        <div class>
                                            <input class="w-30p h-30 input-bg-picker background-primary-light"
                                                value="#1c203c" id="bgID" (change)="changeBackgroundColor()"
                                                type="color" data-id3="body" data-id4="theme" name="BackgroundPrimary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Menu Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle lightMenu d-flex">
                                        <span class="me-auto">Light Menu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch3" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch3" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle colorMenu d-flex mt-2">
                                        <span class="me-auto">Color Menu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch4" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch4" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle darkMenu d-flex mt-2">
                                        <span class="me-auto">Dark Menu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch5" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch5" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Header Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle lightHeader d-flex">
                                        <span class="me-auto">Light Header</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch3"
                                                id="myonoffswitch6" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch6" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle  colorHeader d-flex mt-2">
                                        <span class="me-auto">Color Header</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch3"
                                                id="myonoffswitch7" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch7" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle darkHeader d-flex mt-2">
                                        <span class="me-auto">Dark Header</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch3"
                                                id="myonoffswitch8" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch8" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft layout-width-style">
                            <h4>Layout Width Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Full Width</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch4"
                                                id="myonoffswitch9" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch9" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Boxed</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch4"
                                                id="myonoffswitch10" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch10" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Layout Positions</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Fixed</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch5"
                                                id="myonoffswitch11" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch11" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Scrollable</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch5"
                                                id="myonoffswitch12" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch12" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft vertical-switcher">
                            <h4>Sidemenu layout Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Default Menu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked>
                                            <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Icon with Text</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch14" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch14" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Icon Overlay</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch15" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch15" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Closed Sidemenu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch16" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch16" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Hover Submenu</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch17" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch17" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Hover Submenu Style 1</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch18" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch18" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Reset All Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section my-4">
                                    <button id="resetAll" class="btn btn-danger btn-block" type="button">Reset All
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- SWITCHER -->

    <!--- cruds LOADER -->
    <div id="cruds-loader">
        <img src="/assets/fonts/loader.svg" class="loader-img" alt="loader">
    </div>
    <!--- END cruds LOADER -->

    <!-- PAGE -->
    <div class="page">

        <!-- MAIN-HEADER -->
        <div class="main-header side-header sticky">
            <div class="main-container container-fluid">
                <div class="main-header-left">
                    <a class="main-header-menu-icon" href="javascript:void(0);" id="mainSidebarToggle">
                        <svg class="header-menu-icon" xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M2.5,10.5h11c0.276123,0,0.5-0.223877,0.5-0.5s-0.223877-0.5-0.5-0.5h-11C2.223877,9.5,2,9.723877,2,10S2.223877,10.5,2.5,10.5z M2.5,6.5h19C21.776123,6.5,22,6.276123,22,6s-0.223877-0.5-0.5-0.5h-19C2.223877,5.5,2,5.723877,2,6S2.223877,6.5,2.5,6.5z M21.8446045,9.3519897C21.609314,9.0689697,21.189209,9.0303345,20.90625,9.265625l-2.6660156,2.2226562c-0.0315552,0.0261841-0.0606079,0.0552368-0.086792,0.086792c-0.2346802,0.2826538-0.1958008,0.7019653,0.086792,0.9366455L20.90625,14.734375c0.1194458,0.1005249,0.2706299,0.1555176,0.4267578,0.1552734c0.1973267-0.0002441,0.3843994-0.0878906,0.5109253-0.2393188c0.236145-0.2826538,0.1984863-0.7032471-0.0841675-0.9393921L19.7080078,12l2.0517578-1.7109375C22.0414429,10.0534668,22.0794067,9.6343384,21.8446045,9.3519897z M2.5,14.5h11c0.276123,0,0.5-0.223877,0.5-0.5s-0.223877-0.5-0.5-0.5h-11C2.223877,13.5,2,13.723877,2,14S2.223877,14.5,2.5,14.5z M21.5,17.5h-19C2.223877,17.5,2,17.723877,2,18s0.223877,0.5,0.5,0.5h19c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,17.5,21.5,17.5z" />
                        </svg>
                    </a>
                    <div class="hor-logo">
                        <a class="main-logo" href="/">
                            <img src="/assets/images/logo/logo.png" class="header-brand-img desktop-logo"
                                style="height:65px;" alt="logo">
                            <img src="/assets/images/logo/logo-light.png" class="header-brand-img desktop-logo-dark"
                                style="height:65px;" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="/"><img src="/assets/images/logo.png" class="mobile-logo" alt="logo"></a>
                        <a href="/"><img src="/assets/images/logo-light.png" class="mobile-logo-dark" alt="logo"></a>
                    </div>
                    <div class="input-group d-none">
                        <input type="search" class="form-control rounded-0" placeholder="Search for anything...">
                        <button class="btn search-btn"><i class="fe fe-search"></i></button>
                    </div>
                    <div>

                        <h3 class="text-center tx-white">
                            {{$office_name}}
                        </h3>
                    </div>
                </div>
                <div class="main-header-right">
                    <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                        <svg class="header-icons navbar-toggler-icon" xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M12,7c1.1040039-0.0014038,1.9985962-0.8959961,2-2c0-1.1045532-0.8954468-2-2-2s-2,0.8954468-2,2S10.8954468,7,12,7z M12,4c0.552124,0.0003662,0.9996338,0.447876,1,1c0,0.5523071-0.4476929,1-1,1s-1-0.4476929-1-1S11.4476929,4,12,4z M12,10c-1.1045532,0-2,0.8954468-2,2s0.8954468,2,2,2c1.1040039-0.0014038,1.9985962-0.8959961,2-2C14,10.8954468,13.1045532,10,12,10z M12,13c-0.5523071,0-1-0.4476929-1-1s0.4476929-1,1-1c0.552124,0.0003662,0.9996338,0.447876,1,1C13,12.5523071,12.5523071,13,12,13z M12,17c-1.1045532,0-2,0.8954468-2,2s0.8954468,2,2,2c1.1040039-0.0014038,1.9985962-0.8959961,2-2C14,17.8954468,13.1045532,17,12,17z M12,20c-0.5523071,0-1-0.4476929-1-1s0.4476929-1,1-1c0.552124,0.0003662,0.9996338,0.447876,1,1C13,19.5523071,12.5523071,20,12,20z" />
                        </svg>
                    </button>
                    <div class="navbar navbar-expand-lg navbar-collapse responsive-navbar">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                            <div class="d-flex order-lg-2 ms-auto">
                                <div class="dropdown header-search">
                                    <a class="nav-link icon header-search">
                                        <svg class="header-icons" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                            <path
                                                d="M21.2529297,17.6464844l-2.8994141-2.8994141c-0.0021973-0.0021973-0.0043945-0.0043945-0.0065918-0.0065918c-0.8752441-0.8721313-2.2249146-0.9760132-3.2143555-0.3148804l-0.8467407-0.8467407c1.0981445-1.2668457,1.7143555-2.887146,1.715332-4.5747681c0.0021973-3.8643799-3.1286621-6.9989014-6.993042-7.0011597S2.0092773,5.1315308,2.007019,8.9959106S5.1356201,15.994812,9,15.9970703c1.6889038,0.0029907,3.3114014-0.6120605,4.5789185-1.7111206l0.84729,0.84729c-0.6630859,0.9924316-0.5566406,2.3459473,0.3208618,3.2202759l2.8994141,2.8994141c0.4780884,0.4786987,1.1271973,0.7471313,1.8037109,0.7460938c0.6766357,0.0001831,1.3256226-0.2686768,1.803894-0.7472534C22.2493286,20.2558594,22.2488403,18.6417236,21.2529297,17.6464844z M9.0084229,14.9970703c-3.3120728,0.0023193-5.9989624-2.6807861-6.0012817-5.9928589S5.6879272,3.005249,9,3.0029297c1.5910034-0.0026855,3.1175537,0.628479,4.2421875,1.7539062c1.1252441,1.1238403,1.7579956,2.6486206,1.7590942,4.2389526C15.0036011,12.3078613,12.3204956,14.994751,9.0084229,14.9970703z M20.5458984,20.5413818c-0.604126,0.6066284-1.5856934,0.6087036-2.1923828,0.0045166l-2.8994141-2.8994141c-0.2913818-0.2910156-0.4549561-0.6861572-0.4544678-1.0979614C15.0006714,15.6928101,15.6951294,15,16.5507812,15.0009766c0.4109497-0.0005493,0.8051758,0.1624756,1.0957031,0.453125l2.8994141,2.8994141C21.1482544,18.9584351,21.1482544,19.9364624,20.5458984,20.5413818z" />
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="main-form-search p-2">
                                            <div class="input-group">
                                                <div class="input-group-btn search-panel">
                                                </div>
                                                <input type="search" class="form-control"
                                                    placeholder="Search for anything...">
                                                <button class="btn search-btn"><i class="fe fe-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--search-->
                                <div class="dropdown d-flex main-header-theme mt-3">
                                    <a class="nav-link icon layout-setting">
                                        <span class="dark-layout">
                                            <svg class="header-icons" xmlns="http://www.w3.org/2000/svg"
                                                enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                                <path
                                                    d="M5.6356812,17.6572876l-0.7069702,0.7069702c-0.09375,0.09375-0.1463623,0.2208862-0.1464233,0.3534546c0,0.276123,0.2238159,0.5,0.499939,0.500061c0.1326294,0.0001221,0.2598267-0.0526123,0.3534546-0.1464844l0.7070312-0.7070312c0.1904907-0.194397,0.1904907-0.5054932,0-0.6998901C6.1494141,17.4671631,5.8328857,17.4639893,5.6356812,17.6572876z M12,4h0.0006104C12.2765503,3.9998169,12.5001831,3.776001,12.5,3.5v-1C12.5,2.223877,12.276123,2,12,2s-0.5,0.223877-0.5,0.5v1.0006104C11.5001831,3.7765503,11.723999,4.0001831,12,4z M5.6357422,6.3427734c0.0936279,0.0939331,0.2208862,0.1466675,0.3535156,0.1464844v0.000061c0.1325073-0.000061,0.2596436-0.0527344,0.3533936-0.1464233c0.1953125-0.1952515,0.1953125-0.5118408,0.000061-0.7071533L5.6357422,4.928772c-0.194397-0.1904907-0.5054321-0.1904907-0.6998291,0C4.7387085,5.1220093,4.7354736,5.4385376,4.9287109,5.6357422L5.6357422,6.3427734z M3.5,11.5h-1C2.223877,11.5,2,11.723877,2,12s0.223877,0.5,0.5,0.5h1C3.776123,12.5,4,12.276123,4,12S3.776123,11.5,3.5,11.5z M12,20c-0.276123,0-0.5,0.223877-0.5,0.5v1.0005493C11.5001831,21.7765503,11.723999,22.0001831,12,22h0.0006104c0.2759399-0.0001831,0.4995728-0.223999,0.4993896-0.5v-1C12.5,20.223877,12.276123,20,12,20z M12,6c-3.3137207,0-6,2.6862793-6,6s2.6862793,6,6,6c3.3121948-0.0036011,5.9963989-2.6878052,6-6C18,8.6862793,15.3137207,6,12,6z M12,17c-2.7614136,0-5-2.2385864-5-5s2.2385864-5,5-5c2.7600708,0.0032349,4.9967651,2.2399292,5,5C17,14.7614136,14.7614136,17,12,17z M21.5,11.5h-1c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h1c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,11.5,21.5,11.5z M18.3642578,4.9287109l-0.7070312,0.7070312c-0.09375,0.09375-0.1463623,0.2208862-0.1464233,0.3534546c0,0.276123,0.2238159,0.5,0.499939,0.500061c0.1326294,0.0001221,0.2598267-0.0526123,0.3535156-0.1465454l0.7069702-0.7069702c0.0023804-0.0023804,0.0047607-0.0046997,0.0071411-0.0071411c0.1932373-0.1971436,0.1900635-0.5137329-0.0071411-0.7069702C18.8740234,4.7283325,18.5574951,4.7315674,18.3642578,4.9287109z M18.3642578,17.6572876c-0.194397-0.1905518-0.5055542-0.1905518-0.6999512,0c-0.1971436,0.1932983-0.2003174,0.5098267-0.007019,0.7069702l0.7069702,0.7070312c0.0936279,0.0939331,0.2208252,0.1466675,0.3534546,0.1464844c0.1325684,0,0.2597046-0.0526733,0.3534546-0.1463623c0.1953125-0.1952515,0.1953125-0.5118408,0.0001221-0.7071533L18.3642578,17.6572876z" />
                                            </svg>
                                        </span>
                                        <span class="light-layout">
                                            <svg class="header-icons" xmlns="http://www.w3.org/2000/svg"
                                                enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                                <path
                                                    d="M22.0482178,13.2746582c-0.1265259-0.2453003-0.4279175-0.3416138-0.6732178-0.2150879C20.1774902,13.6793823,18.8483887,14.0019531,17.5,14c-0.8480835-0.0005493-1.6913452-0.1279297-2.50177-0.3779297c-4.4887085-1.3847046-7.0050049-6.1460571-5.6203003-10.6347656c0.0320435-0.1033325,0.0296021-0.2142944-0.0068359-0.3161621C9.2781372,2.411377,8.9921875,2.2761841,8.7324219,2.3691406C4.6903076,3.800293,1.9915771,7.626709,2,11.9146729C2.0109863,17.4956055,6.5440674,22.0109863,12.125,22c4.9342651,0.0131226,9.1534424-3.5461426,9.9716797-8.4121094C22.1149292,13.4810181,22.0979614,13.3710327,22.0482178,13.2746582z M16.0877075,20.0958252c-4.5321045,2.1853027-9.9776611,0.2828979-12.1630249-4.2492065S3.6417236,5.8689575,8.1738281,3.6835938C8.0586548,4.2776489,8.0004272,4.8814087,8,5.4865723C7.9962769,10.7369385,12.2495728,14.9962769,17.5,15c1.1619263,0.0023193,2.3140869-0.2119751,3.3974609-0.6318359C20.1879272,16.8778076,18.4368896,18.9630127,16.0877075,20.0958252z" />
                                            </svg>
                                        </span>
                                    </a>
                                </div><!-- Theme-Layout -->
                                <div class="dropdown d-flex main-header-fullscreen mt-3">
                                    <a class="nav-link icon full-screen-link" href="javascript:void(0);">
                                        <svg class="header-icons fullscreen-button fullscreen"
                                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M10.1464844,13.1464844L3,20.2929688V16.5C3,16.223877,2.776123,16,2.5,16S2,16.223877,2,16.5v5.0005493C2.0001831,21.7765503,2.223999,22.0001831,2.5,22h5C7.776123,22,8,21.776123,8,21.5S7.776123,21,7.5,21H3.7069092l7.1465454-7.1465454c0.1871338-0.1937256,0.1871338-0.5009155,0-0.6947021C10.6616211,12.960144,10.3450928,12.9546509,10.1464844,13.1464844z M3.7068481,3H7.5C7.776123,3,8,2.776123,8,2.5S7.776123,2,7.5,2H2.4993896C2.2234497,2.0001831,1.9998169,2.223999,2,2.5v5.0006104C2.0001831,7.7765503,2.223999,8.0001831,2.5,8h0.0006104C2.7765503,7.9998169,3.0001831,7.776001,3,7.5V3.7071533l7.1524658,7.1524658c0.1937866,0.1871948,0.5009766,0.1871948,0.6947632,0c0.1986084-0.1918335,0.2041016-0.5083618,0.0122681-0.7069702L3.7068481,3z M21.5,2h-5C16.223877,2,16,2.223877,16,2.5S16.223877,3,16.5,3h3.7930908l-7.1526489,7.1526489c-0.1871948,0.1937256-0.1871948,0.5009766,0,0.6947021c0.1918335,0.1986084,0.5083618,0.2041016,0.7069702,0.0122681L21,3.7070312v3.7935791C21.0001831,7.7765503,21.223999,8.0001831,21.5,8h0.0006104C21.7765503,7.9998169,22.0001831,7.776001,22,7.5V2.4993896C21.9998169,2.2234497,21.776001,1.9998169,21.5,2z M21.5,16c-0.276123,0-0.5,0.223877-0.5,0.5v3.7930908l-7.1465454-7.1465454c-0.1937256-0.1871338-0.5009155-0.1871338-0.6947021,0c-0.1986084,0.1918335-0.2041016,0.5083618-0.0122681,0.7069702L20.2929688,21H16.5c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h5.0006104C21.7765503,21.9998169,22.0001831,21.776001,22,21.5v-5C22,16.223877,21.776123,16,21.5,16z" />
                                        </svg>
                                        <svg class="header-icons fullscreen-button exit-fullscreen"
                                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M7.5,16h-5C2.223877,16,2,16.223877,2,16.5S2.223877,17,2.5,17H7v4.5005493C7.0001831,21.7765503,7.223999,22.0001831,7.5,22h0.0006104C7.7765503,21.9998169,8.0001831,21.776001,8,21.5v-5.0006104C7.9998169,16.2234497,7.776001,15.9998169,7.5,16z M16.5,8h5C21.776123,8,22,7.776123,22,7.5S21.776123,7,21.5,7H17V2.5C17,2.223877,16.776123,2,16.5,2S16,2.223877,16,2.5v5.0006104C16.0001831,7.7765503,16.223999,8.0001831,16.5,8z M7.5,2C7.223877,2,7,2.223877,7,2.5V7H2.5C2.223877,7,2,7.223877,2,7.5S2.223877,8,2.5,8h5.0006104C7.7765503,7.9998169,8.0001831,7.776001,8,7.5v-5C8,2.223877,7.776123,2,7.5,2z M21.5,16h-5.0005493C16.2234497,16.0001831,15.9998169,16.223999,16,16.5v5.0005493C16.0001831,21.7765503,16.223999,22.0001831,16.5,22h0.0006104C16.7765503,21.9998169,17.0001831,21.776001,17,21.5V17h4.5c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,16,21.5,16z" />
                                        </svg>
                                    </a>
                                </div><!-- full screen -->
                                <div class="dropdown main-header-notification d-none">
                                    <!-- href=""-->
                                    <a class="nav-link icon text-center" href="javascript:void(0);">
                                        <img class="header-icons" alt src="{{$flag}}">
                                    </a>
                                    <div class="dropdown-menu" style="width:fit-content!important">
                                        <div class="header-navheading" style="padding:0!important;">
                                            &nbsp;
                                        </div>
                                        <div class="main-notification-list">
                                            @foreach(config('panel.available_languages') as $langLocale =>
                                            $langName)
                                            <div class="media">
                                                <div class="">
                                                    <a href="{{ url()->current() }}?change_language={{$langLocale}}">
                                                        <img alt="avatar" src="/assets/images/{{$langLocale}}_flag.jpg"
                                                            style="width:86px;height:50px;">
                                                    </a>
                                                </div>
                                                <div class="media-body" style="margin-left:5px">
                                                    <a href="{{ url()->current() }}?change_language={{$langLocale}}">
                                                        <p class="text-uppercase" style="line-height:3">
                                                            <strong>{{$langName}}</strong>
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> <!-- country flag -->
                                <div class="dropdown d-none main-header-notification">
                                    <a class="nav-link icon" href="javascript:void(0);">
                                        <svg class="header-icons" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                            <path
                                                d="M18,14.1V10c0-3.1-2.4-5.7-5.5-6V2.5C12.5,2.2,12.3,2,12,2s-0.5,0.2-0.5,0.5V4C8.4,4.3,6,6.9,6,10v4.1c-1.1,0.2-2,1.2-2,2.4v2C4,18.8,4.2,19,4.5,19h3.7c0.5,1.7,2,3,3.8,3c1.8,0,3.4-1.3,3.8-3h3.7c0.3,0,0.5-0.2,0.5-0.5v-2C20,15.3,19.1,14.3,18,14.1z M7,10c0-2.8,2.2-5,5-5s5,2.2,5,5v4H7V10z M13,20.8c-1.6,0.5-3.3-0.3-3.8-1.8h5.6C14.5,19.9,13.8,20.5,13,20.8z M19,18H5v-1.5C5,15.7,5.7,15,6.5,15h11c0.8,0,1.5,0.7,1.5,1.5V18z" />
                                        </svg>
                                        <span class="badge bg-info nav-link-badge">3</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="header-navheading">
                                            <div class="d-flex">
                                                <p class="main-notification-text mx-0 my-auto">Notifications (5)</p>
                                                <span class="badge rounded-pill bg-success ms-auto">Mark All
                                                    Read</span>
                                            </div>
                                        </div>
                                        <div class="main-notification-list">
                                            <div class="media new">
                                                <div class="main-img-user online">
                                                    <img alt="avatar" src="/assets/images/4.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/notifications-list">
                                                        <p><strong>Andrea James</strong> added new schedule realease
                                                        </p>
                                                        <span>Mar 20 10:40pm</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user">
                                                    <img alt="avatar" src="/assets/images/7.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/notifications-list">
                                                        <p>Congratulate <strong>Olivia James</strong> for New
                                                            template
                                                            start</p>
                                                        <span>Mar 23 12:32pm</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user">
                                                    <img alt="avatar" src="/assets/images/7.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/notifications-list">
                                                        <p>Project has been approved from <strong>Capital
                                                                Tech</strong>
                                                        </p>
                                                        <span>Mar 02 4:17pm</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user">
                                                    <img alt="avatar" src="/assets/images/9.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/notifications-list">
                                                        <p>New Appllication received from <strong>Fiona
                                                                Grace.</strong>
                                                        </p>
                                                        <span>Feb 15 09:10am</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user online">
                                                    <img alt="avatar" src="/assets/images/8.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/notifications-list">
                                                        <p><strong>Elizabeth Lewis</strong> added new schedule
                                                            realease
                                                        </p>
                                                        <span>Oct 12 10:40pm</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-footer">
                                            <a href="https://laravel8.spruko.com/dashplex/notifications-list">View
                                                All
                                                Notifications</a>
                                        </div>
                                    </div>
                                </div><!-- notifications -->
                                <div class="dropdown d-none main-header-message">
                                    <a class="nav-link icon" href="javascript:void(0);">
                                        <svg class="header-icons" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                            <path
                                                d="M17.5,8h-11C6.223877,8,6,8.223877,6,8.5S6.223877,9,6.5,9h11C17.776123,9,18,8.776123,18,8.5S17.776123,8,17.5,8z M13.5,11h-7C6.223877,11,6,11.223877,6,11.5S6.223877,12,6.5,12h7c0.276123,0,0.5-0.223877,0.5-0.5S13.776123,11,13.5,11z M19,2H5C3.3438721,2.0018311,2.0018311,3.3438721,2,5v10c0.0018311,1.6561279,1.3438721,2.9981689,3,3h12.2930298l3.8534546,3.8535156C21.2402344,21.9473267,21.3673706,22,21.5,22c0.276123,0,0.5-0.223877,0.5-0.5V5C21.9981689,3.3438721,20.6561279,2.0018311,19,2z M21,20.2929688l-3.1464844-3.1464844C17.7597656,17.0526733,17.6326294,17,17.5,17H5c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h14c1.1040039,0.0014038,1.9985962,0.8959961,2,2V20.2929688z" />
                                        </svg>
                                        <span class="badge bg-warning nav-link-badge">5</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="header-navheading">
                                            <div class="d-flex">
                                                <p class="main-message-text mx-0 my-auto">5 New Messages</p>
                                                <span class="badge rounded-pill bg-success ms-auto">Mark All
                                                    Read</span>
                                            </div>
                                        </div>
                                        <div class="main-message-list">
                                            <div class="media new">
                                                <div class="main-img-user online">
                                                    <img alt="avatar" src="/assets/images/8.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/chat">
                                                        <h6 class="text-dark mb-1 tx-semibold">Paul James</h6>
                                                        <p>Here are some products...</p>
                                                        <span class="text-muted">3 Hours ago</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user">
                                                    <img alt="avatar" src="/assets/images/4.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/chat">
                                                        <h6 class="text-dark mb-1 tx-semibold">Peter</h6>
                                                        <p>Are you ready to pickup your order...</p>
                                                        <span class="text-muted">3 Hours ago</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user">
                                                    <img alt="avatar" src="/assets/images/11.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/chat">
                                                        <h6 class="text-dark mb-1 tx-semibold">Cameron Ian</h6>
                                                        <p>Your product is delivered.</p>
                                                        <span class="text-muted">2 Hours ago</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user">
                                                    <img alt="avatar" src="/assets/images/4.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/chat">
                                                        <h6 class="text-dark mb-1 tx-semibold">Kevin Ella</h6>
                                                        <p>New Meetup starts by today evening</p>
                                                        <span class="text-muted">4 Hours ago</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="main-img-user online">
                                                    <img alt="avatar" src="/assets/images/9.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <a href="https://laravel8.spruko.com/dashplex/chat">
                                                        <h6 class="text-dark mb-1 tx-semibold"> Mita Sunny</h6>
                                                        <p>All set ! Now time to get to know...</p>
                                                        <span class="text-muted">2 Hours ago</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-footer">
                                            <a href="https://laravel8.spruko.com/dashplex/chat">View All</a>
                                        </div>
                                    </div>
                                </div><!-- message -->
                                <div class="dropdown d-flex main-profile-menu mt-3">
                                    <a class="d-flex" href="javascript:void(0);">
                                        <span class="main-img-user">
                                            <img alt="avatar" src="{{$photo}}">
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="header-navheading">
                                            <h6 class="main-notification-title">{{$user->name}}</h6>
                                            <p class="main-notification-text">{{$user->role->title}}</p>
                                        </div>
                                        {{-- <a class="dropdown-item border-top" href="{{route('admin.profile')}}">
                                        <i class="fe fe-user"></i> My Profile
                                        </a> --}}
                                        <a class="dropdown-item"
                                            onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                            <i class="fe fe-power"></i> Sign Out
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown d-flex main-profile-menu" style="margin-left: 40px">
                                    <a class="hor-logo" href="javascript:void(0);">
                                        <span class="main-logo">
                                            <img alt="avatar" src="/assets/images/govt_logo.png" style="height:65px">
                                        </span>
                                    </a>

                                </div><!-- profile -->
                                <div class="dropdown d-none header-settings">
                                    <a href="javascript:void(0);" class="nav-link icon" data-bs-toggle="sidebar-right"
                                        data-bs-target=".sidebar-right">
                                        <svg class="header-icons" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                            <path
                                                d="M21.5,17h-19C2.223877,17,2,17.223877,2,17.5S2.223877,18,2.5,18h19c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,17,21.5,17z M2.5,8h19C21.776123,8,22,7.776123,22,7.5S21.776123,7,21.5,7h-19C2.223877,7,2,7.223877,2,7.5S2.223877,8,2.5,8z M21.5,12h-19C2.223877,12,2,12.223877,2,12.5S2.223877,13,2.5,13h19c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,12,21.5,12z" />
                                        </svg>
                                    </a>
                                </div><!-- header settings -->
                            </div>
                        </div>
                    </div>
                    <div class="d-none header-setting-icon demo-icon">
                        <a class="nav-link icon" href="javascript:void(0);">
                            <svg class="settings-icon fa-spin" xmlns="http://www.w3.org/2000/svg"
                                enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <path
                                    d="M11.5,7.9c-2.3,0-4,1.9-4,4.2s1.9,4,4.2,4c2.2,0,4-1.9,4-4.1c0,0,0-0.1,0-0.1C15.6,9.7,13.7,7.9,11.5,7.9z M14.6,12.1c0,1.7-1.5,3-3.2,3c-1.7,0-3-1.5-3-3.2c0-1.7,1.5-3,3.2-3C13.3,8.9,14.7,10.3,14.6,12.1C14.6,12,14.6,12.1,14.6,12.1z M20,13.1c-0.5-0.6-0.5-1.5,0-2.1l1.4-1.5c0.1-0.2,0.2-0.4,0.1-0.6l-2.1-3.7c-0.1-0.2-0.3-0.3-0.5-0.2l-2,0.4c-0.8,0.2-1.6-0.3-1.9-1.1l-0.6-1.9C14.2,2.1,14,2,13.8,2H9.5C9.3,2,9.1,2.1,9,2.3L8.4,4.3C8.1,5,7.3,5.5,6.5,5.3l-2-0.4C4.3,4.9,4.1,5,4,5.2L1.9,8.8C1.8,9,1.8,9.2,2,9.4l1.4,1.5c0.5,0.6,0.5,1.5,0,2.1L2,14.6c-0.1,0.2-0.2,0.4-0.1,0.6L4,18.8c0.1,0.2,0.3,0.3,0.5,0.2l2-0.4c0.8-0.2,1.6,0.3,1.9,1.1L9,21.7C9.1,21.9,9.3,22,9.5,22h4.2c0.2,0,0.4-0.1,0.5-0.3l0.6-1.9c0.3-0.8,1.1-1.2,1.9-1.1l2,0.4c0.2,0,0.4-0.1,0.5-0.2l2.1-3.7c0.1-0.2,0.1-0.4-0.1-0.6L20,13.1z M18.6,18l-1.6-0.3c-1.3-0.3-2.6,0.5-3,1.7L13.4,21H9.9l-0.5-1.6c-0.4-1.3-1.7-2-3-1.7L4.7,18l-1.8-3l1.1-1.3c0.9-1,0.9-2.5,0-3.5L2.9,9l1.8-3l1.6,0.3c1.3,0.3,2.6-0.5,3-1.7L9.9,3h3.5l0.5,1.6c0.4,1.3,1.7,2,3,1.7L18.6,6l1.8,3l-1.1,1.3c-0.9,1-0.9,2.5,0,3.5l1.1,1.3L18.6,18z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN-HEADER -->

        <!-- MAIN-SIDEBAR -->
        <div class="sticky">
            @include('partials.menu')
        </div>
        <!-- END MAIN-SIDEBAR -->

        <!-- MAIN-CONTENT -->
        <div class="main-content side-content pt-0">
            <div class="main-container container">
                <div class="inner-body">
                    <!-- PAGE HEADER -->
                    <div class="page-header1">
                        <div>
                            <ol class="breadcrumb">
                                @php
                                if(isset($main_menu)){ @endphp
                                <li class="breadcrumb-item"><a href="javascript:;">{{$main_menu->$lang}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{isset($sub_menu)?$sub_menu->$lang:""}}
                                </li>
                                @php }else{ @endphp
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{isset($sub_menu)?$sub_menu->$lang:""}}
                                </li>
                                @php } @endphp
                            </ol>
                        </div>
                    </div>
                    <!-- END PAGE HEADER -->
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END MAIN-CONTENT -->

        <!-- MAIN-FOOTER -->
        <div class="main-footer text-center">
            <div class="container">
                <div class="row row-sm">
                    <div class="col-md-12">
                        <span>Copyright © {{date('Y')}} <a href="javascript:void(0);">BITAC IMS</a>.
                            All rights reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN-FOOTER -->


        <!-- RIGHT-SIDEBAR -->
        <div class="sidebar sidebar-right sidebar-animate">
            <div class="sidebar-icon">
                <a href="javascript:void(0);" class="text-white fs-18 mt-1 d-block" data-bs-toggle="sidebar-right"
                    data-bs-target=".sidebar-right"><i class="fe fe-x"></i></a>
            </div>
            <div class="sidebar-body">
                <h5 class="text-white">Settings</h5>
                <div class="d-flex p-2">
                    <span class="custom-switch-description">Notifications</span>
                    <label class="custom-switch ms-auto">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="d-flex p-2 border-top">
                    <span class="custom-switch-description">Show your Emails</span>
                    <label class="custom-switch ms-auto">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="d-flex p-2 border-top">
                    <span class="custom-switch-description">System Logs</span>
                    <label class="custom-switch ms-auto">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="d-flex p-2 border-top">
                    <span class="custom-switch-description">Error Reporting</span>
                    <label class="custom-switch ms-auto">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="d-flex p-2 border-top">
                    <span class="custom-switch-description">Show recent activity</span>
                    <label class="custom-switch ms-auto">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="d-flex p-2 mb-1 border-top">
                    <span class="custom-switch-description">Allow Data Collection</span>
                    <label class="custom-switch ms-auto">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <h5 class="text-white">Overview</h5>
                <div class="p-3">
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Profits</span> <span>76%</span>
                        </div>
                        <div class="progress ht-7">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                class="progress-bar ht-7 progress-bar-xs wd-75p" role="progressbar"></div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Balance</span> <span>65%</span>
                        </div>
                        <div class="progress ht-7">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="65"
                                class="progress-bar ht-7 progress-bar-xs bg-secondary wd-65p" role="progressbar">
                            </div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Earnings</span> <span>87%</span>
                        </div>
                        <div class="progress ht-7">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                class="progress-bar ht-7 progress-bar-xs bg-success wd-70p" role="progressbar">
                            </div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Customers</span> <span>55%</span>
                        </div>
                        <div class="progress ht-7">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55"
                                class="progress-bar ht-7 progress-bar-xs bg-info wd-55p" role="progressbar"></div>
                        </div><!-- progress -->
                    </div>
                    <div class="main-traffic-detail-item">
                        <div>
                            <span>Total Likes</span> <span>62%</span>
                        </div>
                        <div class="progress ht-7">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="62"
                                class="progress-bar ht-7 progress-bar-xs bg-warning wd-65p" role="progressbar">
                            </div>
                        </div><!-- progress -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END RIGHT-SIDEBAR -->

        <!-- SCROLL WITH CONTENT MODAL -->
        <!-- END SCROLL WITH CONTENT MODAL -->


        <!-- COUNTRY SELECTOR MODAL  -->
        <!-- <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row p-3">
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt src="images/en_flag.jpg"
                                            class="me-3 language"></span>Usa
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/italy_flag.jpg"
                                            class="me-3 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/spain_flag.jpg"
                                            class="me-3 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/india_flag.jpg"
                                            class="me-3 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/french_flag.jpg"
                                            class="me-3 language"></span>France
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/mexico_flag.jpg"
                                            class="me-3 language"></span>Mexico
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/poland_flag.jpg"
                                            class="me-3 language"></span>Poland
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/austria_flag.jpg"
                                            class="me-3 language"></span>Austria
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/russia_flag.jpg"
                                            class="me-3 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/germany_flag.jpg"
                                            class="me-3 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/argentina_flag.jpg"
                                            class="me-3 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/uae_flag.jpg"
                                            class="me-3 language"></span>U.A.E
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/malaysia_flag.jpg"
                                            class="me-3 language"></span>Malaysia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0);" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt src="images/canada_flag.jpg"
                                            class="me-3 language"></span>Canada
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- END COUNTRY SELECTOR MODAL  -->


    </div>
    <!-- END PAGE-->

    <!-- SCRIPTS -->
    <!-- BACK TO TOP -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <!-- JQUERY JS -->
    <script src="/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <!-- <script src="/assets/js/bootstrap-datetimepicker.min.js"></script> -->
    <script src="/assets/js/datepicker.js"></script>
    <script src="/assets/js/bootstrap-datepicker.js"></script>
    <script src="/assets/js/amazeui.datetimepicker.min.js"></script>

    <!-- INTERNAL FILEUPLOADS JS -->
    <script src="/assets/js/fileupload.js"></script>
    <script src="/assets/js/file-upload.js"></script>

    <!-- SELECT2 JS -->
    <script src="/assets/js/select2.min.js"></script>

    <!-- PERFECT-SCROLLBAR JS  -->
    <script src="/assets/js/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/pscroll1.js"></script>

    <!-- SIDEMENU JS -->
    <script src="/assets/js/sidemenu.js"></script>

    <!-- SIDEBAR JS -->
    <script src="/assets/js/sidebar.js"></script>


    <!-- INTERNAL DATA TABLES JS -->
    <!--     <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/dataTables.bootstrap5.js"></script>
    <script src="/assets/js/dataTables.responsive.min.js"></script> -->

    <script src="/assets/js/jquery.toast.js"></script>
    {{-- <script src="/assets/js/sweetalert2.all.min.js"></script> --}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="/assets/js/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/js/datatable/dataTables.buttons.min.js"></script>
    <script src="/assets/js/datatable/buttons.flash.min.js"></script>
    <script src="/assets/js/datatable/buttons.html5.min.js"></script>
    <script src="/assets/js/datatable/buttons.print.min.js"></script>
    <script src="/assets/js/datatable/buttons.colVis.min.js"></script>
    <script src="/assets/js/datatable/pdfmake.min.js"></script>
    <script src="/assets/js/datatable/vfs_fonts.js"></script>
    <script src="/assets/js/datatable/jszip.min.js"></script>
    <script src="/assets/js/datatable/dataTables.select.min.js"></script>

    <!-- INTERNAL FILEUPLOADS JS -->
    <script src="/assets/js/fileupload.js"></script>
    <script src="/assets/js/file-upload.js"></script>

    <!-- INTERNAL FANCY UPLOADER JS -->
    <script src="/assets/js/jquery.ui.widget.js"></script>
    <script src="/assets/js/jquery.fileupload.js"></script>
    <script src="/assets/js/jquery.iframe-transport.js"></script>
    <script src="/assets/js/jquery.fancy-fileupload.js"></script>
    <script src="/assets/js/fancy-uploader.js"></script>

    <!-- INTERNAL TELEPHONE INPUT JS -->
    <script src="/assets/js/telephoneinput.js"></script>

    <!-- INTERNAL MORRIES JS -->
    <script src="/assets/js/raphael.min.js"></script>
    <script src="/assets/js/morris.min.js"></script>

    <!-- INTERNAL DASHBOARD JS -->
    <script type="module" src="/assets/js/index.js"></script>

    <!-- INTERNAL CHART JS -->
    <script src="/assets/js/Chart.bundle.min.js"></script>


    <!--- INTERNAL TREEVIEW JS -->
    <script src="/assets/js/treeview.js"></script>


    <!-- STICKY JS-->
    <script src="/assets/js/sticky.js"></script>

    <!-- APP JS -->
    <script src="/assets/js/app.js"></script>

    <script src="/assets/js/custom.js"></script>



    <!-- SWITCHER JS -->
    <!--<script src="/assets/js/switcher.js"></script>-->
    <!-- END SCRIPTS -->

    @include('layouts.datatable')
    @include('layouts.ajax')
    @yield('scripts')

    <script>
    let pathname = $(location).attr('pathname');
    let split = pathname.split('/');
    // console.log(split);
    let slug = split[2];
    setTimeout(() => {
        $("li.active").not($('.' + slug)).removeClass("active");
        $("li." + slug).removeClass("show");
    }, 1000);
    </script>
    @if(session('message'))
    @php $class = "success";
    $message = session('message');
    $explode = explode('_', $message);
    if (count($explode) > 0) {
    $class = $explode[0];
    $message = $explode[1];
    }
    @endphp
    <script>
    $(function(e) {
        window.SWAL("{{ $message }}", "{{ $class }}");
    })
    </script>
    @endif

</body>

</html>