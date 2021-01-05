@if (session()->has('message'))
  <div class="bg-green-200 px-6 py-3 my-4 rounded-md text-lg flex items-center mx-auto w-full">
    <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
      <path fill="currentColor"
        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
      </path>
    </svg>
    <span class="text-green-800">{{ session('message') }}</span>
  </div>
@endif

@if ($errors->any())
  <div class="bg-red-200 px-6 py-3 my-4 rounded-md text-lg flex items-center mx-auto w-full">
    <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
      <path fill="currentColor"
        d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
      </path>
    </svg>
    <span class="text-red-800">{{ $errors->first() }}</span>
  </div>
@endif

<div class="shadow overflow-hidden rounded border-b border-gray-200">
  <table class="table-auto w-full bg-white">
    <thead class="bg-gray-800 text-white">
      <tr>
        <td class="uppercase text-sm font-semibold py-3 px-4">Description</td>
        <td class="uppercase text-sm font-semibold py-3 px-4">Amount</td>
        <td class="uppercase text-sm font-semibold py-3 px-4">Category</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      @forelse ($entries as $entry)
        <tr class="even:bg-gray-100">
          <td class="py-3 px-4">{{ $entry->description }}</td>
          <td class="py-3 px-4">
            @if ($entry->category === 'income')
              <span class="text-blue-800">${{ cents_to_dollars($entry->amount) }}</span>
            @else
              <span class="text-red-800">${{ cents_to_dollars($entry->amount) }}</span>
            @endif
          </td>
          <td class="py-3 px-4">{{ $entry->category }}</td>
          <td class="text-right py-3 px-4">
            <a href="{{ route('entry.edit', $entry->id) }}" class="m-0 p-0">
              <button class="rounded bg-yellow-300 hover:bg-yellow-400 p-2 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
              </button>
            </a>
            <form action="{{ route('entry.delete', $entry->id) }}" method="POST" class="inline m-0 p-0">
              @csrf
              @method("DELETE")
              <button class="rounded bg-red-300 hover:bg-red-400 p-2 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </button>
            </form>
          </td>
        </tr>
      @empty
        <p>no entries</p>
      @endforelse
    </tbody>
  </table>
</div>
