<div class="main-menu main-sidebar main-sidebar-sticky side-menu">
    <div class="main-sidebar-header container-fluid justify-content-center">
        <!--    <div class="main-sidebar-header container" style="overflow-x:scroll;"> -->
        <div class="sidemenu-logo">
            <a class="main-logo" href="https://laravel8.spruko.com/dashplex">
                <img src="/assets/images/logo-light.png" class="header-brand-img desktop-logo-dark" alt="logo">
                <img src="/assets/images/icon-light.png" class="header-brand-img icon-logo-dark" alt="logo">
                <img src="/assets/images/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="/assets/images/icon.png" class="header-brand-img icon-logo" alt="logo">
            </a>
        </div>
        <div class="main-sidebar-body main-body-1">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#c9bebe"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="menu-nav nav">
                <?php $parent_menus = \App\Menu::whereNULL('parent_id')->where('status', 'Active')->orderBy('order_no')->get();
foreach ($parent_menus as $key => $parent_menu) {
    $access = 'access_' . $parent_menu->slug;
    $create = 'create_' . $parent_menu->slug;
    $sub_menus = \App\Menu::where('parent_id', $parent_menu->id)->where('status', 'Active')->orderBy('order_no')->get();
    $no_of_sub_menu = count($sub_menus);
    ?>
                @can($access)
                <li class="nav-item {{$parent_menu->slug}}">
                    <a class="nav-link with-sub"
                        href="@if(!$no_of_sub_menu) {{url($parent_menu->menu_link)}} @else # @endif">
                        <span class="sidemenu-icon menu-icon {{$parent_menu->menu_icon}}"></span>
                        <span class="sidemenu-label">{{ $parent_menu->$lang  }}</span>
                        @if($no_of_sub_menu)
                        <i class="angle fe fe-chevron-down"></i>
                        @endif
                    </a>
                    @if($no_of_sub_menu)
                    <ul class="nav-sub">
                        <?php foreach ($sub_menus as $sub_menu) {
        $access = 'access_' . $sub_menu->slug;
        $create = 'create_' . $sub_menu->slug;
        ?>
                        @can($access)
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{ url($sub_menu->menu_link) }}">{{  $sub_menu->$lang }}</a>
                        </li>
                        @endcan
                        <?php }?>
                    </ul>
                    @endif
                </li>

                @endcan
                <?php }?>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#c9bebe" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>