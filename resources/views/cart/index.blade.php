<style>
    .cart__purchase {
        background-color: rgb(251, 255, 0);
        color: black;
        border: 0.1px solid rgb(48, 47, 47);
        /* 極細の境界線を追加 */
        border-radius: 0.25rem;
        transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
        /* 影を薄く */
    }

    .cart__purchase:hover {
        background-color: rgb(255, 255, 0);
        /* ホバー時の背景色 */
        box-shadow: 0px 4px 4px rgba(115, 103, 103, 0.4);
        /* ホバー時の影を変更 */
    }
</style>

<x-app-layout>
    @section('title')
        カート
    @endsection

    @section('content')
        <div class="container mx-auto">
            <div class="cart__title text-2xl font-bold mb-4">Shopping Cart</div>

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
                <div class="cart__sub-total mt-8 mb-8 text-lg font-semibold text-center">
                    小計：￥{{ number_format($total_price) }}
                </div>

                <div class="text-center"> <!-- 親要素に text-center クラスを追加 -->
                    <button onClick="location.href='{{ route('cart.checkout') }}'"
                        class="cart__purchase py-2 px-4 mb-8 text-lg"
                        style="background-color: rgb(251, 255, 0); color: black; border-radius: 1rem; transition: background-color 0.2s ease-in-out;">
                        購入する
                    </button>
                </div>
            @else
                <div class="cart__empty text-xl font-semibold mt-4">
                    カートに商品が入っていません。
                </div>
            @endif
        </div>
    </x-app-layout>
