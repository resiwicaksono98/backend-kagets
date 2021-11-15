<x-app-layout>
    <!-- Profile Card -->
    <x-slot name="header">
        Profile {{ $complaint->user->name }}
    </x-slot>
    <div>
        <div class=" flex item-center text-center md:grid grid-cols-4  bg-white gap-2 p-4 rounded-xl border bg-blue-500">
            <div class="md:col-span-1 h shadow-xl bg-white space-y-2 rounded-lg">
                <div class="flex w-full h-full relative">
                    <img src="https://res.cloudinary.com/dboafhu31/image/upload/v1625318266/imagen_2021-07-03_091743_vtbkf8.png"
                        class="w-44 h-44 m-auto" alt="">
                </div>
            </div>
            <div class="md:col-span-3 h shadow-xl p-4 space-y-2  bg-white rounded-lg ">
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm  bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 whitespace-no-wrap w-2/6">Name</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold  border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->user->name }}</span>
                </div>
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Mitra</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold  border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->mitra_type }}</span>
                </div>
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Email</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold  border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->user->email }}</span>
                </div>
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">No
                        Handphone</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold  border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->user->phone_number }}</span>
                </div>
            </div>
            <div class="md:col-span-3  shadow-xl p-4 space-y-2  bg-white rounded-lg">
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Masalah</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold  border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->problem }}</span>
                </div>
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Alamat</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold  border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->user->address }}</span>
                </div>
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Deskripsi</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->description }}</span>
                </div>
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Status
                        Komplain</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->status_complaint }}</span>
                </div>
                <div class="flex gap-3">
                    <span
                        class=" mt-2 text-sm border bg-blue-100 font-bold  border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Update
                        Terakhir</span>
                    <span
                        class=" mt-2 w-4/6 text-sm border font-bold border-2 rounded-l px-4 py-2  whitespace-no-wrap w-2/6">{{ $complaint->updated_at->format('d F Y , h:i') }}</span>
                </div>
       

            </div>
            <div class="">
                <a class="mt-1 mr-2 text-green-500 hover:text-green-600 font-medium text-md" href="{{ route('complaint.edit', $complaint->slug) }}">
                    <x-button class="w-full h-10 bg-green-500 hover:bg-green-700">Edit</x-button>
            </div>
        </div>
    </div>
    
</x-app-layout>
