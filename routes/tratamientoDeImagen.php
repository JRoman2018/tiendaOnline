<?php
use App\Product;
use App\Category;
use App\User;
use App\Image;

//0 Saber si un producto tiene o no una imagen
    $producto = Product::find(1);
    $image = $producto->images;

    if($image){
        echo 'Tiene una imagen';
    }else{
        echo 'No tiene una imagen';
    }
    return $image;


//0 Saber si un usuario tiene o no una imagen
    $usuario = User::find(1);
    $image = $usuario->image;

    if($image){
        echo 'Tiene una imagen';
    }else{
        echo 'No tiene una imagen';
    }
    return $image;

//01 Crear una imagen para un usuario utilizando el metodo save

    $imagen= new Image(['url' => 'imagenes/avatar.png.']);
    $usuario = User::find(1);
    $usuario->image()->save($imagen);

    return $usuario;

//02 Obtener las informaciones de las imagenes a traves del usuario
    $usuario = User::find(1);

    return $usuario->image->url;

//03 Crear varias imagenes para un producto utilizando el metodo savemany
    $producto = Product::find(3);
    $producto->images()->saveMany([
        new App\Image(['url' => 'imagenes/avatar.png']),
        new App\Image(['url' => 'imagenes/avatar2.png']),
        new App\Image(['url' => 'imagenes/avatar3.png']),

    ]);

    return $producto->images;

//04 Crear una imagen para un usuario utilizando el metodo create

    $usuario = User::find(1);
    $usuario->image()->create(
        [
            'url' => 'imagenes/avatar2.png'
        ]);

    return $usuario;

//Otra forma seria asi

    $imagen = [];
    $imagen['url']='imagenes/avatar3.png';

    $usuario = User::find(1);
    $usuario->image()->create($imagen);

    return $usuario;

//05 Crear varias imagen para un producto utilizando el metodo createMany
    $imagen = [];
    $imagen[]['url']='imagenes/avatar.png';
    $imagen[]['url']='imagenes/avatar2.png';
    $imagen[]['url']='imagenes/avatar3.png';
    $imagen[]['url']='imagenes/a.png';
    $imagen[]['url']='imagenes/a.png';
    $imagen[]['url']='imagenes/a.png';

    $producto = App\Product::find(2);
    $producto->images()->createMany($imagen);

    return $producto->images;

?>
