<x-layout>
  <x-slot:title>Products - Index</x-slot:title>

  <div class="container mx-auto p-8">
    <div class="flex justify-between items-center">
      <h1 class="text-3xl font-bold mb-2">Products Data</h1>
      <a href="{{ route('products.create') }}" class="text-white">
        <button class="bg-primary rounded px-4 py-2 hover:bg-primary/90">
          Add Product
        </button>
      </a>
    </div>

    <div class="overflow-x-scroll">
      <table id="dataTables" class="table-auto border-collapse w-full mt-4">
        <thead>
          <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Address</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Quantity</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr class="text-center">
            <td class="border px-4 py-2">
              {{ $loop->iteration }}
            </td>
            <td class="border px-4 py-2">
              <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded w-24 mx-auto">
              </a>
            </td>
            <td class="border px-4 py-2">{{ $product->title }}</td>
            <td class="border px-4 py-2">{{ $product->description }}</td>
            <td class="border px-4 py-2">{{ $product->category->name }}</td>
            <td class="border px-4 py-2">{{ "Rp " . number_format($product->price,2,',','.') }}</td>
            <td class="border px-4 py-2">{{ $product->quantity }}</td>
            <td class="border px-4 py-2">
              <form onsubmit="return confirm('Are You Sure?');" action="{{ route('products.destroy', $product->id) }}"
                method="POST">
                <a href="{{ route('products.show', $product->id) }}"
                  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Show</a>
                <a href="{{ route('products.edit', $product->id) }}"
                  class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $products->links() }}
  </div>
</x-layout>