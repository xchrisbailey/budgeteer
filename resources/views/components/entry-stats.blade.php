<section class="flex flex-col w-full h-full p-2 bg-white shadow md:rounded">
    <article class="mb-6">
        <header>
            <h2 class="px-2 mb-2 text-lg tracking-wider text-gray-900 uppercase font-weight-semibold"> Total Income this
                Period
            </h2>
        </header>
        @if ($total_income > 0)
            <div
                class="flex items-center justify-between w-full px-3 py-1 mb-2 bg-{{ get_category_color('income') }} rounded-full">
                <p class="text-sm font-semibold uppercase">income</p>
                <p class="text-sm uppercase">${{ cents_to_dollars($total_income) }}</p>
            </div>
        @endif
    </article>
    <article>
        <header>
            <h2 class="px-2 mb-2 text-lg tracking-wider text-gray-900 uppercase font-weight-semibold">Spending By
                Category
            </h2>
        </header>
        @if (isset($total_spending))
            @if ($total_spending->has('need'))
                <div
                    class="{{ stat_bar_width($total_spending['need'], $total_income ?? 0) }} bg-{{ get_category_color('need') }} flex justify-between px-3 py-1 rounded-full mb-2">
                    <p class="text-sm font-semibold uppercase">need</p>
                    <p class="text-sm uppercase ml-1">${{ cents_to_dollars($total_spending['need']) }}</p>
                </div>
            @endif
            @if ($total_spending->has('savings'))
                <div
                    class="{{ stat_bar_width($total_spending['savings'], $total_income ?? 0) }} : 'w-full' }} bg-{{ get_category_color('savings') }}  flex justify-between px-3 py-1 rounded-full mb-2">
                    <p class="text-sm font-semibold uppercase">savings</p>
                    <p class="text-sm uppercase ml-1">${{ cents_to_dollars($total_spending['savings']) }}</p>
                </div>
            @endif
            @if ($total_spending->has('want'))
                <div
                    class="{{ stat_bar_width($total_spending['want'], $total_income ?? 0) }} bg-{{ get_category_color('want') }} flex justify-between px-3 py-1 rounded-full mb-2">
                    <p class="text-sm font-semibold uppercase">want</p>
                    <p class="text-sm uppercase ml-1">${{ cents_to_dollars($total_spending['want']) }}</p>
                </div>
            @endif
        @endif
    </article>
</section>
