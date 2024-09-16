<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Daily movies trending</h3>

                    <div id="movies-list" class="my-5 grid grid-cols-5 gap-5">
                        @foreach($movies as $movie)
                        <div class="movie-card">
                            <a href="{{ route('movie.show', $movie->id) }}">
                                <img src="{{ config('app.tmdb.images_url').$movie->poster_path }}" class="w-100">
                            </a>
                            <h4 class="movie-title uppercase font-bold my-2">{{ $movie->title }}</h4>
                            <p>{{ $movie->overview }}</p>
                        </div>
                        @endforeach

                    </div>

                    {{ $movies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
