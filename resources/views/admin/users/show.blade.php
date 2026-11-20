<x-layouts.main>
    <x-slot:title>Detalle del Usuario #{{ $user->id }}</x-slot:title>

    <div class="container my-4">
        <div class="mb-3">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                ← Volver al listado de usuarios
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-header bg-dark text-white py-3">
                        <h2 class="h4 mb-0 fw-bold">Detalle del Usuario</h2>
                    </div>
                    <div class="card-body p-4 bg-white">
                        <dl class="row mb-0">
                            <dt class="col-sm-4 fw-bold">ID:</dt>
                            <dd class="col-sm-8">{{ $user->id }}</dd>

                            <dt class="col-sm-4 fw-bold">Correo Electrónico:</dt>
                            <dd class="col-sm-8">{{ $user->email }}</dd>

                            <dt class="col-sm-4 fw-bold">Rol en el sistema:</dt>
                            <dd class="col-sm-8">
                                @if($user->role === 'admin')
                                    <span class="badge bg-danger">Administrador</span>
                                @else
                                    <span class="badge bg-secondary">Usuario Común</span>
                                @endif
                            </dd>

                            <dt class="col-sm-4 fw-bold">Fecha de Registro:</dt>
                            <dd class="col-sm-8">{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}</dd>
                        </dl>

                                                <hr>

                        <h3 class="h5 fw-bold mb-3">Servicios contratados</h3>

                        @if($user->products->isNotEmpty())
                            <ul class="list-group">
                                @foreach($user->products as $product)
                                    <li class="list-group-item">
                                        {{ $product->name }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Este usuario no tiene servicios contratados.</p>
                        @endif
                        
                    </div>
                    <div class="card-footer bg-light p-3 text-end">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>