<x-app-layout>
    <div x-data="{ showDeleteModal: false, deleteUserId: null }">
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
                                        <a href="{{route('user.create')}}" class="gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                            <i class="fa-solid fa-user-plus"></i>
                                            <span>Agregar</span>
                                        </a>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="border-b p-4 pt-0 pb-3 font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Nombre</th>
                                    <th class="border-b p-4 pt-0 pb-3 font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Creación</th>
                                    <th class="border-b p-4 pt-0 pb-3 font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td class="p-4 text-center text-slate-500 border-b border-slate-100 dark:border-slate-700 dark:text-slate-400">
                                            {{ $user['name'] }}
                                        </td>
                                        <td class="p-4 text-center text-slate-500 border-b border-slate-100 dark:border-slate-700 dark:text-slate-400">
                                            {{ $user['created_at'] }}
                                        </td>
                                        <td class="p-4 text-slate-500 border-b border-slate-100 dark:border-slate-700 dark:text-slate-400">
                                            <div class="grid col">
                                                <a href="{{route('user.edit', ['id'=>$user['id']])}}" class="mb-1 gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Editar</span>
                                                </a>
                                                <a href="{{route('user.show', ['id'=>$user['id']])}}" class="mb-1 gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                                    <i class="fa-solid fa-eye"></i>
                                                    <span>Ver</span>
                                                </a>
                                                <button @click="deleteUserId = {{ $user->id }}; showDeleteModal = true" class="gap-1 rounded-lg px-5 pb-1 pt-1.5 font-small leading-normal text-xs text-center text-neutral-900  shadow-light-3 transition duration-150 ease-in-out  hover:bg-neutral-200 hover:shadow-light-2  focus:bg-neutral-200 focus:shadow-light-2 focus:outline-none focus:ring-0  active:bg-neutral-200 active:shadow-light-2  motion-reduce:transition-none bg-neutral-100  dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                                    <i class="fa-solid fa-trash"></i>
                                                    <span>Eliminar</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div
            x-show="showDeleteModal"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        >
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-lg font-semibold text-gray-800">¿Eliminar usuario?</h2>
                <p class="mt-2 text-sm text-gray-600">¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.</p>
                <div class="mt-4 flex justify-end gap-3">
                    <button
                        @click="showDeleteModal = false"
                        class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300"
                    >
                        Cancelar
                    </button>
                    <form method="post" action="{{ route('user.destroy') }}">
                        @csrf
                        @method('delete')
                        <input type="text" name="id" :value="deleteUserId" hidden>
                        <button
                            type="submit"
                            class="px-4 py-2 text-sm bg-red-600 text-white rounded hover:bg-red-700"
                        >
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>