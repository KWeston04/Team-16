
async function fetchSalesData() {
    try {
        // Call API to get sales data
        const response = await fetch('/api/sales-data'); //endpoint
        const salesData = await response.json();

        const labels = salesData.map(entry => entry.month);
        const values = salesData.map(entry => entry.sales);

        // Update w/ fetched data
        updateSalesChart(labels, values);
    } catch (error) {
        console.error('Failed to fetch sales data:', error);
    }
}

// Functionn initialize the sales chart with dummy data
function initializeSalesChart() {
    const dummyLabels = ['January', 'February', 'March', 'April', 'May'];
    const dummyValues = [150, 200, 250, 300, 400];

    return new Chart(document.getElementById('salesChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: dummyLabels,
            datasets: [
                {
                    label: 'Sales',
                    data: dummyValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: context => `Sales: $${context.raw}`,
                    },
                },
            },
            scales: {
                y: { beginAtZero: true },
            },
        },
    });
}

function updateSalesChart(labels, values) {
    salesChart.data.labels = labels;
    salesChart.data.datasets[0].data = values;
    salesChart.update();
}

const salesChart = initializeSalesChart();

fetchSalesData();
