$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Função salva dados gerais
    $(document).on('click', '.btn-save', function(){
        // Pegamos os dados do data
        let save_target = $(this).data('save_target');
        let save_route = $(save_target).find('form').attr('action');

        // Pegamos o parente do id para adicionar um modelo de carregamento
        let modal = $(save_target).find('.modal-content');
        modal.append('<div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>');

        $.ajax({
            url: save_route,
            type: "POST",
            data: $(save_target).find('form').serialize(),
            success: (data) => {
                // console.log(data);
                // Procuramos a div adcionada recentemente para removemos e fechamos o modal
                $(modal).find('.overlay').remove();
                $(modal).parent().parent().modal('hide');

                $('[data-target="#entregadorModal"]').html('ENTREGADOR ATRIBUIDO').removeClass('btn-dark').addClass('btn-info').removeAttr('data-toggle');
            },
            error: (err) => {
                // console.log(err);
                $(modal).find('.overlay').remove();
            }
        });
    });

    $('#form-coment').on('submit', function(e){
        e.preventDefault();
        // if(e.keyCode == 13){
        //     $('#btn-coment').trigger('click');
        // }
    });

    $('#form-coment').find('input').on('keyup', function(e){
        if(e.keyCode == 13){
            $('#btn-coment').trigger('click');
        }
    });

    $(document).on('click', '#btn-coment', function(){
        var btn = $(this);
        var form = $('#form-coment').serialize();
        var url = $('#form-coment').attr('action');
        var input = $('#coment').val();
        // btn.html('<div class="spinner-border text-light" role="status"></div>');
        // btn.prop('disabled', true);
        // $('#form-coment').find('input').prop('disabled', true);

        $.ajax({
            url: url,
            type: 'POST',
            data: form,
            success: (data) => {
                console.log(data);
                document.getElementById('coment').value='';
                document.location.reload(true);
            },
            error: (err) => {
                console.log(err);
                // btn.html('ENTRAR');
                // btn.prop('disabled', false);
                // $('#form-login').find('input').prop('disabled', false);

                // Swal.fire({
                //     icon: 'error',
                //     title: 'Email ou Senha invalidos'
                // });
            }
        });
    });

    $(document).on('click', '.btn-relogio', function(){
        var btn = $(this);
        var evento = btn.attr('data-evento');
        var tempo = $('.relogio-'+btn.data('id')).text().split(':');
        var tempoH = parseInt(tempo[0]) || 0;
        var tempoM = parseInt(tempo[1]) || 0;
        var tempoS = parseInt(tempo[2]) || 0;

        // Função de temporizador
        if(evento == 'play'){
            if($(this).data('tarefa') == 'interna'){
                btn.removeClass('btn-danger').addClass('btn-success');
                btn.html('Iniciado');
            }else{
                btn.find('i').removeClass('fa-play').addClass('fa-pause');
                btn.find('i').removeClass('text-success').addClass('text-danger');
            }
            btn.attr('data-evento', 'stop');

            $('.relogio-'+btn.data('id')).stopwatch({startTime: ((tempoH*3600)+(tempoM*60)+(tempoS))*1000}).stopwatch('start');
        }else if(evento == 'stop'){
            if($(this).data('tarefa') == 'interna'){
                btn.html('Pausado');
            }else{
                btn.find('i').removeClass('fa-pause').addClass('fa-play');
                btn.find('i').removeClass('text-danger').addClass('text-success');
            }
            btn.attr('data-evento', 'play');

            $('.relogio-'+btn.data('id')).stopwatch().stopwatch('stop');
        }

        $.ajax({
            url: '/tarefa/timer',
            type: 'POST',
            data: {tarefa_id: btn.data('id'), timer: $('.relogio-'+btn.data('id')).text(), evento: evento},
            success: (data) => {
                console.log(data);
            }
        });
    });

    // Ativando o timer quando estivber no play
    $(function(){
        $('.relogios').each(function(){
            var evento = $(this).data('evento');
            var start_time = $(this).data('start_time');
            var tempo = $(this).text().split(':');

            if(evento == 'play'){
                var tempoH = parseInt(tempo[0]) || 0;
                var tempoM = parseInt(tempo[1]) || 0;
                var tempoS = parseInt(tempo[2]) || 0;

                start_time = ((parseInt(start_time) || 0)*1000)+(((tempoH*3600)+(tempoM*60)+(tempoS))*1000);

                $(this).stopwatch({startTime: start_time}).stopwatch('start');
            }
        });
    });

    $('.date-mask').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek: ['dom','seg','ter','qua','qui','sex','sab'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','outubro','Novembro','Dezembro'],
            applyLabel: 'Aplicar',
            cancelLabel: 'Cancelar'
        }
    });
    $('.date-mask').mask('99/99/9999');

    $('[name="coluna"]').on('change', function (e) {
        var thiss = $(this);

        if(thiss.val() == 'data'){
            $('.no-date').addClass('d-none').prop('disabled', true);
            $('.date-mask').removeClass('d-none').prop('disabled', false);
        }else{
            $('.no-date').removeClass('d-none').prop('disabled', false).val('');
            $('.date-mask').addClass('d-none').prop('disabled', true);
        }
    });

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
                    data: {"fileList": rmvFile, tarefa_id: $('[name="tarefa_id"]').val()}
                });

                file.previewElement.remove();
            }
        }
    });

    $(document).on('click', '.btn-remove-anexo', function(){
        var btn = $(this);

        Swal.fire({
            icon: 'error',
            title: 'Gostaria remover esse arquivo',
            showCancelButton: true,
            confirmButtonText: 'SIM',
            cancelButtonText: 'NÃO',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: btn.data('route'),
                    type: 'GET',
                    success: (data) => {
                        $('#anexo-'+btn.data('id')).remove();
                    }
                });
            }
        });
    });

    $(function(){
        if($('#json_calendar').val()){
            var json_calendar = JSON.parse($('#json_calendar').val());
            var events = [];

            $.each(json_calendar, (key, value) => {
                var name = 'Sem Titulo';
                if(value.name){
                    name = value.name;
                }else if(value.tipo){
                    name = value.tipo
                }
                events.push({
                    title: name,
                    start: value.inicio,
                    end: value.fim,
                    url: '/tarefa/tarefaDetalhe/'+value.id,
                });
            });

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

    $(document).on('click', '.btn-compartilhar', function(){
        var tarefa_email = '';
        var tarefa_text = '';
        Swal.fire({
            title: 'Compartilhar Tarefa',
            input: 'email',
            inputLabel: 'Email para enviar a tarefa',
            inputPlaceholder: 'Email',
            validationMessage: 'Email incorreto!'
        }).then((result) => {
            tarefa_email = result.value; //----
            if(result.isConfirmed){
                Swal.fire({
                    title: 'Compartilhar Tarefa',
                    input: 'textarea',
                    inputLabel: 'Corpo da mensagem',
                    inputPlaceholder: 'Messagem',
                    showCancelButton: true
                }).then((result) => {
                    tarefa_text = result.value; //-----
                    if(result.isConfirmed){
                        Swal.fire({
                            title: 'Enviando email, aguarde.',
                            allowOutsideClick: false,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        $.ajax({
                            url: $(this).data('url'),
                            type: 'POST',
                            data: {tarefa_id: $(this).data('id'), tarefa_email: tarefa_email, tarefa_text: tarefa_text},
                            success: (data) => {
                                console.log(data);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Email enviado com successo!'
                                });
                            },
                            error: (err) => {
                                console.log(err);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'ops, servidor de email fora do ar ou email incorreto!'
                                });
                            }
                        });
                    }
                });
            }
        });

        // Swal.fire({
        //     title: 'Gerando link, aguarde!',
        //     allowOutsideClick: false,
        //     timerProgressBar: true,
        //     didOpen: () => {
        //         Swal.showLoading();
        //     }
        // });

        // setTimeout(() => {
        //     $.ajax({
        //         url: $(this).data('url'),
        //         type: 'POST',
        //         data: {tarefa_id: $(this).data('id')},
        //         success: (data) => {
        //             console.log(data);
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Link gerado com sucesso',
        //                 text: 'teste'
        //             });
        //         }
        //     });
        // }, 2000)
    });
});

