<div>
    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section class="mb-5">
            <h3 class="font-bold text-2xl text-center">Add New Movie Schedule</h3>
        </section>

        @if($status)
            <div class="inline-flex w-full overflow-hidden bg-gray-100 rounded-lg shadow-2xl">
                <div @class(['flex', 'items-center', 'justify-center', 'w-12', $status == 'success' => 'bg-green-500', $status == 'error' => 'bg-red-500'])></div>

                <div class="px-3 py-2 text-left">
                    <span @class(['font-semibold', $status == 'success' => 'text-green-500', $status == 'error' => 'text-red-500'])>Success</span>
                    <p class="mb-1 text-sm leading-none text-gray-500">{{ $message }}</p>
                </div>
            </div>
        @endif

        <section class="mt-5">
            <form wire:submit.prevent="create" method="POST" class="flex flex-col">
                @csrf

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="title">Title</label>
                    <input wire:model.lazy="title" type="text" id="title"
                           class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none px-3 pb-3">
                </div>

                @error('title')
                <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                @enderror

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="description">Description</label>
                    <textarea wire:model.lazy="description" id="description"
                              class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none px-3"
                              rows="4"></textarea>
                </div>

                @error('description')
                <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                @enderror

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="poster">Poster</label>
                    <input wire:model="poster" type="file" id="poster"
                           class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none px-3 pb-3">

                    @if ($poster)
                        Poster Preview:
                        <img src="{{ $poster->temporaryUrl() }}" alt="Preview Image">
                    @endif
                </div>

                @error('poster')
                <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                @enderror

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="date">Branches</label>
                    @foreach($branches as $branch)
                        <div class="flex items-center mx-3 my-2">
                            <input wire:model.lazy="branch_ids.{{ data_get($branch, 'id') }}" type="checkbox" id="branch-{{ data_get($branch, 'id') }}"
                                   class="mr-2" value="{{ data_get($branch, 'uuid') }}">
                            <label class="text-sm" for="branch-{{ data_get($branch, 'id') }}">{{ data_get($branch, 'location') }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="date">Date</label>
                    <input wire:model="date" type="date" id="date"
                           class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none px-3 pb-3">
                </div>

                @error('date')
                <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                @enderror

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="time">Time</label>
                    <input wire:model="time" type="time" id="time"
                           class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none px-3 pb-3">
                </div>

                @error('time')
                <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                @enderror

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded shadow-lg hover:shadow-xl transition duration-200"
                    type="submit">Submit</button>

            </form>
        </section>
    </main>
</div>

@push('scripts')
    <script>
        window.addEventListener('created', event => {
            setTimeout(function () {
                window.location.reload(true);
            }, 3000);
        });
    </script>

@endpush
