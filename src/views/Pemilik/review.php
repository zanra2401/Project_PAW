<?php 
    require "./views/Components/Head.php";
    $foto_profile = $data['data_user'][0]['profile_user'];
?>
<body class="overflow-hidden min-h-screen flex p-0 m-0 bg-gray-100">
    <?php require "./views/Components/sidebarPemilik.php" ?>
    <main class="w-screen flex-grow flex relative bg-white shadow-md rounded-lg overflow-hidden">    
        <!-- Bagian Review -->
        <div class="w-full h-full flex-col p-6 pr-8 overflow-y-auto pb-16">
            <h1 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2 border-gray-300">
                <?= $data['kost']['data_kost']['nama_kost'] ?>
            </h1>
            <?php foreach ($data['review'] as $key => $review): ?>
                <div class="w-full h-auto border border-gray-300 rounded-lg p-4 mb-4 shadow-sm flex items-start bg-gray-50">
                    <img src="/<?= PROJECT_NAME ?>/<?= $review['user']['profile_user'] ?>" 
                         class="rounded-full w-12 h-12 border border-gray-300" alt="User Profile">
                    <div class="ml-4 w-full">
                            <h1 class="font-Roboto-bold"><?= $review['user']['username_user'] ?></h1>
                        <p class="font-medium text-gray-700 mb-2">
                            <?= $review['review']['isi_review'] ?>
                        </p>
                        <div class="flex items-center space-x-4">
                            <a href="/<?= PROJECT_NAME ?>/pemilik/like/<?= $review['review']['id_review'] ?>" 
                               class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">
                                <i class="fas fa-thumbs-up text-lg"></i>
                                <span><?= $review['like'] ?></span>
                            </a>
                            <?php if(!isset($review['balasan'])): ?>
                            <button data-id="<?= $review['review']['id_review'] ?>" 
                                    onclick="reply(this, <?= $review['review']['id_review'] ?>, event)" 
                                    class="flex items-center space-x-1 text-blue-600 hover:underline">
                                <i data-id="<?= $review['review']['id_review'] ?>" class="fas fa-reply"></i>
                                <span>Reply</span>
                            </button>
                            <?php endif; ?>
                        </div>
                        <?php if(isset($review['balasan'])): ?>
                        <div class="mt-4 p-3 border border-gray-200 rounded-lg bg-white shadow-sm flex items-start">
                            <img src="/<?= PROJECT_NAME ?>/<?= $review['balasan']['user']['profile_user'] ?>" 
                                 class="rounded-full w-10 h-10 border border-gray-300" alt="">
                            <div class="ml-3">
                                <p class="font-medium text-gray-700">
                                    <?= $review['balasan']['balasan_data']['isi_balasan_review'] ?>
                                </p>
                            </div>     
                        </div>
                        <?php endif; ?>
                    </div>     
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <!-- Bagian JS -->
    <script>
        function reply(element, id, event) {
            let textarea = document.getElementById(`${id}_input`);

            if (textarea != null) {
                return;
            }

            const formReply = `
                <form class=\"w-full flex flex-col mt-4\" 
                      action=\"/<?= PROJECT_NAME ?>/pemilik/balasreview\" method=\"post\" id=\"${id}\">
                    <input name=\"id_review\" value=\"${id}\" hidden/>
                    <textarea placeholder=\"Balasan anda\" 
                              name=\"isi_balasan\" 
                              class=\"w-full border focus:outline-none p-2 text-gray-600 rounded-lg resize-none shadow-sm\" 
                              id=\"${id}_input\"></textarea>
                    <div class=\"flex justify-end mt-2 space-x-4\">
                        <button class=\"px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600\">Balas</button>
                        <button type=\"button\" 
                                onclick=\"batalReply(this)\" 
                                class=\"px-4 py-2 bg-gray-300 text-gray-800 rounded-lg shadow hover:bg-gray-400\">Batal</button>
                    </div>
                </form>`;

            element.parentNode.parentNode.innerHTML += formReply;

            textarea = document.getElementById(`${id}_input`);
            textarea.addEventListener('input', () => {
                textarea.style.height = 'auto';
                textarea.style.height = `${textarea.scrollHeight}px`;
            });
        }

        function batalReply(element) {
            element.parentNode.parentNode.remove();
        }
    </script>
</body>
<?php require "./views/Components/Foot.php" ?>
