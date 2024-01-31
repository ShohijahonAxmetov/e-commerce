<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/favicon/favicon.ico" type="image/x-icon"/>

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="/assets/css/libs.bundle.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme.bundle.css" />

    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .dropzone-modify {
            min-height: 80px;
            border: 1px dashed #cccccc;
            border-radius: 8px;
            cursor: pointer;
        }
        .dz-error-mark {
            display: none;
        }
        .dz-success-mark {
            display: none;
        }
    </style>

    <!-- Loader -->
    <style>
        #loader {
            width: 100%;
            height: 100%;
            position: fixed;
            background: #12263f66;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .lds-facebook {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-facebook div {
            display: inline-block;
            position: absolute;
            left: 8px;
            width: 16px;
            background: #ffffff;
            animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
            z-index: 9999;
        }
        .lds-facebook div:nth-child(1) {
            left: 8px;
            animation-delay: -0.24s;
        }
        .lds-facebook div:nth-child(2) {
            left: 32px;
            animation-delay: -0.12s;
        }
        .lds-facebook div:nth-child(3) {
            left: 56px;
            animation-delay: 0;
        }
        @keyframes lds-facebook {
            0% {
                top: 8px;
                height: 64px;
            }
            50%, 100% {
                top: 24px;
                height: 32px;
            }
        }
    </style>

    <!-- Choice select -->
    <style>
        .choices div:first-child {
            min-height: 22px;
        }
    </style>

    <!-- Required icon -->
    <style>
        {{-- Required icon --}}
        .required:after {
            position: absolute;
            content: '*';
            color: red;
            margin-left: 2px;
        }

        {{-- Variation delete --}}
        .delete_variation__icon {
            position: absolute;
            right: 0.5rem;
            top: 0.2rem;
            width: 40px;
            height: 40px;
            color: red;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

    </style>

    @include('panel.components.filepond.styles')

    <!-- Title -->
    <title>{{env('APP_NAME')}} | @yield('title')</title>
</head>
<body>

<!-- MODALS -->

<!-- OFFCANVAS -->

<!-- Offcanvas: Search -->
<div class="offcanvas offcanvas-start" id="sidebarOffcanvasSearch" tabindex="-1">
    <div class="offcanvas-body" data-list='{"valueNames": ["name"]}'>

        <!-- Form -->
        <form class="mb-4">
            <div class="input-group input-group-merge input-group-rounded input-group-reverse">
                <input class="form-control list-search" type="search" placeholder="Search">
                <div class="input-group-text">
                    <span class="fe fe-search"></span>
                </div>
            </div>
        </form>

        <!-- List group -->
        <div class="my-n3">
            <div class="list-group list-group-flush list-group-focus list">
                <a class="list-group-item" href="./team-overview.html">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar">
                                <img src="/assets/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                            </div>

                        </div>
                        <div class="col ms-n2">

                            <!-- Title -->
                            <h4 class="text-body text-focus mb-1 name">
                                Airbnb
                            </h4>

                            <!-- Time -->
                            <p class="small text-muted mb-0">
                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./team-overview.html">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar">
                                <img src="/assets/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                            </div>

                        </div>
                        <div class="col ms-n2">

                            <!-- Title -->
                            <h4 class="text-body text-focus mb-1 name">
                                Medium Corporation
                            </h4>

                            <!-- Time -->
                            <p class="small text-muted mb-0">
                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./project-overview.html">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar avatar-4by3">
                                <img src="/assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                            </div>

                        </div>
                        <div class="col ms-n2">

                            <!-- Title -->
                            <h4 class="text-body text-focus mb-1 name">
                                Homepage Redesign
                            </h4>

                            <!-- Time -->
                            <p class="small text-muted mb-0">
                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./project-overview.html">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar avatar-4by3">
                                <img src="/assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                            </div>

                        </div>
                        <div class="col ms-n2">

                            <!-- Title -->
                            <h4 class="text-body text-focus mb-1 name">
                                Travels & Time
                            </h4>

                            <!-- Time -->
                            <p class="small text-muted mb-0">
                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./project-overview.html">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar avatar-4by3">
                                <img src="/assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                            </div>

                        </div>
                        <div class="col ms-n2">

                            <!-- Title -->
                            <h4 class="text-body text-focus mb-1 name">
                                Safari Exploration
                            </h4>

                            <!-- Time -->
                            <p class="small text-muted mb-0">
                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./profile-posts.html">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar">
                                <img src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>

                        </div>
                        <div class="col ms-n2">

                            <!-- Title -->
                            <h4 class="text-body text-focus mb-1 name">
                                Dianna Smiley
                            </h4>

                            <!-- Status -->
                            <p class="text-body small mb-0">
                                <span class="text-success">●</span> Online
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./profile-posts.html">
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar">
                                <img src="/assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>

                        </div>
                        <div class="col ms-n2">

                            <!-- Title -->
                            <h4 class="text-body text-focus mb-1 name">
                                Ab Hadley
                            </h4>

                            <!-- Status -->
                            <p class="text-body small mb-0">
                                <span class="text-danger">●</span> Offline
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </a>
            </div>
        </div>

    </div>
</div>

<!-- Offcanvas: Activity -->
<div class="offcanvas offcanvas-start" id="sidebarOffcanvasActivity" tabindex="-1">
    <div class="offcanvas-header">

        <!-- Title -->
        <h4 class="offcanvas-title">
            Notifications
        </h4>

        <!-- Navs -->
        <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#modalActivityAction">Action</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#modalActivityUser">User</a>
            </li>
        </ul>

    </div>
    <div class="offcanvas-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="modalActivityAction">

                <!-- List group -->
                <div class="list-group list-group-flush list-group-activity my-n3">
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-mail"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Launchday 1.4.0 update email sent
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Sent to all 1,851 subscribers over a 24 hour period
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-archive"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    New project "Goodkit" created
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Looks like there might be a new theme soon.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-code"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Dashkit 1.5.0 was deployed.
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    A successful to deploy to production was executed.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-git-branch"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    "Update Dependencies" branch was created.
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    This branch was created off of the "master" branch.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-mail"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Launchday 1.4.0 update email sent
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Sent to all 1,851 subscribers over a 24 hour period
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-archive"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    New project "Goodkit" created
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Looks like there might be a new theme soon.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-code"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Dashkit 1.5.0 was deployed.
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    A successful to deploy to production was executed.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-git-branch"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    "Update Dependencies" branch was created.
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    This branch was created off of the "master" branch.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-mail"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Launchday 1.4.0 update email sent
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Sent to all 1,851 subscribers over a 24 hour period
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-archive"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    New project "Goodkit" created
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Looks like there might be a new theme soon.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-code"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Dashkit 1.5.0 was deployed.
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    A successful to deploy to production was executed.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <div class="avatar-title fs-lg bg-primary-soft rounded-circle text-primary">
                                        <i class="fe fe-git-branch"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    "Update Dependencies" branch was created.
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    This branch was created off of the "master" branch.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                </div>

            </div>
            <div class="tab-pane fade" id="modalActivityUser">

                <!-- List group -->
                <div class="list-group list-group-flush list-group-activity my-n3">
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Dianna Smiley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Uploaded the files "Launchday Logo" and "New Design".
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Ab Hadley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Shared the "Why Dashkit?" post with 124 subscribers.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    1h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-offline">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Adolfo Hess
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Exported sales data from Launchday's subscriber data.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    3h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Dianna Smiley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Uploaded the files "Launchday Logo" and "New Design".
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Ab Hadley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Shared the "Why Dashkit?" post with 124 subscribers.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    1h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-offline">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Adolfo Hess
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Exported sales data from Launchday's subscriber data.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    3h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Dianna Smiley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Uploaded the files "Launchday Logo" and "New Design".
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Ab Hadley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Shared the "Why Dashkit?" post with 124 subscribers.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    1h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-offline">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Adolfo Hess
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Exported sales data from Launchday's subscriber data.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    3h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Dianna Smiley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Uploaded the files "Launchday Logo" and "New Design".
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    2m ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-online">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Ab Hadley
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Shared the "Why Dashkit?" post with 124 subscribers.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    1h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm avatar-offline">
                                    <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                                </div>

                            </div>
                            <div class="col ms-n2">

                                <!-- Heading -->
                                <h5 class="mb-1">
                                    Adolfo Hess
                                </h5>

                                <!-- Text -->
                                <p class="small text-gray-700 mb-0">
                                    Exported sales data from Launchday's subscriber data.
                                </p>

                                <!-- Time -->
                                <small class="text-muted">
                                    3h ago
                                </small>

                            </div>
                        </div> <!-- / .row -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- NAVIGATION -->
<nav class="navbar navbar-vertical fixed-start navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="./index.html">
            <img src="/assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarIcon">
                    <a href="./profile-posts.html" class="dropdown-item">Profile</a>
                    <a href="./account-general.html" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="{{route('auth.logout')}}" class="dropdown-item">Logout</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge input-group-reverse">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-text">
                        <span class="fe fe-search"></span>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarDashboards">
                        <i class="fe fe-home"></i> Dashboards
                    </a>
                    <div class="collapse show" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                    Default
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./dashboard-project-management.html" class="nav-link ">
                                    Project Management
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./dashboard-ecommerce.html" class="nav-link ">
                                    E-Commerce
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="{{ request()->routeIs('categories.*') || request()->routeIs('categories') || request()->routeIs('brands.*') || request()->routeIs('brands') || request()->routeIs('products.*') || request()->routeIs('products') || request()->routeIs('attribute_groups.*') || request()->routeIs('attribute_groups') || request()->routeIs('attributes.*') || request()->routeIs('attributes') ? 'true' : 'false' }}" aria-controls="sidebarPages">
                        <i class="fe fe-file"></i> Каталог
                    </a>
                    <div class="collapse {{ request()->routeIs('categories.*') || request()->routeIs('categories') || request()->routeIs('brands.*') || request()->routeIs('brands') || request()->routeIs('products.*') || request()->routeIs('products') || request()->routeIs('attribute_groups.*') || request()->routeIs('attribute_groups') || request()->routeIs('attributes.*') || request()->routeIs('attributes') ? 'show' : '' }}" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link {{ request()->routeIs('products.*') || request()->routeIs('products') ? 'active' : '' }}">
                                    Продукты
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link {{ request()->routeIs('categories.*') || request()->routeIs('categories') ? 'active' : '' }}">
                                    Категории
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('brands.index')}}" class="nav-link {{ request()->routeIs('brands.*') || request()->routeIs('brands') ? 'active' : '' }}">
                                    Бренды
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAttributes" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="{{ request()->routeIs('attribute_groups.*') || request()->routeIs('attribute_groups') || request()->routeIs('attributes.*') || request()->routeIs('attributes') ? 'true' : 'false' }}" aria-controls="sidebarAttributes">
                                    Атрибуты продуктов
                                </a>
                                <div class="collapse {{ request()->routeIs('attribute_groups.*') || request()->routeIs('attribute_groups') || request()->routeIs('attributes.*') || request()->routeIs('attributes') ? 'show' : '' }}" id="sidebarAttributes">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('attributes.index')}}" class="nav-link {{ request()->routeIs('attributes.*') || request()->routeIs('attributes') ? 'active' : '' }}">
                                                Атрибуты продуктов
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('attribute_groups.index')}}" class="nav-link {{ request()->routeIs('attribute_groups.*') || request()->routeIs('attribute_groups') ? 'active' : '' }}">
                                                Группа атрибутов
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCharacteristics" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharacteristics">
                                    Характеристики продуктов
                                </a>
                                <div class="collapse" id="sidebarCharacteristics">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('characteristics.index')}}" class="nav-link">
                                                Характеристики продуктов
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('characteristic_groups.index')}}" class="nav-link">
                                                Группа характеристик
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./widgets.html">
                        <i class="fe fe-grid"></i> Widgets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="fe fe-user"></i> Authentication
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn">
                                    Sign in
                                </a>
                                <div class="collapse" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="./sign-in-cover.html" class="nav-link">
                                                Cover
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./sign-in-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./sign-in.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignUp">
                                    Sign up
                                </a>
                                <div class="collapse" id="sidebarSignUp">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="./sign-up-cover.html" class="nav-link">
                                                Cover
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./sign-up-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./sign-up.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarPassword" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPassword">
                                    Password reset
                                </a>
                                <div class="collapse" id="sidebarPassword">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="./password-reset-cover.html" class="nav-link">
                                                Cover
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./password-reset-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./password-reset.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarError" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarError">
                                    Error
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="./error-illustration.html" class="nav-link">
                                                Illustration
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./error.html" class="nav-link">
                                                Basic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasActivity" aria-contrtols="sidebarOffcanvasActivity">
                        <span class="fe fe-bell"></span> Notifications
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="navbar-divider my-3">

            <!-- Heading -->
            <h6 class="navbar-heading">
                Documentation
            </h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-4">
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarBasics" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBasics">
                        <i class="fe fe-clipboard"></i> Basics
                    </a>
                    <div class="collapse " id="sidebarBasics">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="./docs/getting-started.html" class="nav-link ">
                                    Getting Started
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./docs/design-file.html" class="nav-link ">
                                    Design File
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarComponents" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                        <i class="fe fe-book-open"></i> Components
                    </a>
                    <div class="collapse " id="sidebarComponents">
                        <ul class="nav nav-sm flex-column">
                            <li>
                                <a href="./docs/components.html#alerts" class="nav-link">
                                    Alerts
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#autosize" class="nav-link">
                                    Autosize
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#avatars" class="nav-link">
                                    Avatars
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#badges" class="nav-link">
                                    Badges
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#breadcrumb" class="nav-link">
                                    Breadcrumb
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#buttons" class="nav-link">
                                    Buttons
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#buttonGroup" class="nav-link">
                                    Button group
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#cards" class="nav-link">
                                    Cards
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#charts" class="nav-link">
                                    Charts
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#checklist" class="nav-link">
                                    Checklist
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#dropdowns" class="nav-link">
                                    Dropdowns
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#forms" class="nav-link">
                                    Forms
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#icons" class="nav-link">
                                    Icons
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#kanban" class="nav-link">
                                    Kanban
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#lists" class="nav-link">
                                    Lists
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#map" class="nav-link">
                                    Map
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#modals" class="nav-link">
                                    Modal
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#navs" class="nav-link">
                                    Navs
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#navbarDocs" class="nav-link">
                                    Navbar
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#pageHeaders" class="nav-link">
                                    Page headers
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#pagination" class="nav-link">
                                    Pagination
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#popovers" class="nav-link">
                                    Popovers
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#progress" class="nav-link">
                                    Progress
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#socialPosts" class="nav-link">
                                    Social post
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#spinners" class="nav-link">
                                    Spinners
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#tables" class="nav-link">
                                    Tables
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#toasts" class="nav-link">
                                    Toasts
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#tooltips" class="nav-link">
                                    Tooltips
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#typography" class="nav-link">
                                    Typography
                                </a>
                            </li>
                            <li>
                                <a href="./docs/components.html#utilities" class="nav-link">
                                    Utilities
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./docs/changelog.html">
                        <i class="fe fe-git-branch"></i> Changelog <span class="badge bg-primary ms-auto">v2.1.0</span>
                    </a>
                </li>
            </ul>

            <!-- Push content down -->
            <div class="mt-auto"></div>


            <!-- User (md) -->
            <div class="navbar-user d-none d-md-flex" id="sidebarUser">

                <!-- Icon -->
                <a class="navbar-user-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasActivity" aria-controls="sidebarOffcanvasActivity">
                <span class="icon">
                  <i class="fe fe-bell"></i>
                </span>
                </a>

                <!-- Dropup -->
                <div class="dropup">

                    <!-- Toggle -->
                    <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="./profile-posts.html" class="dropdown-item">Profile</a>
                        <a href="./account-general.html" class="dropdown-item">Settings</a>
                        <hr class="dropdown-divider">
                        <a href="{{route('auth.logout')}}" class="dropdown-item">Logout</a>
                    </div>

                </div>

                <!-- Icon -->
                <a class="navbar-user-link" data-bs-toggle="offcanvas" href="#sidebarOffcanvasSearch" aria-controls="sidebarOffcanvasSearch">
                <span class="icon">
                  <i class="fe fe-search"></i>
                </span>
                </a>

            </div>

        </div> <!-- / .navbar-collapse -->

    </div>
</nav>

<!-- LOADER -->
<div id="loader">
    <div class="lds-facebook"><div></div><div></div><div></div></div>
</div><!-- / .loader -->

<!-- MAIN CONTENT -->
<div class="main-content">

    <!-- CARDS -->
    @yield('content')

</div><!-- / .main-content -->

<!-- JAVASCRIPT -->
<!-- Map JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

<!-- Vendor JS -->
<script src="/assets/js/vendor.bundle.js"></script>

<!-- Theme JS -->
<script src="/assets/js/theme.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>


<!-- Notyf JS -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<!-- Dropzone JS -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<!-- Loader -->
<script>
    let loader = document.getElementById('loader');
    loader.style.display = 'none';
</script>

<!-- Load Axios library -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@include('panel.components.filepond.scripts')

<script>
    // Create an instance of Notyf
    let options = {
        "position": {
            "x": "center",
            "y": "top"
        }
    };
    let notyf = new Notyf(options);

    @if($errors->has('message'))
    // Display an error notification
    notyf.error('{{$errors->first('message')}}');
    @endif

    @if(session('message'))
    // Display a success notification
    notyf.success('{{session('message')}}');
    @endif
</script>

</body>
</html>
