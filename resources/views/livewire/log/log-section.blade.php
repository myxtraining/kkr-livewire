<div>

    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <button wire:click="create()"
                    class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.866.966 1.866 2.013 0 3.728-2.35 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.046.83-1.867 1.866-2.013A24.204 24.204 0 0112 12.75zm0 0c2.883 0 5.647.508 8.207 1.44a23.91 23.91 0 01-1.152 6.06M12 12.75c-2.883 0-5.647.508-8.208 1.44.125 2.104.52 4.136 1.153 6.06M12 12.75a2.25 2.25 0 002.248-2.354M12 12.75a2.25 2.25 0 01-2.248-2.354M12 8.25c.995 0 1.971-.08 2.922-.236.403-.066.74-.358.795-.762a3.778 3.778 0 00-.399-2.25M12 8.25c-.995 0-1.97-.08-2.922-.236-.402-.066-.74-.358-.795-.762a3.734 3.734 0 01.4-2.253M12 8.25a2.25 2.25 0 00-2.248 2.146M12 8.25a2.25 2.25 0 012.248 2.146M8.683 5a6.032 6.032 0 01-1.155-1.002c.07-.63.27-1.222.574-1.747m.581 2.749A3.75 3.75 0 0115.318 5m0 0c.427-.283.815-.62 1.155-.999a4.471 4.471 0 00-.575-1.752M4.921 6a24.048 24.048 0 00-.392 3.314c1.668.546 3.416.914 5.223 1.082M19.08 6c.205 1.08.337 2.187.392 3.314a23.882 23.882 0 01-5.223 1.082" />
                    </svg>
                    New Log</button>
                @if ($isOpen)
                    @include('livewire.log.create')
                @endif
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-10">No.</th>
                            <th class="px-4 py-2 text-start">Title</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td class="border px-4 py-2">{{ $log->id }}</td>
                                <td class="border px-4 py-2">{{ $log->title }}</td>
                                <td class="border px-4 py-2 text-end">

                                    {{-- <button wire:click="edit({{ $log->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</button> --}}
                                    <a href="{{ route('review', ['log' => $log->id]) }}"
                                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">View</a>
                                    <a wire:click="$emit('select-log', {{ $log->id }})"
                                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Emit</a>
                                    <a wire:click="edit({{ $log->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <a wire:click="delete({{ $log->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
