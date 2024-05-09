<div class="bg-gray-800 w-64 min-h-screen flex flex-col justify-between">
    <div>
        <div class="bg-gray-900 px-5 py-4 flex items-center relative">
            <div class="relative">
                <img src="{{ asset('images/logo.jpg') }}" alt="Admin Logo" class="h-11 w-11 rounded-full">
              
                <span
                    class="absolute bottom-0 right-0 block h-3 w-3 bg-green-500 rounded-full border-2 border-gray-900"></span>
            </div>
            <span class="text-white text-lg font-semibold ml-3">Admin</span>
        </div>


        <ul class="flex-grow px-4 mt-4">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('university.index') }}"
                    class="flex items-center text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                    <i class="fas fa-university mr-2"></i> Gerer Universities
                </a>
            </li>
            <li>
                <a href="{{ route('ratings.index') }}"
                    class="flex items-center text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                    <i class="fas fa-star-half-alt mr-2"></i> View Ratings
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"
                    class="flex items-center text-gray-300 hover:text-white py-2 px-4 transition duration-150">
                    <i class="fas fa-users mr-2"></i> Manage Users
                </a>

            </li>
        </ul>
    </div>

    <div class="px-4 pb-4">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="w-full text-center bg-red-600 hover:bg-red-700 text-white py-2 px-4 transition duration-150">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
