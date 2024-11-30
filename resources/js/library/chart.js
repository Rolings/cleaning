import Chart from 'chart.js/auto';
import { getRelativePosition } from 'chart.js/helpers';

'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
    green: '#75c181',
    gray: '#a9b5c9',
    text: '#252930',
    border: '#e7e9ed'
};

/* Random number generator for demo purpose */
var randomDataPoint = function(){ return Math.round(Math.random()*10000)};


//Chart.js Line Chart Example

var lineChartConfig = {
    type: 'line',

    data: {
        labels: Object.keys(window.currentMountDay),

        datasets: [{
            label: 'Замовлення',
            fill: false,
            backgroundColor: window.chartColors.green,
            borderColor: window.chartColors.green,
            data: Object.values(window.orderGroupDays),
        }, {
            label: 'Повідомлення',

            backgroundColor: '#eebf41',
            borderColor: '#eebf41',

            data: Object.values(window.callbackGroupDays),
            fill: false,
        }]
    },
    options: {
        responsive: true,
        aspectRatio: 1.5,

        legend: {
            display: true,
            position: 'bottom',
            align: 'end',
        },

        title: {
            display: true,
            text: 'Chart.js Line Chart Example',

        },
        tooltips: {
            mode: 'index',
            intersect: false,
            titleMarginBottom: 10,
            bodySpacing: 10,
            xPadding: 16,
            yPadding: 16,
            borderColor: window.chartColors.border,
            borderWidth: 1,
            backgroundColor: '#fff',
            bodyFontColor: window.chartColors.text,
            titleFontColor: window.chartColors.text,

            callbacks: {
                //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
                label: function(tooltipItem, data) {
                    if (parseInt(tooltipItem.value) >= 1000) {
                        return "$" + tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    } else {
                        return '$' + tooltipItem.value;
                    }
                }
            },

        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
    }
};



// Chart.js Bar Chart Example

var barChartConfig = {
    type: 'bar',

    data: {
        labels: Object.keys(window.orderGroupByMonth),
        datasets: [{
            label: 'Замовлення',
            backgroundColor: window.chartColors.green,
            borderColor: window.chartColors.green,
            borderWidth: 1,
            maxBarThickness: 16,

            data: Object.values(window.orderGroupByMonth)
        }]
    },
    options: {
        responsive: true,
        aspectRatio: 1.5,
        legend: {
            position: 'bottom',
            align: 'end',
        },
        title: {
            display: true,
            text: 'Замовлення'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
            titleMarginBottom: 10,
            bodySpacing: 10,
            xPadding: 16,
            yPadding: 16,
            borderColor: window.chartColors.border,
            borderWidth: 1,
            backgroundColor: '#fff',
            bodyFontColor: window.chartColors.text,
            titleFontColor: window.chartColors.text,

        },
    }
}

// Generate charts on load
window.addEventListener('load', function(){
    var lineChart = document.getElementById('canvas-linechart').getContext('2d');
    window.myLine = new Chart(lineChart, lineChartConfig);

    var barChart = document.getElementById('canvas-barchart').getContext('2d');
    window.myBar = new Chart(barChart, barChartConfig);
});

