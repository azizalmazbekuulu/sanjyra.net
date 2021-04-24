<form action="{{route('name')}}" method="get"><div class="flex">
<input type="text" name="name" class="rounded-md leading-4 max-w-full" placeholder="Көп кездешкен ысым издөө" required pattern="^[А-Яа-яЁёӨөҢңҮү\s)(-]+$" title="Ысым жазыңыз">
<button type="submit" class="-ml-10 px-3 rounded-md bg-blue-400 hover:bg-gray-300 border border-black"><img src="{{asset('storage/logos/searchicon.svg')}}" width="20" height="20"></button>
</div></form>