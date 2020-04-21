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

//06 Actualizar la imagen del usuario
    $usuario = App\User::find(1);
    $usuario->image->url = 'imagenes/avatar2.png';

    $usuario->push();
    return $usuario->image;

//07 Actualizar una imagen en especificopara un produtos
    $producto = Product::find(3);
    $producto->images[0]->url = 'imagenes/a.png';
    $producto->push();

    return $producto->images;

//08 Buscar el registro relacionado en la imagen
    $image = Image::find(7);

    return $image->imageable;

//09 Delimitar los registros
    $producto = App\Product::find(2);

    return $producto->images()->where('url', 'imagenes/a.png')->get();

//10 Ordenar registro que provienen de la relación.
    $producto = App\Product::find(2);

    return $producto->images()->where('url', 'imagenes/a.png')->orderBy('id','desc')->get();

//11 Contar los registros relacionados.
    $usuario = User::withCount('image')->get();
    $usuario= $usuario->find(1);

    return $usuario->image_count;

//12 Contar los registros relacionados a los productos.
    $productos = Product::withCount('images')->get();
    $productos= $productos->find(2);

    return $productos->images_count;

//13 Contar los registros relacionados a los productos de otra forma.
    $productos = Product::find(2);
    return $productos->loadCount('images')->images_count;

//14 Lazy load carga  diferida
    $productos = Product::find(3);
    $imagen = $producto->images;
    $categoria = $producto->category;
?>
