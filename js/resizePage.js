window.onload = () => {
    document.getElementsByTagName("body")[0].onresize = resizeHeight;
    resizeHeight();
};

function resizeHeight() {
    let heightPage = window.innerHeight;
    let footer = document.getElementsByTagName("footer")[0];
    heightPage -= document.getElementsByTagName("header")[0].clientHeight;
    footer.style
    heightPage -= footer.clientHeight;
    document.getElementsByTagName("main")[0].style.minHeight = heightPage+'px';
}
