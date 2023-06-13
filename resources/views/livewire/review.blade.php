<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                    <!-- Form -->
                    <div style="max-width:1200px;">

                        <form class="flex items-center" wire:submit.prevent="save">
                            <label for="voice-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="voice-search" wire:model="newReview"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search Mockups, Logos, Design Templates..." required="">
                                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3">
                                    <svg aria-hidden="true"
                                        class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg aria-hidden="true" class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>Search
                            </button>
                        </form>

                    </div>

                    <!-- List -->
                    <ul role="list" class="divide-y divide-gray-100">

                        @foreach ($reviews as $review)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $review['name'] }}</p>
                                        <p class="mt-1 truncate text-xs leading-2 text-gray-500">
                                            {{ $review['content'] }}</p>
                                    </div>
                                </div>
                                <div class="hidden sm:flex sm:flex-col sm:items-end">                                    
                                    <p class="mt-4 text-xs leading-5 text-gray-500">
                                        <a href="#" 
                                        class=" rounded-md bg-gray-100 border-gray-300 border px-3.5 py-2.5 text-sm font-semibold text-gray-500 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Like</a>
                                    </p>
                                </div>
                            </li>
                        @endforeach



                    </ul>


                </div>
            </div>
        </div>
    </div>

</div>
