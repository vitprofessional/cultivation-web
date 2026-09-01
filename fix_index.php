<?php
$file = file_get_contents('resources/views/frontend/index.blade.php');

// Use a regex pattern that's more flexible
// Find the speech-feature section and the old boxes
$pattern = '/    <div class="col-12 mx-auto mb-4 scale-on-scroll speech-feature p-0">.*?                <\/div>\n            <\/div>\n        <\/div>\n/s';

$replacement = '    <!-- Leadership Spotlight - Modern replacement for old Principal\'s Message -->
    <div class="col-12 mx-auto scale-on-scroll leadership-spotlight">
        <div class="leadership-grid">
            <div class="leadership-content">
                <h2>{{ $speechTitle }}</h2>
                <p class="leadership-title">{{ $config->principalDesignation ?? \'Principal\' }}</p>
                <div class="leadership-quote">"{{ $principalSpeechLead }}"</div>
                <p class="leadership-text">{{ $principalSpeechExcerpt ?: \'Building excellence in education and nurturing future leaders.\' }}</p>
                <a href="{{ route(\'principalSpeechPage\') }}" class="leadership-link">Read Full Message →</a>
            </div>
            <div class="text-center">
                <img class="leadership-avatar" src="{{ $principalSpeechAvatar }}" alt="{{ $config->principalName ?? \'Principal\' }}">
                <p class="mt-3 mb-0 fw-bold" style="color:#112958">{{ $config->principalName ?? \'Engr. Abu Yousuf\' }}</p>
            </div>
        </div>
    </div>

    <!-- At a Glance Statistics -->
    @if($insData)
    <div class="col-12 mx-auto at-glance">
        <div class="at-glance-grid">
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData->establishDate ?? \'2015\' }}</div>
                <div class="at-glance-label">ESTABLISHED</div>
            </div>
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData->totalTeacher ?? \'25+\' }}</div>
                <div class="at-glance-label">FACULTY MEMBERS</div>
            </div>
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData->totalStudent ?? \'1500+\' }}</div>
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
                <p>Discover our institution\'s mission, vision, and the leadership guiding our community.</p>
                <div class="service-links">
                    <a href="{{route(\'institutePage\')}}">About Us</a>
                    <a href="{{route(\'comitteePage\')}}">Managing Committee</a>
                </div>
            </div>

            <!-- Academics -->
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h3>Academic Resources</h3>
                <p>Access curriculum, routines, syllabi, and all resources to support your academic journey.</p>
                <div class="service-links">
                    <a href="{{route(\'newSyllabus\')}}">Syllabus</a>
                    <a href="{{route(\'newClassSchedule\')}}">Class Routine</a>
                    <a href="{{route(\'newExamSchedule\')}}">Exam Routine</a>
                </div>
            </div>

            <!-- Student Opportunities -->
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-people-group"></i></div>
                <h3>Student Opportunities</h3>
                <p>Engage with student databases, placement support, and career development programs.</p>
                <div class="service-links">
                    <a href="{{route(\'student\')}}">Student Database</a>
                    <a href="{{route(\'placementCellView\')}}">Placement Cell</a>
                    <a href="{{route(\'jobNeedyStudentView\')}}">Job Seekers</a>
                </div>
            </div>
        </div>
    </div>
';

$file = preg_replace($pattern, $replacement, $file);
file_put_contents('resources/views/frontend/index.blade.php', $file);
echo "Replaced section\n";
?>
