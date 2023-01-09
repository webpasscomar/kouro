<div>
    <x-slot name="header">
        <h1 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Gestión de Colores</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <!---Table---->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="w-full divide-y divide-gray-200">

                                    <thead class="bg-gray-200">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                COD
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Pregunta
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Respuesta
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Estado
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($faqs as $item)
                                            <tr class="border-b hover:bg-gray-200">

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $item->id }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $item->pregunta }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $item->respuesta }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        @livewire('toggle-button', [
                                                            'model' => $item,
                                                            'field' => 'estado',
                                                        ])
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#"
                                                        class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                    |
                                                    <a href="#"
                                                        class="text-indigo-600 hover:text-indigo-900">Borrar</a>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td>No existen registros aún</td>
                                            </tr>
                                        @endforelse


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
</div>
