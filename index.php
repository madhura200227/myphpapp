
<?php
// MyPHPApp v0.2

$hour = (int) date("H");

if ($hour < 12) {
    $greeting = "Good Morning";
} elseif ($hour < 17) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}

$phpVersion = PHP_VERSION;
$serverName = $_SERVER['SERVER_NAME'] ?? 'OpenShift Container';
$serverSoftware = $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown Server';
$currentTime = date("h:i:s A");
$currentDate = date("l, d F Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPHPApp v0.2</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0b1120;
            color: #f1f5f9;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 35px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: -1px;
        }

        .version {
            background: #1e293b;
            color: #38bdf8;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
        }

        .hero {
            background: linear-gradient(135deg, #172554, #0f172a);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid #263449;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: 38px;
            margin-bottom: 12px;
        }

        .hero p {
            color: #94a3b8;
            font-size: 16px;
        }

        .clock {
            margin-top: 25px;
            font-size: 35px;
            font-weight: bold;
            color: #38bdf8;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: #111c2e;
            border: 1px solid #263449;
            padding: 25px;
            border-radius: 16px;
        }

        .card h3 {
            color: #94a3b8;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .card p {
            font-size: 22px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .status {
            color: #4ade80;
        }

        .footer {
            text-align: center;
            color: #64748b;
            margin-top: 35px;
            font-size: 14px;
        }

        .refresh {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #0284c7;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .refresh:hover {
            background: #0369a1;
        }

        @media (max-width: 600px) {
            .hero {
                padding: 25px;
            }

            .hero h1 {
                font-size: 28px;
            }

            .clock {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <header class="header">
        <div class="logo">⚡ MyPHPApp</div>
        <div class="version">VERSION 0.2</div>
    </header>

    <section class="hero">
        <h1><?php echo htmlspecialchars($greeting); ?> 👋</h1>
        <p>Your PHP application is running successfully on OpenShift.</p>

        <div class="clock" id="clock">
            <?php echo htmlspecialchars($currentTime); ?>
        </div>

        <p style="margin-top: 10px;">
            <?php echo htmlspecialchars($currentDate); ?>
        </p>

        <button class="refresh" onclick="window.location.reload()">
            ↻ Refresh Application
        </button>
    </section>

    <section class="grid">

        <div class="card">
            <h3>Application Status</h3>
            <p class="status">● Online</p>
        </div>

        <div class="card">
            <h3>PHP Version</h3>
            <p><?php echo htmlspecialchars($phpVersion); ?></p>
        </div>

        <div class="card">
            <h3>Application Version</h3>
            <p>0.2.0</p>
        </div>

        <div class="card">
            <h3>Hosting Platform</h3>
            <p>OpenShift</p>
        </div>

        <div class="card">
            <h3>Server Name</h3>
            <<p><?php echo htmlspecialchars($serverName); ?></p>
        </div>

        <div class="card">
            <h3>Server Software</h3>
            <<p><?php echo htmlspecialchars($serverSoftware); ?></p>
        </div>

    </section>

    <footer class="footer">
        <p>MyPHPApp v0.2.0 · Built with PHP · Deployed on OpenShift</p>
        <p style="margin-top: 8px;">© <?php echo date("Y"); ?> MyPHPApp</p>
    </footer>

</div>

<script>
    function updateClock() {
        const now = new Date();

        document.getElementById("clock").textContent =
            now.toLocaleTimeString();
    }

    updateClock();
    setInterval(updateClock, 1000);
</script>

</body>
</html>
