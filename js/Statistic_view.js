class Statistic_view {
  constructor(id, data_points) {
    this.id = document.getElementById(id);
    this.data_points = data_points;
    this.horizontal_scope = data_points.length;
    this.vertical_scope = 10;
    this.canvas_width = 1000;
    this.current_index = 0;
    this.current_value = 0;
    this.column_width = (this.canvas_width - 100) / (this.horizontal_scope - 1);

  }

  render() {
    let canvas = this.id;
    if(canvas.getContext) {
      let ctx = canvas.getContext('2d');
      for(this.i = 0; this.i <= this.vertical_scope; this.i++) {
        ctx.beginPath();
        this.current_value = this.data_points[this.i];
        // Horizontaly labels
        ctx.fillStyle = '#fff';
        ctx.font = "15px Verdana";
        ctx.fillText(10 - this.i, 5, 40 * (this.i + 1) + 5);
        // Horizontaly lines
        ctx.moveTo(50, 40 * (this.i + 1));
        ctx.lineTo(950, 40 * (this.i + 1));
        ctx.lineWidth = 4;
        ctx.strokeStyle = '#55555523';
        ctx.stroke();
      }

      this.current_x = this.canvas_width / this.horizontal_scope;

      for(this.i = 0; this.i < this.horizontal_scope; this.i++) {
        this.current_value = this.data_points[this.i];
        // Vertical lines
        ctx.beginPath();
        ctx.moveTo(this.i * this.column_width + 50, 40);
        ctx.lineTo(this.i * this.column_width + 50, 440);
        ctx.strokeStyle = '#55555523';
        ctx.stroke();
        // Vertical labels
        ctx.beginPath();
        ctx.fillStyle = '#fff';
        ctx.fillText(this.current_value.day, this.i * this.column_width + 35, 480);
        ctx.fill();
        // Circles
        ctx.beginPath();
        ctx.moveTo(this.i * this.column_width + 50, 500 - this.current_value.y / 50);
        ctx.arc(this.i * this.column_width + 50, 500 - this.current_value.y / 50, 5, 0, 2 * Math.PI);
        ctx.fillStyle = '#17a2b8';
        ctx.fill();
        // Line to connect circles
        this.current_index++;
        if(this.i != this.data_points.length - 1) {
          ctx.lineTo(this.current_index * this.column_width + 50, 500 - this.data_points[this.i+1].y / 50);
          ctx.strokeStyle = '#17a2b8';
          ctx.stroke();
        }
      }

    }
  }
}
