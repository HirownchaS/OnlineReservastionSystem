@extends('Layout.default')

@section('content')
<main class="container my-5">   
    <section class="gallery-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Our Menu</h2>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/gallery1.jpg') }}" class="img-fluid mb-3" alt="Gallery Image 1">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/gallery2.jpg') }}" class="img-fluid mb-3" alt="Gallery Image 2">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/gallery3.jpg') }}" class="img-fluid mb-3" alt="Gallery Image 3">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/gallery4.jpg') }}" class="img-fluid mb-3" alt="Gallery Image 4">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection