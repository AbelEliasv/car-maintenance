@extends('layouts.index')



@section('content')
    <div class="overflow-x-auto relative sm:rounded-lg">
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
                        <a href="{{ route('cars.create') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Crear</a>
                    </div>
                </li>
            </ol>
        </nav>
        <form method="POST" action="{{ route('cars.store') }}">
            @csrf
            <div class="mb-6">
                <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Marca</label>
                <input type="text" id="text" name="brand" value="{{ old('brand') }}"
                    class="{{ $errors->has('brand') ? 'bg-red-50 border border-red-500 text-red-900' : '' }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Ej : Nissan ">

                @if ($errors->has('brand'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('brand') }}</p>
                @endif
            </div>
            <div class="mb-6">
                <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Modelo</label>
                <input type="text" id="text" name="model" value="{{ old('model') }}"
                    class="{{ $errors->has('model') ? 'bg-red-50 border border-red-500 text-red-900' : '' }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Ej : C-343 ">

                @if ($errors->has('model'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('model') }}</p>
                @endif
            </div>
            <div class="mb-6">
                <label for="año" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Año</label>
                <input type="text" id="text" name="year" value="{{ old('year') }}"
                    class="{{ $errors->has('year') ? 'bg-red-50 border border-red-500 text-red-900' : '' }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Ej : 2022 ">

                @if ($errors->has('year'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('year') }}</p>
                @endif
            </div>
            <div class="mb-6">


                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an
                    Propietario</label>
                <select id="countries"
                name="owner_id"
                    class="bg-gray-50 border {{ $errors->has('owner_id') ? 'bg-red-50 border border-red-500 text-red-900' : '' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected="">Selecciona</option>
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}" {{ (collect(old('owner_id'))->contains($owner->id)) ? 'selected':'' }}>{{$owner->name}}</option>
                    @endforeach
                </select>


                @if ($errors->has('owner_id'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('owner_id') }}</p>
                @endif
            </div>

            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Precio</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        $
                    </span>
                    <input type="number" id="price" name="price"
                    value="{{ old('price') }}"
                        class="{{ $errors->has('price') ? 'bg-red-50 border border-red-500 text-red-900' : '' }}  rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Bonnie Green">


                </div>
                @if ($errors->has('price'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('price') }}</p>
                @endif
            </div>

            <div class="text-right ">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    nuevo vehiculo</button>
            </div>

        </form>

    </div>
@endsection
