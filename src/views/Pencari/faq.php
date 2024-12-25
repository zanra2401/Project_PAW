<?php require './views/Components/Head.php' ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQ Section</title>
<style>
    .faq-item {
        display: flex;
        flex-direction: column;
    }

    .faq-item button {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-item button::after {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        border-right: 2px solid currentColor;
        border-bottom: 2px solid currentColor;
        transform: rotate(45deg);
        transition: transform 0.3s ease;
        float: right;
        margin-top: 4px;
    }

    .faq-item button.active::after {
        transform: rotate(-135deg);
    }

    .faq-item button.active {
        border-bottom: 2px solid #c48d6e;
        background-color: #f7f1e5;
        color: #c48d6e;
    }

    .faq-item p {
        transition: all 0.3s ease;
    }

    .hidden {
        display: none;
    }

    .text-main-color {
        color: #c48d6e;
    }
</style>

<?php $isLogin = isset($_SESSION["loged_in"]) ? 'login' : 'belom'; ?>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-6xl mx-auto mt-12 p-10 bg-white shadow-lg rounded-lg">
        <!-- Header -->
        <div class="mb-8">
            <!-- Tombol Kembali -->
            <div class="flex justify-between items-center">
                <button onclick="window.history.back()" class="text-lg font-semibold hover:text-gray-500 flex items-center">
                    <i class="fa-solid fa-right-from-bracket" style="transform: rotate(180deg);"></i>
                    <span class="ml-2">Kembali</span>
                </button>
            </div>
            
            <!-- Logo dan Judul FAQ -->
            <div class="text-center mt-4">
                <img class="w-15 h-12 mx-auto" src="<?= PUBLIC_FOLDER ?>/assets/image/logo.png" alt="Logo">
                <h1 class="text-4xl font-bold text-main-color mt-4">FAQ</h1>
            </div>
        </div>

        <!-- Input Pencarian -->
        <div class="text-center mb-8">
            <input type="text" id="search-input" class="bg-white border border-black text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Cari pertanyaan" oninput="searchFaq()">
        </div>

        <!-- FAQ Container -->
        <div id="faq-container" class="space-y-4">
            <?php
            foreach ($data['pertanyaan'] as $dat) {
                $answer = $dat['jawaban'] == '' ? 'Kami telah menerima pertanyaan ini. Jawaban akan segera tersedia.' : $dat['jawaban'];
                echo <<<EDO
                    <div class="faq-item border rounded-lg overflow-hidden">
                        <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                            {$dat['pertanyaan']}
                        </button>
                        <p class="hidden px-4 py-3 text-gray-600">$answer</p>
                    </div>
                EDO;
            }
            ?>
            <?php 
            if ($isLogin == "login") {
                echo <<<EDO
                    <div class="mt-8">
                        <p class="text-2xl font-semibold">Tambahkan Pertanyaan</p>
                        <form id="add-question-form" class="mt-4" action="/project_paw/pencari/faq" method="POST">
                            <div class="flex flex-col gap-4">
                                <textarea id="question" class="border border-black-200 rounded-lg p-3 w-full" rows="3" placeholder="Tulis pertanyaan Anda" name="pertanyaan_user" required></textarea>
                            </div>
                            <button id="submit-question" type="submit" class="mt-4 w-full text-white font-semibold rounded-lg py-2" style="background-color: #83493d;">Kirim Pertanyaan</button>
                        </form>
                    </div>
                EDO;
            }
            ?>
        </div>

        <script>
            const islogin_js = "<?= $isLogin ?>";

            function toggleFaq(button) {
                const isActive = button.nextElementSibling.classList.contains('hidden');
                document.querySelectorAll('.faq-item button').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.faq-item p').forEach(p => p.classList.add('hidden'));

                if (isActive) {
                    button.classList.add('active');
                    button.nextElementSibling.classList.remove('hidden');
                } else {
                    button.classList.remove('active');
                    button.nextElementSibling.classList.add('hidden');
                }
            }

            function searchFaq() {
                const searchQuery = document.getElementById('search-input').value.toLowerCase();
                const faqItems = document.querySelectorAll('.faq-item');

                faqItems.forEach(item => {
                    const question = item.querySelector('button').textContent.toLowerCase();
                    if (question.includes(searchQuery)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            }
        </script>
    </div>
</body>

<?php require './views/Components/Foot.php' ?>
