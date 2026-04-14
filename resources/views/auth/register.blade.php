<x-layout title="Registration">
    <form action="{{ route('user.register') }}" method="POST">
        @csrf
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Sign Up</legend>

            <label class="label" for="name">Name</label>
            <input type="name" name="name" class="input" placeholder="Your Name" />
            @error('name')
                <p class="text-error"> {{ $message }}</p>
            @enderror

            <label class="label" for="email">Email</label>
            <input type="email" name="email" class="input" placeholder="Your Email" />
            @error('email')
                <p class="text-error"> {{ $message }}</p>
            @enderror

            <label class="label" for="password">Password</label>
            <input type="password" name="password" class="input" placeholder="Password" />
            @error('password')
                <p class="text-error"> {{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-neutral mt-4">Register</button>
        </fieldset>
    </form>

</x-layout>
