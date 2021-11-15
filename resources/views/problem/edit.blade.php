<x-app-layout>
    <x-slot name="header">
        Edit Problem
    </x-slot>
     @if (session('success'))
     <div class="font-semibold text-lg text-green-800 p-3 text-center">
         {{ session('success') }}
     </div>
     @endif
     <form action="{{ route('problem.edit', $problem->slug) }}" method="post" novalidate>
         @csrf
         @method('put')
         <div class="mb-5">
             <x-label for="name" :value="__('Name')" />
             <x-input placeholder="Problem Name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $problem->name" autofocus />
             @error('name')
                 <div class="text-red-500 mt-2">{{ $message }}</div>
             @enderror
         </div>
 
         <x-button class="bg-blue-500 hover:bg-blue-700">Update</x-button>
     </form>
 </x-app-layout>
 