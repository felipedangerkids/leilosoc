$(document).ready(function(){
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
            daysOfWeek: ['dom','seg','ter','qua','qui','sex','sab'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','outubro','Novembro','Dezembro'],
            applyLabel: 'Aplicar',
            cancelLabel: 'Cancelar'
        }
    });
    $('.date-mask').mask('99/99/9999 - 99/99/9999');
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

    var fileList = new Array;
    var i =0;
    $("#my_dropzone").dropzone({
        addRemoveLinks : true,
        dictDefaultMessage: "Arraste seus arquivos para cá!",
        dictResponseError: 'Erro ao fazer o upload !',
        success: (file, data) => {
            $('.anexos').append('<input type="hidden" name="anexos[]" value="'+data+'">');
            fileList[i] = {"serverFileName": data, "fileName": file.name, "fileId" : i, "uuid": file.upload.uuid};
            i++;
        },
        removedfile: function(file) {
            var rmvFile = "";
            for(f=0;f<fileList.length;f++){
                if(fileList[f].uuid == file.upload.uuid)
                {
                    rmvFile = fileList[f].serverFileName;
                    $('.anexos').find('[value="'+rmvFile+'"]').remove();
                }
            }

            if (rmvFile){
                $.ajax({
                    url: "/tarefa/tarefas/anexos/remove",
                    type: "POST",
                    data: { "fileList" : rmvFile }
                });

                file.previewElement.remove();
            }
        }
    });

    $(function(){
        var json_calendar = JSON.parse($('#json_calendar').val());
        var events = [];

        $.each(json_calendar, (key, value) => {
            events.push({
                title: value.name,
                start: value.inicio,
                end: value.fim,
                url: '/tarefa/tarefaDetalhe/'+value.id,
            });
        });

        if(json_calendar.length > 0){
            var calendarEl = document.getElementById('calendar');
            var Calendar = FullCalendar.Calendar;
            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                locale: 'pt',
                themeSystem: 'bootstrap',
                events: events
            });

            calendar.render();
        }
    });
});