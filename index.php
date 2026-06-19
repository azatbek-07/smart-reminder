<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Reminder - Bosh sahifa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/index.css">
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

                <form method="POST" class="space-y-4">
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
                        <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">3 ta</span>
                    </div>
                    <button onclick="location.reload()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>

                <!-- Eslatma 1 -->
                <div class="reminder-card bg-white rounded-2xl p-5 mb-4 border-l-4 border-blue-500 shadow-sm hover:shadow-xl transition-all">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-lg">Loyiha topshirig'ini yuborish</h4>
                                    <p class="text-gray-600 text-sm mt-1">Muhim loyiha hujjatlarini tayyorlash va yuborish</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-2 text-xs text-gray-500">
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-calendar-alt text-blue-500"></i>
                                            2026-06-20
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-clock text-purple-500"></i>
                                            15:00
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-hourglass-start text-green-500"></i>
                                            19.06.2026 14:30
                                        </span>
                                        <span class="bg-green-100 text-green-600 px-2 py-0.5 rounded-full text-xs font-semibold">
                                            <i class="fas fa-circle text-[6px] mr-1"></i>
                                            Faol
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 ml-12 md:ml-0">
                            <button onclick="openEditModal()" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 rounded-xl text-sm font-semibold transition-all hover:scale-105">
                                <i class="fas fa-edit mr-1"></i>
                                Tahrirlash
                            </button>
                            <button onclick="confirmDelete()" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-semibold transition-all hover:scale-105">
                                <i class="fas fa-trash-alt mr-1"></i>
                                O'chirish
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Eslatma 2 -->
                <div class="reminder-card bg-white rounded-2xl p-5 mb-4 border-l-4 border-purple-500 shadow-sm hover:shadow-xl transition-all">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 flex-shrink-0">
                                    <i class="fas fa-stethoscope"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-lg">Doktor bilan uchrashuv</h4>
                                    <p class="text-gray-600 text-sm mt-1">Stomatologiya klinikasi, 3-qavat</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-2 text-xs text-gray-500">
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-calendar-alt text-blue-500"></i>
                                            2026-06-21
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-clock text-purple-500"></i>
                                            10:30
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-hourglass-start text-green-500"></i>
                                            19.06.2026 12:15
                                        </span>
                                        <span class="bg-yellow-100 text-yellow-600 px-2 py-0.5 rounded-full text-xs font-semibold">
                                            <i class="fas fa-circle text-[6px] mr-1"></i>
                                            Tez orada
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 ml-12 md:ml-0">
                            <button onclick="openEditModal()" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 rounded-xl text-sm font-semibold transition-all hover:scale-105">
                                <i class="fas fa-edit mr-1"></i>
                                Tahrirlash
                            </button>
                            <button onclick="confirmDelete()" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-semibold transition-all hover:scale-105">
                                <i class="fas fa-trash-alt mr-1"></i>
                                O'chirish
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Eslatma 3 -->
                <div class="reminder-card bg-white rounded-2xl p-5 border-l-4 border-green-500 shadow-sm hover:shadow-xl transition-all">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 flex-shrink-0">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-lg">Oilaviy kechki ovqat</h4>
                                    <p class="text-gray-600 text-sm mt-1">Restoran bron qilingan, soat 19:00</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-2 text-xs text-gray-500">
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-calendar-alt text-blue-500"></i>
                                            2026-06-22
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-clock text-purple-500"></i>
                                            19:00
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-hourglass-start text-green-500"></i>
                                            19.06.2026 10:00
                                        </span>
                                        <span class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full text-xs font-semibold">
                                            <i class="fas fa-circle text-[6px] mr-1"></i>
                                            Rejalashtirilgan
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 ml-12 md:ml-0">
                            <button onclick="openEditModal()" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 rounded-xl text-sm font-semibold transition-all hover:scale-105">
                                <i class="fas fa-edit mr-1"></i>
                                Tahrirlash
                            </button>
                            <button onclick="confirmDelete()" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-semibold transition-all hover:scale-105">
                                <i class="fas fa-trash-alt mr-1"></i>
                                O'chirish
                            </button>
                        </div>
                    </div>
                </div>
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