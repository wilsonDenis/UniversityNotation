{{-- resources/views/admin/universities/show.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'View University')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-900">
            <i class="ri-bookmark-line text-blue-500"></i> {{ $university->name }}
        </h3>
        <a href="{{ route('university.edit', $university) }}" class="text-indigo-600 hover:text-indigo-900"><i class="ri-edit-line"></i> Edit</a>
    </div>
    <p class="text-gray-500 mb-4">
        {{ $university->description }}
    </p>
    <div class="mt-4">
        <h4 class="text-lg font-medium text-gray-900 mb-2">Photos</h4>
        <div class="grid grid-cols-3 gap-4">
            @foreach($university->photos as $photo)
                <img src="{{ Storage::url($photo->path) }}" alt="Photo of {{ $university->name }}" class="w-full h-32 object-cover rounded-lg">
            @endforeach
        </div>
    </div>
    <div class="mt-6">
        <form action="{{ route('university.destroy', $university) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900"><i class="ri-delete-bin-line"></i> Delete</button>
        </form>
    </div>
</div>
@endsection
