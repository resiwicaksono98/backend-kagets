<x-app-layout>
    
    <x-slot name="header">
        Edit News : {{ $news->title }}
    </x-slot>
    @if (session('success'))
        <div class="font-semibold text-lg text-green-800 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('news.edit', $news->slug) }}" method="post" enctype="multipart/form-data" novalidate>
        @method('put')
        @csrf
        <div class="mb-5">
            <x-label for="category" :value="__('Category')" />
            <select name="category[]" id="category" multiple
                class="mt-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Choose_category" disabled  >Pilih Category</option>
                @foreach ($category as $item)
       
                    <option value="{{ $item->id }}" {{ $news->categories()->find($item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <x-label for="title" :value="__('Title')" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $news->title"
                autofocus />
            @error('title')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <x-label for="description" :value="__('Description')" />
            <textarea name="description" id="description" rows="10"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Description News">{{ $news->description }}</textarea>
            @error('description')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="rate" :value="__('Rate')" />
            <x-input id="rate" class="block mt-1 w-full" type="number" name="rate" :value="old('rate') ?? $news->rate"
                required autofocus />
            @error('rate')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="picture_path" :value="__('Picture Path')" />
            <div class="w-full lg:w-1/2">
                <img class="rounded-lg w-full mb-6" src="{{ $news->picture }}" alt="{{ $news->title }}">
            </div>
            <input type="file" name="picture_path" id="picture_path" class="mt-2">
            @error('picture_path')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <x-button class="bg-blue-500 hover:bg-blue-700">Update</x-button>
    </form>
</x-app-layout>
