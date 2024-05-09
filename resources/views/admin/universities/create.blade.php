@extends('admin.layouts.admin')

@section('title', 'Create University')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-2xl bg-white shadow-xl rounded-lg px-10 pt-8 pb-10 mb-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-2xl">
        <h2 class="text-2xl font-semibold leading-tight mb-6 text-center">Add New University</h2>
        <form id="createUniversityForm" action="{{ route('university.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input type="text" name="name" id="name" placeholder="Enter university name" required class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-red-500 text-xs italic mt-2 hidden" id="nameError">Please enter the university name.</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea name="description" id="description" rows="3" placeholder="Enter description" required class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                <p class="text-red-500 text-xs italic mt-2 hidden" id="descriptionError">Please enter the description.</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="location">
                    Location
                </label>
                <input type="text" name="location" id="location" placeholder="Enter location" required class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-red-500 text-xs italic mt-2 hidden" id="locationError">Please enter the location.</p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="photos">
                    Upload Photos
                </label>
                <input type="file" name="photos[]" id="photos" multiple class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Create University
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('createUniversityForm').onsubmit = function(event) {
        let hasError = false;
        ['name', 'description', 'location'].forEach(field => {
            const input = document.getElementById(field);
            const error = document.getElementById(field + 'Error');
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                error.classList.remove('hidden');
                hasError = true;
            } else {
                input.classList.remove('border-red-500');
                error.classList.add('hidden');
            }
        });

        const files = document.getElementById('photos').files;
        if (files.length !== 2) {
            alert('Please select exactly two photos.');
            hasError = true;
        }

        if (hasError) {
            event.preventDefault(); 
        }
    };
</script>
@endsection
