<x-layouts.main>
    <x-slot:title>Contacto</x-slot:title>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h1 class="h4 mb-0 fw-bold">Contacto y Soporte Técnico</h1>
                    </div>
                    <div class="card-body p-4 bg-light">
                        <p class="text-muted mb-4">
                            ¿Tienes consultas sobre nuestros productos informáticos, necesitas soporte técnico o quieres proponer una temática para el blog? Completa el formulario o comunícate a través de nuestros canales oficiales.
                        </p>

                        <form onsubmit="event.preventDefault(); alert('¡Mensaje enviado con éxito! Nos pondremos en contacto pronto.');">
                            <div class="mb-3">
                                <label for="nombre" class="form-label fw-bold">Nombre y Apellido</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ej: Juan Pérez" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" placeholder="correo@ejemplo.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="mensaje" class="form-label fw-bold">Mensaje o Consulta</label>
                                <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribe tu consulta aquí..." required></textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4 fw-bold">Enviar Mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>