{{-- resources/views/admin/universities/edit.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'Edit University')

@section('content')
<form action="{{ route('university.update', $university) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Name
                </label>
                <input type="text" name="name" id="name" value="{{ $university->name }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Description
                </label>
                <textarea name="description" id="description" rows="3" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $university->description }}</textarea>
            </div>
            <div class="mt-6">
                <label for="photos" class="block text-sm font-medium text-gray-700">Update Photos</label>
                <input type="file" name="photos[]" id="photos" multiple class="mt-1 block w-full">
                @foreach($university->photos as $photo)
                    <div class="flex items-center mt-2" id="photo_{{ $photo->id }}">
                        <img src="{{ Storage::url($photo->path) }}" alt="Photo" class="h-10 w-10 object-cover">
                        <button type="button" class="ml-4 text-red-500" onclick="deletePhoto({{ $photo->id }})">Delete</button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
            </button>
        </div>
    </div>
</form>
<script>
function deletePhoto(photoId) {
    fetch('/admin/university_photos/' + photoId, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('photo_' + photoId).remove();
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
