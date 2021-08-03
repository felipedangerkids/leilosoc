@extends('layouts.painel')

@section('content')
<div id='calendar-container'>
    <input type="hidden" id="dados" value="{{ $dados }}" name="">
    <div id='calendar'></div>
  </div>

@endsection
