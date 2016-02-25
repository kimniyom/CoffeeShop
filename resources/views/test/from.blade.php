@extends('layout')
@section('content')
<div class="ui form">
<form action="post" method="post">
  <div class="field">
      <label>Last Name</label>
      <input placeholder="Last Name" type="text">
    </div>

    <input type="submit" value="Submit" class="ui teal button" />

</form>
</div>
@stop
