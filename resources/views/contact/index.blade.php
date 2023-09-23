<x-app-layout>
    <div class="container">
        <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
            <h2 class="text-center text-lg font-bold pt-6 tracking-widest">お問合せ</h2>

            <div class="card-body">
                <form method="POST" action="{{ route('confirm') }}" class="rounded pt-3 pb-8 mb-4">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="block text-gray-700 text-sm mb-2">メールアドレス</label>

                        <div class="col-md-9">
                            <input id="email" type="text"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3 form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="contact" class="block text-gray-700 text-sm mb-2">お問合せ内容</label>
                        <div class="col-md-9">
                            <textarea id="contact"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3 @error('contact') is-invalid @enderror"
                                name="contact" cols="30" rows="10"></textarea>
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                お問い合わせ内容の確認へ
                            </button>
                        </div>
                    </div> --}}
                    <input type="submit" value="お問い合わせ内容の確認へ"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">お問い合わせ</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('confirm') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">メールアドレス</label>

                                <div class="col-md-9">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact" class="col-md-3 col-form-label text-md-right">お問い合わせ内容</label>
                                <div class="col-md-9">
                                    <textarea id="contact" class="form-control  @error('contact') is-invalid @enderror" name="contact" cols="30"
                                        rows="10"></textarea>

                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        お問い合わせ内容の確認へ
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
