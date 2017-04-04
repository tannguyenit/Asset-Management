 $(document).ready(function() {
      var d = $('.bbb').data('list');
      var b = [];
      b = d.split(','); 
      var data1 = [];
      b.forEach(function(index, el) {
        var t = el + 1;
        var year = 1;
        var x = [];
        x.push(gd(year, t, 1));
        x.push(index);
        data1.push(x);
      });
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1,
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 1
          },
          grid: {
           verticalLines: true,
           hoverable: true,
           clickable: true,
           tickColor: "#d5d5d5",
           borderWidth: 1,
           color: '#fff'
         },
         colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
         xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",

        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month-1, day).getTime();
      }
    });
    var opts = {
      lines: 12,
      angle: 0,
      lineWidth: 0.4,
      pointer: {
        length: 0.75,
        strokeWidth: 0.042,
        color: '#1D212A'
      },
      limitMax: 'false',
      colorStart: '#1ABC9C',
      colorStop: '#1ABC9C',
      strokeColor: '#F0F3F3',
      generateGradient: true
    };
    var target = document.getElementById('foo'),
    gauge = new Gauge(target).setOptions(opts);
    var tongtien=Number($("#tongtien_kp").val());
    var tiendung=$("#tiendung").val();
    gauge.maxValue = tongtien;
    gauge.animationSpeed = 32;
    gauge.set(tiendung);