@if (session()->has('message'))
  <div x-data="{ show: true }" x-init="setTimeout(() => {
      show = false;
  }, 2000)" x-show="show"
    class="fixed top-0 left-0 z-10 w-full bg-green-500 py-3 text-center text-xl text-white">
    {{ session('message') }}
  </div>
@endif

@if (session()->has('delete'))
  <div x-data="{ show: true }" x-init="setTimeout(() => {
      show = false;
  }, 2000)" x-show="show"
    class="fixed top-0 left-0 z-10 w-full bg-red-500 py-3 text-center text-xl text-white">
    {{ session('delete') }}
  </div>
@endif

@if (session()->has('update'))
  <div x-data="{ show: true }" x-init="setTimeout(() => {
      show = false;
  }, 2000)" x-show="show"
    class="fixed top-0 left-0 z-10 w-full bg-blue-500 py-3 text-center text-xl text-white">
    {{ session('update') }}
  </div>
@endif
