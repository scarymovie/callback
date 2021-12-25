<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->get('errors'))
                        <div class="alert alert-success">
                            {{ session()->get('errors')->first() }}
                        </div>
                    @endif
                    Форма обратной связи
                    <form method="post" action="{{ route('order.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="topic"
                                       class="block font-medium text-sm text-gray-700">Topic</label>
                                <input type="text" name="topic" id="topic" type="text"
                                       class="form-input rounded-md shadow-sm mt-1 block w-full"/>
                                <label for="description"
                                       class="block font-medium text-sm text-gray-700">Description</label>
                                <input type="text" name="description" id="description" type="text"
                                       class="form-input rounded-md shadow-sm mt-1 block w-full"/>
                                <label for="file"
                                       class="block font-medium text-sm text-gray-700">File</label>
                                <input type="file" name="file" id="file" type="file"
                                       class="form-input rounded-md shadow-sm mt-1 block w-full"/>
                            </div>

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
