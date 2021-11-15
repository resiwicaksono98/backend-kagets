<x-app-layout>
    <x-slot name="header">
        Edit User : {{ $user->name }}
    </x-slot>
    @if (session('success'))
        <div class="font-semibold text-lg text-green-800 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('user.edit', $user->name) }}" method="post" enctype="multipart/form-data" novalidate>
        @method('put')
        @csrf
     
        <div class="mb-5">
            <x-label for="category" :value="__('Category')" />
            <select name="category" id="category"
                class="mt-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Choose_category" disabled  >Pilih Category</option>
                @foreach ($category as $item)
                    <option value="{{ $item->name }}" {{  $user->mitra_type == $item->name ? 'selected' : '' }}>{{ $item->name }} </option>
                @endforeach
               
            </select>
        </div>
        <div class="mb-5">
            <x-label for="name" :value="__('Nama ')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $user->name"
                autofocus />
            @error('name')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="email" :value="__('Email ')" />
            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email') ?? $user->email"
                autofocus />
            @error('email')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="username" :value="__('Username ')" />
            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username') ?? $user->username"
                autofocus />
            @error('username')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="phone_number" :value="__('Phone Number ')" />
            <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number') ?? $user->phone_number"
                autofocus />
            @error('phone_number')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="address" :value="__('Address ')" />
            <textarea name="address" id="address" rows="10"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Description Complaint">{{ $user->address }}</textarea>
            @error('address')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <x-label for="picture_path" :value="__('Picture Path')" />
            <div class="w-full lg:w-3/12">
                <img class="rounded-lg w-full mb-6" src="{{ $user->picture }}"
                    alt="{{ $user->mitra_type }}">
            </div>
            <input type="file" name="picture_path" id="picture_path" class="mt-2">
            @error('picture_path')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

    
        <x-button class="bg-blue-500 hover:bg-blue-700">Update</x-button>
    </form>
</x-app-layout>
