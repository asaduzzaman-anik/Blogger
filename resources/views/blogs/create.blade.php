<x-layout title="Create Blog">
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-3xl mx-auto border p-4">
            <legend class="fieldset-legend">New Blog</legend>

            <label class="label" name="title" for="title">Title</label>
            <input type="text" name="title" class="input w-full" placeholder="Blog Title" />
            @error('title')
                <p class="text-error"> {{ $message }} </p>
            @enderror

            <label class="label" for="description">Description</label>
            <textarea rows="10" class="textarea w-full" name="description" placeholder="Blog Details"></textarea>
            @error('description')
                <p class="text-error"> {{ $message }} </p>
            @enderror
            <div class="mt-2">
                <button type="submit" class="btn btn-primary w-fit">Save</button>
                <a href="{{ route('blogs') }}" class="btn btn-secondary w-fit">Back</a>
            </div>
        </fieldset>
    </form>
</x-layout>