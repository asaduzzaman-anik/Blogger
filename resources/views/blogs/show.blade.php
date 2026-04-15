<x-layout title='Blog View'>
    <div class="hero bg-base-300 min-h-[80vh]">
        <div class="hero-content text-center">
            <div class="max-w-5xl">
                <h1 class="text-5xl font-bold mb-6">{{ $blog->title }}</h1>
                <p class="text-accent text-lg">Posted by <span class="font-semibold italic"> {{ $blog->user->name }}
                    </span></p>
                <p> {{ $blog->description }} </p>

                @if ($blog->user_id == Auth::id())
                    <div class="flex gap-2 justify-center mt-8">
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/blogs/{{ $blog->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
