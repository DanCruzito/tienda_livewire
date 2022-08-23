<?php

namespace App\Http\Livewire\Admin;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducto extends Component
{
    use WithPagination;
    public $search;
   // public $open = true;

   protected $listeners = ['render'];
      
    public function render()
    {
        $productos = Producto::where('nombre','like','%'.$this->search.'%')
                    ->orwhere('stock','like','%'.$this->search.'%')
                    ->orderByDesc('id')
                    ->paginate(10);
        return view('livewire.admin.show-producto',compact('productos'));
    }
}
