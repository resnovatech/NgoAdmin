 @php
     $usr = Auth::guard('admin')->user();
 @endphp

 <header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>

        @if(Auth::guard('admin')->user()->image == NUll)
        <img class="img-90 rounded-circle" src="{{ asset('/') }}public/no_image.jpg" alt="">
        @else
        <img class="img-90 rounded-circle" src="{{asset('/')}}{{ Auth::guard('admin')->user()->image }}" alt="">

        @endif





        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="{{ route('admin.settings') }}">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::guard('admin')->user()->name }}</h6></a>
        <p class="mb-0 font-roboto">{{ Auth::guard('admin')->user()->department }}</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    @if (Route::is('new_registration_list') ||  Route::is('revision_registration_list') || Route::is('already_registration_list') || Route::is('registration_view'))

                    <li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Registration</span></a>
                        <ul class="nav-submenu menu-content" style="display: block;">
                            <li><a href="{{ route('new_registration_list') }}"  class="{{ Route::is('new_registration_list')  ? 'active' : '' }}">New Registration</a></li>
                            <li><a href="{{ route('revision_registration_list') }}" class="{{ Route::is('revision_registration_list')  ? 'active' : '' }}">Revision Registration</a></li>
                            <li><a href="{{ route('already_registration_list') }}" class="{{ Route::is('already_registration_list')  ? 'active' : '' }}">Already Registered</a></li>
                        </ul>
                    </li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Registration</span></a>
    <ul class="nav-submenu menu-content">
        <li><a href="{{ route('new_registration_list') }}"  class="{{ Route::is('new_registration_list')  ? 'active' : '' }}">New Registration</a></li>
        <li><a href="{{ route('revision_registration_list') }}" class="{{ Route::is('revision_registration_list')  ? 'active' : '' }}">Revision Registration</a></li>
        <li><a href="{{ route('already_registration_list') }}" class="{{ Route::is('already_registration_list')  ? 'active' : '' }}">Already Registered</a></li>
    </ul>
</li>

@endif




@if (Route::is('new_name_change_list') ||  Route::is('revision_name_change_list') || Route::is('already_name_change_list') || Route::is('name_change_view'))

<li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Name Change</span></a>
    <ul class="nav-submenu menu-content" style="display: block;">
        <li><a href="{{ route('new_name_change_list') }}"  class="{{ Route::is('new_name_change_list')  ? 'active' : '' }}">New name_change</a></li>
        <li><a href="{{ route('revision_name_change_list') }}" class="{{ Route::is('revision_name_change_list')  ? 'active' : '' }}">Revision name_change</a></li>
        <li><a href="{{ route('already_name_change_list') }}" class="{{ Route::is('already_name_change_list')  ? 'active' : '' }}">Already Changed</a></li>
    </ul>
</li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Name Change</span></a>
<ul class="nav-submenu menu-content">
<li><a href="{{ route('new_name_change_list') }}"  class="{{ Route::is('new_name_change_list')  ? 'active' : '' }}">New Name Change</a></li>
<li><a href="{{ route('revision_name_change_list') }}" class="{{ Route::is('revision_name_change_list')  ? 'active' : '' }}">Revision Name Change</a></li>
<li><a href="{{ route('already_name_change_list') }}" class="{{ Route::is('already_name_change_list')  ? 'active' : '' }}">Already Changed</a></li>
</ul>
</li>

@endif

@if (Route::is('new_renew_list') ||  Route::is('revision_renew_list') || Route::is('already_renew_list') || Route::is('renew_view'))

<li class="dropdown"><a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Renew</span></a>
    <ul class="nav-submenu menu-content" style="display: block;">
        <li><a href="{{ route('new_renew_list') }}"  class="{{ Route::is('new_renew_list')  ? 'active' : '' }}">New Renew</a></li>
        <li><a href="{{ route('revision_renew_list') }}" class="{{ Route::is('revision_renew_list')  ? 'active' : '' }}">Revision Renew</a></li>
        <li><a href="{{ route('already_renew_list') }}" class="{{ Route::is('already_renew_list')  ? 'active' : '' }}">Already Renewed</a></li>
    </ul>
</li>
@else
<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Ngo Renew</span></a>
<ul class="nav-submenu menu-content">
<li><a href="{{ route('new_renew_list') }}"  class="{{ Route::is('new_renew_list')  ? 'active' : '' }}">New Renew</a></li>
<li><a href="{{ route('revision_renew_list') }}" class="{{ Route::is('revision_renew_list')  ? 'active' : '' }}">Revision Renew</a></li>
<li><a href="{{ route('already_renew_list') }}" class="{{ Route::is('already_renew_list')  ? 'active' : '' }}">Already Renewed</a></li>
</ul>
</li>

