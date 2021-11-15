<x-app-layout>
   <x-slot name="header">
       Create New News
   </x-slot>
    @if (session('success'))
    <div class="font-semibold text-lg text-green-800 p-3 text-center">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('news.create') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="mb-5">
            <x-label for="category" class="mb-2" :value="__('Category')" />
            <select  multiple name="category[]" id="category"
                class="mt-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Choose_category" disabled>Pilih Category</option>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <x-label for="title" :value="__('Title')" />
            <x-input placeholder="Title News" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus />
            @error('title')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <x-label for="description" :value="__('Description')" />
            <textarea name="description" id="description" rows="10"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Description News"></textarea>
            @error('description')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="rate" :value="__('Rate')" />
            <x-input placeholder="max 5.0" id="rate" class="block mt-1 w-full" type="number" name="rate" :value="old('rate')" required
                autofocus />
            @error('rate')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="picture_path" :value="__('Picture Path')" />
            <input type="file" name="picture_path" id="picture_path" class="mt-2">
            @error('picture_path')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>


        <x-button class="bg-blue-500 hover:bg-blue-700">Create</x-button>
    </form>
   
</x-app-layout>
