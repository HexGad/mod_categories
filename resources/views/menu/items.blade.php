@can('dashboard.categories.show')
    <!--begin:Menu item-->
    <div class="menu-item">
        <!--begin:Menu link-->
        <a class="menu-link" href="{{route('dashboard.categories.index')}}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 310 290">
                        <rect width="126.943581" height="105.286539" rx="12" ry="12" transform="matrix(1.201016 0 0 1.326445-1.865981 0.343197)" fill="currentColor" stroke-width="0"/>
                        <rect width="126.943581" height="105.286539" rx="12" ry="12" transform="matrix(1.201016 0 0 1.326445-1.865981 149.486147)" fill="#9d9da6" stroke-width="0"/>
                        <rect width="126.943581" height="105.286539" rx="12" ry="12" transform="matrix(1.201016 0 0 1.326445 157.18775 149.486147)" fill="#9d9da6" stroke-width="0"/>
                        <rect width="126.943581" height="105.286539" rx="12" ry="12" transform="matrix(1.201016 0 0 1.326445 157.18775 0.343197)" fill="#9d9da6" stroke-width="0"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Categories</span>
        </a>
        <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
@endcan
