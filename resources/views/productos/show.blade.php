<x-layouts.main>
    <x-slot:title>{{ $producto->name }}</x-slot:title>

    <div class="container my-4">
        <div class="card shadow-sm border-0 bg-light">
            <div class="card-body p-4">
                
                <h1 class="mb-4 text-primary">{{ $producto->name }}</h1>

                <div class="row align-items-center mb-4">
                    <!-- Sección de la Imagen -->
                    <div class="col-md-4 text-center mb-3 mb-md-0">
                        @if($producto->cover !== null && \Storage::exists($producto->cover))
                            <img src="<?= \Storage::url($producto->cover); ?>" alt="{{ $producto->cover_description }}" class="img-fluid rounded shadow-sm">
                        @else
                            <div class="p-5 bg-white rounded border text-muted">
                                Sin portada
                            </div>
                        @endif
                    </div>
                    
                    <!-- Sección de los Datos del Producto -->
                    <div class="col-md-8">
                        <dl class="row mb-0">
                            <dt class="col-sm-4 fw-bold">Precio:</dt>
                            <dd class="col-sm-8">$ {{ number_format($producto->price, 2, ',', '.') }}</dd>

                            <dt class="col-sm-4 fw-bold">Stock disponible:</dt>
                            <dd class="col-sm-8">{{ $producto->stock }} unidades</dd>

                            <dt class="col-sm-4 fw-bold">Fecha de lanzamiento:</dt>
                            <dd class="col-sm-8">{{ $producto->release_date }}</dd>
                        </dl>
                    </div>
                </div>

                <hr class="my-4">

                <h3 class="h5 fw-bold">Descripción</h3>
                <div class="p-3 bg-white rounded border">
                    {{ $producto->description }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">← Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>