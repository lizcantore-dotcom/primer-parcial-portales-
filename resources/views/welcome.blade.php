<x-layouts.main>
    <x-slot:title>Home</x-slot:title>
    
    <!-- Seccion de bienvenida -->
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm border">
        <div class="container-fluid py-4">
            <h1 class="display-5 fw-bold text-primary">Innovación y Tecnología a tu Alcance</h1>
            <p class="col-md-8 fs-4 text-muted">
                Bienvenido a nuestro portal especializado en informática. Descubre los mejores componentes, hardware de última generación y los artículos más destacados del mundo IT.
            </p>
            <div class="d-flex gap-3 mt-4">
                <a href="{{ route('productos.index') }}" class="btn btn-primary btn-lg px-4 fw-bold">Ver Productos</a>
                <a href="{{ route('blog.index') }}" class="btn btn-outline-dark btn-lg px-4">Explorar el Blog</a>
            </div>
        </div>
    </div>

    <!-- Sección de Características -->
    <div class="row text-center my-5">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h3 class="h4 fw-bold text-dark">Hardware de Vanguardia</h3>
                    <p class="text-muted">Encuentra placas de video, procesadores y periféricos con especificaciones técnicas detalladas y stock actualizado.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h3 class="h4 fw-bold text-dark">Blog Técnico</h3>
                    <p class="text-muted">Mantente al día con las últimas tendencias, análisis de rendimiento y novedades del desarrollo de software y la IA.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h3 class="h4 fw-bold text-dark">Asesoramiento Directo</h3>
                    <p class="text-muted">¿Tienes dudas sobre qué componente elegir? Contáctanos y nuestro equipo de expertos te asesorará.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>