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
                    <table>
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Пользователь</th>
                            <th>Почта</th>
                            <th>Время создания</th>
                            <th>Вложение</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->topic}}</td>
                                <td>{{$order->description}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="{{$order->getFirstMediaUrl('file')}}">ссылка</a></td>
                            </tr>
                        @endforeach
                        </tbody>


                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
