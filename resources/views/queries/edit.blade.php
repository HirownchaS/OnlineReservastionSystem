

@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Queries</h1>

        <form action="{{ route('queries.update', $queries->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}

            <div class="mb-3">
                <label for="phone" class="form-label">Query</label>
                <textarea type="text" class="form-control" id="query" name="query" value="{{old('query', $queries->query )}}"required></textarea>
            </div>

            <div class="mb-3">
                <label for="guests" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" value="{{ $queries->status }}" required>
                    <option value="pending" {{ old('status', $queries->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ old('status', $queries->status) == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                    <option value="cancelled" {{ old('status', $queries->status) == 'cancelled' ? 'selected' : '' }}>Cancel</option>                </select>
            </div>
                <button type="submit" class="btn btn-primary">Update Query</button>
        </form>
    </div>
@endsection
