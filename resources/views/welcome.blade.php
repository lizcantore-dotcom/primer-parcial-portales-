<x-layouts.main>
    <x-slot:title>Home</x-slot:title>

    <div class="container my-4">

        <div class="home-portada p-4 p-md-5 mb-5 rounded-3 shadow-sm">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold text-primary">
                    Innovación y Tecnología a tu Alcance
                </h1>

                <p class="col-md-8 fs-4 text-muted">
                    Bienvenido a nuestro portal especializado en informática. Descubre los mejores componentes, hardware de última generación y los artículos más destacados del mundo IT.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('productos.index') }}"
                       class="btn btn-primary btn-lg px-4 fw-bold">
                        Ver Productos
                    </a>

                    <a href="{{ route('blog.index') }}"
                       class="btn btn-outline-dark btn-lg px-4">
                        Explorar el Blog
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4 text-center mb-5">

            <div class="col-12 col-md-4">
                <div class="card h-100 home-card">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold text-dark">
                            Hardware de Vanguardia
                        </h2>

                        <p class="text-muted mb-0">
                            Encuentra placas de video, procesadores y periféricos con especificaciones técnicas detalladas y stock actualizado.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card h-100 home-card">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold text-dark">
                            Blog Técnico
                        </h2>

                        <p class="text-muted mb-0">
                            Mantente al día con las últimas tendencias, análisis de rendimiento y novedades del desarrollo de software y la IA.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card h-100 home-card">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold text-dark">
                            Asesoramiento Directo
                        </h2>

                        <p class="text-muted mb-0">
                            ¿Tienes dudas sobre qué componente elegir? Contáctanos y nuestro equipo de expertos te asesorará.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-layouts.main>
