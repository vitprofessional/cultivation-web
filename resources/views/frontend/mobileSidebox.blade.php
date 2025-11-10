    @php
        $config = \App\Models\ServerConfig::first();
        $principalAvatar = !empty($config?->avatar)
            ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->avatar))
            : env('APP_URL').'/public/avatar.png';
    @endphp
    <div class="row mb-3 sidebar-stack-mobile">
        <div class="col-10 mx-auto">
            <div class="principal-standalone mb-3">
                <div class="plain-heading"><i class="fa-solid fa-user-graduate me-1"></i> <span>Principal</span></div>
                <div class="text-center">
                    <img class="principal-photo w-100 rounded shadow-sm" src="{{ $principalAvatar }}" alt="Principal portrait" loading="lazy">
                    <div class="principal-caption mt-2">
                        <div class="fw-semibold" style="font-size:12px">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</div>
                        <div class="text-muted small" style="font-size:11px">{{ $config->principalDesignation ?? 'Principal' }}</div>
                        <a class="btn btn-outline-success btn-sm mt-2 px-3" href="{{ route('principalSpeechPage') }}">Profile & Speech</a>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($config->eduMinName))
        <div class="col-10 mx-auto">
            <div class="sidebar-section sidebar-resource-box mb-3">
                <div class="section-heading"><i class="fa-solid fa-toolbox me-1"></i> <span>Resources</span></div>
                <div class="px-3 py-2 small">
                    <div class="resource-sub mb-3 sidebar-links">
                        <div class="subheading"><i class="fa-solid fa-globe me-1"></i> Important Links</div>
                        <ul class="list-unstyled mb-0 sidebar-list link-list">
                            <li><a href="#" class="sidebar-link"> গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</a></li>
                            <li><a href="#" class="sidebar-link"> শিক্ষা মন্ত্রণালয়</a></li>
                            <li><a href="#" class="sidebar-link"> মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</a></li>
                            <li><a href="#" class="sidebar-link"> মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড</a></li>
                            <li><a href="#" class="sidebar-link"> মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ</a></li>
                            <li><a href="#" class="sidebar-link"> ই-বুক</a></li>
                            <li><a href="#" class="sidebar-link"> আই-বুক</a></li>
                            <li><a href="#" class="sidebar-link"> মাউশি</a></li>
                        </ul>
                    </div>
                    <div class="resource-sub mb-3">
                        <div class="subheading"><i class="fa-solid fa-music me-1"></i> National Song</div>
                        <audio controls class="w-100 sidebar-audio">
                            <source src="{{ env('APP_URL') }}/public/music/bd_national_anthem.mp3" type="audio/mpeg" />
                        </audio>
                    </div>
                    <div class="resource-sub sidebar-links">
                        <div class="subheading"><i class="fa-solid fa-screwdriver-wrench me-1"></i> Internal eService</div>
                        <ul class="list-unstyled mb-0 sidebar-list">
                            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-envelope"></i> Webmail</a></li>
                            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-user"></i> Teacher Login</a></li>
                            <li><a href="#" class="sidebar-link"><i class="fa-solid fa-circle-question"></i> Complain/Suggestion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(!empty($config->boardChairmanName))
        @endif
    </div>
