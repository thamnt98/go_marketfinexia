$('.ajax-form').on('submit', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    let form = $(this);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        data: form.serialize(),
        type: form.attr('method'),
        url: form.attr('action'),
        success: function (response) {
            let result = JSON.parse(response);
            if (result.status == 400) {
                form.find('.errors .text-danger').remove();
                form.find('.errors').removeClass('has-error');
                $.each(result.data, function (index, value) {
                    index = index.replace(".", "_");
                    index = index.replace(".", "_");
                    if ($.isArray(value)) {
                        let errorsDiv = $(document).find('.errors-'+index);
                        errorsDiv.html('');
                        errorsDiv.addClass('has-error');
                        $.each(value, function (key, error) {
                            errorsDiv.append('<span class="text-danger">'+error+'</span>');
                        });
                    } else {
                        form.find("."+index).removeClass('hidden');
                    }
                });
            }
            if (result.status == 200) {
                $.magnificPopup.close();
                form.find('.errors .text-danger').remove();
                form.find('.errors').removeClass('has-error');
                if (result.url == null) {
                    form.find('.errors .text-danger').remove();
                    form.find('.errors').removeClass('has-error');
                } else {
                    window.open(result.url);
                }
            }
        },
        error : function (response) {
        }
    });
});
