@extends('Layout.dashboard')

@section('content')
<div class="container">
    <h1>Create a New Category</h1>

    <div class="col-md-6">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" rows="3" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image"
                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    required>
            </div>
           
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
