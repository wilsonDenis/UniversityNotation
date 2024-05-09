
@extends('admin.layouts.admin')  

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-semibold text-gray-800">University Comments</h1>

    @foreach ($comments as $comment)
        <div class="bg-white p-4 rounded-lg shadow mb-4 flex justify-between items-center">
            <div>
                <p class="font-bold">{{ $comment->user->name }} - <small>{{ $comment->created_at->format('Y-m-d H:i') }}</small></p>
                <p>{{ $comment->content }}</p>
            </div>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection
