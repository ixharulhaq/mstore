
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Getting variables from index.php
var vOneLS = localStorage.getItem("GetCredit");
var variableTwo = vOneLS;
var vTwoLS = localStorage.getItem("GetDebit");
var variableThree = vTwoLS; 

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Credits", "Debits"],
    datasets: [{
      data: [variableTwo, variableThree],
      backgroundColor: ['#4e73df', '#FF5733'],
      hoverBackgroundColor: ['#2e59d9', '#C70039'],
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


// Getting variables from index.php
var GNP = localStorage.getItem("GetNProfit");
var variableGNP = GNP;
var GA = localStorage.getItem("GetArrears");
var variableGA = GA; 

// Pie Chart Example
var ctx = document.getElementById("myPieChart2");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Net Profit", "Arrears"],
    datasets: [{
      data: [variableGNP, variableGA],
      backgroundColor: ['#4e73df', '#FF5733'],
      hoverBackgroundColor: ['#2e59d9', '#C70039'],
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


// Getting variables from index.php
var GCUST = localStorage.getItem("GetCust");
var variableGNP = GCUST;
var GAEGNCY = localStorage.getItem("GetAgency");
var variableGA = GAEGNCY; 

// Pie Chart Example
var ctx = document.getElementById("myPieChart3");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Customers", "Agencies"],
    datasets: [{
      data: [variableGNP, variableGA],
      backgroundColor: ['#4e73df', '#FF5733'],
      hoverBackgroundColor: ['#2e59d9', '#C70039'],
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