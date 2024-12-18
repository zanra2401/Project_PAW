<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-6xl mx-auto mt-12 p-10 bg-white shadow-lg rounded-lg">
        <div class="text-center mb-8">
            <img class="w-15 h-12 mx-auto" src="<?= PUBLIC_FOLDER ?>/assets/image/logo.png">
            <!-- <span class="ml-2 text-lg font-bold whitespace-nowrap">Carikos</span> -->
            <h1 class="text-4xl font-bold text-main-color">FAQ</h1>
            <input type="text" id="search-input" class="mt-4 px-4 py-2 w-full max-w-full mx-a uto border rounded-lg" placeholder="Cari pertanyaan" oninput="searchFaq()">
        </div>

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
            <!-- 
            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Apakah saya bisa memfilter hasil pencarian berdasarkan fasilitas?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Ya, Anda bisa memfilter hasil pencarian berdasarkan fasilitas seperti Wi-Fi, parkir, Dapur, Kulkas, dan lain-lain. Gunakan opsi filter untuk memperluas pilihan Anda.</p>
            </div>

            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Bagaimana cara menghubungi pemilik atau pengelola kos?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Setelah menemukan kos yang menarik, cukup klik tombol kontak untuk mengirim pesan atau menjadwalkan kunjungan dengan pemilik atau pengelola kos.</p>
            </div>

            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Apakah saya bisa menyimpan kos ke daftar favorit?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Ya, Anda bisa menyimpan kos ke daftar favorit dengan mengklik ikon hati di halaman Kost Page.</p>
            </div>

            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Apakah yang disediakan web Carikos?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Kami menyediakan yang memungkinkan Anda mencari kos, menyimpan favorit, dan menghubungi pemilik kos di mana saja.</p>
            </div>

            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Apakah saya bisa mengatur pencarian berdasarkan harga?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Ya, Anda bisa mengatur pencarian berdasarkan harga dengan memasukkan kisaran harga yang Anda inginkan.</p>
            </div>

            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Apa yang harus saya lakukan jika tidak menemukan kos yang sesuai?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Jika Anda tidak menemukan kos yang sesuai, Anda bisa mengaktifkan notifikasi atau memberi tahu kami lokasi dan preferensi Anda, dan kami akan mengirimkan pembaruan jika ada kos baru yang terdaftar.</p>
            </div>

            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Apakah saya bisa melihat foto-foto kos sebelum mengunjungi?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Ya, setiap kost page biasanya menyertakan foto-foto untuk memberi gambaran tentang kondisi dan fasilitas kos tersebut. Pastikan untuk memeriksa galeri foto sebelum membuat keputusan.</p>
            </div>

            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Bagaimana cara mengetahui apakah kos masih tersedia?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Status ketersediaan kos biasanya ditampilkan di halaman Kost page. Jika Anda ragu, Anda bisa menghubungi pemilik kos untuk memastikan ketersediaannya.</p>
            </div> -->
            <!-- 
            <div class="faq-item border rounded-lg overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium border-b focus:outline-none" onclick="toggleFaq(this)">
                    Bagaimana cara membatalkan pemesanan kos?
                </button>
                <p class="hidden px-4 py-3 text-gray-600">Untuk membatalkan pemesanan, Anda bisa menghubungi pemilik kos langsung atau melakukannya melalui aplikasi jika pemilik telah mengaktifkan opsi pembatalan online.</p>
            </div> -->
            <div class="mt-8">
                <div class="mt-8">
                    <p class="text-2xl font-semibold">Tambahkan Pertanyaan</p>
                    <form id="add-question-form" class="mt-4" action="/<?= PROJECT_NAME ?>/pencari/faq" method="POST">
                        <div class="flex flex-col gap-4">
                            <textarea id="question" class="border border-gray-300 rounded-lg p-3 w-full" rows="3" placeholder="Tulis pertanyaan Anda" name="pertanyaan_user" required></textarea>
                        </div>
                        <button id="submit-question" type="submit" class="mt-4 w-full text-white font-semibold rounded-lg py-2" style="background-color: #83493d;">Kirim Pertanyaan</button>
                    </form>
                </div>
            </div>
        </div>

        <script>
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
            document.getElementById('add-question-form').addEventListener('submit', function(event) {
                event.preventDefault();
                const question = document.getElementById('question').value.trim();
                if (!question) {
                    alert('Pertanyaan tidak boleh kosong.');
                    return;
                }
                const faqContainer = document.getElementById('faq-container');
                const newFaqItem = document.createElement('div');
                newFaqItem.className = 'faq-item border rounded-lg overflow-hidden';
                newFaqItem.innerHTML = `
            <button class="w-full text-left px-4 py-3 bg-white text-lg font-medium focus:outline-none" onclick="toggleFaq(this)">
                ${question}
            </button>
            <p class="hidden px-4 py-3 text-gray-600">Kami telah menerima pertanyaan ini. Jawaban akan segera tersedia.</p>`;

                faqContainer.insertBefore(newFaqItem, faqContainer.lastElementChild);


                alert('Pertanyaan berhasil dikirim!');

                this.submit();
            });
        </script>
</body>

</html>