    @php
        $config = \App\Models\ServerConfig::first();
        $principalAvatar = !empty($config?->avatar)
            ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->avatar))
            : env('APP_URL').'/public/avatar.png';
    @endphp
    <div class="card sidebar-card mb-3">
        <div class="card-header bg-success text-white h6"><i class="fa-regular fa-user-graduate me-1"></i> Principal/Head Master</div>
        <div class="card-body text-center">
            <img class="avatar-circle mb-2" src="{{ $principalAvatar }}" alt="Principal Photo">
            <div class="fw-bold">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</div>
            <div class="text-muted small mb-2">{{ $config->principalDesignation ?? 'Principal' }}</div>
            <a class="btn btn-success btn-sm" href="{{ route('principalSpeechPage') }}">Details</a>
        </div>
    </div>
    @if(!empty($config->eduMinName))
    <div class="card sidebar-card mb-3">
        <div class="card-header bg-success text-white h6"><i class="fa-regular fa-user-crown me-1"></i> Education Minister</div>
        <div class="card-body text-center">
            @php($eduImg = !empty($config->eduMinImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->eduMinImg)) : env('APP_URL').'/public/avatar.png')
            <img class="avatar-circle mb-2" src="{{ $eduImg }}" alt="Education Minister">
            <div class="fw-bold small">{{ $config->eduMinName }}</div>
        </div>
    </div>
    @endif
    @if(!empty($config->boardChairmanName))
    <div class="card sidebar-card mb-3">
        <div class="card-header bg-success text-white h6"><i class="fa-regular fa-user-tie me-1"></i> Board Chairman</div>
        <div class="card-body text-center">
            @php($bcImg = !empty($config->boardChairmanImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->boardChairmanImg)) : env('APP_URL').'/public/avatar.png')
            <img class="avatar-circle mb-2" src="{{ $bcImg }}" alt="Board Chairman">
            <div class="fw-bold small">{{ $config->boardChairmanName }}</div>
        </div>
    </div>
    @endif
    <div class="card sidebar-card mb-3 sidebar-links small">
        <div class="card-header bg-success text-white h6"><i class="fa-light fa-globe-pointer me-1"></i> Important Links</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> শিক্ষা মন্ত্রণালয়</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> ই-বুক</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> আই-বুক</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাউশি</a>
        </div>
    </div>
    <div class="card sidebar-card mb-3">
        <div class="card-header bg-success text-white h6"><i class="fa-solid fa-message-music me-1"></i> National Song</div>
        <div class="card-body pt-2 pb-3">
            <audio controls style="width: 100%;">
                <source src="{{ env('APP_URL') }}/public/music/bd_national_anthem.mp3" type="audio/mpeg" />
            </audio>
        </div>
    </div>
    <div class="card sidebar-card mb-3 sidebar-links small">
        <div class="card-header bg-success text-white h6"><i class="fa-brands fa-usps me-1"></i> Internal eService</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-envelopes-bulk"></i> Webmail</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-user"></i> Teacher Login</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-square-question"></i> Complain/Suggestion</a>
        </div>
    </div>
