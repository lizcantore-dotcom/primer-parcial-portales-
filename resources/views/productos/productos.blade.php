
<x-layouts.main>
    <x-slot:title>Productos</x-slot:title>

    <div class="container my-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h1>Listado de Productos Informáticos</h1>

            @auth
                <a href="{{ route('productos.create') }}" class="btn btn-success">
                    + Publicar nuevo producto
                </a>
            @endauth
        </div>

        <div class="row g-4">
            @foreach($productos as $producto)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 producto-card">

                        <div class="card-body d-flex flex-column">

                            @if($producto->cover !== null && \Storage::exists($producto->cover))
                            <img src="<?= \Storage::url($producto->cover); ?>" alt="{{ $producto->cover_description }}" class="img-fluid rounded shadow-sm">
                        @else
                            <div class="p-5 bg-white rounded border text-muted">
                                Sin portada
                            </div>
                        @endif

                            <p class="text-secondary mb-2">
                                <strong>ID:</strong> {{ $producto->id }}
                            </p>

                            <h2 class="card-title h5 fw-bold">
                                {{ $producto->name }}
                            </h2>

                            <p class="card-text text-secondary">
                                {{ $producto->description }}
                            </p>

                            <div class="mt-auto">
                                <p class="producto-precio mb-3">
                                    $ {{ $producto->price }}
                                </p>

                                <div class="producto-datos mb-3">
                                    <p class="mb-1">
                                        <strong>Stock:</strong>
                                        {{ $producto->stock }} un.
                                    </p>

                                    <p class="mb-0">
                                        <strong>Lanzamiento:</strong>
                                        {{ $producto->release_date }}
                                    </p>
                                     <p class="text-secondary mb-2">
                                         {{ $producto->rating->abbreviation }}
                                    </p>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('productos.show', ['id' => $producto->id]) }}"
                                       class="btn btn-primary">
                                        Ver
                                    </a>

                                    @auth
                                        <a href="{{ route('productos.edit', ['id' => $producto->id]) }}"
                                           class="btn btn-warning">
                                            Editar
                                        </a>

                                        <a href="{{ route('productos.delete', ['id' => $producto->id]) }}"
                                           class="btn btn-outline-danger">
                                            Eliminar
                                        </a>
                                    @endauth
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-layouts.main>
