<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"></div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="flag-icon flag-icon-gb"></i>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="#">
                        <div class="nav-language-icon me-2">
                            <i class="flag-icon flag-icon-sa" title="sa" id="sa"></i>
                        </div>
                        <div class="nav-language-text">
                            <p class="mb-1">Arabic</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <div class="nav-language-icon me-2">
                            <i class="flag-icon flag-icon-cn" title="cn" id="cn"></i>
                        </div>
                        <div class="nav-language-text">
                            <p class="mb-1">Chinese</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <div class="nav-language-icon me-2">
                            <i class="flag-icon flag-icon-ru" title="ru" id="ru"></i>
                        </div>
                        <div class="nav-language-text">
                            <p class="mb-1">Russian</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <div class="nav-language-icon me-2">
                            <i class="flag-icon flag-icon-es" title="es" id="es"></i>
                        </div>
                        <div class="nav-language-text">
                            <p class="mb-1">Spanish</p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="<?= $baseURL ?>assets/images/favicon.png" alt="image">
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1">test_user</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-end p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    <div class="p-3 text-center bg-info">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?= $baseURL ?>assets/images/favicon.png" alt="">
                    </div>
                    <div class="p-2">
                        <h5 class="dropdown-header text-uppercase ps-2 text-light">User Options</h5>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span>Settings</span>
                            <i class="mdi mdi-weather-sunny"></i>
                        </a>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                            <span>Log Out</span>
                            <i class="mdi mdi-logout ms-1"></i>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count-symbol bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0 bg-info text-white py-4">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-calendar"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                            <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                                <i class="mdi mdi-weather-sunny"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                            <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="mdi mdi-link-variant"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                            <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>