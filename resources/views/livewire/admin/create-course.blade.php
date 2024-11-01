

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <form wire:submit="save">
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input wire:model="title" id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea wire:model="description" id="description" name="description" type="textarea" id="message" rows="4" class="mt-1 block w-full" placeholder="Write your thoughts here..." required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>
                    <div class="flex items-center gap-4 mt-5">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
            
                        <x-action-message class="me-3" on="course-created">
                            {{ __('Course created.') }}
                        </x-action-message>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

