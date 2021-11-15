<x-app-layout>
    <x-slot name="header">
        Edit Complaint : {{ $complaint->user->name }} Mitra {{ $complaint->mitra_type }}
    </x-slot>
    @if (session('success'))
        <div class="font-semibold text-lg text-green-800 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('complaint.edit', $complaint->slug) }}" method="post" enctype="multipart/form-data"
        novalidate>
        @method('put')
        @csrf
        <div class="mb-5">
            <x-label for="user_id" class="mb-2" :value="__('Pilih User')" />
            <select disabled name="user_id" id="user_id"
                class=" w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Choose User" disabled>Pilih User</option>
                @foreach ($user as $item)
                    <option {{ $complaint->user()->find($item->id) ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <x-label for="mitra_type" class="mb-2p" :value="__('Jenis Mitra')" />
            <select name="mitra_type" id="mitra_type"
                class="mt-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Choose Mitra Type" disabled>Pilih Mitra Type</option>
                @foreach ($category as $item)
                    <option {{ $complaint->mitra_type == $item->name ? 'selected' : '' }} value="{{ $item->name }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <x-label for="problem" class="mb-2p" :value="__('Masalah')" />
            <select name="problem" id="problem"
                class="mt-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Choose Mitra Type" disabled>Pilih Problem</option>
                @foreach ($problems as $item)
                    <option {{ $complaint->problem === $item->name ? 'selected' : '' }} value="{{ $item->name }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-5">
            <x-label for="description" :value="__('Deskripsi')" />
            <textarea name="description" id="description" rows="10"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Description Complaint">{{ $complaint->description }}</textarea>
            @error('description')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <x-label for="support_image" :value="__('Bukti Masalah')" />
            <div class="w-full lg:w-3/12">
                <img class="rounded-lg w-full mb-6" src="{{ $complaint->picture }}"
                    alt="{{ $complaint->mitra_type }}">
            </div>
            <input type="file" name="support_image" id="support_image" class="mt-2">
            @error('support_image')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <x-label for="status_complaint" :value="__('Status Komplain')" />
            <select name="status_complaint" id="status_complaint"
                class="mt-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option {{ $complaint->status_complaint === 'kurang_data' ? 'selected' : '' }} value="Kurang Data">
                    Kurang Data</option>
                <option {{ $complaint->status_complaint === 'verifikasi' ? 'selected' : '' }} value="verifikasi">
                    Verifikasi</option>
                <option {{ $complaint->status_complaint === 'gagal' ? 'selected' : '' }} value="gagal">Gagal</option>
                <option {{ $complaint->status_complaint === 'selesai' ? 'selected' : '' }} value="selesai">Selesai
                </option>
            </select>
        </div>

        <div class="mb-5">
            <x-label for="message" :value="__('Pesan')" />
            <textarea name="message" id="message" rows="10"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Pesan Untuk Mitra">{{ $complaint->message }}</textarea>
            @error('description')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <x-button class="bg-blue-500 hover:bg-blue-700">Update</x-button>
    </form>
</x-app-layout>
