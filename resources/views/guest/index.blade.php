<x-layout>
  <x-slot:title>Products - Index</x-slot:title>

  <div class="container mx-auto p-8">
    <div class="flex justify-between items-center">
      <h1 class="text-3xl font-bold mb-2">Products Data</h1>
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $products->links() }}
  </div>
</x-layout>