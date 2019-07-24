window.onload = () => {
    $("body")[0].onresize = resizeHeight();
    resizeHeight();
};

function resizeHeight() {
    let heightPage = window.innerHeight;
    let footer = $("footer")[0];
    heightPage -= $("header")[0].clientHeight;
    heightPage -= footer.clientHeight;
    $("main")[0].style.minHeight = heightPage+'px';
}
