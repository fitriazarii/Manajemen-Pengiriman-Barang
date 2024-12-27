<div class="navbar bg-primary">
    <div class="flex-1">
        <label for="my-drawer" aria-label="open sidebar" class="btn btn-primary drawer-button lg:hidden">
            <x-hamburger />
        </label>
        <a class="text-xl text-white font-bold" href="{{ route('products.index') }}">
            Pengiriman
        </a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1 font-semibold">
            @if (Auth::user()->role === 'admin')
            <li><a class="hidden lg:block text-white" href="{{ route('users.index') }}">Users</a></li>
            <li><a class="hidden lg:block text-white" href="{{ route('categories.index') }}">Categories</a></li>
            <li><a class="hidden lg:block text-white" href="{{ route('products.index') }}">Products</a></li>
            @endif
            <li>
                <details>
                    <summary class="text-white">
                        Hi, {{ Auth::user()->name }}!
                    </summary>
                    <ul class="p-2 bg-base-100 rounded-t-none">
                        <li class="font-bold">
                            <x-logout />
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</div>