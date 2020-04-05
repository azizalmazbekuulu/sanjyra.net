var body = document.getElementsByTagName("body")[0];
var main = document.getElementsByTagName("main")[0];
var footer = document.getElementsByTagName("footer")[0];
var nav = document.getElementsByTagName("nav")[0];
var app = document.getElementById('app');
function changePx() {
    var x = footer.offsetHeight;
    body.style.marginBottom = x + "px";
    // body.style.height = main.offsetHeight + nav.offsetHeight - footer.offsetHeight + "px";
};
window.addEventListener("resize", function() {
    var x = footer.offsetHeight;
    body.style.marginBottom = x + "px";
    // body.style.height = main.offsetHeight + nav.offsetHeight + "px";
});
function social_share(link) {
    var title = document.title;
    window.open(link.concat(title), "_blank");
}