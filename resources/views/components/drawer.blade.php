<div class="drawer">
  <input id="my-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col">
    <!-- Navbar -->
    {{ $slot }}
    {{-- Content --}}
    {{ $content }}
  </div>
  <div class="drawer-side">
    <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 w-80 min-h-full bg-base-200 font-semibold">
      <li class="font-bold">
        <a>
          Hi, {{ Auth::user()->name }}!
        </a>
      </li>
      <li><a href="{{ route('users.index') }}">Users</a></li>
      <li><a href="{{ route('categories.index') }}">Categories</a></li>
      <li><a href="{{ route('products.index') }}">Products</a></li>
      <div class="divider my-0"></div>
      <li class="font-bold">
        <x-logout />
      </li>
    </ul>
  </div>
</div>