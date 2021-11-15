<x-app-layout>
    <x-slot name="header">
        Create New Category
    </x-slot>
     @if (session('success'))
     <div class="font-semibold text-lg text-green-800 p-3 text-center">
         {{ session('success') }}
     </div>
     @endif
     <form action="{{ route('category.create') }}" method="post" novalidate>
         @csrf
         <div class="mb-5">
             <x-label for="name" :value="__('Name')" />
             <x-input placeholder="Category Name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
             @error('name')
                 <div class="text-red-500 mt-2">{{ $message }}</div>
             @enderror
         </div>
        
 
         <x-button class="bg-blue-500 hover:bg-blue-700">Create</x-button>
     </form>
 </x-app-layout>
 