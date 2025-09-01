<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @php
        $config =App\Models\ServerConfig::first()
        @endphp
        <title>
        @if(!empty($config->institueName))
        {{$config->institueName}} | @yield('fronttitle')
        @else 
        Jahanara Ayiub Acadimic | @yield('fronttitle')
        @endif  </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link href="{{ asset('/public/') }}/assets/css/custom.css" rel="stylesheet" />
        <link href="{{ asset('/public/') }}/assets/css/style.css" rel="stylesheet" />

        <!-- Owl Carousel Assets -->
        <link href="{{ asset('/public/') }}/owl-carousel/owl.carousel.css" rel="stylesheet" />
        <link href="{{ asset('/public/') }}/owl-carousel/owl.theme.css" rel="stylesheet" />

        <!-- Prettify -->
        <link href="{{ asset('/public/') }}/assets/js/google-code-prettify/prettify.css" rel="stylesheet" />
        <!-- font awesome kit setup -->
        <script src="https://kit.fontawesome.com/32dcd4a478.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto&family=Skranji&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
        <!--Fancy box-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/lightbox/fancybox/jquery.fancybox.min.css" />

        <link href="{{asset('/public/')}}/lightbox/css/animate.min.css" rel="stylesheet" />

        <!-- Demo -->

        <style>
            #owl-demo .item {
                margin: 3px;
            }
            #owl-demo .item img {
                display: block;
                width: 100%;
                height: auto;
            }
            /* Default (desktop/laptop) */
            .carousel-item img {
                height: 450px !important;
                object-fit: cover; /* Keeps image from stretching */
                width: 100%;
            }

            /* Tablet */
            @media (max-width: 992px) {
                .carousel-item img {
                    height: 350px !important;
                }
            }

            /* Mobile devices */
            @media (max-width: 576px) {
                .carousel-item img {
                    height: 220px !important;
                }
            }
            
            .call-box{
                color: #fff;
                display:flex; 
                align-items:center; 
                gap:10px;
                font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
            }
            .call-icon{
                display:inline-flex; 
                align-items:center; 
                justify-content:center;
                font-size: 1.8rem;
                color: #fff;
            }
            .call-text{ 
                font-size:0.8rem; 
                line-height:1.25; 
            }
            .call-label{
                font-size:0.6rem; 
                letter-spacing:.04em;;
            }
            .call-phone{
                font-weight:700; 
                color:#fff; 
                text-decoration:none;
            }
            .call-phone:hover{ 
                text-decoration:underline; 
            }
        /* Optional: shrink nicely on small screens */
            @media (max-width:480px){ 
                .call-phone{ font-size:15px; } 
                .call-label{ font-size:9px; } 
                .call-text{ 
                    font-size:0.6rem; 
                }
            }

            .nav-link {
                font-size: 1.1rem;
                font-weight: 550 !important;
            }

            .w-90 {
                width: 90% !important;
            }
        </style>
    </head>
    <body>
        <div class="menubar">
            <div class="container">
                <div class="row align-items-center p-2">
                    <div class="col-6 col-md-2 mx-auto text-center">
                        @if(!empty($config->logo))
                        <img class="w-75" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{$config->logo}}" alt="Logo" />
                        @else
                        <img class="w-75" src="{{ asset('/public/') }}/logo.png" alt="Jahanar Ayiub Academic" />
                        @endif
                    </div>
                    <div class="col-10 mx-auto d-block d-md-none">
                        <!-- CALL BOX -->
                        <div class="call-box">
                            <span class="call-icon" aria-hidden="true">
                                <i class="fa-regular fa-location-crosshairs"></i>
                            </span>

                            <div class="call-text">
                                <div class="call-label fw-bold text-uppercase">
                                    @if(!empty($config->institueName))
                                    <span>{{ $config->institueName }}</span>
                                    @else
                                        <span>Jahanara Ayub Academy</span>
                                    @endif
                                </div>
                                @if(!empty($config->address))
                                    <span>{{ $config->address }}</span>
                                @else
                                    <span>North Shampur, Burichong, Cumilla</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                    <div class="row mb-2 d-none d-md-flex">
                        <div class="col-md-4">
                            <!-- CALL BOX -->
                            <div class="call-box">
                                <span class="call-icon" aria-hidden="true">
                                    <i class="fa-solid fa-headset"></i>
                                </span>
                                <div class="call-text">
                                    <div class="call-label fw-bold text-uppercase">CALL US FOR MORE DETAILS</div>
                                    @if(!empty($config->officeMobile))
                                        <span>{{ $config->officeMobile }}</span>
                                    @else
                                        <span>+(012) 345 6789</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CALL BOX -->
                            <div class="call-box">
                                <span class="call-icon" aria-hidden="true">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                                <div class="call-text">
                                    <div class="call-label fw-bold text-uppercase">Let's connect with mail</div>
                                    @if(!empty($config->officeEmail))
                                        <span>{{ $config->officeEmail }}</span>
                                    @else
                                        <span>ja@gmail.com</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- CALL BOX -->
                            <div class="call-box">
                                <span class="call-icon" aria-hidden="true">
                                    <i class="fa-solid fa-location-crosshairs"></i>
                                </span>
                                <div class="call-text">
                                    <div class="call-label fw-bold text-uppercase">Office Address</div>
                                    @if(!empty($config->address))
                                        <span>{{ $config->address }}</span>
                                    @else
                                        <span>North Shampur, Burichong, Cumilla</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- mobile menu will slide in from the left and will hide on desktop -->
                        <div class="row mt-3 d-block d-md-none bg-success">
                            <nav class="navbar bg-success navbar-expand-lg navbar-success shadow" data-bs-theme="dark">
                                <div class="container-fluid">
                                    <!-- Mobile Menu Button -->
                                    <button class="btn btn-success d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <i class="fa-solid fa-arrow-turn-left"></i>
                                </div>
                            </nav>
                            <!-- Offcanvas Side Menu -->
                            <div class="offcanvas offcanvas-start w-75 bg-success" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="text-center mb-3">
                                        @if(!empty($config->logo))
                                            <img class="w-75" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{$config->logo}}" alt="Logo" />
                                        @else
                                            <img class="w-75" src="{{ asset('/public/') }}/logo.png" alt="Jahanar Ayiub Academic" />
                                        @endif
                                    </div>
                                    <div class="text-small mb-3">
                                        <!-- CALL BOX -->
                                        <div class="call-box">
                                            <span class="call-icon" aria-hidden="true">
                                                <i class="fa-solid fa-location-crosshairs"></i>
                                            </span>
                                            <div class="call-text">
                                                <div class="call-label fw-bold text-uppercase">
                                                    @if(!empty($config->institueName))
                                                        <span>{{ $config->institueName }}</span>
                                                    @else
                                                        <span>Jahanara Ayub Academy</span>
                                                    @endif
                                                </div>
                                                @if(!empty($config->address))
                                                    <span>{{ $config->address }}</span>
                                                @else
                                                    <span>North Shampur, Burichong, Cumilla</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('homePage')}}">Home</a>
                                        </li>
                                        <!-- Institute submenu -->
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="collapse" href="#mobileInstituteMenu" role="button" aria-expanded="false" aria-controls="mobileInstituteMenu">
                                                Institute <i class="fa fa-chevron-down float-end"></i>
                                            </a>
                                            <div class="collapse" id="mobileInstituteMenu">
                                                <ul class="list-unstyled ps-3">
                                                    <li><a class="nav-link" href="{{route('institutePage')}}">About Us</a></li>
                                                    <li><a class="nav-link" href="{{route('principalSpeechPage')}}">Principal Speech</a></li>
                                                    <li><a class="nav-link" href="{{route('student')}}">Student List</a></li>
                                                    <li><a class="nav-link" href="{{route('exprincipalPage')}}">EX-Principals</a></li>
                                                    <li><a class="nav-link" href="{{route('teacherPage')}}">Lecturer Corner</a></li>
                                                    <li><a class="nav-link" href="{{route('staffPage')}}">Staff Panel</a></li>
                                                    <li><a class="nav-link" href="{{route('comitteePage')}}">Governing Body</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Academic submenu -->
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="collapse" href="#mobileAcademicMenu" role="button" aria-expanded="false" aria-controls="mobileAcademicMenu">
                                                Academic <i class="fa fa-chevron-down float-end"></i>
                                            </a>
                                            <div class="collapse" id="mobileAcademicMenu">
                                                <ul class="list-unstyled ps-3">
                                                    <li><a class="nav-link" href="{{route('newSyllabus')}}">Syllabus</a></li>
                                                    <li><a class="nav-link" href="{{route('newClassSchedule')}}">Class Routine</a></li>
                                                    <li><a class="nav-link" href="{{route('newExamSchedule')}}">Exam Routine</a></li>
                                                    <li><a class="nav-link" href="{{route('newSemister')}}">Semister Plans</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Result Archive submenu -->
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="collapse" href="#mobileResultMenu" role="button" aria-expanded="false" aria-controls="mobileResultMenu">
                                                Result Archive <i class="fa fa-chevron-down float-end"></i>
                                            </a>
                                            <div class="collapse" id="mobileResultMenu">
                                                <ul class="list-unstyled ps-3">
                                                    <li><a class="nav-link" href="{{route('internalResult')}}">Internal Result</a></li>
                                                    <li><a class="nav-link" href="{{route('individualResult')}}">Individual Result</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Job Placement submenu -->
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="collapse" href="#mobileJobMenu" role="button" aria-expanded="false" aria-controls="mobileJobMenu">
                                                Job Placement <i class="fa fa-chevron-down float-end"></i>
                                            </a>
                                            <div class="collapse" id="mobileJobMenu">
                                                <ul class="list-unstyled ps-3">
                                                    <li><a class="nav-link" href="{{route('placementCellView')}}">Placement Cell</a></li>
                                                    <li><a class="nav-link" href="{{route('jobNeedyStudentView')}}">Job Needy Student</a></li>
                                                    <li><a class="nav-link" href="https://bdjobs.com/">Job Circular</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Gallery submenu -->
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="collapse" href="#mobileGalleryMenu" role="button" aria-expanded="false" aria-controls="mobileGalleryMenu">
                                                Gallery <i class="fa fa-chevron-down float-end"></i>
                                            </a>
                                            <div class="collapse" id="mobileGalleryMenu">
                                                <ul class="list-unstyled ps-3">
                                                    <li><a class="nav-link" href="{{route('imagePage')}}">Photo Gallery</a></li>
                                                    <li><a class="nav-link" href="{{route('videoPage')}}">Video Gallery</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Support -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('supportPage')}}">Support</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mobile menu will hide on desktop and close here -->
                        <div class="row mt-3 d-none d-md-block">
                            <div class="col-12 mx-auto">
                                <nav class="navbar bg-success navbar-expand-lg navbar-light shadow" data-bs-theme="dark">
                                    <div class="container-fluid">
                                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                            <ul class="navbar-nav text-white sbc">
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="{{route('homePage')}}">Home</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Institute
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('institutePage')}}">About Us</a></li>
                                                        <li><a class="dropdown-item" href="{{route('principalSpeechPage')}}">Principal Speech</a></li>
                                                        <li><a class="dropdown-item" href="{{route('student')}}">Student List</a></li>
                                                        <li><a class="dropdown-item" href="{{route('exprincipalPage')}}">EX-Principals</a></li>
                                                        <li><a class="dropdown-item" href="{{route('teacherPage')}}">Lecturer Corner</a></li>
                                                        <li><a class="dropdown-item" href="{{route('staffPage')}}">Staff Panel</a></li>
                                                        <li><a class="dropdown-item" href="{{route('comitteePage')}}">Governing Body</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Academic
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('newSyllabus')}}">Syllabus</a></li>
                                                        <li><a class="dropdown-item" href="{{route('newClassSchedule')}}">Class Routine</a></li>
                                                        <li><a class="dropdown-item" href="{{route('newExamSchedule')}}">Exam Routine</a></li>
                                                        <li><a class="dropdown-item" href="{{route('newSemister')}}">Semister Plans</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Result Archive
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('internalResult')}}">Internal Result</a></li>
                                                        <li><a class="dropdown-item" href="{{route('individualResult')}}">Individual Result</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Job Placement
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('placementCellView')}}">Placement Cell</a></li>
                                                        <li><a class="dropdown-item" href="{{route('jobNeedyStudentView')}}">Job Needy Student</a></li>
                                                        <li><a class="dropdown-item" href="https://bdjobs.com/">Job Circular</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Gallery
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('imagePage')}}">Photo Gallery</a></li>
                                                        <li><a class="dropdown-item" href="{{route('videoPage')}}">Video Gallery</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('supportPage')}}">Support</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('sliderninfo')
        <div class="container-fluid">
            <div class="row">
                @yield('frontcontent')
            </div>
        </div>
        <footer class="mt-5 container-fluid">
             @if(!empty($config))
            <div class="row g-0">
                <div class="col-12 col-md-3 mx-auto">
                    <h3>Contact Details</h3>
                    <p><i class="fa-solid fa-link"></i> {{  url('/') }}</p>
                    <p><i class="fa-solid fa-phone-office"></i>@if(!empty($config->officeMobile)) {{$config->officeMobile}} @else 01836994770 @endif</p>
                    <p><i class="fa-solid fa-buildings"></i> @if(!empty($config->address)) {{$config->address}} @else North Shampur, Burichong, Cumilla. @endif</p>
                    <p><i class="fa-solid fa-envelopes"></i> <a class="text-muted" style="text-decoration:none" href="mailto:@if(!empty($config->officeEmail)) {{ $config->officeEmail }} @else cultivation@virtualitprofessional.com @endif">@if(!empty($config)) {{$config->officeEmail}} @else cultivation@virtualitprofessional.com @endif</a></p>
                    <p>
                        <i class="fa-brands fa-square-facebook"></i> <a class="text-muted" style="text-decoration:none" target="_blank" href="{{ $config->facebookPage }}">@if(!empty($config->facebookPage)){{$config->facebookPage}} @else <a class="text-muted" style="text-decoration:none" href="https://www.facebook.com/profile.php?id=61572769304729">Cultivation-The Education Manager</a> @endif</a>
                    </p>
                </div>
                <div class="col-12 col-md-3 mx-auto">
                    <h3>Visitor Counter</h3>
                    @include('visitorCounter')
                </div>
                <div class="col-12 col-md-4 mx-auto">
                    <h3>Google Map</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=@if($config->mapEmbed){{$config->mapEmbed }} @else!1m18!1m12!1m3!1d3658.720943010397!2d91.14681007428437!3d23.50655879809593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754796e7c90d6e3%3A0x210c98d19ee0bc9c!2z4Ka44KeH4Ka-4Kao4Ka-4KawIOCmrOCmvuCmguCmsuCmviDgppXgprLgp4fgppw!5e0!3m2!1sen!2suk!4v1695524774546!5m2!1sen!2suk @endif"
                        width="100%"
                        height="300"
                        class="rounded"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
                <div class="col-12 mt-2">
                    <img class="w-100" src="{{ asset('/public/') }}/img/footer_top_bg.png" alt="" />
                </div>
            </div>
            <div class="p-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <p><span class="fw-bold text-center text-md-start">Planning and Implementation:</span> Principal   ({{$config->institueName}})</p>
                    </div>
                    <div class="col-md-6 col-12 text-center text-md-end">
                        <p><span class="fw-bold">Powered By:</span> Cultivation(Version 0.0.5) by Virtual IT Professional</p>
                    </div>
                    <div class="col-12 text-center">
                        <p class="fw-bold">Copyright &copy; 2000-@php echo date('Y'); @endphp | All Rights Reserved {{$config->institueName}} </p>
                    </div>
                </div>
            </div>
            @else
            <div class="row g-0">
                <div class="col-12 col-md-5 mx-auto">
                    <h3>Contact Details</h3>
                    <p><i class="fa-solid fa-link"></i> www.jahanaraayubacademy.edu.bd</p>
                    <p><i class="fa-solid fa-phone-office"></i> 0123 4567 890</p>
                    <p><i class="fa-solid fa-envelopes"></i> ja@gmail.com</p>
                    <p><i class="fa-brands fa-square-whatsapp"></i> 0123 4567 890</p>
                    <p><i class="fa-brands fa-square-facebook"></i> Jahanara Ayub Academy</p>
                    <p><i class="fa-solid fa-buildings"></i> Northshampur, Pirjatrapur, Burichong, Cumilla</p>
                </div>
                <div class="col-12 col-md-5 mx-auto">
                    <h3>Google Map</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.720943010397!2d91.14681007428437!3d23.50655879809593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754796e7c90d6e3%3A0x210c98d19ee0bc9c!2z4Ka44KeH4Ka-4Kao4Ka-4KawIOCmrOCmvuCmguCmsuCmviDgppXgprLgp4fgppw!5e0!3m2!1sen!2suk!4v1695524774546!5m2!1sen!2suk"
                        width="100%"
                        height="300"
                        class="rounded"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
                <div class="col-12 mt-2">
                    <img class="w-100" src="{{ asset('/public/') }}/img/footer_top_bg.png" alt="" />
                </div>
            </div>
            <div class="p-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <p><span class="fw-bold">Planning and Implementation:</span> Principal(SBC)</p>
                    </div>
                    <div class="col-md-6 col-12 text-end">
                        <p><span class="fw-bold">Powered By:</span> Cultivation(Version 0.0.5) by Virtual IT Professional</p>
                    </div>
                    <div class="col-12 text-center">
                        <p class="fw-bold">Copyright &copy; 2000-@php echo date('Y'); @endphp | All Rights Reserved SBC Cumilla</p>
                    </div>
                </div>
            </div>
            @endif
        </footer>
    
    <!-- jquery-->
    <script>
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            });
        });
    </script>
        <script src="{{ asset('/public/') }}/assets/js/jquery-1.9.1.min.js"></script>
        <script src="{{ asset('/public/') }}/owl-carousel/owl.carousel.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="{{asset('/public/')}}/lightbox/js/bootstrap.min.js"></script>

        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <!--Fancybox-->
        <script src="{{ asset('/') }}public/lightbox/fancybox/jquery.fancybox.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#myTable").DataTable({
                    order: [[0, "asc"]],
                });
                $("#owl-demo").owlCarousel({
                    autoPlay: 3000,
                    items: 4,
                    itemsDesktop: [1199, 3],
                    itemsDesktopSmall: [979, 3],
                });
            });
        </script>
    </body>
</html>
