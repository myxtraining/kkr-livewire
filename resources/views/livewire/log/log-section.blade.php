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
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 ">
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
                                        class="bg-teal-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>                                    
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
