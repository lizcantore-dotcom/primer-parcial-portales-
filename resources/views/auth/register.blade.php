<x-layouts.main>
    <x-slot:title>Crear una cuenta</x-slot:title>

    <h1>Crear una cuenta</h1>

    @if(session('feedback.message'))
    <p>{{ session('feedback.message') }}</p>
@endif

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('auth.register.process') }}" method="POST">
            @csrf

        <div>
            <label for="name">Nombre</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >
        </div>

        <div>
            <label for="email">Email</label>
            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
            >
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input
                type="password"
                id="password"
                name="password"
            >
        </div>

        <div>
            <label for="password_confirmation">Confirmar contraseña</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
            >
        </div>

        <button type="submit">Registrarme</button>
    </form>
</x-layouts.main>