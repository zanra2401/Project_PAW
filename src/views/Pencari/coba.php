<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="space-y-4 max-w-md w-full">
        <!-- Bubble dari pengguna -->
        <div class="flex justify-end">
            <div class="relative bg-blue-500 text-white p-4 rounded-xl max-w-xs">
                <p>Halo! Bagaimana kabarmu?</p>
                <!-- Ekor balon -->
                <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-4 h-4 bg-blue-500 rotate-45"></div>
            </div>
        </div>
        <!-- Bubble dari teman -->
        <div class="flex justify-start">
            <div class="relative bg-gray-300 text-black p-4 rounded-xl max-w-xs">
                <p>Hai! Aku baik-baik saja. Kamu?</p>
                <!-- Ekor balon -->
                <div class="absolute bottom-0 left-0 -translate-x-1/2 translate-y-1/2 w-4 h-4 bg-gray-300 rotate-45"></div>
            </div>
        </div>
    </div>
</body>
</html>
