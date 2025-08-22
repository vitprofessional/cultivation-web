@extends('frontend.include')
@section('fronttitle')
Enter to learn & Leave to serve
@endsection

@if(!empty($Datakey)) 

@section('sliderninfo')
    @include('frontend.sliderinfo')
@endsection

@section('sideinfo')
    @include('frontend.sideInfo')
@endsection

@section('frontcontent')
<div class="col-3 mx-auto">
    @yield('sideinfo')
</div>

<div class="col-8 mx-auto">
    <div class="rowalign-items-center">
        <div class="col-12 mx-auto row">
            <div class="col-1 bg-success np-1 ml-2">Notice</div>
            <div class="col-11 latest-news np-1">
                <marquee>
                    <ul>
                        <li>
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i>{{$Datakey->notice}} </a>
                        </li>
                    </ul>
                </marquee>
            </div>
        </div>

        <div class="col-12 mx-auto my-2">
            <h2>Welcome to {{$Datakey->wcMsgHadeline}}</h2>
            <p class="text-justify">{{$Datakey->wclMsgDescription}} <a href="#">Readmore</a></p>
        </div>
        <!-- mission & vission -->
        <div class="col-12 mx-auto my-4">
            <div class="card rounded-0">
                <div class="card-header rounded-0 bg-success text-white h5">
                    Mission & Vission
                </div>
                <div class="card-body">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p class="h4">{{$Datakey->missionDescription}}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">{{$Datakey->writerName}}
                        </figcaption>
                    </figure>
                    <div class="alert alert-success">{{$Datakey->mainGoal}}</div>
                </div>
            </div>
        </div>

        <!-- Notice board start here -->
        <div class="col-12 mx-auto mb-4">
            <h2>Leatest Notice</h2>
            <div class="bg-success p-2 notice-box my-2">
                <div class="row align-items-center">
                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th September</div>
                    <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                    <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                </div>
            </div>
            <div class="bg-success p-2 notice-box my-2">
                <div class="row align-items-center">
                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th September</div>
                    <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                    <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                </div>
            </div>
            <div class="bg-success p-2 notice-box my-2">
                <div class="row align-items-center">
                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th September</div>
                    <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                    <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                </div>
            </div>
            <div class="bg-success p-2 notice-box my-2">
                <div class="row align-items-center">
                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th September</div>
                    <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                    <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                </div>
            </div>
            <div class="bg-success p-2 notice-box my-2">
                <div class="row align-items-center">
                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th September</div>
                    <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                    <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                </div>
            </div>
            <a href="#" class="btn btn-primary rounded-0">All Notice</a>
        </div>
        <div class="row g-0">
            <div class="col-12 mx-auto my-4 row">
                <!-- info box start here -->
                <div class="col-12 col-md-6 mx-auto my-4 infobox">
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
                <div class="col-12 col-md-6 mx-auto my-4 infobox">
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
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('principalSpeechPage')}}"> Principal Speech</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('comitteePage')}}"> Managing Comittee</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mx-auto my-4 infobox">
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
                <div class="col-12 col-md-6 mx-auto my-4 infobox">
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

        <!-- carusel slider start -->
        <div id="demo" class="col-12 mx-auto mt-4">
            <h2>Photo Gallery</h2>
            <div id="owl-demo" class="owl-carousel">
        @if(!empty($gallery)) 
        @foreach($gallery as $data)
                <div class="item">
                    <img src="{{ asset('/public/upload/image/photogallery/').'/'.$data->avatar}}" alt="campus">
                </div>
            @endforeach
             @endif
            </div>
        </div>
    </div>
</div>
@endsection

                @endif