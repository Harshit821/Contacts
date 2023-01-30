<form method="post" action="{{url('user')}}">
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
    Name:<input type="text" name="name"><br>
    Number1:<input type="number" name="mobile1" id="mobile1" value="000"><br>
    Number2:<input type="number" name="mobile2" id="mobile2" value="000"><br>
    Number3:<input type="number" name="mobile3" id="mobile3" value="000"><br>
    Address:<input type="text" name="address"><br>
    Email:<input type="email" name="email"><br>
    DOB:<input type="date" name="birthdate"><br>
    Social:<input type="text" name="social"><br>
    Notes:<input type="text" name="notes"><br>
    {{csrf_field()}}
    <input type="submit" name="save">
</form>