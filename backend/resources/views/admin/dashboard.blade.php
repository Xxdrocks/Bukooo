<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
            display: flex;
        }



        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow-y: auto;
        }

        .header {
            align-items: center;
            display: flex;
            color: #2c3e50;
            font-weight: 600;
            padding: 20px;
            width: 100%;
            text-align: center;

        }
        .header img {
            width: 70px;
            margin-right: 20px;;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            flex: 1 1 200px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-width: 200px;
            max-width: 300px;
        }

        .card h2 {
            margin: 0;
            font-size: 30px;
            color: #4e73df;
        }

        .card p {
            margin: 5px 0 0;
            font-weight: bold;
            color: #555;
        }

        .chart-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .chart-box h3 {
            margin: 0 0 20px;
            text-align: center;
            color: #4e73df;
        }

        @media (max-width: 768px) {
            .cards {
                flex-direction: column;
            }

            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                border-right: none;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="sidebar">
        @include('components.admin-nav')
    </div>

    <div class="main-content">
        <div class="header">
            <img src="{{  asset('assets/navbar/logo.png') }}" alt="">
            <h1>Bukoo Dashboard</h1>
        </div>

        <div class="container">
            <div class="cards">
                <div class="card">
                    <h2>1</h2>
                    <p>Total Users</p>
                </div>
                <div class="card">
                    <h2>2</h2>
                    <p>Total Products</p>
                </div>
                <div class="card">
                    <h2>17</h2>
                    <p>Total Orders</p>
                </div>
            </div>

            <div class="chart-box">
                <h3>Orders per Month</h3>
                <canvas id="ordersChart" height="120"></canvas>
            </div>

            <div class="chart-box">
                <h3>Top Selling Products</h3>
                <canvas id="productsChart" height="120"></canvas>
            </div>
        </div>
    </div>

    <script>
        const ordersPerMonth = @json($ordersPerMonth);
        const topProducts = @json($topProducts);

        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: Object.keys(ordersPerMonth),
                datasets: [{
                    label: 'Orders',
                    data: Object.values(ordersPerMonth),
                    borderColor: '#4e73df',
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    tension: 0.3,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const productsCtx = document.getElementById('productsChart').getContext('2d');
        new Chart(productsCtx, {
            type: 'bar',
            data: {
                labels: topProducts.map(p => p.name),
                datasets: [{
                    label: 'Sold',
                    data: topProducts.map(p => p.count),
                    backgroundColor: '#1cc88a',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
