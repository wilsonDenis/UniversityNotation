{{-- resources/views/admin/users/index.blade.php --}}
@extends('admin.layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Manage Users</h1>
    </div>

    @foreach ($users as $user)
        <div class="bg-white p-4 rounded-lg shadow mb-4 flex justify-between items-center">
            <div>
                <p class="font-bold">{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
            </div>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
