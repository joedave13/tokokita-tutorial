<x-modal name="confirm-product-deletion">
    <form method="post" action="{{ route('products.destroy', $product) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this product?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once product is deleted, all of its resources and data will be permanently deleted.') }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Delete Product') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
