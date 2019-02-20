@extends('layout')

@section('title', 'Sign Up')

@section('main')
<form action="/settings" method="post">
  @csrf
  <div class="form-check">
    @if($maintenance == "on")
    <input type="checkbox" class="form-check-input" name="maintenance" id="maintenance" checked>
    @else
    <input type="checkbox" class="form-check-input" name="maintenance" id="maintenance">
    @endif
    <label class="form-check-label" for="maintenance">Maintenance Mode</label>
  </div>
  <input type="submit" value="Save" class="btn btn-primary">
</form>

@endsection
