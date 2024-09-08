@extends('Layout.default')

@section('content')
    <main class="container my-5">
        <h1>Submit a Query</h1>
        <p>If you have any questions or issues, feel free to reach out to us using the form below.</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('queries.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit Query</button>
            </div>
        </form>
    </main>
@endsection
