@extends('Layout.default')

@section('content')
<main class="container my-5">
    <h1>About Us</h1>
    <p>Discover our story and meet the people behind ABC Restaurant</p>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ asset('assets/images/restaurant.jpg') }}" class="card-img-top" alt="Restaurant Image">
                <div class="card-body">
                    <h5 class="card-title">Our Story</h5>
                    <p class="card-text">Founded in 2000, ABC Restaurant has been serving the finest dishes with the freshest ingredients. Our mission is to provide an unforgettable dining experience for our guests.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ asset('assets/images/chef.jpg') }}" class="card-img-top" alt="Chef Image">
                <div class="card-body">
                    <h5 class="card-title">Our Chef</h5>
                    <p class="card-text">Meet Chef John Doe, a culinary expert with over 20 years of experience. He is dedicated to crafting exquisite dishes that reflect both tradition and innovation.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ asset('assets/images/team.jpg') }}" class="card-img-top" alt="Team Image">
                <div class="card-body">
                    <h5 class="card-title">Our Team</h5>
                    <p class="card-text">Our team of dedicated professionals works tirelessly to ensure that each guest receives the highest quality service and dining experience.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ asset('assets/images/interior.jpg') }}" class="card-img-top" alt="Interior Image">
                <div class="card-body">
                    <h5 class="card-title">Our Atmosphere</h5>
                    <p class="card-text">ABC Restaurant offers a cozy and elegant atmosphere, perfect for any occasion. We invite you to enjoy our exquisite food in a comfortable and welcoming setting.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
