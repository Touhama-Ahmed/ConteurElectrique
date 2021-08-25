// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var puissance = document.getElementById("puissance").value;
var energie = document.getElementById("energie").value;
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["puissance", "Energie"],
    datasets: [{
      data: [puissance, energie],
      backgroundColor: ['#5682df', '#fbff6f'],
      hoverBackgroundColor: ['#2e59d9', '#feff47'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,

    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
