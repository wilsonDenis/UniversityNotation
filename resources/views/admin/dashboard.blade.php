@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <!-- Quick Stats -->
         <div class="mt-5 md:mt-0 md:col-span-3">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="border border-gray-200 rounded-lg p-4 flex items-center shadow-lg transition duration-500 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Total Universities</h2>
                            <p class="text-gray-500">{{ $universitiesCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="border border-gray-200 rounded-lg p-4 flex items-center shadow-lg transition duration-500 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Total Users</h2>
                            <p class="text-gray-500">{{ $usersCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="border border-gray-200 rounded-lg p-4 flex items-center shadow-lg transition duration-500 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Total Ratings</h2>
                            <p class="text-gray-500">{{ $ratingsCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Links -->
        <div class="mt-5 md:mt-0 md:col-span-3">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Management Quick Links</h3>
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('university.create') }}" class="p-3 bg-orange-400 text-white rounded hover:bg-orange-500 flex items-center justify-center">
                            <i class="fas fa-plus fa-lg"></i> Add University
                        </a>
                        <a href="{{ route('university.index') }}" class="p-3 bg-blue-500 text-white rounded hover:bg-blue-600 flex items-center justify-center">
                            <i class="fas fa-university fa-lg"></i> Manage Universities
                        </a>
                        <a href="{{ route('ratings.index') }}" class="p-3 bg-purple-500 text-white rounded hover:bg-purple-600 flex items-center justify-center">
                            <i class="fas fa-star fa-lg"></i> View Ratings
                        </a>
                        <a href="{{ route('comments.toAdmin') }}" class="p-3 bg-green-500 text-white rounded hover:bg-green-600 flex items-center justify-center">
                            <i class="fas fa-comments fa-lg"></i> manage comment
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
