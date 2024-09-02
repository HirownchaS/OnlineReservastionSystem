@extends('Layout.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Menu</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('menus.update', $menus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $menus->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" rows="3" id="description" name="description" required>{{ $menus->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ Storage::url($menus->image) }}" width="100" alt="{{ $menus->name }}" class="mt-2">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $menus->price }}" min="0.00" max="10000.00" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="categories" class="form-label">Categories</label>
                <select class="form-control" id="categories" name="categories[]" multiple required>
                    @foreach ($categories as $category)
                        {{-- <option value="{{ $category->id }}"{{ old('categories', $menus->categories) == 'breakfast' ? 'selected' : '' }} >
                            {{ $category->name }}
                        </option> --}}
                        <option value="{{ $category->id }}" {{ in_array($category->id, $menus->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
