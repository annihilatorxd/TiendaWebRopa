<?php

namespace App\Http\Controllers;

use App\Models\Vestimenta;
use Illuminate\Http\Request;
use App\Http\Requests\VestimentaRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use Database\Seeders\CategoriaSeeder;


use App\Public\imagenes\File;

use App\Models\DetalleVestimenta;
use App\Models\Talla;



class VestimentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vestimentas = Vestimenta::all();
        $tallas = Talla::all();
        $categorias = Categoria::all();
        return view('inicio', compact('vestimentas','tallas','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.form-vestimenta',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VestimentaRequest $request)
    {
        $imagenPath = $request->file('imagen')->store('public/storage/imagenes');
        $categoriaId = (int)$request->input('categoria');

        Vestimenta::create([
            'imagen' => $imagenPath,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria_id' => $categoriaId
        ]);

        return redirect()->route('inicio');//->with('success', 'vestimenta agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $vestimenta = vestimenta::find($id);
        return view('admin.editar-vestimenta', compact('vestimenta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VestimentaRequest $request, string $id)
    {
        $vestimenta = vestimenta::find($id);

        if (!$vestimenta) {
            return redirect()->route('lista-vestimentas')->with('error', 'vestimenta no encontrada.');
        }

        // Actualizar los campos de la vestimenta
        $vestimenta->nombre = $request->nombre;
        $vestimenta->descripcion = $request->descripcion;
        $vestimenta->precio = $request->precio;

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            // Lógica para manejar la imagen
            // Guardar la nueva imagen y actualizar el campo en la base de datos
            Storage::delete($vestimenta->imagen);
            //$imagen = $request->file('imagen');
            $vestimenta->imagen = $request->imagen->store('public/storage/imagenes');
        }

        // Guardar los cambios en la base de datos
        $vestimenta->save();

        return redirect()->route('admin.show.vestimenta')->with('success', 'vestimenta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vestimenta = Vestimenta::find($id);
        $vestimenta->delete();
        return redirect()->route('admin.show.vestimenta');
    }

    /////////////////////

    public function mostrarLista(){
        $vestimentas = vestimenta::all();
        return view('admin.lista-prendas', compact('vestimentas'));
    }

    public function mostrarEditar($id){
        $vestimentas = vestimenta::find($id);
        return view('admin.editar-vestimenta', compact('vestimentas'));
    }
    // En tu controlador
    public function mostrarPrendas(Request $request)
    {
        
        $vestimentas = Vestimenta::all();
        $tallas = Talla::all();
    
        // Obtener el nombre de la prenda desde la solicitud
        $nombre_prenda = $request->input('nombre_prenda');
    
        // Aplicar el filtro si se proporciona un nombre de prenda
        if ($nombre_prenda) {
            $vestimentas = Vestimenta::where('nombre', $nombre_prenda)->get();
        }
    

    return view('inicio', compact('vestimentas', 'nombre_prenda','tallas'));
}

}

