var scr = document.getElementById('scr');
var scrtbl = document.getElementById('scrtbl');
    scr.onscroll = function() {
        scrtbl.scrollLeft = scr.scrollLeft;
    };
    scrtbl.onscroll = function() {
        scr.scrollLeft = scrtbl.scrollLeft;
    };
