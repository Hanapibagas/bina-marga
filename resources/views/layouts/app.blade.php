<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Layanan Aplikasi Bina Marga</title>

    @include('includes.style')

    @stack('css')

</head>

<body class="sidebar-main-menu">
    {{-- <div id="loading">
        <div id="loading-center">

        </div>
    </div> --}}

    <div class="wrapper">

        @include('includes.sidebar')

        <div id="content-page" class="content-page">

            @include('includes.navbar')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body">
                                        <div class="iq-progress-bar progress-bar-vertical iq-bg-primary">
                                            <span class="bg-primary" data-percent="70"></span>
                                        </div>
                                        <span class="line-height-4">10 feb, 2020</span>
                                        <h4 class="mb-2 mt-2">Hypertensive Crisis</h4>
                                        <p class="mb-0 text-secondary line-height">Ongoing treatment</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body">
                                        <div class="iq-progress-bar progress-bar-vertical iq-bg-danger">
                                            <span class="bg-danger" data-percent="50"></span>
                                        </div>
                                        <span class="line-height-4">12 Jan, 2020</span>
                                        <h4 class="mb-2 mt-2">Osteoporosis</h4>
                                        <p class="mb-0 text-secondary line-height">Incurable</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body">
                                        <div class="iq-progress-bar progress-bar-vertical iq-bg-warning">
                                            <span class="bg-warning" data-percent="80"></span>
                                        </div>
                                        <span class="line-height-4">15 feb, 2020</span>
                                        <h4 class="mb-2 mt-2">Hypertensive Crisis</h4>
                                        <p class="mb-0 text-secondary line-height">Examination</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body P-0 rounded"
                                        style="background: url(images/page-img/38.jpg) no-repeat scroll center center; background-size: contain; min-height: 146px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
            {{-- @include('includes.footer') --}}

            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-0119e03 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="0119e03" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1d0e59b ot-flex-column-vertical"
                            data-id="1d0e59b" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-a82a896 elementor-widget elementor-widget-shortcode"
                                        data-id="a82a896" data-element_type="widget"
                                        data-widget_type="shortcode.default">
                                        <style>
                                            .blantershow-chat {
                                                color: #fff;
                                                position: fixed;
                                                z-index: 0;
                                                bottom: 25px;
                                                right: 30px;
                                                font-size: 15px;
                                                padding: 10px 20px;
                                                border-radius: 30px;
                                                box-shadow: 0 1px 15px rgba(32, 33, 36, .28);
                                                transition: transform 0.3s ease-in-out;
                                            }

                                            .blantershow-chat:hover {
                                                transform: scale(1.1);
                                                z-index: 1;
                                            }

                                            .chat-options {
                                                position: absolute;
                                                bottom: 90px;
                                                right: 40px;
                                                background-color: #fff;
                                                border-radius: 5px;
                                                box-shadow: 0 1px 10px rgba(32, 33, 36, .2);
                                                padding: 10px;
                                                z-index: 999;
                                                opacity: 0;
                                                transition: opacity 0.3s ease-in-out;
                                            }

                                            .show-dropdown {
                                                opacity: 1;
                                            }
                                        </style>
                                        <div class="elementor-widget-container">
                                            <div class="elementor-shortcode">
                                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                                    <i id="chat-icon"
                                                        class="btn btn-primary blantershow-chat ri-add-line mr-2"></i>
                                                    <div class="iq-sub-dropdown chat-options"
                                                        id="notifications-dropdown">
                                                        <div class="iq-card shadow-none m-0">
                                                            <div class="iq-card-body p-0 ">
                                                                <a href="#" class="iq-sub-card">
                                                                    <div class="media align-items-center">
                                                                        <i style="font-size: 20px;"
                                                                            class="ri-folders-fill"></i>
                                                                        <div class="media-body ml-3">
                                                                            <h6 style="font-size: 15px;" class="mb-0 ">
                                                                                Folder Baru + </h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <hr>
                                                                <a href="#" class="iq-sub-card">
                                                                    <div class="media align-items-center">
                                                                        <i style="font-size: 20px;"
                                                                            class="ri-file-fill"></i>
                                                                        <div class="media-body ml-3">
                                                                            <h6 style="font-size: 15px;" class="mb-0 ">
                                                                                File Baru</h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        const chatIcon = document.getElementById('chat-icon');
        const notificationsDropdown = document.getElementById('notifications-dropdown');

        chatIcon.addEventListener('click', () => {
            notificationsDropdown.classList.toggle('show-dropdown');
        });
    </script>
    @include('includes.script')

    @stack('js')

</body>

</html>