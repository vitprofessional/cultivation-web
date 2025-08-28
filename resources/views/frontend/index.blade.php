@extends('frontend.include')
@section('fronttitle')
Enter to learn & Leave to serve
@endsection

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
                        @if($noticeBoard->count()>0)
                        @foreach($noticeBoard as $notice)
                        <li>
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i> $notice->headline</a>
                        </li>
                        @endforeach
                        @else
                        <li>
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i> Lorem ipsom text notice here. </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i> Another lorem ipsom text notice here. </a>
                        </li>
                        @endif
                    </ul>
                </marquee>
            </div>
        </div>
        @if($insData)
        <div class="col-12 mx-auto my-2">
            <h2>{{$insData->insHeadline}}</h2>
            <p class="text-justify">{{ \Illuminate\Support\Str::limit($insData->insDetails, 100, '...') }} <a href="#">Readmore</a></p>
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
                            <p class="h4">{{$insData->mission}}</p>
                        </blockquote>
                    </figure>
                    <div class="alert alert-success">{{$insData->vision}}</div>
                </div>
            </div>
        </div>
        @else
        <div class="col-12 mx-auto my-2">
            <h2>Welcome to Jahanara-Ayub Academy</h2>
            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing..... <a href="#">Readmore</a></p>
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
                            <p class="h4">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </blockquote>
                    </figure>
                    <div class="alert alert-success">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                </div>
            </div>
        </div>
        @endif

        <!-- Notice board start here -->
        <div class="col-12 mx-auto mb-4">
            <h2>Leatest Notice</h2>
            @if($noticeBoard->count()>0)
            @foreach($noticeBoard as $ntc)
            <div class="bg-success p-2 notice-box my-2">
                <div class="row align-items-center">
                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> {{ $ntc->created_at->format('d M Y') }}</div>
                    <div class="col-8 mx-auto">{{ $ntc->headline }}</div>
                    <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                </div>
            </div>
            @endforeach
            @else
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
            @endif
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
@else
@section('sliderninfo')
    @include('frontend.oldfile.sliderinfo')
@endsection
@section('sideinfo')
    @include('frontend.oldfile.sideInfo')
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
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i> Lorem ipsom dollar site is a common text in web design and development industry.</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i> Lorem ipsom dollar site is a common text in web design and development industry.</a>
                        </li>
                    </ul>
                </marquee>
            </div>
        </div>

        <div class="col-12 mx-auto my-2">
            <h2>Welcome to SBC Cumilla</h2>
            <p class="text-justify">On the first day of July 2000 the Sonar Bangla College opened its doors to students with Sir P.J. Hartog as the first Vice-Chancellor of the University. The University was set up in a picturesque part of the city known as Ramna on 600 acres of land.The University started its activities with 3 Faculties,12 Departments, 60 teachers, 877 students and 3 dormitories (Halls of Residence) for the students. At present the University consists of 13 Faculties, 83 Departments, 12 Institutes, 20 residential halls, 3 hostels and more than 56 Research Centres. The number of students and teachers has risen to about 37018 and 1992 respectively.The main purpose of the University was to create new areas of knowledge and disseminate this knowledge to the society through its students. Since its inception the University has a distinct character of having distinguished scholars as faculties who have enriched the global pool of knowledge by making notable contributions in the fields of teaching and <a href="#">Readmore</a></p>
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
                            <p class="h4">The number of students and teachers has risen to about 37018 and 1992 respectively.The main purpose of the University was to create new areas of knowledge and disseminate this knowledge to the society through its students.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Abu Saleque Md. Selim Reza Shourav <cite title="Source Title">, Principal</cite>
                        </figcaption>
                    </figure>
                    <div class="alert alert-success">Since its inception the University has a distinct character of having distinguished scholars as faculties</div>
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
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> About Us</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Teacher Database</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Staff Database</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Principal Speech</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Managing Comittee</li>
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
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Semister Plan</li>
                                        <li><a class="list-group-item" href="{{route('newSyllabus')}}">Syllabus</a>
                                        </li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Class Routine</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Exam Routine</li>
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
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Student Database</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> X-Student Archive</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Placement Cell</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Job Seekers</li>
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
                <div class="item"><img src="{{ asset('/public/') }}/img/campus.jpeg" alt="campus"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/mainbuilding.jpg" alt="main building"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/office.jpg" alt="office room"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/principalroom.jpg" alt="principal room"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/hostel.jpg" alt="hostel"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/auditoriam.jpg" alt="auditoriam"></div>
            </div>
        </div>
    </div>
</div>
@endsection