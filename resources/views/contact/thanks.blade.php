<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <div class="text-center font-semibold text-2xl mb-4">
                送信しました。
            </div>
            <div class="text-center mt-6">
                <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
