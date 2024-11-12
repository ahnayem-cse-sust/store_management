<div class="main-menu ps--active-y main-navbar hor-menu">
    <div class="main-container-1 active container">
        <div class="sidemenu-logo">
            <a class="main-logo" href="https://laravel8.spruko.com/dashplex">
                <img src="https://laravel8.spruko.com/dashplex/build/assets/img/brand/logo-light.png"
                    class="header-brand-img desktop-logo-dark" alt="logo">
                <img src="https://laravel8.spruko.com/dashplex/build/assets/img/brand/icon-light.png"
                    class="header-brand-img icon-logo-dark" alt="logo">
                <img src="https://laravel8.spruko.com/dashplex/build/assets/img/brand/logo.png"
                    class="header-brand-img desktop-logo" alt="logo">
                <img src="https://laravel8.spruko.com/dashplex/build/assets/img/brand/icon.png"
                    class="header-brand-img icon-logo" alt="logo">
            </a>
        </div>
        <div class="main-body-1 is-expanded">
            <div class="slide-left disabled active d-none" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#66cc00" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg></div>
            <ul class="menu-nav nav">
                <?php $parent_menus = \App\Menu::whereNULL('parent_id')->where('status',
                'Active')->orderBy('order_no')->get();
                foreach ($parent_menus as $key => $parent_menu) {
                $access = 'access_' . $parent_menu->slug;
                $create = 'create_' . $parent_menu->slug;
                $sub_menus = \App\Menu::where('parent_id', $parent_menu->id)->where('status',
                'Active')->orderBy('order_no')->get();
                $no_of_sub_menu = count($sub_menus);
                ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($access)): ?>
                <li class="nav-item <?php echo e($parent_menu->slug); ?>">
                    <a class="nav-link with-sub"
                        href="<?php if(!$no_of_sub_menu): ?> <?php echo e(url($parent_menu->menu_link)); ?> <?php else: ?> # <?php endif; ?>">
                        <span class="sidemenu-icon menu-icon <?php echo e($parent_menu->menu_icon); ?>"></span>
                        <span class="sidemenu-label"><?php echo e($parent_menu->$lang); ?></span>
                        <?php if($no_of_sub_menu): ?>
                        <i class="angle fe fe-chevron-down"></i>
                        <?php endif; ?>
                    </a>
                    <?php if($no_of_sub_menu): ?>
                    <ul class="nav-sub">
                        <?php foreach ($sub_menus as $sub_menu) {
                        $access = 'access_' . $sub_menu->slug;
                        $create = 'create_' . $sub_menu->slug;
                        ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($access)): ?>
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="<?php echo e(url($sub_menu->menu_link)); ?>"><?php echo e($sub_menu->$lang); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php } ?>
                    </ul>
                    <?php endif; ?>
                </li>

                <?php endif; ?>
                <?php } ?>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#66cc00" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </div>
    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; height: 714px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 519px;"></div>
    </div>
</div><?php /**PATH /home/nayem/Documents/Bitac/projects/store_management_system/resources/views/partials/menu.blade.php ENDPATH**/ ?>