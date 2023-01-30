<a href="{{url('user/create')}}"><h1><button type="submit" >Add new Contact</button></h1></a>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

table.center {
  margin-left: auto; 
  margin-right: auto;
}
</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<table class = "center" border="1" cellspacing="4" cellpadding="4">
    
<tr>
    <th>User ID</th>
    <th>Name</th>
    
    <th>Address</th>
    <th>Email</th>
    <th>DOB</th>
    <th>Social</th>
    <th>Notes</th>
    <th>Action</th>
</tr>
<?php
$i=1;
?>
@foreach($users as $user)
<tr>
    
    <td>{{$i++}}</td>

    <td>{{$user->name}}</td>
    
    <td>{{$user->address}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->birthdate}}</td>
    <td><a href="{{$user->social}}" target="_blank">{{$user->social}}</a></td>
    <td>{{$user->notes}}</td>
    
    <td><a href="{{url('user',$user->id)}}">View</a>/
    <a href="{{url('user',[$user->id,'edit'])}}">Edit</a>/
    <form method="POST" action="{{url('user',$user->id)}}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value= "{{csrf_token()}}">
    <input type="submit" name="submit" value="Delete">
    </form>
    </td>
</tr>
@endforeach

</table>
