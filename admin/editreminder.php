<?php
session_start();

if (!isset($_SESSION["registered"]) || $_SESSION["registered"] !== true) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

$file = '../data/reminders.json';

$data = [];

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
}

$currentReminder = null;

if (is_array($data)) {
    foreach ($data as $reminder) {
        if (isset($reminder['id']) && $reminder['id'] == $id) {
            $currentReminder = $reminder;
            break;
        }
    }
}

if (!$currentReminder) {
    echo "<h2 style='color:red;text-align:center;margin-top:50px;'>Reminder topilmadi!</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reminder</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-100 flex items-center justify-center p-6">

    <div class="w-full max-w-xl bg-white rounded-3xl shadow-2xl p-8">

        <!-- HEADER -->
        <div class="text-center mb-6">
            <div class="text-5xl mb-2 text-blue-500">
                <i class="fas fa-pen-to-square"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Eslatmani tahrirlash</h1>
            <p class="text-gray-500 text-sm">Ma’lumotlarni yangilang</p>
        </div>

        <!-- FORM -->
        <form method="POST" action="index.php" class="space-y-4">

            <input type="hidden" name="id"
                value="<?= htmlspecialchars($currentReminder['id'] ?? '') ?>">

            <!-- TITLE -->
            <div>
                <label class="text-sm text-gray-600">Sarlavha</label>
                <input type="text" name="title"
                    value="<?= htmlspecialchars($currentReminder['name'] ?? '') ?>"
                    class="w-full mt-1 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="text-sm text-gray-600">Tavsif</label>
                <input type="text" name="description"
                    value="<?= htmlspecialchars($currentReminder['description'] ?? '') ?>"
                    class="w-full mt-1 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-purple-400 outline-none">
            </div>

            <!-- DATE + TIME -->
            <div class="grid grid-cols-2 gap-3">

                <div>
                    <label class="text-sm text-gray-600">Sana</label>
                    <input type="date" name="date"
                        value="<?= htmlspecialchars($currentReminder['date'] ?? date('Y-m-d')) ?>"
                        class="w-full mt-1 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Vaqt</label>
                    <input type="time" name="time"
                        value="<?= htmlspecialchars($currentReminder['time'] ?? date('H:i')) ?>"
                        class="w-full mt-1 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-purple-400 outline-none">
                </div>

            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-3 rounded-xl font-bold hover:scale-[1.02] transition">

                <i class="fas fa-save mr-2"></i>
                Saqlash
            </button>

        </form>

    </div>

</body>

</html>