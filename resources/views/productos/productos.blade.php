
<x-layouts.main>
    <x-slot:title>Productos</x-slot:title>
    
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listado de Productos Informáticos</h1>
            @auth
                <a href="{{ route('productos.create') }}" class="btn btn-success">+ Publicar nuevo producto</a>
            @endauth
            </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Lanzamiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td class="fw-bold">{{ $producto->name }}</td>
                            <td>{{ $producto->description }}</td>
                            <td>$ {{$producto->price}}</td>
                            <td>{{ $producto->stock }} un.</td>
                            <td>{{ $producto->release_date }}</td>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <a href="{{ route('productos.show', ['id' => $producto->id]) }}" class="btn btn-sm btn-primary">Ver</a>
                                    @auth
                                    <a href="{{ route('productos.edit', ['id' => $producto->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="{{ route('productos.delete',['id' => $producto->id]) }}" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                    @endauth
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.main>
