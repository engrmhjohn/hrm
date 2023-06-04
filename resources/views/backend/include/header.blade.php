<div class="row">
    <div class="col-lg-12 p-0 ">
        <div class="header_iner d-flex justify-content-between align-items-center">
            <div class="sidebar_icon d-lg-none">
                <i class="ti-menu"></i>
            </div>
            <div class="line_icon open_miniSide d-none d-lg-block">
                <img src="{{ asset('backendAsset') }}/img/line_img.png" alt="">
            </div>
            <div class="serach_field-area d-flex align-items-center">
                <div class="search_inner">
                    <form action="#">
                        <div class="search_field">
                            <input type="text" placeholder="Search">
                        </div>
                        <button type="submit"> <img
                                src="{{ asset('backendAsset') }}/img/icon/icon_search.svg"
                                alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="header_right d-flex justify-content-between align-items-center">
                <div class="header_notification_warp d-flex align-items-center">
                    <li>
                        <a class="bell_notification_clicker" href="#"> <img
                                src="{{ asset('backendAsset') }}/img/icon/bell.svg" alt="">
                            <span>2</span>
                        </a>

                        <div class="Menu_NOtification_Wrap">
                            <div class="notification_Header">
                                <h4>Notifications</h4>
                            </div>
                            <div class="Notification_body">

                                <div class="single_notify d-flex align-items-center">
                                    <div class="notify_thumb">
                                        <a href="#"><img
                                                src="{{ asset('backendAsset') }}/img/staf/2.png"
                                                alt=""></a>
                                    </div>
                                    <div class="notify_content">
                                        <a href="#">
                                            <h5>Cool Marketing </h5>
                                        </a>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>

                                <div class="single_notify d-flex align-items-center">
                                    <div class="notify_thumb">
                                        <a href="#"><img
                                                src="{{ asset('backendAsset') }}/img/staf/4.png"
                                                alt=""></a>
                                    </div>
                                    <div class="notify_content">
                                        <a href="#">
                                            <h5>Awesome packages</h5>
                                        </a>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>

                                <div class="single_notify d-flex align-items-center">
                                    <div class="notify_thumb">
                                        <a href="#"><img
                                                src="{{ asset('backendAsset') }}/img/staf/3.png"
                                                alt=""></a>
                                    </div>
                                    <div class="notify_content">
                                        <a href="#">
                                            <h5>what a packages</h5>
                                        </a>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>

                                <div class="single_notify d-flex align-items-center">
                                    <div class="notify_thumb">
                                        <a href="#"><img
                                                src="{{ asset('backendAsset') }}/img/staf/2.png"
                                                alt=""></a>
                                    </div>
                                    <div class="notify_content">
                                        <a href="#">
                                            <h5>Cool Marketing </h5>
                                        </a>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>

                                <div class="single_notify d-flex align-items-center">
                                    <div class="notify_thumb">
                                        <a href="#"><img
                                                src="{{ asset('backendAsset') }}/img/staf/4.png"
                                                alt=""></a>
                                    </div>
                                    <div class="notify_content">
                                        <a href="#">
                                            <h5>Awesome packages</h5>
                                        </a>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>

                                <div class="single_notify d-flex align-items-center">
                                    <div class="notify_thumb">
                                        <a href="#"><img
                                                src="{{ asset('backendAsset') }}/img/staf/3.png"
                                                alt=""></a>
                                    </div>
                                    <div class="notify_content">
                                        <a href="#">
                                            <h5>what a packages</h5>
                                        </a>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="nofity_footer">
                                <div class="submit_button text-center pt_20">
                                    <a href="#" class="btn_1">See More</a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li>
                        <a class="CHATBOX_open" href="#"> <img
                                src="{{ asset('backendAsset') }}/img/icon/msg.svg" alt="">
                            <span>2</span> </a>
                    </li>
                </div>
                <div class="profile_info">
                    <img src="{{ asset('backendAsset') }}/img/client_img.png" alt="#">
                    <div class="profile_info_iner">
                        <div class="profile_author_name">
                            <h5>{{Auth::user()->name}}</h5>
                        </div>
                        <div class="profile_info_details">
                            <a href="{{route('admin.admin.admin_profile')}}">My Profile </a>
                            <a href="#">Settings</a>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout').submit()">Log
                                Out </a>
                            <form action="{{ route('logout') }}" method="post" id="logout">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
