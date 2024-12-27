<x-layout>
  <x-slot:title>Users - Show</x-slot:title>

  <div class="container mx-auto p-8">
    <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
      <div class="bg-indigo-500 text-center py-4">
        <h2 class="text-xl font-bold text-white">User Data #{{ $user->id }}</h2>
      </div>
      <div class="p-6">
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Name:</p>
          <p class="text-lg">{{ $user->name }}</p>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Email:</p>
          <p class="text-lg">{{ $user->email }}</p>
        </div>
        <div class="mb-4">
          <p class="text-gray-600 font-semibold">Role:</p>
          <p class="text-lg">{{ ucwords($user->role) }}</p>
        </div>
        <div class="mb-4">
          <a href="{{ route('users.update', $user->id) }}"
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
          <a href="{{ route('users.index') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</x-layout>