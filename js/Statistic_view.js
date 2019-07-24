class Statistic_view {
  constructor(type, id, data) {
    this.type = type;
    this.id = id;
    this.canvas = $('#' + id)[0];
    this.data = data;
    this.content = '';
    this.vertical_labels = 10;
    this.distance_x = 0;
    this.distance_y = 0;

    this.vertical_scope = 10;
    this.canvas_width = 1000;
    this.current_index = 0;
    this.current_value = 0;
    this.column_width = (this.canvas_width - 100) / this.data.length;

    this.line_hor_start = 0;
    this.line_hor_end = 0;
    this.line_ver_start = 0;
    this.line_ver_end = 0;
  }

  canvas_dots() {
    this.ctx = this.canvas.getContext("2d");
    this.distance_x = (this.canvas.width - 200) / (this.data.length - 1);
    this.distance_y = (this.canvas.height - 100) / (this.vertical_labels);
    this.line_hor_start = 100;
    this.line_hor_end = this.canvas.width - 100;
    this.line_ver_start = 20;
    this.line_ver_end = this.canvas.height - 80;

    this.reOffset();
    window.onscroll = (e) => { this.reOffset(); }
    window.onresize = (e) => { this.reOffset(); }
    this.canvas.addEventListener('mousemove', e => {
      this.handleMouseMove(e);
    });
    this.draw();
  }

  reOffset() {
    this.offset = this.canvas.getBoundingClientRect();
    this.offset_x = this.offset.left;
    this.offset_y = this.offset.top;
  }

  /*
   * Return corrent y value, because canvas start from top
   */
  get_y(y) {
    return - y + 420;
  }

  draw() {
    for(this.i = 0; this.i < this.data.length; this.i++){
      let d = this.data[this.i];
      this.current_value = this.data[this.i];
      d.x = this.distance_x * this.i + 100;
      /*
       * Vertical lines
       */
      this.ctx.beginPath();
      this.ctx.moveTo(d.x, this.line_ver_start);
      this.ctx.lineTo(d.x, this.line_ver_end);
      this.ctx.strokeStyle = '#55555540'; //                                 to change
      // this.ctx.strokeStyle = '#fff'; //                                         to remove
      this.ctx.lineWidth = 4;
      this.ctx.stroke();
      /*
       * Vertical labels
       */
      this.ctx.beginPath();
      this.ctx.fillStyle = '#fff';
      this.ctx.fillText(this.data[this.i].label_x, d.x-20, 480);
      this.ctx.fill();
      /*
       * Circles
       */
      this.ctx.beginPath();
      this.ctx.arc(d.x, this.get_y(d.y), d.radius, 0, Math.PI*2);
      this.ctx.fillStyle = '#17a2b8';
      this.ctx.closePath();
      this.ctx.fill();
      this.ctx.stroke();
      /*
       * Line to connect circles
       */
      this.current_index++;
      d.x = this.distance_x*(this.i + 1) + 100;
      if(this.i != this.data.length - 1) {
        this.ctx.lineTo(d.x, this.get_y(this.data[this.i+1].y));
        this.ctx.strokeStyle = '#17a2b8';
        this.ctx.stroke();
      }
    }
    this.current_index = 0;

    for(this.i = 0; this.i <= this.vertical_labels; this.i++) {
      let dy = this.distance_y * this.i + 20;
      /*
       * Horizontaly labels
       */
      this.ctx.beginPath();
      this.ctx.fillStyle = '#fff';
      this.ctx.fillText(10 - this.i, 40, dy);
      /*
       * Horizontaly lines
       */
      this.ctx.moveTo(this.line_hor_start - 2, dy);
      this.ctx.lineTo(this.line_hor_end + 2, dy);
      this.ctx.lineWidth = 4;
      this.ctx.strokeStyle = '#55555540'; //                                 to change
      // this.ctx.strokeStyle = '#fff'; //                                         to remove
      this.ctx.stroke();
    }
  }

  handleMouseMove(e) {
    /*
     * Handling this event
     */
    e.preventDefault();
    e.stopPropagation();
    this.mouse_x = parseInt(e.clientX - this.offset_x);
    this.mouse_y = parseInt(e.clientY - this.offset_y);
    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
    this.draw();

    for(this.i = 0; this.i < this.data.length; this.i++) {
      let d = this.data[this.i];
      d.x = this.distance_x * this.i + 70;
      let dx = this.mouse_x - d.x - 30;
      let dy = this.mouse_y - this.get_y(d.y);
      // if(dx * dx + dy * dy < d.radius * d.radius) {
      if(dx * dx + dy * dy < 30 * 30) {
        this.ctx.fillStyle = "#000000b0";
        this.ctx.fillRect(d.x + 30, this.get_y(d.y), 150, 35);
        this.ctx.fillStyle = "#fff";
        this.ctx.fillText(d.tip, d.x + 40, this.get_y(d.y) + 22);
      }
    }
  }


  get_style_percent(number) {
    return 'style = "background: linear-gradient(to right, #252830 ' + number + '%, #1a1c22 ' + number + '%);"';
  }

  diagram_line() {
    this.content = '<div class="px-0 mx-0 text-light border-bottom border rounded border-dark">' +
        '<div class="px-3 py-1 text-light border-bottom border-dark">' +
          'Sort by' +
        '</div>' +
        '<div class="px-3 py-1 text-muted border-bottom border-dark">' +
          'Sort by' +
        '</div>' +
        '<div class="px-3 py-1 text-muted border-bottom border-dark">' +
          'Sort by' +
        '</div>' +
        '<div class="px-3 py-1 text-muted">' +
          'Sort by' +
        '</div>' +
      '</div>';

    this.content = '<div class="px-0 mx-0 text-light border-bottom border rounded border-dark">' +
        '<div class="px-3 py-2 text-light border-bottom border-dark" ' +
          this.get_style_percent(this.data[0].x) + '>' +
          this.data[0].label +
        '</div>';

      for(this.i = 1; this.i < this.data.length; this.i++) {
          if(this.i != this.data.length - 1) {
            this.content += '<div class="px-3 py-2 text-muted border-bottom border-dark" ' +
              this.get_style_percent(this.data[this.i].x) + '>' +
                this.data[this.i].label +
              '</div>';
          } else {
            this.content += '<div class="px-3 py-2 text-muted" ' +
              this.get_style_percent(this.data[this.i].x) + '>' +
                this.data[this.i].label +
              '</div>';
          }
      }
      this.centent += '</div></div>';
    this.canvas.innerHTML = this.content;
  }


  render() {
    if(this.type == 'canvas_field') {
      this.canvas_dots();
    } else if(this.type == 'diagram_line') {
      this.diagram_line();
    }
  }
}
