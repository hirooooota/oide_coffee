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
                <div class="product__description">
                    {{ $product->description }}
                    <form method="POST" action="/line_item/create">
                        @csrf
                        <input type="hidden" name="id" value=""{{ $product->id }} />
                        <div class="product__quantity">
                            <input type="number" name="quantity" min="1" value="1" require />
                        </div>
                        <div class="product__btn-add-cart">
                            <button type="submit" class="btn btn-outline-secondary">カートに追加する</button>
                        </div>
                    </form>
                </div>
                <a href="/">TOPへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
