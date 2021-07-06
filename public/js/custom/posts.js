$(function () {

    $('#store-post-form').on('submit', function (e) {
        e.preventDefault();

        let url = $(this).attr('action');
        let method = $(this).attr('method');
        let data = new FormData(this);

        $('#posts-wrapper').hide();
        $('.loader').show();

        $.ajax({
            url: url,
            method: method,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (html) {

                $('#post-text').val("");
                $('#posts-wrapper').empty().append(html);
                $('#posts-wrapper').show();
                $('.loader').hide();

            },

        });//end of ajax call

    });

    $(document).on('click', '.reply-link', function (e) {
        e.preventDefault();

        $(this).parentsUntil('.media').find('.store-reply-form:first').show();
        $(this).parentsUntil('.media').find('.store-reply-form:first input[name="text"]').focus();

    })

    $(document).on('submit', '.store-reply-form', function (e) {
        e.preventDefault();

        let url = $(this).attr('action');
        let method = $(this).attr('method');
        let data = new FormData(this);

        $('#posts-wrapper').hide();
        $('.loader').show();

        $.ajax({
            url: url,
            method: method,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (html) {

                $('#post-text').val("");
                $('#posts-wrapper').empty().append(html);
                $('#posts-wrapper').show();
                $('.loader').hide();

            },

        });//end of ajax call

    });

    $(document).on('click', '.attach-image-btn', function (e) {
        e.preventDefault();

        let user = $(this).data('userId');
        let url = $(this).data('imagesUrl');

        if (user) {

            $('.modal').modal('show');
            $.ajax({
                url: url,
                cache: false,
                success: function (html) {
                    $('.modal .modal-body').empty().append(html);
                },
            });//end of ajax call

        } else {
            $(this).parentsUntil('.media').find('input[name="image"]:first').click();
        }

    })

    $(document).on('click', '.delete-user-image-btn', function () {

        let url = $(this).data('url');
        let imageId = $(this).data('id');

        $('#' + imageId).remove();

        $.ajax({
            url: url,
            method: 'post',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                '_method': 'delete'
            },
            cache: false,

        });//end of ajax call
    })

});//end of document ready
