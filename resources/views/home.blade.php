<!-- resources/views/home.blade.php -->

@extends('Layout.default')

@section('content')
    {{-- <main>
        <section>
            <img src="{{ asset('assets/images/home.jpg') }}" alt="Restaurant" style="width:100%; height:auto;">
            <h2>Experience the Best Dining in Town</h2>
            <p>Join us for a delightful dining experience.</p>
        </section>
    </main> --}}

    <!-- Gallery Section -->
    <main class="container my-5">
    <section class="gallery-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Our Gallery</h2>
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

    <!-- Testimonials Section -->
    <section class="testimonials-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">What Our Customers Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">"The food was amazing and the staff were incredibly friendly. I had a great time!"</p>
                            <footer class="blockquote-footer">John Doe</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">"Best restaurant in town! The atmosphere is cozy and the menu is fantastic."</p>
                            <footer class="blockquote-footer">Jane Smith</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">"A wonderful dining experience. The dishes are beautifully presented and delicious."</p>
                            <footer class="blockquote-footer">Robert Brown</footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>


@endsection
