<form method="POST" action="{{ route('logout') }}" class="inline-block">
    @csrf
    @method('DELETE')

    <button type="submit" class="text-red-600 hover:underline">
        Logout
    </button>
</form>