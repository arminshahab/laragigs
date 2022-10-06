<x-layout>
  <div class="mx-4">
    <div class="mx-auto mt-24 max-w-lg rounded border border-gray-200 bg-gray-50 p-10">
      <header class="text-center">
        <h2 class="mb-1 text-2xl font-bold uppercase">
          Login
        </h2>
        <p class="mb-4">Login to your account to post gigs</p>
      </header>

      <form action="{{ route('users.login') }}" method="POST">
        @csrf
        <div class="mb-6">

          <div class="mb-6">
            <label for="email" class="mb-2 inline-block text-lg">Email</label>
            <input type="email" class="w-full rounded border border-gray-200 p-2" name="email"
              value="{{ old('email') }}" />
            @error('email')
              <p class="mt-1 text-xs text-red-500">
                {{ $message }}
              </p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="password" class="mb-2 inline-block text-lg">
              Password
            </label>
            <input type="password" class="w-full rounded border border-gray-200 p-2" name="password" />
            @error('password')
              <p class="mt-1 text-xs text-red-500">
                {{ $message }}
              </p>
            @enderror
          </div>

          <div class="mb-6">
            <button type="submit" class="bg-laravel rounded py-2 px-4 text-white hover:bg-black">
              Login
            </button>
          </div>

          <div class="mt-8">
            <p>
              Don't have an account?
              <a href="{{ route('users.create') }}" class="text-laravel">Register</a>
            </p>
          </div>
      </form>
    </div>
  </div>
</x-layout>
