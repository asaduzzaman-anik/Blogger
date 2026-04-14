<x-layout title="Edit Blog">
    <form action="/blogs/{{ $blog->id }}/edit" method="POST">
        @csrf
        @method('PATCH')
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-3xl mx-auto border p-4">
            <legend class="fieldset-legend">Update Blog</legend>

            <label class="label" name="title" for="title">Title</label>
            <input type="text" name="title" class="input w-full" placeholder="{{ $blog->title }}" />
            @error('title')
                <p class="text-error"> {{ $message }} </p>
            @enderror

            <label class="label" for="description">Description</label>
            <textarea rows="10" class="textarea w-full" name="description">{{ $blog->description }}</textarea>
            @error('description')
                <p class="text-error"> {{ $message }} </p>
            @enderror

            <div class="mt-2">
                <button type="submit" class="btn btn-primary w-fit">Update</button>
                <a href="/blogs/{{ $blog->id }}/view" class="btn btn-secondary w-fit">Back</a>
            </div>
        </fieldset>
    </form>
</x-layout>