<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-semibold">List Categories</h2>
            <a href="#" wire:click="createCategory" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create
            </a>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session('message') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Slug</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">{{ $category->slug }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{$category->id}})"
                            wire:loading.class="opacity-50" wire:loading.attr="disabled"
                            class="bg-blue-500 hover:bg-blue-700
                            text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </button>
                        <button type="button" wire:confirm="Are you sure you want to delete this category?"
                        wire:click="delete({{ $category->id }})"
                        wire:loading.class="opacity-50" wire:loading.attr="disabled"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded
                        focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                        <div wire:loading wire:target="delete({{ $category->id }})">
                            Removing category...
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="items-center mt-4">
        {{ $this->categories->links() }}
    </div></div>
