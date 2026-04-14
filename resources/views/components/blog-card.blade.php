@props([
    'blog'=>'required',
])
<div class="card bg-base-300 w-full shadow-md">
  <div class="card-body">
    <h2 class="card-title"> {{ $blog->title }} </h2>
    <p class="truncate"> {{ $blog->description }} </p>
    <div class="card-actions justify-end">
      <a href="/blogs/{{ $blog->id }}/view" class="btn btn-primary">View</a>
    </div>
  </div>
</div>