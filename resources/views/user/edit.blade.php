<form method="post" action="{{url('user',$users->id)}}">
    <input type="hidden" name="_method" value="PUT">
    {{csrf_field()}}
    <?php 
    $i=0;
    ?>
    @foreach($nums as $num)
    <?php $n1[$i++] = $num; ?>
    @endforeach
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
@endforeach
    Name:<input type="text" name="name" value="{{$users->name}}"><br>
    Number1:<input type="number" name="mobile1" value="{{$n1[0]->mobile}}"><br>
    Number2:<input type="number" name="mobile2" value="{{$n1[1]->mobile}}"><br>
    Number3:<input type="number" name="mobile3" value="{{$n1[2]->mobile}}"><br>
    Address:<input type="text" name="address" value="{{$users->address}}"><br>
    Email:<input type="email" name="email" value="{{$users->email}}"><br>
    DOB:<input type="date" name="birthdate" value="{{$users->birthdate}}"><br>
    Social:<input type="text" name="social" value="{{$users->social}}"><br>
    Notes:<input type="text" name="notes" value="{{$users->notes}}"><br>
    <input type="hidden" name="id1" value="{{$n1[0]->id}}">
    <input type="hidden" name="id2" value="{{$n1[1]->id}}">
    <input type="hidden" name="id3" value="{{$n1[2]->id}}">
    <input type="submit" name="submit" value ="update record">
</form>