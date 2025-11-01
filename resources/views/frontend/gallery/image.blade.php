@extends('frontend.include')
@section('fronttitle')
Memorable Moment
@endsection
@section('frontcontent')
<style>
#myTable th, #myTable td {
    text-align: left !important;
    vertical-align: center;
}
#myTable th {
    font-weight: bold;
}

/* Gallery styles */
.gallery-item {
    margin-bottom: 20px;
}

.gallery-item img {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.gallery-item img:hover {
    transform: scale(1.05);
    cursor: pointer;
}
</style>

<section class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center con-title my-4">
            <h2 class="hedingAbout wow fadeInLeft animated" data-wow-delay=".60s">
                Memorable <span>Moment</span>
            </h2>
        </div>
    </div>
    
    <div class="row">
        @if($Datakey->count() > 0) 
            @foreach($Datakey as $data)
                <div class="col-lg-4 col-md-6 col-sm-12 gallery-item">
                    <a class="wow fadeIn animated" 
                       data-wow-delay=".60s" 
                       href="{{ env('APP_URL') }}/public/upload/image/PhotoGallery/{{ $data->avatar }}" 
                       data-lightbox="mygallery">
                        <img src="{{ env('APP_URL') }}/public/upload/image/PhotoGallery/{{ $data->avatar }}" 
                             alt="Gallery Image" 
                             class="img-fluid w-100" />
                    </a>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Sorry! No content available right now
                </div>
            </div>
        @endif
    </div>
</section>

@endsection