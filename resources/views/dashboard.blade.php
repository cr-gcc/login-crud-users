<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border-collapse table-auto w-full mb-10">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-right border-b p-4 pt-0 pb-3 dark:border-slate-600">
                                    <button class="gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                        <i class="fa-solid fa-user-plus"></i>
                                        <span>Agregar</span>
                                    </button>
                                </th>
                            </tr>
                            <tr>
                                <th class="border-b p-4 pt-0 pb-3 font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Nombre</th>
                                <th class="border-b p-4 pt-0 pb-3 font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Creación</th>
                                <th class="border-b p-4 pt-0 pb-3 font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($data as $user)
                                    <td class="p-4 text-center text-slate-500 border-b border-slate-100 dark:border-slate-700 dark:text-slate-400">
                                        {{ $user['name'] }}
                                    </td>
                                    <td class="p-4 text-center text-slate-500 border-b border-slate-100 dark:border-slate-700 dark:text-slate-400">
                                        {{ $user['created_at'] }}
                                    </td>
                                    <td class="p-4 text-slate-500 border-b border-slate-100 dark:border-slate-700 dark:text-slate-400">
                                        <div class="grid col">
                                            <button class="mb-1 gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                <span>Editar</span>
                                            </button>
                                            <button class="mb-1 gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>Ver</span>
                                            </button>
                                            <button class="gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                                <i class="fa-solid fa-trash"></i>
                                                <span>Eliminar</span>
                                            </button>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>