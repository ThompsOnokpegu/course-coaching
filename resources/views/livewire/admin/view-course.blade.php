<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-black md:text-3xl lg:text-4xl">{{ $course->title }}</h1>
            <div class="max-w-xl">
                <form wire:submit="save">
                    <input type="hidden" name="course_id" wire:model="course_id">
                    <div>
                        <x-input-label for="title" :value="__('Topic Title')" />
                        <x-text-input wire:model="title" id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
                    
                    <div class="flex items-center gap-4 mt-5">
                        <x-primary-button>{{ __('Add Topic') }}</x-primary-button>
            
                        <x-action-message class="me-3" on="topic-created">
                            {{ __('Topic created.') }}
                        </x-action-message>
                    </div>
                </form>
            </div>
            <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lessons
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Course
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $topics as $topic )
                            <tr wire:key="{{ $topic->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $topic->title }}
                                </th>
                                <td class="px-6 py-4">
                                    9
                                </td>
                                <td class="px-6 py-4">
                                    {{ $topic->course->title }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('topic.view',['id'=>$topic->id]) }}" wire:navigate class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>  
                        @empty
                            <tr>
                                <td class="px-6 py-4">No records found</td>
                            </tr>
                        @endforelse         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
