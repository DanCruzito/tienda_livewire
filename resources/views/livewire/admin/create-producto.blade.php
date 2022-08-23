<div class="ml-auto">
    <x-jet-button wire:click="$set('open',true)">Agregar Producto</x-jet-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <div class="font-bold">
                <span>Nuevo Producto</span>
            </div>

        </x-slot>

        <x-slot name="content">
            {{--Imagen--}}
            @if ($imagen)
            Photo Preview:
            <img src="{{ $imagen->temporaryUrl() }}">
             @endif
            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre del Producto" />
                <x-jet-input class="w-full" type="text" wire:model="nombre" />
                <x-jet-input-error for="nombre" />
            </div>
            {{-- Categoria --}}
            <div class="mb-4">
                <x-jet-label value="Categoria" />
                <select 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     wire:model="categoria_id">
                    <option value="">Seleccionar una categoría</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
                    @endforeach
                    
                </select>
                <x-jet-input-error for="categoria_id" />
            </div>
            {{-- Descripcion --}}
            <div class="mb-4">
                <x-jet-label value="Descripción" />
                <textarea rows="3"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="descripcion">
                </textarea>
                <x-jet-input-error for="descripcion" />
            </div>
            {{-- Precio --}}
            <div class="mb-4">
                <x-jet-label value="Precio" />
                <x-jet-input class="w-full" type="number" wire:model="precio" />
                <x-jet-input-error for="precio" />
            </div>
            {{-- Stock --}}
            <div class="mb-4">
                <x-jet-label value="Stock" />
                <x-jet-input class="w-full" type="number" wire:model="stock" />
                <x-jet-input-error for="stock" />
            </div>

             {{-- Imagen --}}
             <div class="mb-4">
                <span>{{ $this->imagen }}</span>
                <x-jet-label value="Subir Imagen" />
                <x-jet-input class="w-full" type="file" wire:model="imagen" />
                <x-jet-input-error for="imagen" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                Agregar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
