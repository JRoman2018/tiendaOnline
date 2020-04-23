<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');

        $productos = Product::with('images', 'category')
            ->where('nombre', 'like', "%$nombre%")
            ->orderBy('nombre')->paginate(3);
        return view('admin.product.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::orderBy('nombre')->get();
        return view('admin.product.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:products,nombre',
            'slug' => 'required|unique:products,slug',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $urlimagenes = [];

        if($request->hasFile('imagenes')){
            $imagenes = $request->file('imagenes');

//            dd ($imagenes);
            foreach($imagenes as $imagen){
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/imagenes';
                $imagen->move($ruta,$nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }
//            return $urlimagenes;
        }
        $prod = new Product;
        $prod->nombre                   = $request->nombre;
        $prod->slug                     = $request->slug;
        $prod->category_id              = $request->category_id;
        $prod->cantidad                 = $request->cantidad;
        $prod->precio_actual            =  $request->precioactual;
        $prod->precio_anterior          = $request->precioanterior;
        $prod->porcentaje_descuento     =  $request->porcentajededescuento;
        $prod->descripcion_corta        = $request->descripcion_corta;
        $prod->descripcion_larga        = $request->descripcion_larga;
        $prod->especificaciones         = $request->especificaciones;
        $prod->datos_de_interes         = $request->datos_de_interes;
//        $prod->visitas                  = $request->visitas;
//        $prod->ventas                   = $request->ventas;
//        $prod->activo                   = $request->activo;
        $prod->estado                   = $request->estado;


        if($request->activo){
            $prod->activo   = 'Si';
        }else{
            $prod->activo   = 'No';
        }

        if($request->sliderprincipal){
            $prod->sliderprincipal = 'Si';
        }else{
            $prod->sliderprincipal   = 'No';
        }

        $prod->save();

        $prod->images()->createMany($urlimagenes);

        return redirect()->route('admin.product.index')->with('datos', 'Registro creado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::findOrFail($id);
        $prod->delete();

        return redirect()->route('admin.product.index')->with('datos', 'Registro eliminado Satisfactoriamente!');
    }
}
