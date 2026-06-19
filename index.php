<?php session_start(); if (!isset($_SESSION["registered"]) || $_SESSION["registered"] !== true) { header("Location: ./login.php"); exit; } ?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Reminder - Bosh sahifa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            border-radius: 20px;
            padding: 40px 50px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .logo {
            font-size: 50px;
            margin-bottom: 10px;
        }
        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 8px;
        }
        .subtitle {
            color: #888;
            font-size: 16px;
            margin-bottom: 25px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 20px;
        }
        .reminder-box {
            background: #f8f9ff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid #667eea;
            text-align: left;
        }
        .reminder-box h3 {
            color: #667eea;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        .reminder-box p {
            color: #444;
            font-size: 18px;
            font-weight: 500;
        }
        .reminder-box .time {
            color: #999;
            font-size: 13px;
            margin-top: 8px;
        }
        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            padding: 12px 28px;
            border: none;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-primary:hover {
            background: #5a6fd6;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }
        .btn-outline:hover {
            background: #667eea;
            color: white;
        }
        .btn-danger {
            background: #ff6b6b;
            color: white;
        }
        .btn-danger:hover {
            background: #e55a5a;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
        }
        .user-info {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
            font-size: 14px;
            color: #aaa;
        }
        .user-info span {
            color: #667eea;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">⏰</div>
        <h1>Smart Reminder</h1>
        <p class="subtitle">Aqlli eslatmalar tizimi</p>

        <!-- SMART REMINDER - Eslatma bloki -->
        <div class="reminder-box">
            <h3>📌 Bugungi eslatma</h3>
            <p>📅 "Loyiha topshirig'ini yuborish"</p>
            <div class="time">⏱️ 15:00 - 16:00 gacha</div>
        </div>

        <div class="btn-group">
            <a href="#" class="btn btn-primary">➕ Yangi eslatma</a>
            <a href="#" class="btn btn-outline">📋 Barcha eslatmalar</a>
            <a href="./logout.php" class="btn btn-danger">🚪 Chiqish</a>
        </div>

        <div class="user-info">
            👤 Xush kelibsiz, <span><?php echo htmlspecialchars($_SESSION["username"] ?? "Foydalanuvchi"); ?></span>
        </div>
    </div>
</body>
</html>