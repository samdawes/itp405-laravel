@extends('layout')

@section('title', 'Docs')

@section('main')
<div contenteditable="true" id="doc">
  This text can be edited by the user.
</div>

<script>
let connection = new WebSocket('ws://sdawes-websockets.herokuapp.com');

connection.onopen = () => {
  console.log('connected from the frontend');
  //document.getElementById('doc').innerHTML = "hello";
};

connection.onerror = () => {
  console.log('failed to connect from the frontend');
};

connection.onmessage = (event) => {
  console.log('received data', event.data);

  if (document.getElementById('doc').innerHTML != event.data) {
    document.getElementById('doc').innerHTML = event.data;
  }
};

document.getElementById('doc').addEventListener('keyup', (event) => {
  event.preventDefault();

  console.log("composition update...", document.getElementById('doc').innerHTML);

  let message = document.getElementById('doc').innerHTML;
  connection.send(message);
});
</script>
@endsection
