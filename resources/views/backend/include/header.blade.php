@php
$usr = Auth::guard('admin')->user();
@endphp



<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('/') }}{{ $logo }}" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('/') }}{{ $logo }}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
        </div>
        <div class="left-menu-header col">
            <ul>
                <li>
                    <form class="form-inline search-form">
                        <div class="search-bg"><i class="fa fa-search"></i>
                            <input class="form-control-plaintext" placeholder="Search here.....">
                        </div>
                    </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                </li>
            </ul>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li class="onhover-dropdown">
                    <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
                    <ul class="notification-dropdown onhover-show-div">
                        <li>
                            <p class="f-w-700 mb-0">You have {{ count($ongoingNgoStatus) + count($ongoingNgoRenewStatus) + count($ongoingNgoNameChangeStatus) }} Notifications<span class="pull-right badge badge-primary badge-pill">{{ count($ongoingNgoStatus) + count($ongoingNgoRenewStatus) + count($ongoingNgoNameChangeStatus) }} </span></p>
                        </li>

                        @foreach($ongoingNgoStatus as $all_ongoingNgoStatus)

                        <a href="{{ route('new_registration_list') }}">
                        <li class="noti-primary">
                            <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                                <div class="media-body">
                                    <p> New Ngo Registration Request</p>
                                </div>
                            </div>
                        </li>
                    </a>
                        @endforeach



                        @foreach($ongoingNgoRenewStatus as $all_ongoingNgoStatus)
                        <a href="{{ route('new_renew_list') }}">
                        <li class="noti-success">
                            <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                                <div class="media-body">
                                    <p>New Ngo Renew Request </p>
                                </div>
                            </div>
                        </li>
                        </a>
                        @endforeach

                        @foreach($ongoingNgoNameChangeStatus as $all_ongoingNgoStatus)
                        <a href="{{ route('new_name_change_list') }}">

                        <li class="noti-primary">
                            <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                                <div class="media-body">
                                    <p>New Ngo Name Change Request </p>
                                </div>
                            </div>
                        </li>
                        </a>
                        @endforeach




                    </ul>
                </li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>

                <li class="onhover-dropdown p-0">
                    <button class="btn btn-primary-light" type="button"><a href="{{ route('admin.logout.submit') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('admin-logout-form').submit();"><i data-feather="log-out"></i>Log out</a></button>
                                       <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>







