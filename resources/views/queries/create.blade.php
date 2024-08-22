<!-- resources/views/reservations/create.blade.php -->

@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Submit Query</h1>

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

            <form action="{{ route('queries.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="query">Query:</label>
                    <textarea id="query" name="query" required class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
