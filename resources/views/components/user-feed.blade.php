@if (session()->has('message'))
  <div>{{ session('message') }}</div>
@endif

<div>
  @forelse ($entries as $entry)
    <div>
      {{ $entry->description }}
      @if ($entry->category === 'income')
        <span class="text-blue-500">${{ cents_to_dollars($entry->amount) }}</span>
      @else
        <span class="text-red-500">${{ cents_to_dollars($entry->amount) }}</span>
      @endif
      : {{ $entry->category }}
      : <a href="{{ route('entry.edit', $entry->id) }}">edit</a>
      : <form action="{{ route('entry.delete', $entry->id) }}" method="POST" class="inline">
        @csrf
        @method("DELETE")
        <input type="submit" value="delete" class="bg-white cursor-pointer">
      </form>
    </div>
  @empty
    <p>no entries</p>
  @endforelse
</div>
