{{-- resources/views/admin/universities/index.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'All Universities')

@section('content')
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($universities as $university)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $university->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $university->description }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('universities.show', $university) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="{{ route('universities.edit', $university) }}" class="text-indigo-600 hover:text-indigo-900 ml-4">Edit</a>
                                <a href="{{ route('university_photos.index', $university) }}" class="text-blue-600 hover:text-blue-900 ml-4">Photos</a>
                                <form action="{{ route('universities.destroy', $university) }}" method="POST" class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
