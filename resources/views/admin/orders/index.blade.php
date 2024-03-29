<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.orders.export') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white mr-2">
                    Скачать excel таблицу
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Пользователь
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Время заказа
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Код оплаты
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Оплата
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Сумма
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Статус
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span>Удалить</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span>Подробнее</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    (ID{{ $order->user->id }}) {{ $order->user->first_name }} {{ $order->user->last_name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $order->created_at }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    №{{ $order->code }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    @if($order->pay == 1) Полная оплата
                                    @elseif($order->pay == 3) Доставка
                                    @else Предоплата 50%
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    @if($order->pay == 1) ₽{{ $order->total }}
                                    @elseif($order->pay == 3) ₽{{ $order->total }}
                                    @else ₽{{ $order->total/2 }}/₽{{ $order->total }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-center">
                                    @if($order->check == 1 && $order->pay == 1) Оплачено
                                    @elseif($order->check == 1 && $order->pay == 2) Частично оплачено
                                    <form class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white"
                                          method="POST"
                                          id="payment_update"
                                          action="{{ route('admin.orders.update', $order->id) }}"
                                    >
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="w-full">Оплачено</button>
                                    </form>
                                    @else Не оплачено
                                    <form class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white"
                                          method="POST"
                                          id="payment_update"
                                          action="{{ route('admin.orders.update', $order->id) }}"
                                    >
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="w-full">Оплачено</button>
                                    </form>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                          id="destroy_entry"
                                          method="POST"
                                          action="{{ route('admin.orders.destroy', $order->id) }}"
                                    >
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="w-full">Удалить</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <a href="{{ route('admin.orders.info', $order->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                        Подробнее
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
