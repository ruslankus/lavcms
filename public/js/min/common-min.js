$(document).ready(function(t){$(".menu-holder li a").click(function(t){if("link"==$(this).data("type"))return!0;var e=$(this).attr("href");$("document").localScroll({target:e})})});