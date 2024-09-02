@extends('Layout.dashboard')

@section('content')
<div class="container">
    <h1>Menu</h1>
    <a href="{{route('menus.create') }}" class="btn btn-primary">Create Menu</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}
                    <td>{{ $menu->name}}</td>
                    <td>{{$menu->description}}</td>
                    <td> <img src="{{ Storage::url($menu->image) }}"
                                                    width="100" rounded"></td>
                    <td>{{ $menu->price }}</td>
                    
                    <td>
                       
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
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
