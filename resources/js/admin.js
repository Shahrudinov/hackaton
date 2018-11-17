$(document).ready(() => {

    $('.return-book').on('click', (e) => {
        e.preventDefault();
        e.stopPropagation();

        $el = $(e.currentTarget);

        let title = $el.data('title');
        let user = $el.data('user');
        let book = $el.data('book');
        let count = $el.data('count');

        $('.modal-title').text(title);
        $('#count-book').attr('max', count);
        $('#return-book-book').val(book);
        $('#return-book-user').val(user);

        $('.modal').modal('show');

    });

});
