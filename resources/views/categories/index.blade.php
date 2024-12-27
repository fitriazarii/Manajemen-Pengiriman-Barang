<x-layout>
  <x-slot:title>Categories - Index</x-slot:title>

  <div class="container mx-auto p-8">
    <div class="flex justify-between items-center">
      <h1 class="text-3xl font-bold mb-2">Categories Data</h1>
      <a href="{{ route('categories.create') }}" class="text-white">
        <button class="bg-primary rounded px-4 py-2 hover:bg-primary/90">
          Add Category
        </button>
      </a>
    </div>

    <table id="dataTables" class="table-auto border-collapse w-full mt-4">
      <thead>
        <tr>
          <th class="border px-4 py-2">ID</th>
          <th class="border px-4 py-2">Name</th>
          <th class="border px-4 py-2">Address</th>
          <th class="border px-4 py-2">Product Count</th>
          <th class="border px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr class="text-center">
          <td class="border px-4 py-2">
            {{ $loop->iteration }}
          </td>
          <td class="border px-4 py-2">{{ $category->name }}</td>
          <td class="border px-4 py-2">{{ $category->description }}</td>
          <td class="border px-4 py-2">{{ $category->product_count }}</td>
          <td class="border px-4 py-2">
            <form onsubmit="return confirm('Are You Sure?');" action="{{ route('categories.destroy', $category->id) }}"
              method="POST">
              <a href="{{ route('categories.edit', $category->id) }}"
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
    {{ $categories->links() }}
  </div>
</x-layout>