@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="">Ысымы</label>
    <input type="text" class="form-control" name="name" placeholder="Ысымы" 
        @if (old('name'))
            value="{{old('name')}}"
        @else
            @if (isset($user->name)) value="{{$user->name}}"
            @else value=""
            @endif
        @endif
    required>
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email"
        @if (old('email'))
            value="{{old('email')}}"
        @else
            @if (isset($user->email)) value="{{$user->email}}"
            @else value=""
            @endif
        @endif
    required>
</div>
<div class="form-group">
    <label for="">Сыр сөз</label>
    <input type="password" class="form-control" name="password">
</div>
<div class="form-group">
    <label for="">сыр сөздү тастыктоо</label>
    <input type="password" class="form-control" name="password_confirmation">
</div>  
<hr>
<input class="btn btn-primary" type="submit" value="Сактоо">