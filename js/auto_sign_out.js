class Auto_sign_out {
  constructor() {
    this.idle_timeout = 180;
    this.idle_time_counter = 0;
    this.document_events();
  }

  document_events() {
    document.onclick = (e) => {
      this.idle_time_counter = 0;
    };
    document.onmousemove = (e) => {
      this.idle_time_counter = 0;
    };
    document.onkeypress = (e) => {
      this.idle_time_counter = 0;
    };
  }

  check_idle_time() {
    setInterval(() => {
      this.idle_time_counter++;
      if(this.idle_time_counter >= this.idle_timeout) {
        //change location to logout.php
        document.location.href = "php/login/logout.php";
      }
    }, 1000);
  }
}

let Sign_out_obj = new Auto_sign_out();
Sign_out_obj.check_idle_time();
