<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($universities) && $universities->count() > 0)
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Universities</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($universities as $university)
                                    <div class="bg-white shadow-lg rounded-lg p-4 hover:scale-105 transform transition duration-500 ease-in-out">
                                        <h3 class="font-bold text-orange-500">{{ $university->name }}</h3>
                                        <p>{{ $university->description }}</p>
                                        <div class="my-2 rating" data-id="{{ $university->id }}">
                                            @php $rating = $university->ratings->avg('score'); @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= round($rating))
                                                    <i class="fas fa-star text-yellow-400"></i>
                                                @else
                                                    <i class="far fa-star text-gray-400"></i>
                                                @endif
                                            @endfor
                                            <span class="text-sm text-gray-600">({{ number_format($rating, 1) }} stars)</span>
                                        </div>
                                        <div class="flex flex-wrap justify-center">
                                            @foreach ($university->photos as $photo)
                                                <img src="{{ Storage::url($photo->path) }}"
                                                    alt="Photo of {{ $university->name }}"
                                                    class="object-cover mr-2 mb-2 rounded-lg shadow cursor-pointer hover:shadow-lg transition-shadow duration-300"
                                                    style="height: 240px; width: 100%;">
                                            @endforeach
                                        </div>
                                        <div class="flex justify-between mt-4">
                                            <a href="{{ route('universities.details', $university) }}"
                                                class="text-blue-500 hover:text-blue-700">
                                                <i class="fas fa-eye"></i> Details
                                            </a>
                                            <a href="{{ route('universities.comments', $university) }}"
                                                class="text-green-500 hover:text-green-700">
                                                <i class="fas fa-comments"></i> All Comments
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p>No universities to display.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
