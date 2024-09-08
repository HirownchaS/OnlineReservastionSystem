

@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Your Reports</h1>
       
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
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
