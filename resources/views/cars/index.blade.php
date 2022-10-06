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
                        <span>Vehiculos</span>
                        <p class=" mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">--</p>
                    </div>
                    <a href="{{ route('cars.create') }}" role="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Registrar
                        vehiculo</a>
                </div>

            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Marca
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Modelo
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Año
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Precio
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Propietario
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cars as $car)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $car->brand }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $car->model }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $car->year }}
                        </td>
                        <td class="py-4 px-6">
                            $ @convert((int) $car->price)
                        </td>
                        <td class="py-4 px-6">
                            {{ $car->owner->name }}
                        </td>
                        <td class="py-4 px-6 flex justify-end">
                            <div class="mr-4">
                                <a href="{{route('cars.show',$car->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                            </div>
                            <div>
                                <a href="{{route('cars.edit',$car->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mt-4">Editar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        @if ($cars->count() == 0)
            <div class="text-center p-5">
                No se encuentran vehiculos registrados.
            </div>
        @endif
        <div class="p-3 flex justify-end">

            {!! $cars->withQueryString()->links() !!}
        </div>
    </div>
@endsection
