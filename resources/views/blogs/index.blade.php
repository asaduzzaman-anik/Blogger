<x-layout title="Blogs">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6">
        @forelse ($blogs as $blog)
            {{-- show the list of blogs --}}
            <x-blog-card :blog="$blog" />
        @empty
            <h2>No blogs yet. <a href="{{ route('blog.createForm') }}">Create New One</a></h2>
        @endforelse
    </div>
</x-layout>
