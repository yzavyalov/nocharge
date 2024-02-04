<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riding Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3"></script>
</head>
<body>

<canvas id="ridingProfileChart" width="800" height="400"></canvas>

<script>
    (function() {
        const canvas = document.getElementById('ridingProfileChart');

        const g = 9.81; // Gravitational constant in m/s^2
        const bicycleMass = 18; // in kg
        const riderMass = 90; // in kg
        const totalMass = bicycleMass + riderMass;
        const V = 5; // Speed in m/s, which is about 18 km/h
        const Crr = 0.004; // Coefficient of rolling resistance for a road bike on asphalt

        const totalDistance = 36000; // in meters for 36 km
        const dataPoints = 360; // every 100 meters
        const distancePerPoint = totalDistance / dataPoints;

        const labels = [];
        const elevations = [];
        const grades = [];
        const powerLevels = [];
        const cadences = [];

        let currentElevation = 0;

        for (let i = 0; i < dataPoints; i++) {
            labels.push(`${(i * distancePerPoint) / 1000} km`);

// Simulating varied terrains
            let elevationChange;
            if (i < 60 || (i >= 180 && i < 240)) { // flat terrains
                elevationChange = Math.random() * 2 - 1; // +/- 1m
            } else if (i >= 60 && i < 120) { // mild climb
                elevationChange = Math.random() * 4 + 2;
            } else if (i >= 120 && i < 180) { // sharp climb
                elevationChange = Math.random() * 6 + 4;
            } else if (i >= 240 && i < 300) { // mild descent
                elevationChange = -1 * (Math.random() * 4 + 2);
            } else { // sharp descent
                elevationChange = -1 * (Math.random() * 6 + 4);
            }
            currentElevation += elevationChange;
            elevations.push(currentElevation);

            let grade = (elevationChange / distancePerPoint) * 100;
            grades.push(grade);

            const powerGravity = totalMass * g * V * Math.sin(Math.atan(grade/100));
            const powerRolling = totalMass * g * V * Crr;
            const totalPower = powerGravity + powerRolling + (Math.random() * 10 - 5); // Adding noise
            powerLevels.push(totalPower);

            let cadence = 90 + (Math.random() * 10 - 5); // Average cadence with noise
            cadences.push(cadence);
        }

        const bicyclePlugin = {

            id: 'bicyclePlugin',
            afterDraw: function(chart) {
                const ctx = chart.ctx;
                const datasetMeta = chart.getDatasetMeta(0); // 0 is the index for the elevation dataset

                if (!datasetMeta.data.length) {
                    return;
                }

                const lastPoint = datasetMeta.data[datasetMeta.data.length - 1].getProps(['x', 'y'], true);
                const chartArea = chart.chartArea;

                const img = new Image();
                img.src = 'data:image/png;base64,...'; // Replace with your Base64 string or external link
                img.onload = function() {
                    ctx.drawImage(img, lastPoint.x - img.width / 2, lastPoint.y - img.height / 2);
                }

                const circleRadius = 60;
                const circleX = chartArea.left + circleRadius + 10;
                const circleY = chartArea.top + circleRadius + 10;
                ctx.beginPath();
                ctx.arc(circleX, circleY, circleRadius, 0, 2 * Math.PI, false);
                ctx.fillStyle = 'white';
                ctx.fill();
                ctx.font = 'bold 14px Arial';
                ctx.fillStyle = 'black';
                ctx.textAlign = 'center';
                ctx.fillText('Heart Rate, BPM', circleX, circleY + 15);
                ctx.fillText(Math.floor(Math.random() * (130 - 90) + 90), circleX, circleY - 10);
            }
        };

        const updateFrequencyFactor = 300;

        const bicyclistSpeed = 5;
        const updateInterval = (1000 * distancePerPoint) / (bicyclistSpeed * updateFrequencyFactor);

        const chart = new Chart(canvas, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Elevation (m)',
                    data: [],
                    borderColor: 'blue',
                    fill: true,
                    yAxisID: 'y-elevation'
                }, {
                    label: 'Power (W)',
                    data: [],
                    borderColor: 'green',
                    fill: false,
                    yAxisID: 'y-power'
                }, {
                    label: 'Cadence (RPM)',
                    data: [],
                    borderColor: 'orange',
                    fill: false,
                    yAxisID: 'y-cadence'
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Distance Covered'
                        }

                    },
                    'y-elevation': {
                        type: 'linear',
                        position: 'left',
                    },
                    'y-power': {
                        type: 'linear',
                        position: 'right',
                        grid: {
                            drawOnChartArea: false,
                        },
                    },
                    'y-cadence': {
                        type: 'linear',
                        position: 'right',
                        grid: {
                            drawOnChartArea: false,
                        },
                        offset: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            },
            plugins: [bicyclePlugin]
        });

        let currentIndex = 0;

        const updateRideProgress = () => {
            if (currentIndex < dataPoints) {

                chart.data.labels.push(labels[currentIndex]);
                chart.data.datasets[0].data.push(elevations[currentIndex]);
                chart.data.datasets[1].data.push(powerLevels[currentIndex]);
                chart.data.datasets[2].data.push(cadences[currentIndex]);
                chart.update();
                currentIndex++;
            } else {
                clearInterval(interval);
            }
        };

        const interval = setInterval(updateRideProgress, updateInterval);

    })();
</script>

</body>
</html>
