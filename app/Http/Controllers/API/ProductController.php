<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\File as file;

class ProductController extends Controller
{
    public function index()
    {
        /*
        $cat = new Category();
        $cat->nombre = 'Mujer';
        $cat->slug = 'mujer';
        $cat->descripcion = "Ropa de Mujer";
        $cat->save();
        return $cat;
        */
        return Product::all();
    }

    public function show($slug)
    {
        if(Product::where('slug', $slug)->first()){
            return 'Slug existe';
        }else{
            return 'Slug Disponible';
        }
    }

    public function eliminarImagen($id)
    {
        $image = Image::findOrFail($id);
        $archivo = substr($image->url,1);
        $eliminar = File::delete($archivo);

        $image->delete();

        return "Eliminado id:".$id. ' '.$eliminar;
//        return "Se va a eliminar el registro ".$id;
    }
}
