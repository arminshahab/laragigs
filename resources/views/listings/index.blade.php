<x-layout>
  <x-flash-message />
  @include('partials._hero')
  @include('partials._search')
  <div class="mx-4 gap-4 space-y-4 md:space-y-0 lg:grid lg:grid-cols-2">
    @forelse ($listings as $listing)
      <x-listing :listing="$listing" />
    @empty
      <p>No Listing Found</p>
    @endforelse
  </div>

  <div class="mt-10 px-10">
    {{ $listings->links() }}
  </div>
</x-layout>
