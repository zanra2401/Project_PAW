<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Cari Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Container with white background, adjusted width, and centered -->
    <div class="bg-white rounded-lg shadow-lg w-full sm:max-w-md md:max-w-2xl mx-auto mt-5 p-4">
        <h1 class="text-3xl font-bold text-gray-700 mb-6 text-center">Notifikasi</h1>

        <!-- Notification List -->
        <div class="space-y-4">
            <!-- Promo Notification -->
            <div
                class="flex items-start p-4 bg-blue-50 border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="flex-shrink-0 bg-blue-500 text-white rounded-full h-8 w-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13l3 3L22 4m-5 16H5a2 2 0 01-2-2V5a2 2 0 012-2h7m0 0l5 5m-5-5v5" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-800">Promo akhir tahun! Dapatkan diskon hingga 50% untuk
                        kost pilihanmu.</p>
                    <span class="text-xs text-gray-500 mt-1 block">2 jam yang lalu</span>
                </div>
            </div>

            <!-- Booking Notification -->
            <div
                class="flex items-start p-4 bg-green-50 border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <div
                    class="flex-shrink-0 bg-green-500 text-white rounded-full h-8 w-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h11M9 21V3m-4 0h8a2 2 0 012 2v13a2 2 0 01-2 2H3a2 2 0 01-2-2V6a2 2 0 012-2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-800">Hari ini ada promo free booking fee untuk kost dengan
                        durasi 6 bulan.</p>
                    <span class="text-xs text-gray-500 mt-1 block">1 hari yang lalu</span>
                </div>
            </div>

            <!-- New Listing Notification -->
            <div
                class="flex items-start p-4 bg-yellow-50 border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <div
                    class="flex-shrink-0 bg-yellow-500 text-white rounded-full h-8 w-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m4 4h1v-4h1m-6-4h1a2 2 0 100-4h-1a2 2 0 000 4z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-800">Kost baru di wilayah Malang tersedia dengan harga
                        terjangkau!</p>
                    <span class="text-xs text-gray-500 mt-1 block">3 jam yang lalu</span>
                </div>
            </div>

            <!-- Payment Reminder Notification -->
            <div
                class="flex items-start p-4 bg-red-50 border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="flex-shrink-0 bg-red-500 text-white rounded-full h-8 w-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a4 4 0 10-8 0v2m-2 0a6 6 0 1112 0v2a2 2 0 002 2h1a3 3 0 11-6 0H8a3 3 0 11-6 0h1a2 2 0 002-2V9z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-800">Pengingat: Jangan lupa untuk melakukan pembayaran
                        sewa
                        bulanan Anda.</p>
                    <span class="text-xs text-gray-500 mt-1 block">1 hari yang lalu</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>