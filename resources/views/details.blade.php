<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4 text-orange-500">{{ $university->name }}</h2>
                    <p class="mb-4"><h3>{{ $university->description }}</h3></p> 
                    <p class="mb-4  text-purple-500">{{ $university->location }}</p>
                    <div class="relative mb-4 rounded-lg overflow-hidden shadow-lg" style="height: 250px;">
                        @foreach($university->photos as $photo)
                            <img src="{{ Storage::url($photo->path) }}" alt="Photo of {{ $university->name }}" class="absolute inset-0 w-full h-full object-cover opacity-0" style="transition: opacity 1s;">
                        @endforeach
                    </div>
                    <div class="rating" data-id="{{ $university->id }}">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="rating-star fa fa-star{{ $i <= round($rating) ? '' : '-o' }} text-yellow-400 cursor-pointer" data-rate="{{ $i }}"></i>
                        @endfor
                        <span class="text-sm text-gray-600">({{ number_format($rating, 1) }} stars)</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Add a Comment and Rate</h3>
                    <form id="commentForm" action="{{ route('comments.store', $university) }}" method="POST">
                        @csrf
                        <textarea name="content" class="w-full h-16 border-none focus:ring-orange-500 focus:border-orange-500 mt-1 p-2 shadow-lg" placeholder="Add a comment..." required></textarea>
                        <input type="number" name="rating" id="ratingValue" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Rate (1-5)" min="1" max="5" required>
                        <div class="flex justify-between items-center">
                            <button type="button" onclick="history.back()" class="mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow-lg"><i class="fas fa-arrow-left"></i> Back</button>
                            <button type="submit" class="mt-4 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded shadow-lg"><i class="fas fa-check"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <script>
        let images = document.querySelectorAll('.relative img');
        let currentIndex = 0;

        function showNextImage() {
            images[currentIndex].style.opacity = 0;
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].style.opacity = 1;
        }

        setInterval(showNextImage, 4900);

        document.querySelectorAll('.rating-star').forEach(star => {
            star.onclick = function() {
                const rating = parseInt(this.getAttribute('data-rate'));
                document.getElementById('ratingValue').value = rating;
                updateStars(rating);
            };
        });

        function updateStars(rating) {
            const stars = document.querySelectorAll('.rating-star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('fa-star-o');
                    star.classList.add('fa-star');
                } else {
                    star.classList.remove('fa-star');
                    star.classList.add('fa-star-o');
                }
            });
        }
    </script>
</x-app-layout>
