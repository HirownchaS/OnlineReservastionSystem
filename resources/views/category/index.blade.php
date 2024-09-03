@extends('Layout.dashboard')

@section('content')
<div class="container">
    <h1>Category</h1>
    <a href="{{route('categories.create') }}" class="btn btn-primary">Create Category</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}
                    <td>{{ $category->name}} </td>
                    <td>{{$category->description}}</td>
                    <td>  @if ($category->image)
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" width="100">
                    @else
                        No image available
                    @endif</td>
                   
                    
                    <td>
                       
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
