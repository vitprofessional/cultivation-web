    @php
        $config = \App\Models\ServerConfig::first();
        $principalAvatar = !empty($config?->avatar)
            ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->avatar))
            : env('APP_URL').'/public/avatar.png';
    @endphp
    <div class="row mb-3 sidebar-stack-mobile">
        <div class="col-10 mx-auto">
            <div class="sidebar-section principal-section mb-3">
                <div class="section-heading"><i class="fa-solid fa-user-graduate me-1"></i> <span>Principal</span></div>
                <div class="principal-card text-center p-3">
                    <img class="avatar-circle mb-2" src="{{ $principalAvatar }}" alt="Principal portrait">
                    <h6 class="mb-0 fw-semibold" style="font-size:12px">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</h6>
                    <p class="text-muted mb-2" style="font-size:11px">{{ $config->principalDesignation ?? 'Principal' }}</p>
                    <a class="btn btn-outline-success btn-sm px-3" href="{{ route('principalSpeechPage') }}">Profile</a>
                </div>
            </div>
        </div>
        @if(!empty($config->eduMinName))
        <div class="col-6 mx-auto">
            <div class="sidebar-section mb-3">
                <div class="section-heading small"><i class="fa-solid fa-user-tie me-1"></i> <span>Education Minister</span></div>
                <div class="text-center p-2">
                    @php($eduImg = !empty($config->eduMinImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->eduMinImg)) : env('APP_URL').'/public/avatar.png')
                    <img class="avatar-circle mb-1" src="{{ $eduImg }}" alt="Education Minister portrait">
                    <p class="fw-semibold small mb-0" style="font-size:10px">{{$config->eduMinName}}</p>
                </div>
            </div>
        </div>
        @endif
        @if(!empty($config->boardChairmanName))
        <div class="col-6 mx-auto"> 
            <div class="sidebar-section mb-3">
                <div class="section-heading small"><i class="fa-solid fa-user-tie me-1"></i> <span>Board Chairman</span></div>
                <div class="text-center p-2">
                    @php($bcImg = !empty($config->boardChairmanImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->boardChairmanImg)) : env('APP_URL').'/public/avatar.png')
                    <img class="avatar-circle mb-1" src="{{ $bcImg }}" alt="Board Chairman portrait">
                    <p class="fw-semibold small mb-0" style="font-size:10px">{{$config->boardChairmanName}}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
