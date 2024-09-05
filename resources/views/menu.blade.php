@extends('Layout.default')
@section('content')
<main class="container my-5">
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Menu</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @forelse($menus as $menu)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->name }}</h5>
                                <p class="card-text text-muted">{{ $menu->description}}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-success rounded-pill">Rs.{{ number_format($menu->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">No menu items available</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection