<x-layouts.main>
    <x-slot:title>{{ $producto->name }}</x-slot:title>

    <div class="container my-4">
        <div class="card shadow-sm border-0 bg-light">
            <div class="card-body p-4">
                <h1 class="mb-3 text-primary">{{ $producto->name }}</h1>
                
                <dl class="row">
                    <dt class="col-sm-3 fw-bold">Precio:</dt>
                    <dd class="col-sm-9">$ {{ number_format($producto->price, 2, ',', '.') }}</dd>

                    <dt class="col-sm-3 fw-bold">Stock disponible:</dt>
                    <dd class="col-sm-9">{{ $producto->stock }} unidades</dd>

                    <dt class="col-sm-3 fw-bold">Fecha de lanzamiento:</dt>
                    <dd class="col-sm-9">{{ $producto->release_date }}</dd>
                </dl>

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