let feedbackCategorySelect = document.getElementById("feedback-category");
feedbackCategorySelect.addEventListener("change", function() {
    let selectedCategory = feedbackCategorySelect.value;
    updateCharts(selectedCategory);
});
function updateCharts(category) {
    let data = [
        ['Excellent', [excellent_Ambi, excellent_Press, excellent_Pace, excellent_Thera, excellent_Satis]],
        ['Good', [good_Ambi, good_Press, good_Pace, good_Thera, good_Satis]],
        ['Poor', [poor_Ambi, poor_Press, poor_Pace, poor_Thera, poor_Satis]]
    ];
    let filteredData = data.map(item => [item[0], item[1][category]]);
    updateChart('container1', filteredData);
    updateChart('container2', filteredData);
    updateChart('container3', filteredData);
    updateChart('container4', filteredData);
    updateChart('container5', filteredData);
}

function updateChart(containerId, data) {
    let chart = Highcharts.charts[containerId];
    chart.update({
        series: chart.series.map((series, i) => {
            return { data: [data[i]] };
        })
    });
}