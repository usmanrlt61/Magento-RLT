require([
    'jquery'
], function ($) {
    'use strict';
    $(document).ready(function($){
        $(document).on("click", ".level-2", function(){
        $(".item-menu2.parent.level-1").addClass("active");
    });
        $(document).on("click", ".admin__menu .action-close", function(){
        $(".item-menu2.parent.level-1").removeClass("active");
    });
    });
});