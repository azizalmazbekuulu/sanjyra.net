<form action="{{route('name')}}" method="get"><div class="form-row align-items-center">
<div class="col-auto"><input type="text" name="slug" class="form-control" placeholder="Көп кездешкен ысым" required pattern="^[А-Яа-яЁёӨөҢңҮү\s-]+$" title="Ысым жазыңыз"></div>
<div class="col-auto"><button type="submit" class="btn btn-light float-right"><i class="fas fa-search"></i></button></div>
</div></form>