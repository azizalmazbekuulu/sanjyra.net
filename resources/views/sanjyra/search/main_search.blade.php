<form action="{{route('main-search')}}" method="get"><div class="flex flex-nowrap">
    <input type="text" name="query" class="rounded-xl text-sm" title="Издөө" placeholder="Издөө" required>
    <button type="submit" class="px-3 -ml-10 inline-block rounded-xl bg-blue-300 border-l-0 hover:bg-blue-200 hover:border-red-400">
        <img src="{{asset('storage/logos/searchicon.svg')}}" width="18" height="18">
    </button>
</div></form>