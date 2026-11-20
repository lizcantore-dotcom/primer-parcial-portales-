<x-layouts.main>
    <x-slot:title>Listado de Usuarios</x-slot:title>

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h1>Panel de Administración - Usuarios</h1>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Volver al Inicio</a>
        </div>

        @if(session('feedback.message'))
            <div class="alert alert-{{ session('feedback.status', 'success') }} alert-dismissible fade show" role="alert">
                {{ session('feedback.message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="py-3 ps-3">ID</th>
                                <th class="py-3">Email</th>
                                <th class="py-3">Rol</th>
                                <th class="py-3">Fecha de Registro</th>
                                <th class="py-3 text-end pe-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="ps-3 fw-bold">{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-danger">Administrador</span>
                                        @else
                                            <span class="badge bg-secondary">Usuario Común</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}</td>
                                    <td class="text-end pe-3">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-primary">
                                            Ver Detalle
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No hay usuarios registrados en el sistema.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>