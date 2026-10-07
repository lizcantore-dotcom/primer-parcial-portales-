<x-layouts.main>
    <x-slot:title>Editar Producto</x-slot:title>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h2 class="h4 mb-0 fw-bold">Editar Producto: {{ $producto->name }}</h2>
                    </div>
                    <div class="card-body p-4 bg-light">
                        
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                            @csrf
                            
                            <!-- Nombre del producto-->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre del Producto</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name', $producto->name) }}"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('name'),
                                    ])
                                    @error('name')
                                        aria-invalid="true"
                                        aria-errormessage="error-name"
                                    @enderror
                                >
                                @error('name')
                                    <div class="text-danger" id="error-name">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Precio -->
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Precio ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input 
                                            type="number" 
                                            step="0.01" 
                                            id="price" 
                                            name="price" 
                                            value="{{ old('price', $producto->price) }}"
                                            @class([
                                                'form-control',
                                                'is-invalid' => $errors->has('price'),
                                            ])
                                            @error('price')
                                                aria-invalid="true"
                                                aria-errormessage="error-price"
                                            @enderror
                                        >
                                    </div>
                                    @error('price')
                                        <div class="text-danger" id="error-price">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Stock -->
                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label">Stock Inicial</label>
                                    <input 
                                        type="number" 
                                        id="stock" 
                                        name="stock" 
                                        value="{{ old('stock', $producto->stock) }}"
                                        @class([
                                            'form-control',
                                            'is-invalid' => $errors->has('stock'),
                                        ])
                                        @error('stock')
                                            aria-invalid="true"
                                            aria-errormessage="error-stock"
                                        @enderror
                                    >
                                    @error('stock')
                                        <div class="text-danger" id="error-stock">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Fecha de lanzamiento -->
                            <div class="mb-3">
                                <label for="release_date" class="form-label">Fecha de Lanzamiento</label>
                                <input 
                                    type="date" 
                                    id="release_date" 
                                    name="release_date"
                                    value="{{ old('release_date', $producto->release_date) }}"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('release_date'),
                                    ])
                                    @error('release_date')
                                        aria-invalid="true"
                                        aria-errormessage="error-release_date"
                                    @enderror
                                >
                                @error('release_date')
                                    <div class="text-danger" id="error-release_date">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Descripción del Producto</label>
                                <textarea 
                                    id="description" 
                                    name="description" 
                                    rows="4"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('description'),
                                    ])
                                    @error('description')
                                        aria-invalid="true"
                                        aria-errormessage="error-description"
                                    @enderror
                                >{{ old('description', $producto->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger" id="error-description">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">← Cancelar y volver</a>
                                <button type="submit" class="btn btn-warning px-4 fw-bold">Actualizar Producto</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>