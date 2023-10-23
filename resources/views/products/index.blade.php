<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        @if (session()->has('success'))
            <x-alert message="{{ session()->get('success') }}" />
        @endif

        <div class="mt-6 flex justify-between items-center">
            <h2 class="font-semibold text-xl">Product List</h2>

            <a href="{{ route('products.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white px-10 py-2 rounded-md font-semibold">Add</a>
        </div>

        <div class="grid md:grid-cols-4 grid-cols-2 mt-4 gap-6">
            @foreach ($products as $product)
                <div>
                    <img src="{{ $product->image ? Storage::url($product->image) : asset('assets/noimage.png') }}"
                        alt="product-image" class="h-80 object-cover">
                    <div class="my-2">
                        <p class="text-xl font-light">{{ $product->name }}</p>
                        <p class="font-semibold text-gray-400">${{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{ route('products.edit', $product) }}">
                        <button
                            class="bg-gray-200 hover:bg-gray-300 px-10 py-2 rounded-md w-full font-semibold">Edit</button>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
