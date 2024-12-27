<x-layout>
  <x-slot:title>Users - Edit</x-slot:title>

  <div class="container mx-auto p-8">
    <form method="POST" action="{{ route('users.update', $user->id) }}">
      @csrf
      @method('PUT')
      <h2 class="text-2xl font-bold mb-6">Edit User</h2>

      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
        <input type="text" id="name" name="name"
          class="border border-gray-300 rounded-md py-2 px-3 w-full @error('name') is-invalid @enderror"
          placeholder="User Name" value="{{ old('name', $user->name) }}">
      </div>

      @error('name')
      <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">{{ $message }}</p>
      </div>
      @enderror

      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input type="email" id="email" name="email"
          class="border border-gray-300 rounded-md py-2 px-3 w-full @error('email') is-invalid @enderror"
          placeholder="User Email" value="{{ old('email', $user->email) }}">
      </div>

      @error('email')
      <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">{{ $message }}</p>
      </div>
      @enderror

      <div class="mb-4">
        <div class="flex items-center">
          <input type="radio" id="role-guest" name="role" value="guest" class="mr-2" {{ old('role', $user->role)=='guest' ?
          'checked' : '' }}>
          <label for="role-guest" class="text-gray-700 text-sm font-bold mb-2">Guest</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="role-admin" name="role" value="admin" class="mr-2" {{ old('role',
            $user->role)=='admin' ? 'checked' : '' }}>
          <label for="role-admin" class="text-gray-700 text-sm font-bold mb-2">Administrator</label>
        </div>
        @error('role')
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
          <p class="font-bold">{{ $message }}</p>
        </div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
        <input type="password" id="password" name="password"
          class="border border-gray-300 rounded-md py-2 px-3 w-full @error('password') is-invalid @enderror"
          placeholder="User Password" value="{{ old('password') }}">
      </div>

      <div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
        <a href="{{ route('users.index') }}"
          class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Back</a>
      </div>
    </form>
  </div>
</x-layout>