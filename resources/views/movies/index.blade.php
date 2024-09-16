<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $movie->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="movie-card grid grid-cols-2 gap-5">
                        <a href="{{ config('app.tmdb.images_url').$movie->poster_path }}" target="_blank"><img src="{{ config('app.tmdb.images_url').$movie->poster_path }}" class="w-100"></a>
                        <div>
                            <h5>Realease date : <i>{{ date('d/m/Y', strtotime($movie->release_date)) }}</i></h5>
                            <h5>Popularity : <i>{{ $movie->popularity }}</i></h5>
                            ⭐{{ $movie->vote_average }} 👍{{ $movie->vote_count }}
                            
                            <p class="mt-6">{{ $movie->overview }}</p>

                            <div class="edit mt-6">
                                <a href="{{ route('movie.edit', $movie->id) }}" class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-movie-deletion')"
                                >Delete movie</x-danger-button>

                                <x-modal name="confirm-movie-deletion" focusable>
                                    <form method="post" action="{{ route('movie.delete') }}" class="p-6">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="movieID" value="{{ $movie->id }}">

                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            Are you sure you want to delete this movie?
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            Once this movie is deleted, you'll have to re-run the `movie:trending` command to retrieve it.
                                        </p>

                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>

                                            <x-danger-button class="ms-3">
                                                Delete movie
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                            </div>
                        </div>
                    </div>

                    <div></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>