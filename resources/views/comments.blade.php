{{-- resources/views/comments.blade.php --}}
<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold text-gray-800">Comments</h1>
            <a href="{{ url()->previous() }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded shadow">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        @forelse($comments as $comment)
            <div class="bg-white p-4 rounded-lg shadow mb-4">
                <div class="flex items-center mb-2">
                    <i class="fas fa-user-circle text-gray-700 mr-2"></i>
                    <h5 class="font-bold">{{ $comment->user->name }}</h5>
                </div>
                <div class="mb-2">
                    <i class="fas fa-clock text-gray-500 mr-1"></i>
                    <small class="text-sm text-gray-600">{{ $comment->created_at->format('Y-m-d H:i') }}</small>
                </div>
                <p>{{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-gray-600">No comments to display.</p>
        @endforelse
    </div>
</x-app-layout>
