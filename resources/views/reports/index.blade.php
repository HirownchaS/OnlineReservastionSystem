<!-- resources/views/reservations/index.blade.php -->

@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Your Reservations</h1>
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">Create Reservation</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Phone</th>
                    <th>Service Type</th>
                    <th>No of guests</th>
                    <th>Reseration_dateTime</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ Auth::user()->fname }}</td>
                        <td>{{$reservation->phone}}</td>
                        <td>{{ $reservation->service_type }}</td>
                        <td>{{ $reservation->guests }}</td>
                        <td>{{ $reservation->time }}{{$reservation->date}}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>
                            {{-- <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">View</a> --}}
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
