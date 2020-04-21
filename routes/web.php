<?php

use App\Product;
use App\Category;
use App\User;
use App\Image;

//Para hacer las pruebas con las imagenes.
Route::get('/prueba', function () {

    //13 Contar los registros relacionados a los productos de otra forma.
    $productos = Product::find(2);
    return $productos->loadCount('images')->images_count;

});

//Mostrar resultados
Route::get('/resultado', function () {
    $image = Image::orderBy('id', 'desc')->get();
    return $image;
});

Route::get('/', function () {
//    Modificar algun producto
//    $prod = Product::findOrFail(2);
//    $prod->slug = "Producto-3";
//    $prod->save();
//    return $prod;

//    Crear un nuevo producto
//    $prod = new Product();
//    $prod->nombre = 'Producto 3';
//    $prod->slug= 'Producto 3';
//    $prod->category_id = 1;
//    $prod->descripcion_corta = 'Producto';
//    $prod->descripcion_larga = 'Producto';
//    $prod->especificaciones = 'Producto';
//    $prod->datos_de_interes = 'Producto';
//    $prod->estado = 'Nuevo';
//    $prod->activo = 'Si';
//    $prod->sliderprincipal = 'No';
//    $prod->save();
//    return $prod;

//    $cat = Category::find(1)->products;
//    return $cat;

    return view('tienda.index');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return view('plantilla.admin');
})->name('admin');

Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');
Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');

Route::get('cancelar/{ruta}', function($ruta){
    return redirect()->route($ruta)->with('cancelar', 'Acción Cancelada!');
})->name('cancelar');
