<x-app-layout>
    <x-slot name="header">
        Your News
    </x-slot>

    @if (session('success'))
        <div class="font-semibold text-lg text-green-800 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Title</x-th>
            <x-th>User Post</x-th>
            <x-th>Published</x-th>
            <x-th>Action</x-th>
        </tr>
        @foreach ($news as $item)
            <tr>
                <x-td>{{ $news->count() * ($news->currentPage() - 1) + $loop->iteration }}</x-td>
                <x-td>
                    <div>
                        {{ $item->title }}
                    </div>
                    <div>
                        @foreach ($item->categories as $category)
                            <span class="mr-1 text-xs">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </x-td>
                <x-td>{{ $item->user->name }}</x-td>
                <x-td>{{ $item->created_at->format('d F, Y') }}</x-td>
                <x-td>
                    <div class="flex items-center justify-contents-center">
                        <a class="mt-1 mr-2 text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                            href="{{ route('news.edit', $item) }}">Edit</a>
                        <div x-data="{modalIsOpen: false}">
                            <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are You Sure?">
                                <div class="flex items-center">
                                    <form class="mr-4" action="{{ route('news.delete', $item->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-button class="bg-blue-500">
                                            Yes
                                        </x-button>
                                    </form>
                                    <x-button class="bg-green-500" type="button" @click="modalIsOpen = false">Nope</x-button>
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

    {{ $news->links() }}
</x-app-layout>
