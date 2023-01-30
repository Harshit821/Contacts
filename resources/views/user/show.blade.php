Name: {{$users->name}}<br>
{{-- Number: {{$users->mobile}}<br> --}}
<?php
$i=1;
?>
@foreach($users->numbers as $num)
phone{{$i++}}=
{{$num->mobile}}<br>
@endforeach

Address: {{$users->address}}<br>
Email: {{$users->email}}<br>
DOB: {{$users->birthdate}}<br>
Social: <a href="{{$users->social}}" target="_blank">{{$users->social}}</a><br>
Notes: {{$users->notes}}<br>

<form method="get" action="{{url('user')}}"  >
    <button type="submit">Home</button>
 </form>
