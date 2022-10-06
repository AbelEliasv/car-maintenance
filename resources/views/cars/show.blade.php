@extends('layouts.index')

@section('content')
    <div class="grid grid-cols-1 gap-4">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('cars.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Vehiculos
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('cars.show', $car->id) }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">ver</a>
                    </div>
                </li>
            </ol>
        </nav>

        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
            <div class="col-start-1 mb-4 col-span-4 ">
                <dd class="text-xl font-semibold">{{ $car->model }} </dd>
            </div>
            <div class="flex flex-col pb-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Marca</dt>
                <dd class="text-lg font-semibold">{{ $car->brand }}</dd>
            </div>
            <div class="flex flex-col py-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Año</dt>
                <dd class="text-lg font-semibold">{{ $car->year }}</dd>
            </div>
            <div class="flex flex-col pt-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Precio</dt>
                <dd class="text-lg font-semibold">{{ $car->price }}</dd>
            </div>
            <div class="flex flex-col pt-3">
                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Propietario</dt>
                <dd class="text-lg font-semibold">{{ $car->owner->name }}</dd>
            </div>
        </dl>

        <br>
        <div class="col-start-1 mb-4 col-span-4 ">
            <dd class="text-xl font-semibold">Historial de propietarios </dd>
        </div>

        <ul class="mb-8 space-y-4 text-left text-gray-500 dark:text-gray-400">
            @foreach ($history as $owner)
                <li class="flex  justify-between space-x-3">
                    <!-- Icon -->
                    <div class="flex ">
                        <svg class="mr-4 flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>

                        </svg>
                        <span class="mr-4">{{$owner->name}}</span>
                    </div>

                    <div class="flex ">
                        <div>Fecha : {{$owner->pivot->assing_date}}</div>
                    </div>
                </li>
            @endforeach
        </ul>


    </div>
@endsection
