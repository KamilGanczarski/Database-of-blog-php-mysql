let height_page;
let footer;
window.onresize = resize_height;
resize_height();

function resize_height() {
    height_page = window.innerHeight;
    footer = $("footer")[0];
    height_page -= $("header")[0].clientHeight;
    height_page -= footer.clientHeight;
    $("main")[0].style.minHeight = height_page+'px';
}