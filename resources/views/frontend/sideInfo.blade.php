    @php
        $config = \App\Models\ServerConfig::first();
    @endphp
    <div class="list-group rounded-0 border border-success">
        <div class="p-2 bg-success h5"><i class="fa-regular fa-user-graduate"></i> Principal/Head Master</div>
        <div class="p-2 text-center">
            @if($config)
                @if(!empty($config->avatar)) 
                <img class="w-75 rounded border border-secondary img-thumbnail shadow" height="350px" alt="Principal" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{ $config->avatar }}" />
                @else
                <img class="w-75" alt="Principal" src="{{ env('APP_URL') }}/public/avatar.png" />
                @endif
                <p class="fw-bold my-2">{{$config->principalName}}</p>
                <p class="fw-bold mb-2">{{$config->principalDesignation}}</p>
                <a class="btn btn-success btn-sm" href="{{ route('principalSpeechPage') }}"> Details </a>
            @else
                <img class="w-75 rounded border border-secondary img-thumbnail shadow" alt="Principal" src="{{ env('APP_URL') }}/public/avatar.png" />
                <p class="fw-bold my-2">Engr. Abu Yousuf</p>
                <p class="fw-bold">Principal</p>
                <a class="btn btn-success btn-sm mb-4" href="#"> Details </a>
            @endif
        </div>
    </div>
    @if(!empty($config->eduMinName))
    <div class="list-group rounded-0 border border-success my-3">
        <div class="p-2 bg-success h5"><i class="fa-regular fa-user-crown"></i> Education Minister</div>
        <div class="p-2 text-center">
            @if(!empty($config->eduMinImg)) 
            <img class="w-75 rounded" alt="Edu Minister" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{ $config->eduMinImg }}" />
            @else
            <img class="w-75" alt="Edu Minister" src="{{ env('APP_URL') }}/public/avatar.png" />
            @endif
            <p class="fw-bold my-2">{{$config->eduMinName}}</p>
        </div>
    </div>
    @endif
    @if(!empty($config->boardChairmanName))
    <div class="list-group rounded-0 border border-success my-3">
        <div class="p-2 bg-success h5"><i class="fa-regular fa-user-tie"></i> Board Chairman</div>
        <div class="p-2 text-center">
            @if(!empty($config->boardChairmanImg)) 
            <img class="w-75 rounded" alt="Board Chairman" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{ $config->boardChairmanImg }}" />
            @else
            <img class="w-75" alt="Board Chairman" src="{{ env('APP_URL') }}/public/avatar.png" />
            @endif
            <p class="fw-bold my-2">{{$config->boardChairmanName}}</p>
        </div>
    </div>
    @endif
    <div class="list-group rounded-0 my-4 small">
        <div class="bg-success p-2 h5 mb-0"><i class="fa-light fa-globe-pointer"></i> Important Link</div>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> শিক্ষা মন্ত্রণালয়</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> ই-বুক</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> আই-বুক</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-sharp fa-light fa-chevrons-right"></i> মাউশি</a>
    </div>
    <div class="list-group rounded-0 my-4">
        <div class="bg-success p-2 h5 mb-0"><i class="fa-solid fa-message-music"></i> National Song</div>
        <a href="#" class="list-group-item list-group-item-action">
            <audio controls="" style="width: 100%;" class="mt-3">
                <source src="{{ env('APP_URL') }}/public/music/bd_national_anthem.mp3" type="audio/mpeg" />
            </audio>
        </a>
    </div>
    <div class="list-group rounded-0 my-4 small">
        <div class="bg-success p-2 h5 mb-0"><i class="fa-brands fa-usps"></i> Internal eService</div>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-envelopes-bulk"></i> Webmail</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-user"></i> Teacher Login</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-square-question"></i> Complain/Suggestion</a>
    </div>
