    <?php

    use Illuminate\Support\Facades\Route;

    //ruta de vistas
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');;
    Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])
    ->name('blog.index');
    Route::get('/productos', [\App\Http\Controllers\ProductosController::class, 'listarProductos'])
    ->name('productos.index');
    Route::get('/contacto', [\App\Http\Controllers\ContactoController::class, 'index'])
    ->name('contacto');

    //rutas del login
    Route::get('/ingresar', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth.login.form');
    Route::post('/ingresar', [\App\Http\Controllers\AuthController::class, 'loginProcess'])
    ->name('auth.login.process');
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');

    //ruta de detalles producto
    Route::get('/productos/{id}', [\App\Http\Controllers\ProductosController::class, 'show'])
    ->whereNumber('id')
    ->name('productos.show');
    //ruta de detalles blog
    Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])
    ->whereNumber('id')
    ->name('posts.show');

    //ruta de publicar producto
    Route::get('/productos/crear', [\App\Http\Controllers\ProductosController::class, 'create'])
    ->name('productos.create');
    Route::post('/productos/crear', [\App\Http\Controllers\ProductosController::class, 'store'])
    ->name('productos.store');
    //ruta de publicar blog
    Route::get('/blog/crear', [\App\Http\Controllers\PostController::class, 'create'])
    ->name('blog.create');
    Route::post('/blog/crear', [\App\Http\Controllers\PostController::class, 'store'])
    ->name('blog.store');

    //EDITAR PRODUCTOS
    Route::get('/productos/{id}/editar', [\App\Http\Controllers\ProductosController::class, 'edit'])
        ->whereNumber('id')
        ->name('productos.edit');
    Route::post('/productos/{id}/editar', [\App\Http\Controllers\ProductosController::class, 'update'])
        ->whereNumber('id')
        ->name('productos.update');

    // EDITAR BLOG 
    Route::get('/posts/{id}/editar', [\App\Http\Controllers\PostController::class, 'edit'])
        ->whereNumber('id')
        ->name('blog.edit');
    Route::post('/posts/{id}/editar', [\App\Http\Controllers\PostController::class, 'update'])
        ->whereNumber('id')
        ->name('blog.update');

    //ruta de eliminar productos
    Route::get('/productos/{id}/eliminar', [\App\Http\Controllers\ProductosController::class, 'delete'])
        ->whereNumber('id')
        ->name('productos.delete');
    Route::post('/productos/{id}/eliminar', [\App\Http\Controllers\ProductosController::class, 'destroy'])
        ->whereNumber('id')
        ->name('productos.destroy');

    // ruta de eliminar blog 
    Route::get('/posts/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'delete'])
        ->whereNumber('id')
        ->name('blog.delete');
    Route::post('/posts/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'destroy'])
        ->whereNumber('id')
        ->name('blog.destroy');