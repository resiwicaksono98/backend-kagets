<x-app-layout>
    {{ $mitra = '' }}
    <x-slot name="header">
        Create New Complaint
    </x-slot>
     @if (session('success'))
     <div class="font-semibold text-lg text-green-800 p-3 text-center">
         {{ session('success') }}
     </div>
     @endif
     <form action="{{ route('complaint.create') }}" method="post" enctype="multipart/form-data" novalidate>
         @csrf
         <div class="mb-5">
             <x-label for="user_id" class="mb-2" :value="__('Pilih User')" />
             <select  name="user_id" id="user_id"
                 class=" w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                 <option value="Choose User" disabled>Pilih User</option>
                 @foreach ($user as $item)
                     <option value="{{ $item->id }} ">{{ $item->name }}</option>
                 @endforeach
               
             </select>
         </div>
         <div class="mb-5">
             <x-label for="mitra_type" class="mb-2p" :value="__('Mitra Type')" />
             <select  name="mitra_type" id="mitra_type"
             class=" w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
             <option value="Choose User" disabled>Pilih User</option>
             @foreach ($categories as $item)
                 <option value="{{ $item->name }} ">{{ $item->name }}</option>
             @endforeach
           
         </select>
         </div>

         <div class="mb-5">
             <x-label for="problem" class="mb-2p" :value="__('Problem')" />
             <select name="problem" id="problem"
                 class="mt-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                 <option value="Choose Mitra Type" disabled>Pilih Problem</option>
                 @foreach ($problems as $item)
                     <option value="{{ $item->name }}">{{ $item->name }}</option>
                 @endforeach
             </select>
             
         </div>
      
         <div class="mb-5">
             <x-label for="description" :value="__('Description')" />
             <textarea name="description" id="description" rows="10"
                 class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 placeholder="Description Complaint"></textarea>
             @error('description')
                 <div class="text-red-500 mt-2">{{ $message }}</div>
             @enderror
         </div>
         <div class="mb-5">
             <x-label for="support_image" :value="__('Support Image')" />
             <input type="file" name="support_image" id="support_image" class="mt-2">
             @error('support_image')
                 <div class="text-red-500 mt-2">{{ $message }}</div>
             @enderror
         </div>
 
 
         <x-button class="bg-blue-500 hover:bg-blue-700">Create</x-button>
     </form>
    
 </x-app-layout>
 