class Statistic_view {
  constructor(type, id, data) {
    this.type = type;
    this.canvas = $('#' + id)[0];
    this.data = data;
    this.content = '';
    this.ctx;
    this.offset;
    this.offset_x;
    this.offset_y;
    // Scale to correct mouse position 
    // if canvas size is different from original size
    this.scale;
    this.limits = {
      min: 0, // Min value of vertical label
      max: 0, // Max value of vertical label
      scope: 0,
      bottom: 0 // number to create vertical labels
    };
    this.distance = {
      x: 0, // The distance between two vertical lines
      y: 0 // The distance between two horizontal lines
    };
    this.line = {
      hor_start: 0, // First x position for horizontal lines
      hor_end: 0, // Last x position for horizontal lines
      ver_start: 0, // First y position for vertical lines
      ver_end: 0 // Last y position for vertical lines
    };
  }

  line_chart() {
    this.ctx = this.canvas.getContext("2d");
    this.distance.x = (this.canvas.width * 0.89) / (this.data.length - 1);
    this.limits.min = this.get_limits_y_value('min');
    this.limits.max = this.get_limits_y_value('max');
    this.limits.max = Math.ceil(this.limits.max.y / 10) * 10;
    this.limits.min = Math.floor(this.limits.min.y / 10) * 10;
    this.limits.max = this.limits.max / 10 + 1;
    this.limits.min = this.limits.min / 10 - 1;

    this.limits.scope = this.limits.max - this.limits.min;
    if(this.limits.scope < 0) {
      this.limits.scope * - 1;
    }
    this.limits.bottom = this.limits.max - this.limits.scope;
    this.distance.y = this.canvas.height * 0.8 / this.limits.scope;
    this.line.hor_start = this.canvas.width * 0.06;
    this.line.hor_end = this.canvas.width * 0.95;
    this.line.ver_start = this.canvas.height * 0.04;
    this.line.ver_end = this.canvas.height * 0.84;

    this.reOffset();
    window.onscroll = (e) => { this.reOffset(); }
    window.addEventListener('resize', () => { this.reOffset(); });
    this.canvas.addEventListener('mousemove', e => {
      this.handle_mouse_move(e);
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
    y /= 10;
    y = (y - this.limits.bottom) * this.distance.y;
    return - y + 420;
  }

  get_limits_y_value(type) {
    let limit_value;
    limit_value = this.data.reduce(function(prev, current) {
      if(type === 'min') {
        return (prev.y < current.y) ? prev : current
      } else if(type === 'max') {
        return (prev.y > current.y) ? prev : current
      }
    });
    return limit_value;
  }

  draw() {
    for(this.i = 0; this.i < this.data.length; this.i++) {
      let d = this.data[this.i];
      d.x = this.distance.x * this.i + 60;
      /*
       * Vertical lines
       */
      this.ctx.beginPath();
      this.ctx.moveTo(d.x, this.line.ver_start);
      this.ctx.lineTo(d.x, this.line.ver_end);
      this.ctx.strokeStyle = '#55555540';
      this.ctx.lineWidth = 4;
      this.ctx.stroke();
      /*
       * Horizontal labels
       */
      this.ctx.beginPath();
      this.ctx.font = "14px Arial";
      this.ctx.fillStyle = '#fff';
      this.ctx.save();
      this.ctx.rotate(- Math.PI / 4);
      this.ctx.fillText(
        this.data[this.i].label_x,
        - 320 + this.i * this.distance.x * 0.7,
        this.line.ver_end - 40 + this.i * this.distance.x * 0.7
      );
      this.ctx.restore();
      /*
       * Circles
       */
      this.ctx.beginPath();
      this.ctx.arc(d.x, this.get_y(d.y), d.radius, 0, Math.PI * 2);
      this.ctx.fillStyle = '#17a2b8';
      this.ctx.strokeStyle = '#17a2b8';
      this.ctx.lineWidth = 0;
      this.ctx.stroke();
      this.ctx.fill();
      /*
       * Line to connect circles
       */
      this.ctx.beginPath();
      if(this.i != this.data.length - 1) {
        this.ctx.moveTo(d.x + 1, this.get_y(this.data[this.i].y));
        d.x = this.distance.x * (this.i + 1) + 60;
        this.ctx.lineTo(d.x - 2, this.get_y(this.data[this.i + 1].y));
        this.ctx.strokeStyle = '#17a2b8';
        this.ctx.stroke();
      }
    }

    for(this.i = 0; this.i <= this.limits.scope; this.i++) {
      let dy = this.distance.y * this.i + 20;
      /*
       * Vertical labels
       */
      this.ctx.beginPath();
      this.ctx.fillStyle = '#fff';
      this.ctx.fillText(
        (this.limits.scope - this.i + this.limits.bottom) * 10,
        10, dy
      );
      /*
       * Horizontal lines
       */
      this.ctx.moveTo(this.line.hor_start - 2, dy);
      this.ctx.lineTo(this.line.hor_end + 2, dy);
      this.ctx.lineWidth = 4;
      this.ctx.strokeStyle = '#55555540';
      this.ctx.stroke();
    }
  }

  handle_mouse_move(e) {
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
      d.x = this.distance.x * this.i + 30;
      this.scale = 1000 / this.canvas.offsetWidth;
      let dx = this.mouse_x * this.scale - d.x - 30;
      let dy = this.mouse_y * this.scale - this.get_y(d.y);
      if(dx * dx + dy * dy < d.radius * d.radius * 36) {
        this.ctx.fillStyle = "#000000b0";
        if(this.i > this.data.length / 2) {
          this.ctx.fillRect(d.x + 30, this.get_y(d.y), - 160, 35);
          this.ctx.fillStyle = "#fff";
          this.ctx.fillText(d.tip + d.y, d.x + 40 - 160, this.get_y(d.y) + 22);
        } else {
          this.ctx.fillRect(d.x + 30, this.get_y(d.y), 160, 35);
          this.ctx.fillStyle = "#fff";
          this.ctx.fillText(d.tip + d.y, d.x + 40, this.get_y(d.y) + 22);
        }
      }
    }
  }


  get_style_percent(number) {
    return 'style = "background: linear-gradient(to right, #252830 ' +
      number + '%, #1a1c22 ' + number + '%);"';
  }

  horizontal_bar_chart() {
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
    if(this.type == 'line_chart') {
      this.line_chart();
    } else if(this.type == 'horizontal_bar_chart') {
      this.horizontal_bar_chart();
    }
  }
}
