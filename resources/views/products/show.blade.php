<style>
    .custom-button {
        margin-top: 10px;
        /* 上部のマージンを調整 */
        background-color: transparent;
        border: 1px solid black;
        /* 極細の枠線を追加 */
        border-radius: 1rem;
        padding: 10px 20px;
        /* ボタン内のパディングを調整 */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    .custom-button:hover {
        background-color: rgb(251, 255, 0);
        color: black;
    }
</style>


<x-app-layout>
    <div class="container mx-auto px-4"> <!-- mx-auto and px-4 for horizontal centering and padding -->
        <div class="product text-center"> <!-- text-center for centering text -->
            <img src="{{ asset($product->image) }}" class="product-img mx-auto" /> <!-- mx-auto for centering image -->
            <div class="product__content-header mt-4"> <!-- mt-4 for some spacing -->
                <div class="product__name mb-2 text-2xl">
                    {{ $product->name }}
                </div>
                <div class="product__price mb-4">
                    ¥{{ number_format($product->price) }}
                </div>

                <br>

                <div class="product__description">
                    {{ $product->description }}
                    <form method="POST" action="/line_item/create">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}" />
                        <div class="product__quantity">
                            <input type="number" name="quantity" min="1" value="1" require />
                        </div>
                        <button onClick="location.href='{{ route('cart.checkout') }}'" class="custom-button">
                            購入する
                        </button>
                        <br>

                    </form>
                </div>
                <a href="/">TOPへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
