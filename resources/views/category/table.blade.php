<x-app-layout>
    <x-slot name="header">
        Your Category
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
            <x-th>News</x-th>
            <x-th>Published</x-th>
            <x-th>Action</x-th>
        </tr>
        @foreach ($category as $item)
            <tr>
                <x-td>{{ $category->count() * ($category->currentPage() - 1) + $loop->iteration }}</x-td>
                <x-td>{{ $item->name }}</x-td>
                <x-td>{{ $item->news_count }}</x-td>
                <x-td>{{ $item->created_at->format('d F, Y') }}</x-td>
                <x-td>
                    <div class="flex items-center justify-contents-center">
                        <a class="mt-1 mr-2 text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                            href="{{ route('category.edit', $item->slug) }}">Edit</a>
                        <div x-data="{modalIsOpen: false}">
                            <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are You Sure?">
                                <div class="flex items-center">
                                    <form class="mr-4" action="{{ route('category.delete', $item->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <x-button>
                                            Yes
                                        </x-button>
                                    </form>
                                    <x-button type="button" @click="modalIsOpen = false">Nope</x-button>
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

    {{ $category->links() }}
</x-app-layout>
