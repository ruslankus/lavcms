$(function(){

    initRedactor();

});

function initRedactor(){
    CKEDITOR.replace( 'text-area',{

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