@endif


                    <li class="sidebar-main-title">
                        <div>
                          <h6>Other</h6>
                        </div>
                      </li>

                      @if (Route::is('admin.civil_info') || Route::is('admin.country') || Route::is('admin.system_information') ||  Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') || Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit')|| Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit'))

                      <li class="dropdown">
                        <a class="nav-link menu-title active" href="javascript:void(0)"><i data-feather="settings"></i><span>Setting</span></a>
                        <ul class="nav-submenu menu-content" style="display: block;">
                            @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                            <li ><a href="{{ route('admin.system_information') }}" class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"> <span>System Information</span> </a></li>

                @endif

                @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                <li >
                    <a href="{{ route('admin.admins') }}" class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}"><i class="bi bi-person-badge-fill"></i><span>Staff</span> </a>
                </li>

                @endif


                       @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                            <li ><a href="{{ route('admin.roles') }}" class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"> <span>Role List</span> </a></li>

                @endif
                       @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                         <li >
                                <a href="{{ route('admin.permission') }}" class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}"><span>Permission</span> </a>
                            </li>
@endif

@if ($usr->can('country_add') || $usr->can('country_view') ||  $usr->can('country_delete') ||  $usr->can('country_update'))
<li >
       <a href="{{ route('admin.country') }}" class="{{ Route::is('admin.country')  ? 'active' : '' }}"><span>Country</span> </a>
   </li>
@endif

@if ($usr->can('civil_info_add') || $usr->can('civil_info_view') ||  $usr->can('civil_info_delete') ||  $usr->can('civil_info_update'))
<li >
       <a href="{{ route('admin.civil_info') }}" class="{{ Route::is('admin.civil_info')  ? 'active' : '' }}"><span>Civil Info</span> </a>
   </li>
@endif


                        </ul>
                    </li>
@else
<li class="dropdown">
    <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Setting</span></a>
    <ul class="nav-submenu menu-content">
        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
        <li ><a href="{{ route('admin.system_information') }}" class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"> <span>System Information</span> </a></li>

@endif

@if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
<li >
<a href="{{ route('admin.admins') }}" class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}"><i class="bi bi-person-badge-fill"></i><span>Staff</span> </a>
</li>

@endif


   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
        <li ><a href="{{ route('admin.roles') }}" class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"> <span>Role List</span> </a></li>

@endif
   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
     <li >
            <a href="{{ route('admin.permission') }}" class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}"><span>Permission</span> </a>
        </li>
@endif
@if ($usr->can('country_add') || $usr->can('country_view') ||  $usr->can('country_delete') ||  $usr->can('country_update'))
<li >
       <a href="{{ route('admin.country') }}" class="{{ Route::is('admin.country')  ? 'active' : '' }}"><span>Country</span> </a>
   </li>
@endif

@if ($usr->can('civil_info_add') || $usr->can('civil_info_view') ||  $usr->can('civil_info_delete') ||  $usr->can('civil_info_update'))
<li >
       <a href="{{ route('admin.civil_info') }}" class="{{ Route::is('admin.civil_info')  ? 'active' : '' }}"><span>Civil Info</span> </a>
   </li>
@endif
    </ul>
</li>

@endif

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>

