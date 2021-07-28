@extends('layouts.index')

@section('content')
<div id='calendar-container'>
    <input type="hidden" id="date" value="{{ $dados }}" name="">
    <div id='leilao'></div>
  </div>

@endsection
