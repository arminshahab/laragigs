<x-layout>
  <div class="rounded border border-gray-200 bg-gray-50 p-10">
    <header>
      <h1 class="my-6 text-center text-3xl font-bold uppercase">
        Manage Gigs
      </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
      <tbody>

        @forelse ($listings as $listing)
          <tr class="border-gray-300">
            <td class="border-t border-b border-gray-300 px-4 py-8 text-lg">
              <a href="{{ route('listings.show', $listing->id) }}">
                {{ $listing->title }}
              </a>
            </td>
            <td class="border-t border-b border-gray-300 px-4 py-8 text-lg">
              <a href="{{ route('listings.edit', $listing->id) }}" class="rounded-xl px-6 py-2 text-blue-400"><i
                  class="fa-solid fa-pen-to-square"></i> Edit
              </a>
            </td>
            <td class="border-t border-b border-gray-300 px-4 py-8 text-lg">
              <form action="{{ route('listings.destroy', $listing->id) }}" method="POST"
                onsubmit="return confirm('are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">
                  <i class="fa-solid fa-trash-can"></i>
                  Delete
                </button>
              </form>
            </td>
          </tr>
        @empty
          <p class="text-center text-xl">No listing found</p>
        @endforelse

      </tbody>
    </table>
  </div>

</x-layout>
