<div>
    @section('title', 'Admin Login')

    @section('content')
        <div class="container mx-auto mb-28">
            <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
                <section class="mb-5">
                    <h3 class="font-bold text-2xl text-center">Login</h3>
                </section>

                @if($success)
                    <div class="inline-flex w-full overflow-hidden bg-gray-100 rounded-lg shadow-2xl">
                        <div class="flex items-center justify-center w-12 bg-green-500"></div>

                        <div class="px-3 py-2 text-left">
                            <span class="font-semibold text-green-500">Success</span>
                            <p class="mb-1 text-sm leading-none text-gray-500">{{ $success }}</p>
                        </div>
                    </div>
                @endif

                <section class="mt-5">
                    <form wire:submit.prevent="submit" method="POST" class="flex flex-col">
                        @csrf

                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                            <input wire:model.lazy="email" type="email" id="email"
                                   class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none px-3 pb-3">
                        </div>

                        @error('email')
                        <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                        @enderror

                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                            <input wire:model.lazy="password" type="password" id="password"
                                   class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none px-3 pb-3">
                        </div>

                        @error('password')
                        <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                        @enderror

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded shadow-lg hover:shadow-xl transition duration-200"
                            type="submit">Submit</button>

                    </form>
                </section>
            </main>
        </div
    @endsection
</div>
