<section class="flex flex-col w-full h-full p-2 bg-white shadow md:rounded">
    <article>
        <header>
            <h2 class="px-2 mb-2 text-lg tracking-wider text-gray-900 uppercase font-weight-semibold">Spending By
                Category
            </h2>
        </header>
        @if (isset($totals))
            @if ($totals->has('need'))
                <div
                    class="{{ stat_bar_width($totals['need'], $totals['income'] ?? 0) }} bg-yellow-400 flex justify-between px-3 py-1 rounded-full mb-2">
                    <p class="text-sm font-semibold uppercase">need</p>
                    <p class="text-sm uppercase">${{ cents_to_dollars($totals['need']) }}</p>
                </div>
            @endif
            @if ($totals->has('savings'))
                <div
                    class="{{ stat_bar_width($totals['savings'], $totals['income'] ?? 0) }} : 'w-full' }} bg-blue-400 flex justify-between px-3 py-1 rounded-full mb-2">
                    <p class="text-sm font-semibold uppercase">savings</p>
                    <p class="text-sm uppercase">${{ cents_to_dollars($totals['savings']) }}</p>
                </div>
            @endif
            @if ($totals->has('want'))
                <div
                    class="{{ stat_bar_width($totals['want'], $totals['income'] ?? 0) }} bg-red-400 flex justify-between px-3 py-1 rounded-full mb-2">
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
        @endif
    </article>
</section>
