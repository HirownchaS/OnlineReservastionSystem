@extends('Layout.default')

@section('content')
    {{-- <main>
        <section>
            <img src="{{ asset("images/reservation.jpg") }}" alt="Reservation" style="width:100%; height:auto;">
            <h2>Reserve Your Table</h2>
            <form action="{{ route("reservation") }}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required><br><br>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>

                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required><br><br>

                <label for="guests">Number of Guests:</label>
                <input type="number" id="guests" name="guests" min="1" required><br><br>

                <input type="submit" value="Reserve Now">
            </form>
        </section>
    </main> --}}
    <main class="container my-5">
        <h1>Make a Reservation</h1>
        <p>Plan your perfect dining experience with us</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('assets/images/reserved.jpg') }}" class="card-img-top" alt="Reservation Image">
                    <div class="card-body">
                        <h5 class="card-title">Reserve Your Table</h5>
                        <p class="card-text">Fill in the form to reserve a table at our restaurant.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="mb-3">
                        <label for="guests" class="form-label">Types of services</label>
                        <select class="form-control" id="service_type" name="service_type" required>
                            <option value="Dine-in">Dine-in</option>
                            <option value="Delivery">Delivery</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="guests" class="form-label">Number of Guests</label>
                        <input type="number" class="form-control" id="guests" name="guests" min="1" max="20" required>
                    </div>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit Reservation</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

   @endsection
