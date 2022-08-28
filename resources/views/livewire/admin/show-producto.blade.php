<div>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Productos') }}
            </h2>
            @livewire('admin.create-producto')
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-4 bg-red-500">
                <x-jet-input class="w-full" wire:model='search' type="text"
                    placeholder="Escriba el nombre del producto que busca" />
            </div>
            @if ($productos->count())
                <table class="w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Producto</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Precio</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Stock</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Categoría</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Estado</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Editar</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Eliminar</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($productos as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-16 h-16">
                                            <img class="w-16 h-16 rounded-full" src="{{ Storage::url($item->imagen) }}">
                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $item->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">{{ $item->precio }} Bs.</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">{{ $item->stock }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">{{ $item->categoria->nombre }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($item->status == 1)
                                        <span
                                            class="inline-flex px-2 text-xs text font-semibold leading-5 text-white bg-red-400 rounded-full">Borrador</span>
                                    @else
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-400 rounded-full">Publicado</span>
                                    @endif
                                </td>

                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <a class="cursor-pointer" href="#" wire:click="edit({{ $item }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <a class="cursor-pointer" href="#" wire:click="deleteproducto({{ $item }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay Registros
                </div>
            @endif

            @if ($productos->hasPages())
                <div class="px-6 py-4">
                    {{ $productos->links() }}
                </div>
            @endif

        </div>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            <div class="font-bold">
                <span>Actualizar Producto</span>
            </div>

        </x-slot>

        <x-slot name="content">
            {{-- Imagen --}}
            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}">
            @else
                <img src="{{ Storage::url($producto->imagen) }}">
            @endif
            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre del Producto" />
                <x-jet-input class="w-full" type="text" wire:model="producto.nombre" />
                <x-jet-input-error for="producto.nombre" />
            </div>
            {{-- Categoria --}}
            <div class="mb-4">
                <x-jet-label value="Categoria" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="producto.categoria_id">
                    <option value="">Seleccionar una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="producto.categoria_id" />
            </div>
            {{-- Descripcion --}}
            <div class="mb-4">
                <x-jet-label value="Descripción" />
                <textarea rows="3"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="producto.descripcion">
                </textarea>
                <x-jet-input-error for="producto.descripcion" />
            </div>
            {{-- Precio --}}
            <div class="mb-4">
                <x-jet-label value="Precio" />
                <x-jet-input class="w-full" type="number" wire:model="producto.precio" />
                <x-jet-input-error for="producto.precio" />
            </div>
            {{-- Stock --}}
            <div class="mb-4">
                <x-jet-label value="Stock" />
                <x-jet-input class="w-full" type="number" wire:model="producto.stock" />
                <x-jet-input-error for="producto.stock" />
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
            <x-jet-secondary-button wire:click="$set('open_edit',false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Modal Eliminar --}}
    <x-jet-confirmation-modal wire:model="open_delete">
        <x-slot name="title">
            <span class="font-bold text-red-600 text-2xl">Eliminar Producto</span>
            
        </x-slot>

        <x-slot name="content">
            <div class="font-bold text-xl">
                Está seguro de eliminar este producto? Esta acción no podrá ser revertida!!!
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_delete',false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                Eliminar Producto
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
