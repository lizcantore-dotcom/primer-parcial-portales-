<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= url('css/style.css');?>">
    <title>{{$title}}::Informatica</title>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= route('home') ?>">Informatica</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link "href="<?= route('home') ?>">Home</a>
                        <a class="nav-link" href="<?= route('blog.index') ?>">Blog</a>
                        <a class="nav-link" href="<?= route('productos.index') ?>">Productos</a>
                        <a class="nav-link" href="<?= route('contacto') ?>">Contacto</a>
                        @auth
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" method="post">
                                    <button type="submit" class="nav-link">{{ auth()->user()->email }} (Cerrar sesión)</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="<?= route('auth.login.form');?>">Ingresar</a>
                            </li>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="container py-3">
            @if (session('feedback.message'))
                <div class="alert alert-success">{{ session('feedback.message') }}</div>  
            @endif

            {{$slot}}
            
        </main>

        <footer>
            <p class="fs-5">Todos los Derechos Reservados &copy; 2026</p>
        </footer>
    </div>
</body>

</html>