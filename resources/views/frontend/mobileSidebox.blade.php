    @php
        $config = \App\Models\ServerConfig::first();
    @endphp
    <div class="row mb-3">
        <div class="col-10 mx-auto">
            <div class="list-group rounded-0 border border-success">
                <div class="p-2 bg-success"><i class="fa-regular fa-user-graduate"></i> Principal</div>
                <div class="text-center py-2">
                    @if($config)
                        @if(!empty($config->avatar)) 
                        <img class="w-75 rounded" alt="Principal" src="{{ env('APP_URL') }}/public/upload/image/cultivation/{{ $config->avatar }}" />
                        @else
                        <img class="w-75" alt="Principal" src="{{ env('APP_URL') }}/public/avatar.png" />
                        @endif
                        <p class="fw-bold my-2" style="font-size:10px">{{$config->principalName}}</p>
                        <p class="fw-bold mb-2" style="font-size:10px">{{$config->principalDesignation}}</p>
                        <a class="btn btn-success btn-sm" href="{{ route('principalSpeechPage') }}"> Details </a>
                    @else
                        <img class="w-75 img-thumbnail shadow" alt="Principal" src="{{ env('APP_URL') }}/public/avatar.png" />
                        <p class="fw-bold my-2">Engr. Abu Yousuf</p>
                        <p class="fw-bold">Principal</p>
                        <a class="btn btn-success btn-sm mb-4" href="#"> Details </a>
                    @endif
                </div>
            </div>
        </div>
        @if(!empty($config->eduMinName))
        <div class="col-6 mx-auto">
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
        </div>
        @endif
        @if(!empty($config->boardChairmanName))
        <div class="col-6 mx-auto"> 
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
        </div>
        @endif
    </div>
