<x-layouts.main>
    <x-slot:title>Publicar Nuevo Producto</x-slot:title>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h2 class="h4 mb-0 fw-bold"> Registrar Nuevo Producto</h2>
                    </div>
                    <div class="card-body p-4 bg-light">
                        
                        <form action="{{ route('productos.store') }}" method="POST">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre del Producto</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name"
                                    value="{{ old('name') }}" 
                                    placeholder="Ej: Placa de Video RTX 4060"
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

                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Precio ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input 
                                            type="number" 
                                            step="0.01" 
                                            id="price" 
                                            name="price" 
                                            placeholder="0.00"
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

                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label">Stock Inicial</label>
                                    <input 
                                        type="number" 
                                        id="stock" 
                                        name="stock" 
                                        placeholder="Ej: 15"
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

                            <div class="mb-3">
                                <label for="release_date" class="form-label">Fecha de Lanzamiento</label>
                                <input 
                                    type="date" 
                                    id="release_date" 
                                    name="release_date"
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

                            <div class="mb-4">
                                <label for="description" class="form-label">Descripción del Producto</label>
                                <textarea 
                                    id="description" 
                                    name="description" 
                                    rows="4" 
                                    placeholder="Detalles técnicos, especificaciones..."
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('description'),
                                    ])
                                    @error('description')
                                        aria-invalid="true"
                                        aria-errormessage="error-description"
                                    @enderror
                                ></textarea>
                                @error('description')
                                    <div class="text-danger" id="error-description">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">← Cancelar y volver</a>
                                <button type="submit" class="btn btn-success px-4 fw-bold">Guardar Producto</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>