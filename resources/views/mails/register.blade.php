<h1>Bienvenid@ {{$data['name']}}</h1>
<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon"> 
<a href="{{url()}}/auth/confirm/email/{{$data['email']}}/confirm_token/{{$data['confirm_token']}}">Confirmar mi cuenta</a>