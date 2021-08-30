$(document).ready(function () {
    var user_name = $('#user_name').text();
    user_name = user_name.split(' ');
    var intials = user_name[0].charAt(0) + user_name[user_name.length - 1].charAt(0);
    $('#image_perfil').text(intials.toUpperCase());

    $('.select2').select2({
        placeholder: 'Selecione uma Opção'
    });

    $('.textarea').summernote({
        height: 200,
        minHeight: null,
        maxHeight: null,
        dialogsInBody: true,
        dialogsFade: false
    });

    $(document).on('click', '.btn-close-times', function () {
        var route = $(this).data('route');
        var title = $(this).data('title');
        if (route !== '') {
            Swal.fire({
                icon: 'info',
                title: title,
                showCancelButton: true,
                confirmButtonText: 'SIM',
                cancelButtonText: 'NÃO',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = route;
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var dados = $('#dados').val();
    var events = [];

    $.each(JSON.parse(dados), (key, value) => {
        events.push({
            title: value.modelo,
            start: value.inicio,
            end: value.fim,
        });

    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        height: 'parent',
        locale: 'pt-br',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'dayGridMonth',
        // defaultDate: '2021-08-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: events, //
    });

    calendar.render();
});




document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('leilao');
    var dados = $('#date').val();
    var events = [];

    $.each(JSON.parse(dados), (key, value) => {
        events.push({
            title: value.processo,
            start: value.inicio,
            end: value.fim,
        });

    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        height: 'parent',
        locale: 'pt-br',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'dayGridMonth',
        // defaultDate: '2021-08-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: events, //
    });

    calendar.render();
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date-mask').daterangepicker({
        singleDatePicker: false,
        showDropdowns: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek: ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sab'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'outubro', 'Novembro', 'Dezembro'],
            applyLabel: 'Aplicar',
            cancelLabel: 'Cancelar'
        }
    });
});

var msec = 0,
  sec = 1,
  min = 1,
  hour = 1,
  timerOn = 0;
var msecVar, secVar, minVar, hourVar;

function setMSec() {
  if (msec < 10) {
    document.getElementById("msec").innerHTML = "0" + msec;
  } else {
    document.getElementById("msec").innerHTML = msec;
  }
  msec = msec + 1;
  msecVar = setTimeout(setMSec, 100);
  if (msec >= 10) {
    setSec();
    msec = 0;
  }
}

function setSec() {
  if (sec >= 60) {
    setMin();
    sec = 0;
  }
  if (sec < 10) {
    document.getElementById("sec").innerHTML = "0" + sec;
  } else {
    document.getElementById("sec").innerHTML = sec;
  }
  sec = sec + 1;
}

function setMin() {
  if (min >= 60) {
    setHour();
    min = 0;
  }
  if (min < 10) {
    document.getElementById("min").innerHTML = "0" + min;
  } else {
    document.getElementById("min").innerHTML = min;
  }
  min = min + 1;
}

function setHour() {
  if (hour < 10) {
    document.getElementById("hour").innerHTML = "0" + hour;
  } else {
    document.getElementById("hour").innerHTML = hour;
  }
  hour = hour + 1;
}

function start(e) {
    console.log(e);
  if (!timerOn) {
    timerOn = 1;
    setMSec();
  }
}

function stop() {
  clearTimeout(msecVar);
  timerOn = 0;
}
