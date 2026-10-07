<x-layouts.main>
    <x-slot:title>Iniciar Sesión</x-slot:title>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white py-3 text-center">
                        <h2 class="h4 mb-0 fw-bold">Acceso al Sistema</h2>
                    </div>
                    <div class="card-body p-4 bg-light">
                        
                        <form action="{{ route('auth.login.process') }}" method="POST">
                            
                            <!-- Correo Electrónico -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}"
                                    placeholder="admin@admin.com"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('email'),
                                    ])
                                    @error('email')
                                        aria-invalid="true"
                                        aria-errormessage="error-email"
                                    @enderror
                                >
                                @error('email')
                                    <div class="text-danger small mt-1" id="error-email">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">Contraseña</label>
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    placeholder="••••••••"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('password'),
                                    ])
                                    @error('password')
                                        aria-invalid="true"
                                        aria-errormessage="error-password"
                                    @enderror
                                >
                                @error('password')
                                    <div class="text-danger small mt-1" id="error-password">{{ $message }} --></div>
                                @enderror
                            </div>

                            <!-- Botón de Ingreso -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark py-2 fw-bold">Ingresar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>