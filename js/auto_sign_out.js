let idleTimeout = 180; //seconds
let idleSecondsCounter = 0;

document.onclick = function() {
  idleSecondsCounter = 0;
};
document.onmousemove = function() {
  idleSecondsCounter = 0;
};
document.onkeypress = function() {
  idleSecondsCounter = 0;
};

window.setInterval(checkIdleTime, 1000);

function checkIdleTime() {
  idleSecondsCounter++;
  if(idleSecondsCounter >= idleTimeout) {
    //change location to logout.php
    document.location.href = "php/login/logout.php";
  }
}
