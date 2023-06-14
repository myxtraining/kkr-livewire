<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                    <div class="mx-auto grid max-w-6xl grid-cols-12 gap-4 bg-zinc-50 p-1">
                        
                        <div class="col-span-12 rounded-lg border  p-2 sm:col-span-8">                            
                            @livewire('log.log')
                        </div>
                        <div class="col-span-12 rounded-lg border  p-2 sm:col-span-4">
                            @livewire('review')
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
