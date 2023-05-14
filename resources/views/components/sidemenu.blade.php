<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
         data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i
                        class="kt-menu__link-icon flaticon-home"></i><span
                        class="kt-menu__link-text">Dashboard</span></a></li>

                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon  fa fa-chart-line"></i>
                        <span class="kt-menu__link-text">@lang("sidebar." . $modelLink['title'])</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ $modelLink['index'] }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">@lang("sidebar." . $modelLink['title'] . '.index')</span>
                                </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ $modelLink['create'] }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">@lang("sidebar." . $modelLink['title'] . '.create')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
        </ul>
    </div>
</div>
