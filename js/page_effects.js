function resize_height() {
    let height_page;
    let footer;
    height_page = window.innerHeight;
    footer = $("footer")[0];
    height_page -= $("header")[0].clientHeight;
    height_page -= footer.clientHeight;
    $("main")[0].style.minHeight = height_page+'px';
}

let prev_scroll_pos = window.pageYOffset;
window.onscroll = function show_navbar_onscroll() {
    let current_scroll_pos = window.pageYOffset;
    if(prev_scroll_pos > current_scroll_pos) {
        $(".navbar_fixed")[0].style.top = "0";
    } else {
        $(".navbar_fixed")[0].style.top = "-58px";
    }
    prev_scroll_pos = current_scroll_pos;
}

window.onresize = resize_height();
resize_height();
