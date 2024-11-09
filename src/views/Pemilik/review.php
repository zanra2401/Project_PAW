<?php require "./views/Components/Head.php" ?>
    <style>
        /* For most browsers */
        .hide-scrollbar {
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* Internet Explorer 10+ */
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none; /* Safari and Chrome */
        }

        .tooltip {
            /* ... */
            display: none;
        }

        .tooltip[data-show] {
            display: block;
        }
    </style>

    <!-- BAGIAN HTML -->

    <body class="w-screen min-h-screen flex flex-col h-fit overflow-x-hidden font-Roboto-normal">
        <?php require "./views/Components/NavBar.php" ?>
        <main class="w-screen flex-grow flex  relative">
            <div class="w-1/3 h-full flex fixed flex-col grid-rows-2 border-gray-700 p-8 pl-8">


                <!-- BAGIAN GAMABR -->
                <div class="w-full grid grid-rows-2 grid-cols-2 gap-1 relative">
                    <div>
                        <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="w-full bg-cover rounded-md" alt="">
                    </div>


                    <div>
                        <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="w-full bg-cover rounded-md" alt="">
                    </div>


                    <div class="col-span-2 h-40 overflow-hidden row-span-1">
                        <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="w-full bg-cover bg-center -translate-y-1/2 rounded-md" alt="">
                    </div>


                    <button aria-describedby="lihat-semua-gambar-tooltip" id="lihat-semua-gambar-button" class="absolute bottom-7 right-2 rounded-md text-gray-700 bg-gray-50 p-2 px-3">
                        <i class="fas fa-list text-base-color"></i>
                    </button>
                    <div class="tooltip" id="lihat-semua-gambar-tooltip" role="tooltip">
                        Lihat Semua Gambar
                        <div class="arrow" data-popper-arrow></div>
                    </div>

                </div>

                <!-- BAGIAN INFORMASI KOS -->
                <h1 class="font-Roboto-bold text-gray-800 text-3xl mb-4 relative">KOS PUTRA TELANG</h1>
                <li class="list-none flex text-2xl">
                    <i class="fas fa-star text-yellow-300"></i>
                    <i class="fas fa-star text-yellow-300"></i>
                    <i class="fas fa-star text-yellow-300"></i>
                    <i class="fas fa-star text-yellow-300"></i>
                    <i class="fas fa-star text-yellow-300"></i>
                </li>
                <span class="text-base-color font-Roboto-bold">20 ulasan</span>
            </div>

            <!-- BAGIAN REVIEW -->
            <div class="w-2/3 absolute right-0 h-full flex-col p-6 pr-8 overflow-y-auto pb-16">

                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>

                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>
                <div class="w-full h-fit border-black p-2 flex">
                    <img src="<?= ASSETS ?>image/profile-placeholder.jpg" class="rounded-full w-12 h-12" alt="">
                    <div class="ml-3">
                        <p class=" font-Roboto-normal text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint quisquam, odit saepe impedit autem, quis, quas atque excepturi voluptatibus necessitatibus sequi magni quo harum ratione culpa ipsum in! Vel, ab!</p>
                        <div>
                            <span>
                                <i class="fas fa-thumbs-up hover:bg-gray-200 rounded-full text-xl mt-2 p-2 text-gray-400"></i>
                                20
                            </span>
                            <span class="ml-2">
                                <i class="fas fa-thumbs-down p-2 rounded-full hover:bg-gray-200 text-xl mt-2 text-gray-400"></i>
                                20
                            </span> 
                            <button onclick="reply(this, 20)" class="text-blue-600 hover:bg-gray-200 rounded-full p-2 font-Roboto-bold ml-2"> <i class="fas fa-reply"></i> Reply</button>
                            <button class="font-Roboto-bold hover:bg-gray-200 rounded-full p-2 text-red-300 ml-2"> <i class="fas fa-warning text-red-500"></i> Laporkan</button> 
                        </div>
                    </div>     
                </div>

                
            </div>
        </main>

        <!-- BAGIAN JS -->

        <script>
            function reply(element, id) {
                const formReply = `
                    <form class="w-full flex jus flex-col" id="${id}">
                        <textarea placeholder="Balasan anda" class="w-full focus:outline-none p-2 text-gray-600 border-b-2 rounded-none hide-scrollbar h-10 border-gray-700" id="${id}_input"></textarea>
                        <span class="mt-2 ml-auto">
                            <span>Balas</span>
                            <button type="button" onclick="batalReply(this)" class="ml-4">Batal</button>
                        </span>
                    </form> 
                `;

                element.parentNode.parentNode.innerHTML += formReply;

                const form_reply = document.getElementById("form_reply");
                const textarea = document.getElementById(`${id}_input`);

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

        <script type="module" src="<?= JS ?>pemilikjs/review.js"></script>
    </body>
<?php require "./views/Components/Foot.php" ?>