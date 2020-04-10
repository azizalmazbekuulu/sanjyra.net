<form action="{{route('admin.name')}}" method="get"><div class="form-row align-items-center">
<div class="col-auto"><input type="text" name="name" class="form-control" placeholder="Көп кездешкен ысым" required pattern="^[А-Яа-яЁёӨөҢңҮү\s-]+$" title="Ысым жазыңыз"></div>
<div class="col-auto"><button type="submit" class="btn btn-light float-right"><img src="{{asset('logos/searchicon.svg')}}" width="16" height="16"></button></div>
</div></form>