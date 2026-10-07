<x-layouts.main>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="container my-4">
        <div class="card shadow-sm border-0 bg-light">
            <div class="card-body p-4">
                <h1 class="mb-3 text-dark">{{ $post->title }}</h1>
                
                <dl class="row">
                    <dt class="col-sm-3 fw-bold">Autor:</dt>
                    <dd class="col-sm-9"><span class="badge bg-secondary">{{ $post->author }}</span></dd>

                    <dt class="col-sm-3 fw-bold">Fecha de publicación:</dt>
                    <dd class="col-sm-9">{{ $post->published_at }}</dd>
                </dl>

                <hr class="my-4">

                <h3 class="h5 fw-bold">Contenido</h3>
                <div class="p-3 bg-white rounded border">
                    {{ $post->content }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">← Volver al blog</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>