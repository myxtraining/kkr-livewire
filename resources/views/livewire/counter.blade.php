<div>

    
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Counter') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <div class="relative isolate px-6 lg:px-8">
                            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                                aria-hidden="true">
                                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                                </div>
                            </div>
                            <div class="mx-auto max-w-2xl">
                                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                                    <div
                                        class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                                        Announcing our next round of funding. <a href="#"
                                            class="font-semibold text-indigo-600"><span class="absolute inset-0"
                                                aria-hidden="true"></span>Read more <span
                                                aria-hidden="true">&rarr;</span></a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                                        {{ $counter }}</h1>
                                    <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non
                                        deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat
                                        veniam
                                        occaecat fugiat aliqua.</p>
                                    <div class="mt-10 flex items-center justify-center gap-x-6">
                                        <a href="#" wire:click="add"
                                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</a>
                                        <a href="#" wire:click="minus"
                                            class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Minus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                                aria-hidden="true">
                                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-danger-button wire:click="confirmation" wire:loading.attr="disabled">
            {{ __('Delete Account') }}
        </x-danger-button>

        <x-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                Delete Post
            </x-slot>

            <x-slot name="content">
                Content
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('showModal)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>

        <x-action-section>
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Permanently delete your account.') }}
            </x-slot>

            <x-slot name="content">
                <div class="max-w-xl text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </div>

                <div class="mt-5">
                    <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>

                <!-- Delete User Confirmation Modal -->
                <x-dialog-modal wire:model="confirmingUserDeletion">
                    <x-slot name="title">
                        {{ __('Delete Account') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                        <div class="mt-4" x-data="{}"
                            x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                            <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                                placeholder="{{ __('Password') }}" x-ref="password" wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                            <x-input-error for="password" class="mt-2" />
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </x-slot>
                </x-dialog-modal>
            </x-slot>
        </x-action-section>


    

</div>
