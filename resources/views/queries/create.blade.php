

@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Submit Query</h1>

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
