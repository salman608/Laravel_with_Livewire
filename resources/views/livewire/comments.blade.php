<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        <h1 class="text-3xl font-bold text-neutral-600">
            Hello world!
        </h1>

        @error('newComment')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <div>
            @if (session()->has('message'))
                <div class="p-3 bg-green-300 text-green-800 rounded-sm shadow-md">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form class="my-4 flex" wire:submit.prevent='addComment'>
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What is your Mind.."
                wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button class="p-2 bg-blue-500 w-20 rounded shadow text-white" type="submit">Add</button>
            </div>
        </form>
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="flext justify-between my-2">
                    <div class="flex ">
                        <p class="font-bold text-lg">{{ $comment->creator->name }}</p>
                        <p class="mx-3 py-2 text-xs text-gray-500 font-semibold">
                            {{ $comment->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="flex justify-end">
                        <i class="fas fa-times text-red-400 hover:text-red-700 text-2xl cursor-pointer"
                            wire:click='remove({{ $comment->id }})'></i>
                    </div>
                </div>



                <p class="text-gray-800">{{ $comment->body }}</p>
            </div>
        @endforeach
        {{ $comments->links() }}


    </div>
</div>
