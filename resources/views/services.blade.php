@extends('Layout.default')

@section('content')
    <main class="container my-5">
        <h2>Our Services</h2>
            <p>Explore our wide range of services, from dine-in to home delivery.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('assets/images/delivery.jpg') }}" class="card-img-top" alt="Service 1">
                    <div class="card-body">
                        <h5 class="card-title">Dining Services</h5>
                        <p class="card-text">Enjoy gourmet meals at our restaurant.</p>
                        <a href="{{ route('services') }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('assets/images/home-deli.jpg') }}" class="card-img-top" alt="Service 2">
                    <div class="card-body">
                        <h5 class="card-title">Home Delivery</h5>
                        <p class="card-text">Get your favorite dishes delivered to your doorstep.</p>
                        <a href="{{ route('services') }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('assets/images/dine.jpg') }}" class="card-img-top" alt="Service 3">
                    <div class="card-body">
                        <h5 class="card-title">Catering Services</h5>
                        <p class="card-text">We cater to all types of events and occasions.</p>
                        <a href="{{ route('services') }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </main>


   @endsection
