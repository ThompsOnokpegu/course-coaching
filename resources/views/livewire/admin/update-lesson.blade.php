<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-black md:text-3xl lg:text-4xl">{{ __('Update Lesson') }}</h1>
            <div class="max-w-xl">
                <form wire:submit="save">
                    <input type="hidden" name="lesson_id" wire:model="lesson_id">
                    <x-input-label for="topic" :value="__('Choose Topic')" />
                    <select id="topic_id" wire:model="topic_id" name="topic_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">   
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" {{ $topic->id == old('topic_id',$topic_id) ? 'selected' : '' }}>
                                {{ $topic->title }}
                            </option>
                        @endforeach 
                    </select>
                    <div class="mt-3">
                        <x-input-label for="title" :value="__('Lesson Title')" />
                        <x-text-input wire:model="title" id="title" name="title" value="{{ $title }}" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-textarea wire:model="content" id="content" name="content" value="{{ $topic_id }}" type="textarea" id="message" rows="4" class="mt-1 block w-full" placeholder="Write your thoughts here..." autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('content')" />
                    </div> 
                    <div class="mt-3">
                        <x-input-label for="video_url" :value="__('Video URL')" />
                        <x-text-input wire:model="video_url" id="video_url" name="video_url" value="{{ $video_url }}" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>      
                    <div class="flex items-center gap-4 mt-5">
                        <x-primary-button>{{ __('Save Lesson') }}</x-primary-button>
            
                        <x-action-message class="me-3" on="lesson-saved">
                            {{ __('Lesson saved.') }}
                        </x-action-message>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

