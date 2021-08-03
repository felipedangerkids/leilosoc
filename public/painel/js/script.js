$(document).ready(function(){
    var user_name = $('#user_name').text();
    user_name = user_name.split(' ');
    var intials = user_name[0].charAt(0) + user_name[user_name.length-1].charAt(0);
    $('#image_perfil').text(intials);
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
