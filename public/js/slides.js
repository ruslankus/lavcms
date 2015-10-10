$(function() {

    $('.slide-delete').click(function(e){
        link = $(this).attr('href');

        $('#myModal .modal-footer > .btn').attr('href',link);

        $('.modal').modal('show');

        return false;
    });


});//ready