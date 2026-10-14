$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    const fmt = n => new Intl.NumberFormat('es-CL').format(n);

    // Toggle mensual / anual
    $('#billingToggle').on('change', function () {
        const yearly = this.checked;
        $('.price').each(function () {
            const amount = yearly ? $(this).data('yearly') : $(this).data('monthly');
            $(this).find('.price__amount').text(fmt(amount));
            $(this).find('.price__period').text(yearly ? '/año' : '/mes');
        });
        $('.toggle__label').removeClass('is-active');
        $('.toggle__label[data-period="' + (yearly ? 'yearly' : 'monthly') + '"]').addClass('is-active');
    });

    // Preseleccionar plan en el mensaje
    $('.js-select-plan').on('click', function () {
        $('#leadForm textarea[name="message"]').val('Hola, me interesa el plan ' + $(this).data('plan') + '.');
    });

    // Envío del formulario
    $('#leadForm').on('submit', function (e) {
        e.preventDefault();
        const $btn = $('#leadSubmit').prop('disabled', true).text('Enviando...');

        $.ajax({
            url: '/taser-erp/public/contacto',   // en producción: '/contacto'
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json'
        })
        .done(res => {
            Swal.fire({ icon: 'success', title: '¡Enviado!', text: res.message, confirmButtonColor: '#4f46e5' });
            $('#leadForm')[0].reset();
        })
        .fail(xhr => {
            let msg = 'Ocurrió un error. Intenta nuevamente.';
            if (xhr.status === 422) {
                msg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
            } else if (xhr.status === 429) {
                msg = 'Demasiados intentos. Espera un minuto.';
            }
            Swal.fire({ icon: 'error', title: 'Revisa el formulario', html: msg });
        })
        .always(() => $btn.prop('disabled', false).text('Enviar'));
    });
});