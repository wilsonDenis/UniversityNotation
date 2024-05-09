

@extends('admin.layouts.admin')

@section('title', 'Note')

@section('content')
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">Ratings</h2>
                    @if($ratings->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">University</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($ratings as $rating)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $rating->university->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $rating->user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $rating->score }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $rating->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">No ratings found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
