@extends('layouts.index')

@section('content')
    @if (session()->has('message'))
        @include('shared.alert-success')
    @endif


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <div class="flex justify-between">
                    <div>
                        <span>Propietarios</span>
                        <p class=" mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">--</p>
                    </div>
                    <a href="{{ route('owner.create') }}" role="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Registrar
                        propietario</a>
                </div>

            </caption>

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nombre
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Apellidos
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Correo
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Vehiculos
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Editar</span>
                    </th>
                </tr>
            </thead>

            @if ($owners->count() != 0)
                <tbody>
                    @foreach ($owners as $owner)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $owner->name }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $owner->last_name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $owner->email }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $owner->cars->count() }}
                            </td>
                            <td class="py-4 px-6 flex justify-end  ">
                                <div class="mr-4">
                                    <a href="{{route('owner.edit',$owner)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                    </a>
                                </div>
                             
                                <div>
                                    <form method="POST" action="{{ route('owner.destroy', $owner) }}">
                                        @method('delete')
                                        @csrf
                                        <button role="button" type="submit"
                                            class="font-medium text-red-600 dark:text-blue-500 hover:underline">Eliminar</button>
                                    </form>
                                </div>
                                


                            </td>
                        </tr>
                    @endforeach
               
                </tbody>
            @endif
          
      
        </table>

        @if ($owners->count() == 0)
            <div class="text-center p-5">
                No se encuentran propietarios registrados. 
            </div>
        @endif
        <div class="p-3 flex justify-end">

            {!! $owners->withQueryString()->links() !!}
        </div>
    </div>

    


@endsection
