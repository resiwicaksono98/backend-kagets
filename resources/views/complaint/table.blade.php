<x-app-layout>
    <x-slot name="header">
        Your Complaint
    </x-slot>

    @if (session('success'))
        <div class="font-semibold text-lg text-green-800 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>User Name</x-th>
            <x-th>Mitre Type</x-th>
            <x-th>Status</x-th>
            <x-th>Published</x-th>
            <x-th class="text-center">Action</x-th>
        </tr>
        @foreach ($complaint as $item)
            <tr>
                <x-td>{{ $complaint->count() * ($complaint->currentPage() - 1) + $loop->iteration }}</x-td>
                <x-td>{{ $item->user->name ?? '' }}</x-td>
                <x-td>{{ $item->mitra_type }}</x-td>
                <x-td>{{ $item->status_complaint }}</x-td>
                <x-td>{{ $item->created_at->format('d F, Y') }}</x-td>
                <x-td class="flex justify-center">
                        <a class="mt-1 mr-2 text-green-500 hover:text-green-600 font-medium  text-md"
                            href="{{ route('complaint.show', $item) }}">
                            <x-button class="bg-green-500 hover:bg-green-700">Detail</x-button>
                        </a>
                        <div x-data="{modalIsOpen: false}">
                            <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are You Sure?">
                                <div class="flex items-center">
                                    <form class="mr-4" action="{{ route('complaint.delete', $item->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <x-button class="bg-blue-500">
                                            Yes
                                        </x-button>
                                    </form>
                                    <x-button class="bg-green-500 " type="button" @click="modalIsOpen = false">Nope</x-button>
                                </div>
                            </x-modal>
                            <x-button @click="modalIsOpen = true"
                                class=" bg-red-500 hover:bg-red-700 mt-1">Delete</x-button>
                        </div>
                </x-td>
            </tr>
        @endforeach
    </x-table>

    {{ $complaint->links() }}
</x-app-layout>
