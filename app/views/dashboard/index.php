<!DOCTYPE html>  
<html lang="fa" dir="rtl">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>داشبورد تحلیلی</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
</head>  
<body class="bg-light">  
    <div class="container mt-5">  
        <h1 class="mb-4">داشبورد تحلیلی</h1>  
        <div class="row">  
            <div class="col-md-4">  
                <div class="card text-white bg-primary mb-3">  
                    <div class="card-header">فروش کل</div>  
                    <div class="card-body">  
                        <h5 class="card-title"><?= number_format($salesSummary['total_sales'], 2) ?> تومان</h5>  
                        <p class="card-text">تعداد سفارشات: <?= $salesSummary['total_orders'] ?></p>  
                    </div>  
                </div>  
            </div>  
            <div class="col-md-4">  
                <div class="card text-white bg-success mb-3">  
                    <div class="card-header">خرید کل</div>  
                    <div class="card-body">  
                        <h5 class="card-title"><?= number_format($purchaseSummary['total_purchases'], 2) ?> تومان</h5>  
                        <p class="card-text">تعداد سفارشات: <?= $purchaseSummary['total_orders'] ?></p>  
                    </div>  
                </div>  
            </div>  
            <div class="col-md-4">  
                <div class="card text-white bg-danger mb-3">  
                    <div class="card-header">کالاهای با موجودی کم</div>  
                    <div class="card-body">  
                        <h5 class="card-title"><?= $lowStockCount['low_stock_count'] ?> کالا</h5>  
                        <p class="card-text">نیاز به بررسی فوری</p>  
                    </div>  
                </div>  
            </div>  
        </div>  
        
        <div class="row mt-4">  
            <div class="col-md-6">  
                <canvas id="salesChart"></canvas>  
            </div>  
            <div class="col-md-6">  
                <canvas id="purchasesChart"></canvas>  
            </div>  
        </div>  
    </div>  
    
    <script>  
        const salesData = {  
            labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور'],  
            datasets: [{  
                label: 'فروش ماهانه',  
                data: [1200000, 1500000, 1800000, 900000, 1100000, 1300000],  
                backgroundColor: 'rgba(54, 162, 235, 0.2)',  
                borderColor: 'rgba(54, 162, 235, 1)',  
                borderWidth: 1  
            }]  
        };  

        const purchasesData = {  
            labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور'],  
            datasets: [{  
                label: 'خرید ماهانه',  
                data: [800000, 900000, 700000, 600000, 1000000, 1200000],  
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  
                borderColor: 'rgba(75, 192, 192, 1)',  
                borderWidth: 1  
            }]  
        };  

        const salesChart = new Chart(document.getElementById('salesChart'), {  
            type: 'line',  
            data: salesData,  
            options: {  
                scales: {  
                    y: {  
                        beginAtZero: true  
                    }  
                }  
            }  
        });  

        const purchasesChart = new Chart(document.getElementById('purchasesChart'), {  
            type: 'bar',  
            data: purchasesData,  
            options: {  
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