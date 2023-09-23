<x-app-layout>
    <div class="container mx-auto my-8">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2">
                <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="card-header bg-gray-100 px-6 py-4 font-bold text-lg">お問合せ内容確認</div>

                    <div class="card-body p-6">
                        <form method="POST" action="{{ route('send') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $contact['email'] }}">
                            <input type="hidden" name="contact" value="{{ $contact['contact'] }}">
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-600">メールアドレス:</label>
                                <div class="mt-1 font-semibold">
                                    {{ $contact['email'] }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="contact" class="block text-sm font-medium text-gray-600">お問合せ内容:</label>
                                <div class="mt-1 font-semibold">
                                    {{ $contact['contact'] }}
                                </div>
                            </div>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-200 flex justify-between">
                        <a href="{{ route('index') }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">戻る</a>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            送信
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
