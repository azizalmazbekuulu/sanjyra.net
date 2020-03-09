function social_share(link) {
    var title = document.title;
    window.open(link.concat(title), '_blank')
}

document.getElementById("body").onload = function () {
    var x = document.getElementById("footer").offsetHeight;
    document.getElementById("body").style.marginBottom = x+'px';
};

window.addEventListener("resize", myFunction);
function myFunction() {
    var x = document.getElementById("footer").offsetHeight;
    document.getElementById("body").style.marginBottom = x+'px';
}