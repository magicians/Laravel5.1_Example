$(function() {
    $('a[href="#toggle-search"], .news-search .input-group-btn > .btn[type="reset"]').on('click', function(event) {
        event.preventDefault();
        $('.news-search .input-group > input').val('');
        $('.news-search').toggleClass('open');
        $('a[href="#toggle-search"]').closest('li').toggleClass('active');

        if ($('.news-search').hasClass('open')) {
            setTimeout(function() {
                $('.news-search .form-control').focus();
            }, 100);
        }
    });

    $(document).on('keyup', function(event) {
        if (event.which == 27 && $('.news-search').hasClass('open')) {
            $('a[href="#toggle-search"]').trigger('click');
        }
    });

});