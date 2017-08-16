"use strict";

function myFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("wrap-header").className = "header wrapper scroll-header";
    } else {
        document.getElementById("wrap-header").className = "header wrapper";
    }
}

window.onscroll = function() {myFunction();};

$(document).ready(function() {

    $("#burger").click(function(event) {
        $("#burger").toggleClass("change");
        $(".wrap-all").toggleClass("move");
        $(".dropdown-content").toggleClass("show");
        event.stopPropagation();
    });

    $("body").click(function() {
        if ($("#burger").hasClass("change")) {
            $("#burger").removeClass("change");
            $(".wrap-all").removeClass("move");
            $(".dropdown-content").removeClass("show");
        }
    });
});
