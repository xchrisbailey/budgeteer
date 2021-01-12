<section class="flex flex-col w-full h-full p-2 bg-white shadow md:rounded">
    <header>
        <h2 class="px-2 mb-1 text-lg tracking-wider text-gray-900 uppercase font-weight-semibold">Charted category
            spending
        </h2>
    </header>
    <article>
        {!! $chart->render() !!}
    </article>
</section>
