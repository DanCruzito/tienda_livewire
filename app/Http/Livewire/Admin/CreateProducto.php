<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProducto extends Component
{
    use WithFileUploads;
    public $open = false;
    public $nombre,$descripcion,$categoria_id,$precio,$stock,$imagen;

    //Regla de Validación
    protected $rules = [
        'nombre' => 'required|min:6',
        'descripcion' => 'required|max:20',
        'categoria_id' => 'required',
        'precio' => 'required',
        'stock' => 'required',
        'imagen' => 'image|max:1024',//1MB
    ];

    protected $validationAttributes = [
        'categoria_id' => 'categoria',
        'descripcion' => 'descripción'
    ];

    public function updated($propertyNombre,$propertyDescripcion)
    {
        $this->validateOnly($propertyNombre);
        $this->validateOnly($propertyDescripcion);
    }


    //metodo guardar
    public function save(){
        $this->validate();
      $imagen = $this->imagen->store('productos');
        Producto::create([
            'nombre' => $this->nombre,
            'categoria_id' => $this->categoria_id,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'imagen' => $imagen
        ]);
        $this->reset(['open','nombre','descripcion','categoria_id','stock','precio','imagen']);
        $this->emitTo('admin.show-producto','render');
    }
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.admin.create-producto',compact('categorias'));
    }
}
