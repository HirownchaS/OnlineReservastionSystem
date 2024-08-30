<!-- resources/views/reservations/edit.blade.php -->

@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Reservation</h1>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $reservation->phone )}}"required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date',$reservation->date) }}"required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="{{old('time', $reservation->time) }}"required>
            </div>
            <div class="mb-3">
                <label for="guests" class="form-label">Types of services</label>
                <select class="form-control" id="service_type" name="service_type" value="{{old('service_type', $reservation->service_type )}}" required>
                    <option value="Dine-in">Dine-in</option>
                    <option value="Delivery">Delivery</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" class="form-control" id="guests" name="guests" value="{{old('guests', $reservation->guests )}}"min="1" max="20" required>
            </div>
            <div class="mb-3">
                <label for="guests" class="form-label">Status</label>
                <select class="form-control" id="service_type" name="status" value="{{ $reservation->status }}" required>
                    <option value="pending" {{ old('status', $reservation->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ old('status', $reservation->status) == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                    <option value="cancelled" {{ old('status', $reservation->status) == 'cancelled' ? 'selected' : '' }}>Cancel</option>                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Reservation</button>
        </form>
    </div>
@endsection
