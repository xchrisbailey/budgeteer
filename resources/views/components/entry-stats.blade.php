<div class="flex flex-col w-full h-full p-2 bg-white rounded shadow">
    @if ($totals->has('need'))
        <div
            class="{{ $totals->has('income') ? ($totals['need'] / $totals['income'] > 0.75 ? 'w-3/4' : 'w-1/2') : 'w-full' }} bg-yellow-400 flex justify-between px-3 py-1 rounded-full mb-2">
            <p class="text-sm font-semibold uppercase">need</p>
            <p class="text-sm uppercase">${{ cents_to_dollars($totals['need']) }}</p>
        </div>
    @endif
    @if ($totals->has('savings'))
        <div
            class="{{ $totals->has('income') ? ($totals['savings'] / $totals['income'] > 0.75 ? 'w-3/4' : 'w-1/2') : 'w-full' }} bg-blue-400 flex justify-between px-3 py-1 rounded-full mb-2">
            <p class="text-sm font-semibold uppercase">savings</p>
            <p class="text-sm uppercase">${{ cents_to_dollars($totals['savings']) }}</p>
        </div>
    @endif
    @if ($totals->has('want'))
        <div
            class="{{ $totals->has('income') ? ($totals['want'] / $totals['income'] > 0.75 ? 'w-3/4' : 'w-1/2') : 'w-full' }} bg-red-400 flex justify-between px-3 py-1 rounded-full mb-2">
            <p class="text-sm font-semibold uppercase">want</p>
            <p class="text-sm uppercase">${{ cents_to_dollars($totals['want']) }}</p>
        </div>
    @endif
    @if ($totals->has('income'))
        <div class="flex items-center justify-between w-full px-3 py-1 mb-2 bg-green-400 rounded-full">
            <p class="text-sm font-semibold uppercase">income</p>
            <p class="text-sm uppercase">${{ cents_to_dollars($totals['income']) }}</p>
        </div>
    @endif
</div>
