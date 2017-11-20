你好，{{ $name }}！<br><br>
你需要点击以下链接来激活你的账户:<br><br>

{{ route('email.verify',['token'=>$token]) }}