{{--
<div class="dlabnav border-right">
    <div class="dlabnav-scroll">
            <p class="menu-title style-1"> Main Menu</p>
        <ul class="metismenu" id="menu">

            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}" class="" aria-expanded="false">
                <i class="bi bi-house"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>

        @if ($usr->can('product_add') || $usr->can('product_view') ||  $usr->can('product_update') ||  $usr->can('product_update'))
        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
            <i class="bi bi-shop-window"></i>

                <span class="nav-text">Menu</span>
            </a>
            <ul aria-expanded="false">

        @if ($usr->can('product_add') || $usr->can('product_view') ||  $usr->can('product_update') ||  $usr->can('product_update'))
        <li class="{{ Route::is('admin.product_information') ? 'active' : '' }}">
            <a href="{{ route('admin.product_information') }}" class="" aria-expanded="false">

            <span class="nav-text">Food Item</span>
        </a>
    </li>

    @endif
    @if ($usr->can('menu_add') || $usr->can('menu_view') ||  $usr->can('menu_update') ||  $usr->can('menu_update'))
    <li class="{{ Route::is('admin.menu')  ? 'active' : '' }}">
           <a href="{{ route('admin.menu') }}">

            <span>Menu</span>
        </a>
       </li>

   @endif
            </ul>

        </li>
        @endif

        @if ($usr->can('qr_code_add') || $usr->can('qr_code_view') ||  $usr->can('qr_code_update') ||  $usr->can('qr_code_update'))

        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
            <i class="bi bi-table"></i>

                <span class="nav-text">Table Info</span>
            </a>
            <ul aria-expanded="false">

                @if ($usr->can('table_add') || $usr->can('table_view') ||  $usr->can('table_update') ||  $usr->can('table_update'))
                <li class="{{ Route::is('admin.table_information')  ? 'active' : '' }}">
                <a href="{{ route('admin.table_information') }}">

                <span>Table</span>
                </a>
                </li>

                @endif

                @if ($usr->can('qr_code_add') || $usr->can('qr_code_view') ||  $usr->can('qr_code_update') ||  $usr->can('qr_code_update'))
                <li class="{{ Route::is('generate_qr_code_list')  ? 'active' : '' }}">
                <a href="{{ route('generate_qr_code_list') }}">

                <span>Qr Code</span>
                </a>
                </li>
                @endif
            </ul>

        </li>

        @endif
        @if ($usr->can('room_qr_add') || $usr->can('room_qr_view') ||  $usr->can('room_qr_delete') ||  $usr->can('room_qr_update'))
        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
            <i class="bi bi-building"></i>

                <span class="nav-text">Hotel Info</span>
            </a>
            <ul aria-expanded="false">

                @if ($usr->can('room_add') || $usr->can('room_view') ||  $usr->can('room_update') ||  $usr->can('room_update'))
                <li class="{{ Route::is('admin.room_information')  ? 'active' : '' }}">
                <a href="{{ route('admin.room_information') }}">

                <span>Room</span>
                </a>
                </li>

                @endif

                @if ($usr->can('room_qr_add') || $usr->can('room_qr_view') ||  $usr->can('room_qr_delete') ||  $usr->can('room_qr_update'))
                <li class="{{ Route::is('generate_qr_code_list_room')  ? 'active' : '' }}">
                <a href="{{ route('generate_qr_code_list_room') }}">

                <span>Qr Code (Room)</span>
                </a>
                </li>
                @endif

            </ul>

        </li>

        @endif


        @if ($usr->can('order_add') || $usr->can('order_view') ||  $usr->can('order_update') ||  $usr->can('order_update'))
<li class="{{ Route::is('order_list')  ? 'active' : '' }}">
<a href="{{ route('order_list') }}">
<i class="bi bi-folder"></i>
<span>Order List</span>
</a>
</li>

@endif

    @if ($usr->can('banner_add') || $usr->can('banner_view') ||  $usr->can('banner_update') ||  $usr->can('banner_delete'))

    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
        <i class="bi bi-card-image"></i>

            <span class="nav-text">Banner</span>
        </a>
        <ul aria-expanded="false">

            <li class="{{ Route::is('admin.promotion_banner')  ? 'active' : '' }}">
                <a href="{{ route('admin.promotion_banner') }}" class="" aria-expanded="false">

                 <span>Promotion Banner</span>
             </a>
            </li>

            @if ($usr->can('c_image_add') || $usr->can('c_image_view') ||  $usr->can('c_image_update') ||  $usr->can('c_image_delete'))
            <li class="{{ Route::is('admin.company_banner')  ? 'active' : '' }}">
               <a href="{{ route('admin.company_banner') }}">

                <span>Company Banner</span>
            </a>
            </li>

            @endif

        </ul>

    </li>


@endif






<p class="menu-title style-1">Other</p>



@if ($usr->can('report_add') || $usr->can('report_view') ||  $usr->can('report_update') ||  $usr->can('report_delete'))

            <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="bi bi-clipboard-data"></i>

                    <span class="nav-text">Report</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ Route::is('report_product')  ? 'active' : '' }}"><a href="{{ route('report_product') }}"> <span>Product Report</span> </a></li>

                    <li class="{{  Route::is('sell_report') ? 'active' : '' }}"><a href="{{ route('sell_report') }}"> <span>Sell Report</span> </a></li>


                           <li class="{{ Route::is('client_report') ? 'active' : '' }}">
                                  <a href="{{ route('client_report') }}"><span>Client Report</span> </a>
                              </li>
                </ul>

            </li>


            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="bi bi-gear"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                    <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>Company Information</span> </a></li>

        @endif




               @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

        @endif
               @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                 <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                        <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                    </li>

                @endif


                </ul>
            </li>

            @endif


        </ul>

    </div>
</div>
 --}}
