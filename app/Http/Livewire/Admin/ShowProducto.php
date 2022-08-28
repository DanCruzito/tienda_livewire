<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowProducto extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search;
    public $open_edit = false;
    public $open_delete = false;
    public $imagen;

    protected $listeners = ['render'];

    protected $rules = [
        'producto.nombre' => 'required|min:6',
        'producto.descripcion' => 'required|max:20',
        'producto.categoria_id' => 'required',
        'producto.precio' => 'required',
        'producto.stock' => 'required'
    ];

    public function mount()
    {
        $this->producto = new Producto();
    }

    public function edit(Producto $producto)
    {
        $this->producto = $producto;
        $this->open_edit = true;
    }

    public function update()
    {
        $rules = $this->rules;
        $this->validate($rules);
        if ($this->imagen) {
            //La imagen anterior debe eliminarse
            Storage::delete($this->producto->imagen);
            $this->producto->imagen = $this->imagen->store('productos');
        }
        $this->producto->save();
        $this->reset('open_edit');
    }

    public function render()
    {
        $categorias = Categoria::all();
        $productos = Producto::where('nombre', 'like', '%' . $this->search . '%')
            ->orwhere('stock', 'like', '%' . $this->search . '%')
            ->orderByDesc('id')
            ->paginate(10);
        return view('livewire.admin.show-producto', compact('productos', 'categorias'));
    }

    //Eliminar
    public function deleteproducto(Producto $producto)
    {
        $this->producto = $producto;
        $this->open_delete = true;
    }

    public function delete(){
      Storage::delete($this->producto->imagen);
      $this->producto->delete();  
      $this->reset('open_delete');
    }
}
