<?php 
    require './views/Components/HeadHomepage.php';
?>
<body class="bg-gray-100 font-sans">
   <!-- Tombol Kembali -->
   <button onclick="window.history.back()" 
                class="text-lg font-semibold hover:text-gray-500 flex items-center px-4 py-2">
                <i class="fa-solid fa-right-from-bracket mr-2" style="transform: rotate(180deg);"></i>
                Kembali
   </button>
   <h1 class="text-3xl font-bold text-[#000000] mb-6 text-center">NOTIFIKASI</h1>
   <div class="bg-white rounded-lg shadow-lg w-full max-w-full mx-auto mt-5 p-4">
        <form action="/<?= PROJECT_NAME?>/Pencari/notifikasi" method="POST">
        <div class="space-y-4">
    <?php 
        $id_user = $_SESSION['id_user'];
        foreach ($data['data'] as $index => $dat) {

            $notificationId = $dat['id_pengumuman']; 

            echo <<<EOD
                <div class="relative flex items-start p-4 bg-[#f1e1d0] border border-[#68422d] rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-1" onclick="markAsRead($notificationId, $id_user)">
                    <div class="flex-shrink-0 bg-[#68422d] text-white rounded-full h-10 w-10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13l3 3L22 4m-5 16H5a2 2 0 01-2-2V5a2 2 0 012-2h7m0 0l5 5m-5-5v5" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-[#68422d]">{$dat['judul_pengumuman']}</p>
                        <p class="text-sm text-[#68422d]">{$dat['isi_pengumuman']}</p>
                        <p class="text-sm font-medium text-[#68422d]">Untuk: {$dat['tipe_pengumuman']}</p>
                        <span class="text-xs text-gray-500 mt-1 block">{$dat["tanggal_pengumuman"]}</span>
                    </div>
            
            EOD;
                $sudah = false;
                foreach ($data['sudah_baca'] AS $temp)
                {
                    if($temp['id_pengumuman'] == $dat['id_pengumuman']){
                        $sudah = true;
                    }
                }
                if(!$sudah){
                    echo '<div id="dot_' . $notificationId . '" class="absolute -top-1 -right-1 bg-red-500 h-4 w-4 rounded-full notification-dot"></div>';
                }
            echo "</div>" ;
        }
    ?>    
</form>
    </div>
    <script>
        function markAsRead(notificationId, idUser) {

            const dot = document.getElementById(`dot_${notificationId}`);

            if (dot) {
                dot.remove();
            }

            const data = new URLSearchParams({
                id_pengumuman: notificationId,
                id_user: idUser
            });

            console.log(data.toString()); 
            fetch('/<?= PROJECT_NAME?>/Pencari/notifikasi', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: data
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(result => console.log('Success:', result))
            .catch(error => console.error('Error:', error));
            
        }
    </script>
</body>
</html>
<?php require "./views/Components/Foot.php" ?> 
