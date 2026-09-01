<?php
$file = file_get_contents('resources/views/frontend/index.blade.php');

// First, replace the speech-feature div and everything up to but not including the sidebar
$oldBlock = <<<'EOL'
    <div class="col-12 mx-auto mb-4 scale-on-scroll speech-feature p-0">
        <div class="feature-header">
            <h2 class="home-section-title mb-0 text-white">{{ $speechTitle }}</h2>
            <a href="{{ route('principalSpeechPage') }}" class="btn btn-outline-light btn-sm">Read More</a>
        </div>
        <div class="feature-body">
            <div class="speech-meta">
                <img class="speech-avatar" src="{{ $principalSpeechAvatar }}" alt="Principal portrait">
                <div>
                    <p class="speech-name">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</p>
                    <p class="speech-role">{{ $config->principalDesignation ?? 'Principal' }}</p>
                </div>
            </div>
            <div class="speech-quote">"{{ $principalSpeechLead }}"</div>
            <div class="speech-summary">{{ $principalSpeechExcerpt ?: 'A brief note from the head of institute and the direction we are building together.' }}</div>
        </div>
    </div>
</div>
<div class="col-lg-3 mx-auto d-none d-lg-block sidebar-column">
    @yield('sideinfo')
</div>

<div class="col-11 d-block d-lg-none mx-auto">
    @include('frontend.mobileSidebox')   
</div>

<div class="col-11 col-lg-9 mx-auto main-content-column">
    <div class="row align-items-start">

        <div class="row g-0 d-none d-md-block section-band info-cluster py-3">
            <div class="col-12 mx-auto my-4 row">
                <!-- info box start here -->
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Admission Info
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/forms.jpg" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Honors Admission</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> XI Class Admission</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Institute Info
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/institute.jpg" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('institutePage')}}"> About Us</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('teacherPage')}}"> Teacher Database</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('staffPage')}}"> Staff Database</a> </li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('principalSpeechPage')}}"> {{ $frontendSpeechNavLabel ?? "Principal's Message" }}</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('comitteePage')}}"> Managing Comittee</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Academic
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/academic.png" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> <a href=""> Semister Plan</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a  href="{{route('newSyllabus')}}"> Syllabus</a>
                                        </li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('newClassSchedule')}}"> Class Routine</a> </li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> <a href="{{route('newExamSchedule')}}"> Exam Routine</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Student Corner
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/studentCorner.png" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        
                                            <li class="list-group-item">
                                                <i class="fa-regular fa-arrow-turn-down-right"></i> 
                                                <a href="{{route('student')}}">
                                                    Student Database
                                                </a>
                                            </li>
                                                <li class="list-group-item">
                                                    <i class="fa-regular fa-arrow-turn-down-right"></i> 
                                                <a href="">
                                                    X-Student Archive
                                                </a>
                                                </li>
                                        
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('placementCellView')}}"> Placement Cell</a></li>
                                        
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> <a href="{{route('jobNeedyStudentView')}}">Job Seekers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
EOL;

$newBlock = <<<'EOL'
    <!-- Leadership Spotlight - Modern replacement for old Principal's Message -->
    <div class="col-12 mx-auto scale-on-scroll leadership-spotlight">
        <div class="leadership-grid">
            <div class="leadership-content">
                <h2>{{ $speechTitle }}</h2>
                <p class="leadership-title">{{ $config->principalDesignation ?? 'Principal' }}</p>
                <div class="leadership-quote">"{{ $principalSpeechLead }}"</div>
                <p class="leadership-text">{{ $principalSpeechExcerpt ?: 'Building excellence in education and nurturing future leaders.' }}</p>
                <a href="{{ route('principalSpeechPage') }}" class="leadership-link">Read Full Message →</a>
            </div>
            <div class="text-center">
                <img class="leadership-avatar" src="{{ $principalSpeechAvatar }}" alt="{{ $config->principalName ?? 'Principal' }}">
                <p class="mt-3 mb-0 fw-bold" style="color:#112958">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</p>
            </div>
        </div>
    </div>

    <!-- At a Glance Statistics -->
    @if($insData)
    <div class="col-12 mx-auto at-glance">
        <div class="at-glance-grid">
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData->establishDate ?? '2015' }}</div>
                <div class="at-glance-label">ESTABLISHED</div>
            </div>
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData->totalTeacher ?? '25+' }}</div>
                <div class="at-glance-label">FACULTY MEMBERS</div>
            </div>
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData->totalStudent ?? '1500+' }}</div>
                <div class="at-glance-label">STUDENTS</div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modern Academic & Student Services -->
    <div class="col-12 mx-auto">
        <div class="services-grid">
            <!-- Admission & Programs -->
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-book"></i></div>
                <h3>Admission & Programs</h3>
                <p>Explore our comprehensive academic programs designed to nurture excellence and innovation.</p>
                <div class="service-links">
                    <a href="#">Honors Admission</a>
                    <a href="#">XI Class Admission</a>
                </div>
            </div>

            <!-- About & Leadership -->
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-building"></i></div>
                <h3>About Institute</h3>
                <p>Discover our institution's mission, vision, and the leadership guiding our community.</p>
                <div class="service-links">
                    <a href="{{route('institutePage')}}">About Us</a>
                    <a href="{{route('comitteePage')}}">Managing Committee</a>
                </div>
            </div>

            <!-- Academics -->
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h3>Academic Resources</h3>
                <p>Access curriculum, routines, syllabi, and all resources to support your academic journey.</p>
                <div class="service-links">
                    <a href="{{route('newSyllabus')}}">Syllabus</a>
                    <a href="{{route('newClassSchedule')}}">Class Routine</a>
                    <a href="{{route('newExamSchedule')}}">Exam Routine</a>
                </div>
            </div>

            <!-- Student Opportunities -->
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-people-group"></i></div>
                <h3>Student Opportunities</h3>
                <p>Engage with student databases, placement support, and career development programs.</p>
                <div class="service-links">
                    <a href="{{route('student')}}">Student Database</a>
                    <a href="{{route('placementCellView')}}">Placement Cell</a>
                    <a href="{{route('jobNeedyStudentView')}}">Job Seekers</a>
                </div>
            </div>
        </div>
    </div>
EOL;

$file = str_replace($oldBlock, $newBlock, $file);
file_put_contents('resources/views/frontend/index.blade.php', $file);
echo "File updated successfully!\n";
