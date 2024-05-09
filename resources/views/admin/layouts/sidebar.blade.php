<!-- resources/views/admin/layouts/sidebar.blade.php -->
<div class="bg-gray-800 w-64 min-h-screen flex flex-col">
    <!-- Logo or Brand Name -->
    <div class="bg-gray-900 px-5 py-4 flex items-center">
        {{-- <img src="{{ asset('images/logo.png') }}" alt="Admin Logo" class="h-8 w-8 mr-2"> --}}
        <span class="text-white text-lg font-semibold">Admin Panel</span>
    </div>

    <!-- Navigation Links -->
    <ul class="flex-grow px-4">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="block text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('university.index') }}" class="block text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                Gerer Universities
            </a>
        </li>
        <li>
            <a href="{{ route('critere.index') }}" class="block text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                Manage Criteria
            </a>
        </li>
        <li>
            <a href="{{ route('ratings.index') }}" class="block text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                View Ratings
            </a>
        </li>
        <li>
            <a href="{{ route('university_photos.index') }}" class="block text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                Manage Photos
            </a>
        </li>
    </ul>

    <!-- Log out -->
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="mb-4 bg-red-600 hover:bg-red-700 text-white py-2 px-4 transition duration-150">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
