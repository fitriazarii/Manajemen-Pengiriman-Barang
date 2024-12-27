<x-layout>
  <x-slot:title>Users - Index</x-slot:title>

  <div class="container mx-auto p-8">
    <div class="flex justify-between items-center">
      <h1 class="text-3xl font-bold mb-2">Users Data</h1>
      <a href="{{ route('users.create') }}" class="text-white">
        <button class="bg-primary rounded px-4 py-2 hover:bg-primary/90">
          Add User
        </button>
      </a>
    </div>

    <div class="overflow-x-scroll">
      <table id="dataTables" class="table-auto border-collapse w-full mt-4">
        <thead>
          <tr class="text-center">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr class="text-center">
            <td class="border px-4 py-2">
              {{ $loop->iteration }}
            </td>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email }}</td>
            <td class="border px-4 py-2">
              <form onsubmit="return confirm('Are You Sure?');" action="{{ route('users.destroy', $user->id) }}"
                method="POST">
                <a href="{{ route('users.show', $user->id) }}"
                  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Show</a>
                <a href="{{ route('users.edit', $user->id) }}"
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
    {{ $users->links() }}
  </div>
</x-layout>