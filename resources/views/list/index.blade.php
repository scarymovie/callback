<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        @livewireStyles
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
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @forelse($orders as $key =>$order)
                            <form action="{{ route('list.update', $order->id) }}" method="post">
                                @csrf
                                @method('put')
                                <tr>
                                    <td>{{$order->topic}}</td>
                                    <td>{{$order->description}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->user->email}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href="{{$order->getFirstMediaUrl('file')}}">ссылка</a></td>
                                    <td>{{$order->status}}</td>
                                    <td>
                                        @livewire('order-status', ['model' => $order, 'field' => 'isActive'],
                                        key($order->id))
                                    </td>
                                @empty
                                    </tr>
                            </form>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @livewireScripts
</x-app-layout>
