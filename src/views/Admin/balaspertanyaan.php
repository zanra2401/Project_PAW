<?php require './views/Components/Head.php'; ?>
<body class="h-screen flex">
    
    <?php require './views/Components/sidebarAdmin.php'; ?>
    
    <main class="w-full min-h-screen box-border bg-gray-50 overflow-hidden flex flex-col p-5">
    <span class="mb-3 text-gray-600">
  <i class="fas fa-question"></i> Pertanyaan 
  <i class="fas fa-chevron-right"></i> 
  <i class="fas fa-reply"></i> Balas Pertanyaan
</span>
        <div class="p-5 w-full max-w-3xl bg-white rounded shadow-md">
            <?php
                // Ambil parameter pertanyaan dari URL
                $question = isset($_GET['question']) ? htmlspecialchars($_GET['question']) : 'Pertanyaan tidak ditemukan';
            ?>
            <p class="mb-4 text-gray-700">Pertanyaan: <span class="font-medium"><?= $question ?></span></p>
            <form method="post" action="prosesBalas.php" class="flex flex-col gap-4">
                <input type="hidden" name="question" value="<?= $question ?>">
                <textarea 
                    name="reply" 
                    class="border p-3 w-full h-32 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
                    placeholder="Tulis balasan Anda di sini..."
                    required></textarea>
                <button 
                    type="submit" 
                    class="bg-warna-second text-white px-5 py-2 rounded hover:bg-base-color transition">
                    Kirim Balasan
                </button>
            </form>
        </div>
    </main>
<?php require './views/Components/Foot.php'; ?>
</body>
