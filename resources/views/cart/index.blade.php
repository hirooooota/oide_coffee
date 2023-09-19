<x-app-layout>
    @section('title')
        カート
    @endsection

    @section('content')
        <div class="container">
            <div class="cart__title text-2xl font-bold mb-4">ショッピングカート</div>

            @if (count($line_items) > 0)
                <div class="cart-wrapper space-y-4">
                    @foreach ($line_items as $item)
                        <div class="flex items-center p-4 border border-gray-200 rounded shadow-md">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                class="w-16 h-16 object-cover rounded" />
                            <div class="ml-4">
                                <div class="text-lg font-semibold">{{ $item->name }}</div>
                                <div class="text-gray-600">{{ $item->pivot->quantity }}個</div>
                                <div class="text-lg font-semibold text-center">
                                    ￥{{ number_format($item->price * $item->pivot->quantity) }}
                                </div>
                                <form method="post" action="{{ route('cart_delete') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->pivot->id }}" />
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        削除
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="cart__sub-total mt-4 text-lg font-semibold">
                    小計：￥{{ number_format($total_price) }}
                </div>

                <button onClick="location.href='{{ route('cart.checkout') }}'"
                    class="cart__purchase mt-4 py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">
                    購入する
                </button>
            @else
                <div class="cart__empty text-xl font-semibold mt-4">
                    カートに商品が入っていません。
                </div>
            @endif
        </div>
    </x-app-layout>
