<x-layout>
  <x-slot:title>Products - Show</x-slot:title>

  <div class="container h-full m-auto p-24">
    <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
      <div class="p-6">
        <div class="mb-4">
          <button class="btn btn-primary w-full font-bold hover:bg-primary/90 hover:underline"
            onclick="show_image.showModal()">Show Image</button>
          <dialog id="show_image" class="modal">
            <div class="modal-box p-0">
              <form method="dialog">
                <button class="btn btn-sm btn-circle btn-primary absolute right-2 top-2">✕</button>
              </form>
              <img src="{{ asset('/storage/products/'.$product->image) }}"
                class="object-cover rounded-lg w-full mx-auto">
            </div>
          </dialog>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">ID:</p>
          <p class="text-lg">{{ $product->id }}</p>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Name:</p>
          <p class="text-lg">{{ $product->title }}</p>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Category:</p>
          <p class="text-lg">{{ $product->category->name }}</p>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Address:</p>
          <p class="text-lg">{{ $product->description }}</p>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Price:</p>
          <p class="text-lg">{{ $product->price }}</p>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Quantity:</p>
          <p class="text-lg">{{ $product->quantity }}</p>
        </div>
        <div class="mb-4">
          <a href="{{ route('products.edit', $product->id) }}"
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
          <a href="{{ route('products.index') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Back</a>
        </div>
      </div>
    </div>
  </div>
</x-layout>