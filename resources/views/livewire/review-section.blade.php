<div>

    @if($reviews)

    <!-- Form -->
    <div style="max-width:1200px;">

        <form class="flex items-center" wire:submit.prevent="save">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
                
                <input type="text" id="voice-search" wire:model="newReview"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pl-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Add review log" required="">
                
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                  </svg>
                  Review
            </button>
        </form>

        @error('newReview')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

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
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                            {{ $review->user->name }}</p>
                        <p class="mt-1 break-words text-xs leading-2 text-gray-500">
                            {{ $review->content }}</p>
                    </div>
                </div>



                <div class="flex flex-nowrap">



                    <div class="inline-flex sm:block mt-2">
                        <a href="#" wire:click="like({{ $review->id }})"
                            class="whitespace-nowrap rounded-md border-gray-300 
                                        border px-3.5 py-2.5 text-sm font-semibold
                                        {{ $review->liked() ? 'bg-teal-500 hover:bg-teal-800 text-white' : 'bg-gray-100' }}                                        
                                         hover:text-white shadow-sm hover:bg-gray-500 
                                         focus-visible:outline focus-visible:outline-2
                                          focus-visible:outline-offset-2 
                                          focus-visible:outline-indigo-600">
                            {{ $review->liked() ? 'Unlike' : 'Like' }} ({{ $review->likeCount }})
                        </a>
                    </div>

                    <div class="inline-flex sm:block">

                        {{-- <a href="#" wire:click="$emit('openModal', 'alert-danger', {{ json_encode(["idKey" => $review->id]) }})"
                                            class="inline-flex ml-2 rounded-md border-gray-300 
                                            border px-3.5 py-2.5 text-sm font-semibold
                                            bg-red-500 text-white hover:bg-red-700
                                             hover:text-white shadow-sm 
                                             focus-visible:outline focus-visible:outline-2
                                              focus-visible:outline-offset-2 
                                              focus-visible:outline-indigo-600">Delete</a> --}}

                        <a href="#" wire:click="confirmation" wire:loading.attr="disabled"
                            class="inline-flex ml-2 rounded-md border-gray-300 
                                                border px-3.5 py-2.5 text-sm font-semibold
                                                bg-red-500 text-white hover:bg-red-700
                                                 hover:text-white shadow-sm 
                                                 focus-visible:outline focus-visible:outline-2
                                                  focus-visible:outline-offset-2 
                                                  focus-visible:outline-indigo-600">Delete</a>
                    </div>

                </div>
            </li>
        @endforeach
    </ul>

    {{ $reviews->links() }}

    @endif

</div>
