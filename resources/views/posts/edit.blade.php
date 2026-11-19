<?php
$genreIds = $post->genres->pluck('genre_id')->all();
?>
<x-layouts.main>
    <x-slot:title>Editar Entrada de Blog</x-slot:title>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h2 class="h4 mb-0 fw-bold">Editar Entrada: {{ $post->title }}</h2>
                    </div>
                    <div class="card-body p-4 bg-light">
                        
                        <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Título del Artículo</label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    name="title" 
                                    value="{{ old('title', $post->title) }}"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('title'),
                                    ])
                                    @error('title')
                                        aria-invalid="true"
                                        aria-errormessage="error-title"
                                    @enderror
                                >
                                @error('title')
                                    <div class="text-danger" id="error-title">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Autor -->
                                <div class="col-md-6 mb-3">
                                    <label for="author" class="form-label">Autor</label>
                                    <input 
                                        type="text" 
                                        id="author" 
                                        name="author" 
                                        value="{{ old('author', $post->author) }}"
                                        @class([
                                            'form-control',
                                            'is-invalid' => $errors->has('author'),
                                        ])
                                        @error('author')
                                            aria-invalid="true"
                                            aria-errormessage="error-author"
                                        @enderror
                                    >
                                    @error('author')
                                        <div class="text-danger" id="error-author">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="published_at" class="form-label">Fecha de Publicación</label>
                                    <input 
                                        type="date" 
                                        id="published_at" 
                                        name="published_at"
                                        value="{{ old('published_at', $post->published_at) }}"
                                        @class([
                                            'form-control',
                                            'is-invalid' => $errors->has('published_at'),
                                        ])
                                        @error('published_at')
                                            aria-invalid="true"
                                            aria-errormessage="error-published_at"
                                        @enderror
                                    >
                                    @error('published_at')
                                        <div class="text-danger" id="error-published_at">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-2">Imagen Actual</div>
                                @if ($post->cover && \Storage::exists($post->cover))
                                    <div class="mb-2">
                                        <img src="{{\Storage::url($post->cover)}}" alt="" class="img-fluid">
                                    </div>
                                @else
                                    Sin Portada
                                @endif
                            </div>

                            <!-- ... campo imagen ... -->
                            <div class="mb-3">
                                <label for="cover" class="form-label">Imagen de Portada (Opcional)</label> 
                                <input 
                                type="file" 
                                id="cover" 
                                name="cover" 
                                @class([
                                    'form-control', 
                                    'is-invalid' => $errors->has('cover'),
                                    ])
                                @error('cover')
                                    aria-invalid="true"
                                    aria-errormessage="error-cover"
                                @enderror
                                    aria-describedby="help-cover"
                                >
                                <div class="text-muted" id="hep-cover">Solo seleccioná una imagen si queres cambiar la Actual</div>
                                @error('cover')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label">Contenido del Artículo</label>
                                <textarea 
                                    id="content" 
                                    name="content" 
                                    rows="6"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('content'),
                                    ])
                                    @error('content')
                                        aria-invalid="true"
                                        aria-errormessage="error-content"
                                    @enderror
                                >{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <div class="text-danger" id="error-content">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="rating_fk" class="form-label">Clasificación.</label>
                                <select
                                    id="rating_fk"
                                    name="rating_fk"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('rating_fk'),
                                    ])
                                    @error('rating_fk')
                                        aria-invalid="true"
                                        aria-errormessage="error-rating_fk"
                                    @enderror
                                >
                                    @foreach($ratings as $rating)
                                        <option 
                                            value="{{ $rating->rating_id }}"
                                            @selected($rating->rating_id==old('rating_fk', $post->rating_fk))
                                            >
                                            {{ $rating->name }} ({{ $rating->abbreviation }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('rating_fk')
                                    <div class="text-danger" id="error-rating_fk">{{ $message }}</div>
                                @enderror
                                <fieldset class="mb-2">
                                    <legend>Genero</legend>
                                    @foreach ($genres as $genre)
                                        <label class="me-3">
                                            <input 
                                            type= "checkbox"
                                            name= "genre_fks[]"
                                            value= "{{ $genre->genre_id}}"
                                            @checked(in_array($genre->genre_id, old('genre_fks', $genreIds)))
                                            >
                                            {{ $genre->name}}
                                        </label>
                                    @endforeach
                                </fieldset>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">← Cancelar y volver</a>
                                <button type="submit" class="btn btn-warning px-4 fw-bold">Actualizar Artículo</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>