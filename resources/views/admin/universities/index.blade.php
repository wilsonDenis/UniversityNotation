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
                            <th scope="col" class="px-6 py-3 text-left text-lg font-medium text-gray-700 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-lg font-medium text-gray-700 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-lg font-medium text-gray-700 uppercase tracking-wider">
                                <i class="fa fa-cogs text-purple-500 text-lg"></i> Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($universities as $university)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-900">
                                <i class="fa fa-bookmark text-blue-500 text-lg"></i> {{ $university->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-lg text-gray-500">
                              {{ $university->description }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-lg font-medium">
                                <a href="{{ route('university.show', $university) }}" class="text-indigo-600 hover:text-indigo-900 inline-flex items-center">
                                    <i class="fa fa-eye text-xl mr-2"></i> View
                                </a>
                                <a href="{{ route('university.edit', $university) }}" class="text-indigo-600 hover:text-indigo-900 ml-4 inline-flex items-center">
                                    <i class="fa fa-edit text-xl mr-2"></i> Edit
                                </a>
                                <form action="{{ route('university.destroy', $university) }}" method="POST" class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 inline-flex items-center">
                                        <i class="fa fa-trash text-xl mr-2"></i> Delete
                                    </button>
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
