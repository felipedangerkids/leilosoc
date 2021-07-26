@extends('layouts.index')

@section('content')
  <div id='wrap'>

    <div id='external-events' class="d-none">
      <h4>Draggable Events</h4>

      <div id='external-events-list'>

      </div>

      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
      </p>
    </div>

    <div id='calendar'></div>

    <div style='clear:both'></div>

  </div>


@endsection
