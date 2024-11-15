

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-black md:text-3xl lg:text-4xl">{{ __('Add New Course') }}</h1>
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
            <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Topics
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr wire:key="{{ $course->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $course->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $course->description }}
                                </td>
                                <td class="px-6 py-4">
                                    9
                                </td>
                                
                                <td class="px-6 py-4">
                                    <a href="{{ route('course.view',['id'=>$course->id]) }}" wire:navigate class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>  
                        @endforeach
                                              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

