<x-layout>
  <div class="mx-4">
    <div class="mx-auto mt-24 max-w-lg rounded border border-gray-200 bg-gray-50 p-10">
      <header class="text-center">
        <h2 class="mb-1 text-2xl font-bold uppercase">
          Update Listing
        </h2>
        <p class="my-2 mb-4 font-bold"> {{ $listing->title }}</p>
      </header>

      <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="company" class="mb-2 inline-block text-lg">Company Name</label>
          <input type="text" class="w-full rounded border border-gray-200 p-2" name="company"
            value="{{ $listing->company }}" />
          @error('company')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="title" class="mb-2 inline-block text-lg">Job Title</label>
          <input type="text" class="w-full rounded border border-gray-200 p-2" name="title"
            placeholder="Example: Senior Laravel Developer" value="{{ $listing->title }}" />
          @error('title')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="location" class="mb-2 inline-block text-lg">Job Location</label>
          <input type="text" class="w-full rounded border border-gray-200 p-2" name="location"
            placeholder="Example: Remote, Boston MA, etc" value="{{ $listing->location }}" />
          @error('location')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" class="mb-2 inline-block text-lg">Contact Email</label>
          <input type="text" class="w-full rounded border border-gray-200 p-2" name="email"
            value="{{ $listing->email }}" />
          @error('email')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="website" class="mb-2 inline-block text-lg">
            Website/Application URL
          </label>
          <input type="text" class="w-full rounded border border-gray-200 p-2" name="website"
            value="{{ $listing->website }}" />
          @error('website')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="tags" class="mb-2 inline-block text-lg">
            Tags (Comma Separated)
          </label>
          <input type="text" class="w-full rounded border border-gray-200 p-2" name="tags"
            placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ $listing->tags }}" />
          @error('tags')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="logo" class="mb-2 inline-block text-lg">
            Company Logo
          </label>
          <input type="file" class="w-full rounded border border-gray-200 p-2" name="logo" />
          @error('logo')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>
        <img class="mr-6 mb-6 w-48"
          src="{{ $listing->logo ? asset('/storage/' . $listing->logo) : asset('images/no-image.png') }}"
          alt="" />

        <div class="mb-6">
          <label for="description" class="mb-2 inline-block text-lg">
            Job Description
          </label>
          <textarea class="w-full rounded border border-gray-200 p-2" name="description" rows="10"
            placeholder="Include tasks, requirements, salary, etc">
            {{ $listing->description }}
        </textarea>
          @error('description')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button class="bg-laravel rounded py-2 px-4 text-white hover:bg-black">
            Update Gig
          </button>

          <a href="/" class="ml-4 text-black"> Back </a>
        </div>
      </form>
    </div>
  </div>
</x-layout>
