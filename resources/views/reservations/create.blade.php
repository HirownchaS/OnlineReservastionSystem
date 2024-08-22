<!-- resources/views/reservations/create.blade.php -->

@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Create a New Reservation</h1>

        {{-- <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="service_type">Service Type</label>
                <input type="text" class="form-control" id="service_type" name="service_type" required>
            </div>
            <div class="form-group">
                <label for="reservation_time">Reservation Time</label>
                <input type="datetime-local" class="form-control" id="reservation_time" name="reservation_time" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Reservation</button>
        </form> --}}
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
@endsection
