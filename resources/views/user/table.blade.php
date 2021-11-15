<x-app-layout>
    <x-slot name="header">
        Manage User
    </x-slot>

    @if (session('success'))
        <div class="font-semibold text-lg text-green-800 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Mitra Type</x-th>
            <x-th>Username</x-th>
            <x-th>Roles</x-th>
            <x-th>Action</x-th>
        </tr>
        @foreach ($user as $item)
            <tr>
                <x-td>{{ $user->count() * ($user->currentPage() - 1) + $loop->iteration }}</x-td>
                <x-td>{{ $item->name }}</x-td>
                <x-td>{{ $item->mitra_type }}</x-td>
                <x-td>{{ $item->username }}</x-td>
                {{-- <x-td>{{ $item->roles->name }}</x-td> --}}
                <x-td>
                    <div class="flex items-center ">
                        <a class="mt-1 mr-2 text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                            href="{{ route('user.edit', $item->name) }}">Edit</a>
                        <div x-data="{modalIsOpen: false}">
                            <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are You Sure?">
                                <div class="flex items-center">
                                    <form class="mr-4" action="{{ route('user.delete', $item->name) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <x-button class="bg-blue-500">
                                            Yes
                                        </x-button>
                                    </form>
                                    <x-button class="bg-blue-500" type="button" @click="modalIsOpen = false">Nope</x-button>
                                </div>
                            </x-modal>
                            <button @click="modalIsOpen = true"
                                class="text-red-500 hover:text-red-600 font-medium underline uppercase text-xs ">Delete</button>
                        </div>

                    </div>
                </x-td>
            </tr>
        @endforeach
    </x-table>

    {{ $user->links() }}
</x-app-layout>
