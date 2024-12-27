<x-layout>
  <x-slot:title>Categories - Edit</x-slot:title>

  <div class="container mx-auto mt-5 mb-5">
    <div class="shadow-sm rounded-md p-5">
      <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-4">
          <label class="font-semibold">Name</label>
          <input type="text" class="p-2 w-full mt-1 border-2 rounded-md @error('name') border-red-500 @enderror"
            name="name" value="{{ old('name', $category->name) }}" placeholder="Category Name">

          <!-- error message untuk name -->
          @error('name')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-4">
          <label class="font-semibold">Address</label>
          <textarea class="p-2 w-full mt-1 border-2 rounded-md @error('description') border-red-500 @enderror"
            name="description" rows="5"
            placeholder="Categort Description">{{ old('description', $category->description) }}</textarea>

          <!-- error message untuk description -->
          @error('description')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mt-4">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
          <a href="{{ route('categories.index') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md inline-block mb-1">Back</a>
        </div>

      </form>
    </div>
  </div>
</x-layout>