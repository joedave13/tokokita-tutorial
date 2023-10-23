<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="mt-6 flex justify-between items-center">
            <h2 class="font-semibold text-xl">Edit Product</h2>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')">{{ __('Delete Product') }}</x-danger-button>
        </div>

        <div class="mt-4" x-data="{ imageUrl: '{{ $product->image ? Storage::url($product->image) : asset('assets/noimage.png') }}' }">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data"
                class="flex gap-6">
                @csrf
                @method('PUT')

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md" alt="product-image">
                </div>

                <div class="w-1/2">
                    <div>
                        <x-input-label for="name" :value="__('Product Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $product->name)" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                            :value="old('price', $product->price)" x-mask:dynamic="$money($input, ',')" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full border p-2" type="file" name="image"
                            :value="old('image')" @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area name="description" id="description" rows="5"
                            class="block mt-1 w-full">{{ old('description', $product->description) }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button class="w-full justify-center mt-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    @include('products.partials.delete-product')
</x-app-layout>
