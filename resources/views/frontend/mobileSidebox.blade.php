    @php
        $config = \App\Models\ServerConfig::first();
        $principalAvatar = !empty($config?->avatar)
            ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->avatar))
            : env('APP_URL').'/public/avatar.png';
    @endphp
    <div class="row mb-3">
        <div class="col-10 mx-auto">
            <div class="card sidebar-card mb-3">
                <div class="card-header bg-success text-white h6"><i class="fa-solid fa-user-graduate me-1"></i> Principal</div>
                <div class="card-body text-center py-3">
                    <img class="avatar-circle mb-2" src="{{ $principalAvatar }}" alt="Principal Photo">
                    <div class="fw-bold" style="font-size:12px">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</div>
                    <div class="text-muted" style="font-size:11px">{{ $config->principalDesignation ?? 'Principal' }}</div>
                    <a class="btn btn-success btn-sm mt-2" href="{{ route('principalSpeechPage') }}">Details</a>
                </div>
            </div>
        </div>
        @if(!empty($config->eduMinName))
        <div class="col-6 mx-auto">
            <div class="card sidebar-card my-3">
                <div class="card-header bg-success text-white h6"><i class="fa-solid fa-user-tie me-1"></i> Education Minister</div>
                <div class="card-body text-center py-3">
                    @php($eduImg = !empty($config->eduMinImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->eduMinImg)) : env('APP_URL').'/public/avatar.png')
                    <img class="avatar-circle mb-2" src="{{ $eduImg }}" alt="Education Minister">
                    <div class="fw-bold" style="font-size:11px">{{$config->eduMinName}}</div>
                </div>
            </div>
        </div>
        @endif
        @if(!empty($config->boardChairmanName))
        <div class="col-6 mx-auto"> 
            <div class="card sidebar-card my-3">
                <div class="card-header bg-success text-white h6"><i class="fa-solid fa-user-tie me-1"></i> Board Chairman</div>
                <div class="card-body text-center py-3">
                    @php($bcImg = !empty($config->boardChairmanImg) ? env('APP_URL').'/public/upload/image/cultivation/'.rawurlencode(basename($config->boardChairmanImg)) : env('APP_URL').'/public/avatar.png')
                    <img class="avatar-circle mb-2" src="{{ $bcImg }}" alt="Board Chairman">
                    <div class="fw-bold" style="font-size:11px">{{$config->boardChairmanName}}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
