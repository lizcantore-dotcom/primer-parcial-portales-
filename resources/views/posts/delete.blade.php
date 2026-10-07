<x-layouts.main>
    <x-slot:title>Eliminar Entrada</x-slot:title>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow border-danger">
                    <div class="card-header bg-danger text-white py-3">
                        <h2 class="h4 mb-0 fw-bold">Confirmar Eliminación</h2>
                    </div>
                    <div class="card-body p-4 bg-light text-center">
                        <p class="fs-5">¿Estás seguro que deseas eliminar el artículo:</p>
                        <h3 class="text-dark mb-4">"{{ $post->title }}"</h3>
                        <p class="text-muted small">Esta acción no se puede deshacer.</p>

                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST">
                            @csrf
                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                                <button type="submit" class="btn btn-danger px-4 fw-bold">Sí, eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>