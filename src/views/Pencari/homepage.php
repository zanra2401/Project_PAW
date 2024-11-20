<?php require './views/Components/Head.php' ?>
<body>
    <?php require "./views/Components/NavBar.php" ?>    
    <div class="absolute top-0 left-0 h-3/4 w-screen bg-[#d7dbdd] rounded-b-[50px] -z-10 overflow-y-hidden"></div>

    <div class="w-[90%] rounded-3xl mt-[50px] mx-auto">
        <h1 class="text-center sm:text-left text-xl font-bold px-4">Sekarang Cari Kost Bisa Sambil Rebahan</h1>
        <p class="mt-4 text-center sm:text-bold px-4">
            Bingung Mau Cari Kost Dimana? Disini Aja! Cari kost jadi lebih mudah, cepat, dan hemat waktu.
        </p>
        <div class="flex bg-white mx-auto rounded-full mt-[20px] justify-center items-center" style="height: 70px; width: 800px; gap:10px;">
            <div class="relative w-1/2">
                <input type="text" placeholder="Cari sesuatu..." class="w-full p-3 pl-10 border border-gray-300 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-black focus:border-black">
                <i class="fas fa-location-dot absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>
            <div class="relative">
                <button class="inline-flex justify-center w-full p-3 pl-10 pr-8 border border-gray-300 bg-white rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" aria-expanded="false" aria-haspopup="true" id="menu-button">
                    Pilih Tipe
                    <i class="fas fa-house absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <i class="fas fa-caret-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </button>

                <div class="dropdown-menu absolute hidden bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none mt-2 w-48 rounded-2xl z-10" aria-labelledby="menu-button">
                    <div class="py-1">
                        <div class="relative">
                            <a href="#" class="text-gray-700 block pl-10 p-3 text-sm">Kost Pria</a>
                            <i class="fas w-20 fa-person absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        </div>
                        
                        <div class="relative">
                            <a href="#" class="text-gray-700 block pl-10 p-3 text-sm">Kost Wanita</a>
                            <i class="fas w-20 fa-person-dress absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <button type="submit" name="ubah" class="inline-flex justify-center w-full p-3 pl-10 pr-8 borde rounded-full shadow-md" style="background-color: #83493d; color:#fff;">
                    Temukan Kost
                </button>
                <i class="fas w-20 fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-white cursor-pointer"></i>
            </div>
            <div class="relative">
                <button class="w-full p-3 rounded-full"><i class="fas fa-sliders top-1/2 transform text-gray-500 "></i></button>
            </div>
        </div>
        
    </div>
    
    <div class="bg-white w-[90%] rounded-3xl mx-auto shadow-lg" style="margin-top:30px;">
        <div class="mx-auto max-w-2xl p-8 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>
            
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">Earthen Bottle</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/_HAN5555.jpg?tr=c-at_max%2Cw-3840" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://images.rukita.co/buildings/building/5abc4fa6-8bb.jpg?tr=c-at_max%2Cw-3840" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
                </a>

                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                    <img src="https://images.rukita.co/buildings/building/73c91959-e49.jpg?tr=c-at_max%2Cw-3840" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                </a>
            </div>
        </div>
    </div>
    <script>
        const button = document.getElementById('menu-button');
        const menu = document.querySelector('.dropdown-menu');

        button.addEventListener('click', () => {
            event.stopPropagation(); 
            menu.classList.toggle('hidden');
        });

        window.addEventListener('click', () => {
            menu.classList.add('hidden');
        })
    </script>
</body>
<?php require './views/Components/Foot.php' ?>