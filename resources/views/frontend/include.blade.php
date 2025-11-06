<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @php
        $config =App\Models\ServerConfig::first();
        @endphp
        <title>
        @if(!empty($config->instituteName))
        {{$config->instituteName}} | @yield('fronttitle')
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
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@300;400;500;700;900&family=Skranji&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
        <!--Fancy box-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/lightbox/fancybox/jquery.fancybox.min.css" />

        <link href="{{asset('/public/')}}/lightbox/css/animate.min.css" rel="stylesheet" />

        <style>
            /* Professional Typography */
            * {
                font-family: 'Roboto', sans-serif;
            }

            
            
            /* Header Top Section Styles */
            .header-top {
                background: linear-gradient(135deg, #1e7e34 0%, #155724 50%, #0d4016 100%);
                color: white;
                padding: 30px 0;
                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                position: relative;
                overflow: hidden;
            }
            
            .header-top::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.1) 0%, transparent 50%);
                pointer-events: none;
            }
            
            .header-logo {
                display: flex;
                align-items: center;
                justify-content: center;
                padding-right: 25px;
                position: relative;
                z-index: 2;
            }
            
            .header-logo img {
                max-width: 140px;
                height: auto;
                background: rgba(255,255,255,0.15);
                border-radius: 20px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.3);
                border: 2px solid rgba(255,255,255,0.2);
                transition: transform 0.3s ease;
            }
            
            .header-logo img:hover {
                transform: scale(1.05);
            }

            .instituvte-info {
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
                position: relative;
                z-index: 2;
            }
            
            .institute-name {
                font-size: 3.2rem;
                font-weight: 900;
                margin: 0 0 12px 0;
                color: #fff;
                text-shadow: 3px 3px 8px rgba(0,0,0,0.5);
                line-height: 1.1;
                letter-spacing: -1px;
                font-family: 'Roboto', sans-serif;
            }
            
            .institute-location {
                font-size: 1.3rem;
                color: #e8f5e8;
                margin-bottom: 12px;
                font-weight: 500;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }
            
            .institute-mobile {
                font-size: 1.1rem;
                color: #e8f5e8;
                margin-bottom: 0;
                font-weight: 500;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 25px;
                flex-wrap: wrap;
            }
            
            .contact-item {
                display: flex;
                align-items: center;
                gap: 8px;
            }
            
            .contact-icon {
                color: #ffc107;
                font-size: 1.1rem;
                width: 20px;
                text-align: center;
            }

            /* Center the entire header content */
            .header-content {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 40px;
                max-width: 1200px;
                margin: 0 auto;
            }

            /* Professional Navbar Styles */
            .menubar {
                background: #f8f9fa;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                position: sticky;
                top: 0;
                z-index: 1000;
            }
            
            .navbar-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 15px;
            }
            
            /* Fix navbar centering and layout */
            .navbar {
                padding: 0 !important;
            }
            
            .navbar-nav {
                width: 100% !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                gap: 0 !important;
                margin: 0 !important;
            }
            
            .nav-item {
                margin: 0 5px;
            }
            
            .nav-link {
                font-size: 1rem !important;
                font-weight: 600 !important;
                color: #fff !important;
                padding: 15px 18px !important;
                border-radius: 8px !important;
                transition: all 0.3s ease !important;
                text-transform: uppercase !important;
                letter-spacing: 0.5px !important;
                white-space: nowrap !important;
                display: flex !important;
                align-items: center !important;
            }
            
            .nav-link:hover,
            .nav-link:focus {
                background: rgba(255,255,255,0.2) !important;
                color: #fff !important;
                transform: translateY(-2px) !important;
            }
            
            .dropdown-menu {
                background: #198754 !important;
                border: none !important;
                border-radius: 10px !important;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important;
                margin-top: 5px !important;
                min-width: 220px !important;
            }
            
            .dropdown-item {
                color: #fff !important;
                font-weight: 500 !important;
                padding: 12px 20px !important;
                transition: all 0.3s ease !important;
                font-size: 0.95rem !important;
            }
            
            .dropdown-item:hover,
            .dropdown-item:focus {
                background: rgba(255,255,255,0.2) !important;
                color: #fff !important;
            }

            

            /* Professional Carousel Styles */
            .carousel {
                box-shadow: 0 5px 20px rgba(0,0,0,0.2);
                border-radius: 0 0 15px 15px;
                overflow: hidden;
            }
            
            .carousel-item img {
                height: 500px !important;
                object-fit: cover;
                width: 100%;
                filter: brightness(0.9);
            }
            
            .carousel-caption {
                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                bottom: 0;
                left: 0;
                right: 0;
                padding: 40px 20px 20px;
            }
            
            .carousel-control-prev,
            .carousel-control-next {
                width: 5%;
            }
            
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-size: 100%;
                border-radius: 50%;
                background-color: rgba(0,0,0,0.5);
                padding: 20px;
            }
            
            .carousel-indicators {
                bottom: 20px;
            }
            
            .carousel-indicators [data-bs-target] {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                margin: 0 5px;
            }

            /* Mobile Responsive */
            @media (max-width: 768px) {
                .header-top {
                    padding: 25px 0;
                }
                
                .header-content {
                    flex-direction: column;
                    gap: 25px;
                }
                
                .header-logo {
                    padding-right: 0;
                }
                
                .header-logo img {
                    max-width: 120px;
                }
                
                .institute-name {
                    font-size: 2rem;
                }
                
                .institute-location {
                    font-size: 1.1rem;
                }
                
                .institute-mobile {
                    flex-direction: column;
                    gap: 15px;
                    font-size: 1rem;
                }
                
                .nav-link {
                    font-size: 0.9rem !important;
                    padding: 12px 15px !important;
                }
                
                .carousel-item img {
                    height: 250px !important;
                }
                
                .carousel-caption {
                    padding: 20px 15px 15px;
                }
            }
            
            @media (max-width: 576px) {
                .institute-name {
                    font-size: 1.3rem;
                }
                
                .institute-location,
                .institute-mobile {
                    font-size: 0.95rem;
                }
                
                .header-content {
                    gap: 20px;
                }
                
                .carousel-item img {
                    height: 200px !important;
                }
            }
            
            /* Tablet Responsive */
            @media (min-width: 769px) and (max-width: 992px) {
                .carousel-item img {
                    height: 400px !important;
                }
                
                .institute-name {
                    font-size: 2.5rem;
                }
            }

            /* Professional Footer */
            footer {
                background: linear-gradient(135deg, #212529 0%, #343a40 100%);
                color: #fff;
                padding: 40px 0 20px;
                margin-top: 50px !important;
            }
            
            footer h3 {
                color: #ffc107;
                font-weight: 700;
                margin-bottom: 20px;
            }
            
            footer p {
                color: #adb5bd;
                line-height: 1.6;
            }
            
            footer .text-muted {
                color: #adb5bd !important;
            }

            /* Professional Animation */
            .header-top {
                animation: fadeInDown 0.8s ease-out;
            }
            
            .menubar {
                animation: fadeInUp 0.8s ease-out 0.2s both;
            }
            
            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Additional Professional Touches */
            .call-box {
                color: #fff;
                display: flex; 
                align-items: center; 
                gap: 15px;
                font-family: 'Roboto', sans-serif;
                background: rgba(255,255,255,0.1);
                padding: 15px;
                border-radius: 10px;
                margin-bottom: 10px;
            }
            
            .call-icon {
                display: inline-flex; 
                align-items: center; 
                justify-content: center;
                font-size: 1.8rem;
                color: #ffc107;
            }
            
            .call-text { 
                font-size: 0.9rem; 
                line-height: 1.4; 
            }
            
            .call-label {
                font-size: 0.7rem; 
                letter-spacing: 0.05em;
                text-transform: uppercase;
                font-weight: 700;
            }
            
            .call-phone {
                font-weight: 700; 
                color: #fff; 
                text-decoration: none;
            }
            
            .call-phone:hover { 
                text-decoration: underline; 
                color: #ffc107;
            }


            /* Mobile Menu Fixes */
            /* Fix offcanvas full height */
.offcanvas {
    height: 100vh !important;
    max-height: 100vh !important;
}

.offcanvas-start {
    background-color: #198754 !important;
    border: none !important;
    box-shadow: 0 0 20px rgba(0,0,0,0.5) !important;
    width: 75% !important;
    max-width: 320px !important;
}

.offcanvas-header {
    background-color: #155724 !important;
    border-bottom: 1px solid rgba(255,255,255,0.2) !important;
    padding: 1rem 1.5rem !important;
    min-height: 70px !important;
}

.offcanvas-body {
    background-color: #198754 !important;
    padding: 1.5rem !important;
    overflow-y: auto !important;
    flex: 1 1 auto !important;
}

/* Fix for mobile viewport */
.offcanvas-backdrop {
    background-color: rgba(0,0,0,0.5) !important;
}

/* Ensure proper positioning */
.offcanvas.show {
    transform: none !important;
}

/* Fix nav brand text wrapping */
.navbar-brand {
    font-size: 0.9rem !important;
    white-space: nowrap !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    max-width: 200px !important;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .offcanvas-start {
        width: 85% !important;
    }
    
    .navbar-brand {
        font-size: 0.8rem !important;
        max-width: 150px !important;
    }
}
            /* Mobile menu button */
            .btn-success {
                background-color: rgba(255,255,255,0.1) !important;
                border: 1px solid rgba(255,255,255,0.3) !important;
                color: #fff !important;
            }

            .btn-success:hover,
            .btn-success:focus {
                background-color: rgba(255,255,255,0.2) !important;
                border-color: rgba(255,255,255,0.5) !important;
                color: #fff !important;
            }
        </style>
    </head>
    <body>
        <!-- Header Top Section -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-content">
                            <!-- Logo on the left -->
                            <div class="header-logo">
                                @if(!empty($config->logo))
                                    <img src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{$config->logo}}" alt="Logo" />
                                @else
                                    <img src="{{ asset('/public/') }}/logo.png" alt="Jahanara Ayub Academic" />
                                @endif
                            </div>
                            
                            <!-- Institute Information beside logo -->
                            <div class="institute-info">
                                <!-- Institute Name (Highlighted) -->
                                <h1 class="institute-name">
                                    @if(!empty($config->instituteName))
                                        {{ $config->instituteName }}
                                    @else
                                        Jahanara Ayub Academy
                                    @endif
                                </h1>
                                
                                <!-- Location under institute name -->
                                <div class="institute-location">
                                    <i class="fa-solid fa-location-dot contact-icon"></i>
                                    <span>
                                        @if(!empty($config->address))
                                            {{ $config->address }}
                                        @else
                                            North Shampur, Burichong, Cumilla
                                        @endif
                                    </span>
                                </div>
                                
                                <!-- Mobile and Email in same line -->
                                <div class="institute-mobile">
                                    <div class="contact-item">
                                        <i class="fa-solid fa-phone contact-icon"></i>
                                        <span>
                                            @if(!empty($config->officeMobile))
                                                {{ $config->officeMobile }}
                                            @else
                                                +(012) 345 6789
                                            @endif
                                        </span>
                                    </div>
                                    <div class="contact-item">
                                        <i class="fa-solid fa-envelope contact-icon"></i>
                                        <span>
                                            @if(!empty($config->officeEmail))
                                                {{ $config->officeEmail }}
                                            @else
                                                ja@gmail.com
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Professional Navbar -->
        <div class="menubar bg-success">
            <div class="navbar-container">
                <!-- Mobile Menu -->
                <div class="d-block d-md-none">
                    <nav class="navbar bg-success navbar-expand-lg" data-bs-theme="dark">
                        <div class="container-fluid">
                            <button class="btn btn-success me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <span class="navbar-brand text-white mb-0 h1 text-truncate">
                                 @if(!empty($config->logo))
                                    <img class="img-fluid" style="max-width: 50px;" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{$config->logo}}" alt="Logo" />
                                @else
                                    <img class="img-fluid" style="max-width: 50px;" src="{{ asset('/public/') }}/logo.png" alt="Jahanara Ayub Academic" />
                                @endif
                            </span>
                        </div>
                    </nav>
                </div>

                <!-- Offcanvas Side Menu -->
                <div class="offcanvas offcanvas-start bg-success" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-white" id="mobileMenuLabel">Navigation Menu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="text-center mb-4">
                            @if(!empty($config->logo))
                                <img class="img-fluid" style="max-width: 80px;" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{$config->logo}}" alt="Logo" />
                            @else
                                <img class="img-fluid" style="max-width: 80px;" src="{{ asset('/public/') }}/logo.png" alt="Jahanara Ayub Academic" />
                            @endif
                        </div>
                        
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('homePage')}}">
                                    <i class="fa-solid fa-home me-2"></i>Home
                                </a>
                            </li>
                            <!-- Institute submenu -->
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#mobileInstituteMenu" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-building me-2"></i>Institute 
                                    <i class="fa fa-chevron-down ms-auto"></i>
                                </a>
                                <div class="collapse" id="mobileInstituteMenu">
                                    <ul class="list-unstyled ps-4">
                                        <li><a class="nav-link py-2" href="{{route('institutePage')}}">About Us</a></li>
                                        <li><a class="nav-link py-2" href="{{route('principalSpeechPage')}}">Principal Speech</a></li>
                                        <li><a class="nav-link py-2" href="{{route('student')}}">Student List</a></li>
                                        <li><a class="nav-link py-2" href="{{route('exprincipalPage')}}">EX-Principals</a></li>
                                        <li><a class="nav-link py-2" href="{{route('teacherPage')}}">Lecturer Corner</a></li>
                                        <li><a class="nav-link py-2" href="{{route('staffPage')}}">Staff Panel</a></li>
                                        <li><a class="nav-link py-2" href="{{route('comitteePage')}}">Governing Body</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Add other menu items similarly... -->
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#mobileAcademicMenu" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-graduation-cap me-2"></i>Academic 
                                    <i class="fa fa-chevron-down ms-auto"></i>
                                </a>
                                <div class="collapse" id="mobileAcademicMenu">
                                    <ul class="list-unstyled ps-4">
                                        <li><a class="nav-link py-2" href="{{route('newSyllabus')}}">Syllabus</a></li>
                                        <li><a class="nav-link py-2" href="{{route('newClassSchedule')}}">Class Routine</a></li>
                                        <li><a class="nav-link py-2" href="{{route('newExamSchedule')}}">Exam Routine</a></li>
                                        <li><a class="nav-link py-2" href="{{route('newSemister')}}">Semister Plans</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#mobileResultArchiveMenu" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-chart-line me-2"></i>Result Archive 
                                    <i class="fa fa-chevron-down ms-auto"></i>
                                </a>
                                <div class="collapse" id="mobileResultArchiveMenu">
                                    <ul class="list-unstyled ps-4">
                                        <li><a class="nav-link py-2" href="{{route('internalResult')}}">Internal Result</a></li>
                                        <li><a class="nav-link py-2" href="#">Individual Result</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#mobileJobPlacementMenu" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-briefcase me-2"></i>Job Placement
                                    <i class="fa fa-chevron-down ms-auto"></i>
                                </a>
                                <div class="collapse" id="mobileJobPlacementMenu">
                                    <ul class="list-unstyled ps-4">
                                        <li><a class="nav-link py-2" href="{{route('placementCellView')}}">Placement Cell</a></li>
                                        <li><a class="nav-link py-2" href="{{route('jobNeedyStudentView')}}">Job Needy Students</a></li>
                                        <li><a class="nav-link py-2" target="_blank" href="https://www.bdjobs.com">Job Circulars</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#mobileGalleryMenu" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-images me-2"></i>Gallery
                                    <i class="fa fa-chevron-down ms-auto"></i>
                                </a>
                                <div class="collapse" id="mobileGalleryMenu">
                                    <ul class="list-unstyled ps-4">
                                        <li><a class="nav-link py-2" href="{{route('imagePage')}}">Photo Gallery</a></li>
                                        <li><a class="nav-link py-2" href="{{route('videoPage')}}">Video Gallery</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('supportPage')}}">
                                    <i class="fa-solid fa-headset me-2"></i> Support
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Desktop Menu -->
                <div class="d-none d-md-block">
                    <nav class="navbar bg-success navbar-expand-lg" data-bs-theme="dark">
                        <div class="container-fluid">
                            <div class="navbar-collapse">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('homePage')}}">
                                            <i class="fa-solid fa-home me-2"></i>Home
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-building me-2"></i>Institute
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
                                            <i class="fa-solid fa-graduation-cap me-2"></i>Academic
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
                                            <i class="fa-solid fa-chart-line me-2"></i>Result Archive
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('internalResult')}}">Internal Result</a></li>
                                            <li><a class="dropdown-item" href="#">Individual Result</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-briefcase me-2"></i>Job Placement
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('placementCellView')}}">Placement Cell</a></li>
                                            <li><a class="dropdown-item" href="{{route('jobNeedyStudentView')}}">Job Needy Student</a></li>
                                            <li><a class="dropdown-item" href="https://bdjobs.com/" target="_blank">Job Circular</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-images me-2"></i>Gallery
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('imagePage')}}">Photo Gallery</a></li>
                                            <li><a class="dropdown-item" href="{{route('videoPage')}}">Video Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('supportPage')}}">
                                            <i class="fa-solid fa-headset me-2"></i>Support
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
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
                        <p><span class="fw-bold text-center text-md-start">Planning and Implementation:</span> Principal   ({{$config->instituteName}})</p>
                    </div>
                    <div class="col-md-6 col-12 text-center text-md-end">
                        <p><span class="fw-bold">Powered By:</span> Cultivation(Version 0.0.5) by Virtual IT Professional</p>
                    </div>
                    <div class="col-12 text-center">
                        <p class="fw-bold">Copyright &copy; 2000-@php echo date('Y'); @endphp | All Rights Reserved {{$config->instituteName}} </p>
                    </div>
                </div>
            </div>
            @else
            <div class="row g-0">
                <div class="col-12 col-md-3 mx-auto">
                    <h3>Contact Details</h3>
                    <p><i class="fa-solid fa-link"></i> www.jahanaraayubacademy.edu.bd</p>
                    <p><i class="fa-solid fa-phone-office"></i> 0123 4567 890</p>
                    <p><i class="fa-solid fa-envelopes"></i> ja@gmail.com</p>
                    <p><i class="fa-brands fa-square-whatsapp"></i> 0123 4567 890</p>
                    <p><i class="fa-brands fa-square-facebook"></i> Jahanara Ayub Academy</p>
                    <p><i class="fa-solid fa-buildings"></i> Northshampur, Pirjatrapur, Burichong, Cumilla</p>
                </div>
                <div class="col-12 col-md-3 mx-auto">
                    <h3>Visitor Counter</h3>
                    @include('visitorCounter')
                </div>
                <div class="col-12 col-md-4 mx-auto">
                    <h3>Google Map</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=@if($config){{ $config->mapEmbed }}@else!1m18!1m12!1m3!1d3658.720943010397!2d91.14681007428437!3d23.50655879809593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754796e7c90d6e3%3A0x210c98d19ee0bc9c!2z4Ka44KeH4Ka-4Kao4Ka-4KawIOCmrOCmvuCmguCmsuCmviDgppXgprLgp4fgppw!5e0!3m2!1sen!2suk!4v1695524774546!5m2!1sen!2suk @endif"
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
    
        <script src="{{ asset('/public/') }}/assets/js/jquery-1.9.1.min.js"></script>   
    
        <script src="{{ asset('/public/') }}/owl-carousel/owl.carousel.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="{{asset('/public/')}}/lightbox/js/bootstrap.min.js"></script>

        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <!--Fancybox-->
        <script src="{{ asset('/') }}public/lightbox/fancybox/jquery.fancybox.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                    $(".alert").slideUp(500);
                });
            });
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