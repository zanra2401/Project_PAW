<?php 
    require "./views/Components/Head.php";
    $foto_profile = $data['data_user'][0]['profile_user'];

?>
    <!-- BAGIAN HTML -->

    <body class="overflow-hidden min-h-screen flex p-0 m-0">
    <?php require "./views/Components/sidebarPemilik.php" ?>

        <main class="w-screen flex-grow flex  relative">
            <!-- BAGIAN REVIEW -->
            <div class="w-full absolute right-0 h-full flex-col p-6 pr-8 overflow-y-auto pb-16">
                <h1 class="font-Roboto-bold text-2xl mb-3"><?= $data['kost']['data_kost']['nama_kost'] ?></h1>

                <?php foreach ($data['review'] as $key => $review): ?>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="/<?= PROJECT_NAME ?>/<?= $review['user']['profile_user'] ?>" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700 w-full flex items-center"><?= $review['review']['isi_review'] ?></p>
                        <div>
                            <a href="/<?= PROJECT_NAME ?>/pemilik/like/<?= $review['review']['id_review'] ?>">
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                <?= $review['like'] ?>
                            </a>
                            <?php if(!isset($review['balasan'])): ?>
                            <button data-id="<?= $review['review']['id_review'] ?>" onclick="reply(this, <?= $review['review']['id_review'] ?>, event)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i data-id="<?= $review['review']['id_review'] ?>" class="fas fa-reply"></i> Reply</button>
                            <!-- <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-60000 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button>  -->
                            <?php endif; ?>
        
                            <?php if(isset($review['balasan'])): ?>
                            <div class="w-full h-fit border-black p-2 flex items-center">
                                <img src="/<?= PROJECT_NAME ?>/<?= $review['balasan']['user']['profile_user'] ?>" class="rounded-full w-12 h-12" alt="">
                                <div class="ml-3 h-full flex items-center">
                                    <p class=" font-Roboto-normal text-gray-700 w-full flex items-center"><?= $review['balasan']['balasan_data']['isi_balasan_review'] ?></p>
                                </div>     
                            </div>
                            <?php endif; ?>


                    </div>     
                </div>
                <?php endforeach; ?>
            </div>
        </main>

        <!-- BAGIAN JS -->

        <script>
            function reply(element, id, event) {
                let textarea = document.getElementById(`${id}_input`);

                if (textarea != null) {
                    return
                }

                const formReply = `
                    <form class="w-full flex border-bottom border-gray-500 flex-col" action="/<?= PROJECT_NAME ?>/pemilik/balasreview" method="post" id="${id}">
                        <input name="id_review" value="${id}" hidden/>
                        <textarea placeholder="Balasan anda" name="isi_balasan" class="w-full border-x-none focus:outline-none p-2 text-gray-600 border-b-2 rounded-none hide-scrollbar h-10 border-gray-700" id="${id}_input"></textarea>
                        <span class="mt-2 ml-auto">
                            <button>Balas</button>
                            <button type="button" onclick="batalReply(this)" class="ml-4">Batal</button>
                        </span>
                    </form> 
                `;
                
                element.parentNode.parentNode.innerHTML += formReply;
                
                const form_reply = document.getElementById("form_reply");
                textarea = document.getElementById(`${id}_input`);


                textarea.addEventListener('input', () => {
                    // Reset height to auto to shrink if needed, then set it based on scrollHeight
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