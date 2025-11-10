    @php
        $config = \App\Models\ServerConfig::first();
        $principalAvatar = !empty($config?->avatar)
            ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->avatar))
            : env('APP_URL').'/public/avatar.png';
    @endphp
    <div class="sidebar-section principal-section mb-3">
        <div class="section-heading"><i class="fa-solid fa-user-graduate me-1"></i> <span>Principal / Head Master</span></div>
        <div class="principal-card text-center p-3">
            <img class="avatar-circle mb-2" src="{{ $principalAvatar }}" alt="Principal portrait">
            <h6 class="mb-0 fw-semibold">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</h6>
            <p class="text-muted small mb-2">{{ $config->principalDesignation ?? 'Principal' }}</p>
            <a class="btn btn-outline-success btn-sm px-3" href="{{ route('principalSpeechPage') }}">Profile & Speech</a>
        </div>
    </div>
    @if(!empty($config->eduMinName))
    <div class="sidebar-section mb-3">
        <div class="section-heading"><i class="fa-solid fa-user-tie me-1"></i> <span>Education Minister</span></div>
        <div class="text-center p-3">
            @php($eduImg = !empty($config->eduMinImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->eduMinImg)) : env('APP_URL').'/public/avatar.png')
            <img class="avatar-circle mb-2" src="{{ $eduImg }}" alt="Education Minister portrait">
            <p class="fw-semibold small mb-0">{{ $config->eduMinName }}</p>
        </div>
    </div>
    @endif
    @if(!empty($config->boardChairmanName))
    <div class="sidebar-section mb-3">
        <div class="section-heading"><i class="fa-solid fa-user-tie me-1"></i> <span>Board Chairman</span></div>
        <div class="text-center p-3">
            @php($bcImg = !empty($config->boardChairmanImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->boardChairmanImg)) : env('APP_URL').'/public/avatar.png')
            <img class="avatar-circle mb-2" src="{{ $bcImg }}" alt="Board Chairman portrait">
            <p class="fw-semibold small mb-0">{{ $config->boardChairmanName }}</p>
        </div>
    </div>
    @endif
    <div class="sidebar-section mb-3 sidebar-links small">
        <div class="section-heading"><i class="fa-solid fa-globe me-1"></i> <span>Important Links</span></div>
        <ul class="list-unstyled py-2 px-3 mb-0">
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> শিক্ষা মন্ত্রণালয়</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> ই-বুক</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> আই-বুক</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-angles-right"></i> মাউশি</a></li>
        </ul>
    </div>
    <div class="sidebar-section mb-3">
        <div class="section-heading"><i class="fa-solid fa-music me-1"></i> <span>National Song</span></div>
        <div class="px-3 py-2">
            <audio controls class="w-100 sidebar-audio">
                <source src="{{ env('APP_URL') }}/public/music/bd_national_anthem.mp3" type="audio/mpeg" />
            </audio>
        </div>
    </div>
    <div class="sidebar-section mb-3 sidebar-links small">
        <div class="section-heading"><i class="fa-solid fa-screwdriver-wrench me-1"></i> <span>Internal eService</span></div>
        <ul class="list-unstyled py-2 px-3 mb-0">
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-envelope"></i> Webmail</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-user"></i> Teacher Login</a></li>
            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-circle-question"></i> Complain/Suggestion</a></li>
        </ul>
    </div>
