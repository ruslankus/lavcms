$(function(){

    initRedactor();

    $('.lng_id').change(function(e){
        var lng_id = $(this).val();
        getContent(lng_id);
        return false;
    });//lng change

    $('#form').on('click','#btn-continue',function(){
        var lng_id = $('#currrent-lng-id').val();
        getContent(lng_id);
        return false;
    });



    $('#form').on('click','#save-content',function(){

        var placeholder = '<div class="place-holder">'+
            '<table><tr><td><img src="/images/728.GIF" ></td></tr></table></div>';

        $(placeholder).attr('id','spinner').appendTo('body');

        var formObj = $('#form').serializeArray();
        formObj[2]['value'] = editor.getData();

        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        var slideId = $('#slide-id').val();
        var url = '/admin/slides/ajax-slide-content-save/' + slideId;

        $('#form').load(url,formObj,function(){
            fadespinner();
        });


        return false;
    });



});


function getContent(lng_id){



    var placeholder = '<div class="place-holder">'+
        '<table><tr><td><img src="/images/728.GIF" ></td></tr></table></div>';

    $(placeholder).attr('id','spinner').appendTo('body');
    var slideId = $('#slide-id').val();
    var url = '/admin/slides/ajax-slide-content/' + slideId;

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#form').load(url,{'lng_id':lng_id},function(){

        fadespinner();
        initRedactor();
    });

}//languageChange

function initRedactor(){
    editor = CKEDITOR.replace( 'text-area',{

        // Define the toolbar groups as it is a more accessible solution.
        toolbarGroups: [
            {"name":"basicstyles","groups":["basicstyles"]},
            {"name":"links","groups":["links"]},
            {"name":"paragraph","groups":["list","blocks"]},
            {"name":"document","groups":["mode"]},
            {"name":"insert","groups":["insert"]},
            {"name":"styles","groups":["styles"]},
            {"name":"tools","item":["Maximize"]}

        ],

        // List of text formats available for this editor instance.
        format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',

        // Remove the redundant buttons from toolbar groups defined above.
        removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,Image'

    });
}

function fadespinner(){

    $('#spinner').fadeOut('slow',function(){
        $(this).remove();
    })
}
