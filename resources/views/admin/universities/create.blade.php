{{-- Enhanced resources/views/admin/universities/create.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'Create University')

@section('content')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<form action="{{ route('universities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200">
    @csrf
    <div class="space-y-8 divide-y divide-gray-200">
        <div class="pt-8">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">University Information</h3>
                <p class="mt-1 text-sm text-gray-500">
                    Use this form to add a new university.
                </p>
            </div>
            <div class="mt-6">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Name
                </label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Description
                </label>
                <textarea name="description" id="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                <script>
                    CKEDITOR.replace('description');
                </script>
            </div>
            <div class="mt-6">
                <label for="photos" class="block text-sm font-medium text-gray-700">
                    Photos
                </label>
                <input type="file" name="photos[]" id="photos" multiple class="mt-1 block w-full">
            </div>
        </div>
    </div>
    <div class="pt-5">
        <div class="flex justify-end">
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</form>
@endsection
