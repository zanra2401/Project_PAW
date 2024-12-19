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
            <p class="mb-4 text-gray-700">Username: <span class="font-medium"><?= $data['pertanyaan']['username_user'] ?></span></p>
            <p class="mb-4 text-gray-700">Tanggal: <span class="font-medium"><?= $data['pertanyaan']['tanggal_pertanyaan'] ?></span></p>
            <p class="mb-4 text-gray-700">Pertanyaan: <span class="font-medium"><?= $data['pertanyaan']['isi_pertanyaan'] ?></span></p>
            <form method="post" action="/<?= PROJECT_NAME ?>/Admin/mengisiBalasan" class="flex flex-col gap-4" id="myForm">
                <input type="hidden" name="idPertanyaan" value="<?= $data['pertanyaan']['id_pertanyaan']?>">
                <input type="hidden" name="balasan" id="balasan">
                <input type="hidden" id="hiddenDateTime" name="hiddenDateTime">
                <textarea 
                    id="reply"
                    name="reply" 
                    class="border p-3 w-full h-32 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
                    placeholder="Tulis balasan Anda di sini..."
                    required></textarea>
                <button 
                    type="submit" 
                    class="bg-blue-400 text-white px-5 py-2 rounded hover:bg-base-color transition">
                    Kirim Balasan
                </button>
            </form>
        </div>
    </main>
    <script>
                // Menangani pengiriman form
        document.getElementById('myForm').addEventListener('submit', function(event) {
            // Ambil nilai dari textarea
            var textareaValue = document.getElementById('reply').value;

            // Isi input hidden dengan nilai textarea
            document.getElementById('balasan').value = textareaValue;

            var currentDate = new Date();

            var formattedDateTime = currentDate.getFullYear() + '-' + 
                            ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' + 
                            ('0' + currentDate.getDate()).slice(-2) + ' ' + 
                            ('0' + currentDate.getHours()).slice(-2) + ':' + 
                            ('0' + currentDate.getMinutes()).slice(-2) + ':' + 
                            ('0' + currentDate.getSeconds()).slice(-2);
        });
        document.getElementById('hiddenDateTime').value = formattedDateTime;
    </script>
<?php require './views/Components/Foot.php'; ?>
</body>
