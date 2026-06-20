<?php
session_start();
if (!isset($_SESSION["registered"]) || $_SESSION["registered"] !== true) {
    header("Location: ./login.php");
    exit;
}

$reminders = json_decode(file_get_contents("../data/reminders.json"), true);


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST["title"])) {
        echo "<p color: red;> Titleni to'ldiring</p>";
    }
    if (empty($_POST["date"])) {
        echo "<p color: red;> Date to'ldiring</p>";
    }
    if (empty($_POST["time"])) {
        echo "<p color: red;> Time to'ldiring</p>";
    }
    if (empty($_POST["description"])) {
        echo "<p color: red;> Descriptionni to'ldiring</p>";
    }
    $reminders[] = [
        'name' => $_POST['title'],
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'description' => $_POST['description']
    ];
}



file_put_contents("../data/reminders.json", json_encode($reminders));


?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Reminder - Bosh sahifa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/index.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="container mx-auto max-w-4xl">
        <!-- Asosiy container -->
        <div class="glass-effect rounded-3xl shadow-2xl p-8 md:p-10 scrollbar-custom max-h-[95vh] overflow-y-auto">

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full opacity-20 animate-float"></div>
                    <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-gradient-to-r from-pink-400 to-purple-400 rounded-full opacity-20 animate-float" style="animation-delay: 1s;"></div>
                    <div class="text-7xl mb-3 relative">
                        <i class="fas fa-bell text-gradient"></i>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                    Smart <span class="gradient-text">Reminder</span>
                </h1>
                <p class="text-gray-500 mt-2 text-sm md:text-base flex items-center justify-center gap-2">
                    <i class="fas fa-brain text-purple-500"></i>
                    Aqlli eslatmalar tizimi
                    <i class="fas fa-rocket text-blue-500"></i>
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mx-auto mt-3"></div>
            </div>

            <!-- Yangi eslatma qo'shish -->
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 mb-8 border-2 border-blue-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center text-white">
                        <i class="fas fa-plus text-sm"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700">Yangi eslatma qo'shish</h3>
                </div>

                <form method="POST" class="space-y-4" action="index.php">
                    <input type="hidden" name="action" value="add">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="relative">
                            <i class="fas fa-tag absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" name="title" placeholder="Sarlavha" required
                                class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                        </div>
                        <div class="relative">
                            <i class="fas fa-calendar-day absolute left-3 top-3 text-gray-400"></i>
                            <input type="date" name="date" required
                                class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="relative">
                            <i class="fas fa-clock absolute left-3 top-3 text-gray-400"></i>
                            <input type="time" name="time" required
                                class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                        </div>
                        <div class="relative">
                            <i class="fas fa-align-left absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" name="description" placeholder="Tavsif (ixtiyoriy)"
                                class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                        </div>
                    </div>

                    <button type="submit" class="w-full btn-gradient text-white font-bold py-3 px-6 rounded-xl transition-all hover:scale-[1.02] active:scale-[0.98]">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Eslatma qo'shish
                    </button>
                </form>
            </div>


            <!-- Eslatmalar ro'yxati -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center text-white">
                            <i class="fas fa-list text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-700">Mening eslatmalarim</h3>
                        <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full"><?= count($reminders) ?> ta</span>
                    </div>
                    <button onclick="location.reload()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>

            </div>

            <!-- Zamonaviy table dizayni -->
            <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                            <th class="px-6 py-4 text-left font-semibold rounded-tl-2xl">
                                <i class="fas fa-hashtag mr-2"></i>№
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">
                                <i class="fas fa-tag mr-2"></i>Sarlavha
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">
                                <i class="fas fa-calendar-day mr-2"></i>Sana
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">
                                <i class="fas fa-clock mr-2"></i>Vaqt
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">
                                <i class="fas fa-align-left mr-2"></i>Tavsif
                            </th>
                            <th class="px-6 py-4 text-left font-semibold rounded-tr-2xl">
                                <i class="fas fa-cog mr-2"></i>Amallar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($reminders)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-12 text-gray-400">
                                    <i class="fas fa-inbox text-4xl block mb-3"></i>
                                    <span class="text-lg">Hozircha eslatmalar mavjud emas</span>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($reminders as $i => $reminder): ?>
                                <tr class="border-b border-gray-100 hover:bg-blue-50/50 transition-colors duration-200 <?= $i % 2 === 0 ? 'bg-white' : 'bg-gray-50/50' ?>">
                                    <td class="px-6 py-4 font-medium text-gray-700">
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-100 text-blue-600 text-xs font-bold">
                                            <?= $i + 1 ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-800">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-gradient-to-r from-blue-400 to-purple-400 inline-block"></span>
                                            <?= $reminder['name'] ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 px-3 py-1.5 rounded-lg text-xs font-medium">
                                            <i class="fas fa-calendar-alt text-blue-400"></i>
                                            <?= $reminder['date'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        <span class="inline-flex items-center gap-1.5 bg-purple-50 text-purple-700 px-3 py-1.5 rounded-lg text-xs font-medium">
                                            <i class="fas fa-clock text-purple-400"></i>
                                            <?= $reminder['time'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 max-w-[150px] truncate">
                                        <?= !empty($reminder['description']) ? $reminder['description'] : '<span class="text-gray-300 text-sm">—</span>' ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <!-- Edit tugmasi -->
                                            <a href="edit.php?id=<?= $i ?>" class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium rounded-lg transition-colors">
                                                <i class="fas fa-pen-to-square"></i>
                                                Tahrirlash
                                            </a>
                                            <!-- Delete form -->
                                            <form action="deletereminder.php" method="POST" class="inline" onsubmit="return confirm('Rostdan ham ushbu eslatmani o\'chirmoqchimisiz?');">
                                                <input type="hidden" name="id" value="<?= $i ?>">
                                                <button href="delete.php?id=<?= $i['id'] ?>" type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors">
                                                    <i class="fas fa-trash-can"></i>
                                                    O'chirish
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

            <!-- Tugmalar guruhi -->
            <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
                <button onclick="location.reload()" class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-2xl font-bold transition-all hover:scale-105 shadow-lg shadow-blue-200">
                    <i class="fas fa-sync-alt mr-2"></i>
                    Yangilash
                </button>
                <a href="./logout.php" class="px-8 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-2xl font-bold transition-all hover:scale-105 shadow-lg shadow-red-200">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Chiqish
                </a>
            </div>

            <!-- Foydalanuvchi ma'lumoti -->
            <div class="mt-8 pt-6 border-t-2 border-gray-100 flex items-center justify-center gap-3 text-gray-500 text-sm">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center text-white font-bold">
                    <i class="fas fa-user"></i>
                </div>
                <span>Xush kelibsiz,</span>
                <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Foydalanuvchi</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span class="flex items-center gap-1">
                    <i class="fas fa-circle text-green-500 text-[8px]"></i>
                    Online
                </span>
            </div>
        </div>
    </div>

    <!-- Tahrirlash modal oynasi -->
    <div id="editModal" class="fixed inset-0 modal-overlay hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl p-8 max-w-md w-full shadow-2xl transform transition-all scale-95">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 flex items-center justify-center text-white">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Eslatmani tahrirlash</h2>
                </div>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form method="POST" class="space-y-4">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" id="edit_id">

                <div class="relative">
                    <i class="fas fa-tag absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" name="title" id="edit_title" placeholder="Sarlavha" required
                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                </div>

                <div class="relative">
                    <i class="fas fa-align-left absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" name="description" id="edit_description" placeholder="Tavsif (ixtiyoriy)"
                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="relative">
                        <i class="fas fa-calendar-day absolute left-3 top-3 text-gray-400"></i>
                        <input type="date" name="date" id="edit_date" required
                            class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                    </div>
                    <div class="relative">
                        <i class="fas fa-clock absolute left-3 top-3 text-gray-400"></i>
                        <input type="time" name="time" id="edit_time" required
                            class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none input-focus transition-all">
                    </div>
                </div>

                <button type="submit" class="w-full btn-gradient text-white font-bold py-3 px-6 rounded-xl transition-all hover:scale-[1.02] active:scale-[0.98]">
                    <i class="fas fa-save mr-2"></i>
                    Saqlash
                </button>
            </form>
        </div>
    </div>

</body>

</html>