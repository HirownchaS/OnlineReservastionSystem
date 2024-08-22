@extends('Layout.dashboard')

@section('content')

<div class="container">
    <h1>Queries</h1>
    <a href="{{ route('queries.create')}}" class="btn btn-primary">Query</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Query</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{$user->fname}}</td>
                    <td>{{$user->lname}}</td>

                    <td>{{ $user->status }}</td>

                    <td>
                        {{-- <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">View</a> --}}
                        <a href="{{ route('queries.edit', $query->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('queries.destroy', $query->id) }}" method="POST" style="display:inline;">
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
