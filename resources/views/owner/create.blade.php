@extends('layouts.index')



@section('content')
    <nav class="flex mb-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{route('owner.index')}}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Propietarios
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
                    <a href="{{route('owner.create')}}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Crear</a>
                </div>
            </li>
        </ol>
    </nav>
    
    <div class="overflow-x-auto relative sm:rounded-lg">
        <form method="POST" action="{{ route('owner.store') }}">
            @csrf
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Nombre</label>
                <input type="text" id="text" name="name" value="{{ old('name') }}"
                    class="{{ $errors->has('name') ? 'bg-red-50 border border-red-500 text-red-900' : '' }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Ej : Felipe ">

                @if ($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="mb-6">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Apellidos</label>
                <input type="text" id="text" name="last_name" value="{{ old('last_name') }}"
                    class="{{ $errors->has('last_name') ? 'bg-red-50 border border-red-500 text-red-900' : '' }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Ej : Andres ">

                @if ($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('last_name') }}</p>
                @endif
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Correo</label>
                <input type="text" id="text" name="email" value="{{ old('email') }}"
                    class="{{ $errors->has('email') ? 'bg-red-50 border border-red-500 text-red-900' : '' }} shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Ej : Felip@gmail.com ">

                @if ($errors->has('email'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium"></span>{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="text-right ">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    nuevo propietario</button>
            </div>

        </form>

    </div>
@endsection
