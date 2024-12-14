<nav id="navbar" class="w-screen flex h-20 fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
    <div class="w-[90%] mx-auto flex h-full items-center">
        <a href="/project_paw" class="self-center">
            <img src="<?= ASSETS ?>image/logo.png" class="w-12" alt="">
        </a>
        <h1 class="font-medium text-base-color text-w text-2xl ml-2 font-Roboto-medium self-center">Cari Kost</h1>
        <div class="ml-auto flex gap-7 items-center">
            <div class="flex gap-3 items-center">
                <!-- <a href="/project_paw/pencari/favorit" class="font-medium text-lg text-gray-800 hover:text-warna-second border-r border-gray-400 pr-5">
                    <i class="fa-regular fa-heart"></i>
                    Favorit
                </a> -->
                <a href="/project_paw/pencari/homeberita" class="font-medium text-lg text-gray-800 hover:text-warna-second pr-5 border-r border-gray-400" >
                    <i class="fa-regular fa-newspaper"></i>
                    Berita
                </a>
                <!-- <a href="" class="font-medium text-lg text-gray-800 hover:text-warna-second pr-5 border-r border-gray-400">
                    <i class="fa-regular fa-bell"></i>
                    Notifikasi
                </a> -->
                <div class="relative group inline-block">
                    <button class="flex items-center space-x-1 group-hover:rotate-0 transition-transform group-hover:text-warna-second font-medium text-lg text-gray-800">
                        <span>Lainnya</span>  
                        <i class="fas fa-caret-down rotate-180 mt-1 group-hover:rotate-0 group-hover:text-warna-second transition-transform text-gray-800" id="icon_lainnya"></i>
                    </button>
                    <div class="absolute mt-[2px] group-hover:block hidden left-1/2 -translate-x-[70%] -translate-y-full border-[6px] border-white border-t-0 border-l-transparent border-r-transparent"></div>
                    <div class="absolute w-44 left-1/2 mt-[2px] -translate-x-[73%] hidden group-hover:block bg-white text-black text-sm rounded py-1 px-2 shadow-md">
                        <div class="grid gap-3 p-2">
                            <a href="#" class="font-medium hover:text-warna-second">Pusat Bantuan</a>
                            <a href="#" class="font-medium hover:text-warna-second">FAQ</a>
                            <a href="#" class="font-medium hover:text-warna-second">Syarat dan Ketentuan</a>
                            <a href="#" class="font-medium hover:text-warna-second">Tentang Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div>

                <img id="pp" src="https://i.pinimg.com/736x/dd/1a/d5/dd1ad561fbf608248bec0a3e2539ff89.jpg" alt="" class="w-14 rounded-full cursor-pointer">
                <div class="bg-white w-[85px] mt-2 p-2 absolute hidden" id="menu_pp">
                    <ul class="grid text-sm gap-3 p-2">
                        <li class="hover:text-warna-second font-medium"><a href="/project_paw/pencari/profile">Profile</a></li>
                        <li class="hover:text-warna-second font-medium"><a href="">Logout</a></li>
                    </ul>
                </div> -->
                <a class="ml-auto border-2 border-base-color p-1 pl-2 pr-2 rounded-md text-base-color font-Roboto-bold hover:text-white flex hover:bg-base-color" href="/project_paw/account/login">Masuk</a>
            </div>
        </div>
    </div>
</nav>
<br><br><br>

<div class=" bg-base-color w-32 flex justify-center h-14 rounded-md fixed bottom-0 right-0  hover:opacity-90 hover:cursor-pointer z-50">
    <div class="flex gap-3 items-center text-2xl font-semibold">
        <i class="fa-solid fa-message text-warna-second"></i>
        <button class="text-white">Chat</button>
    </div>
</div>


<script>
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-white', 'shadow-md');
        } else {
            navbar.classList.remove('bg-white', 'shadow-md');
            navbar.classList.add('bg-transparent');
        }
    });

    
    const pp = document.getElementById('pp')
    const pp_menu = document.getElementById('menu_pp')

    pp.addEventListener('click', ()=>{
        if (pp_menu.classList.contains('hidden')){
            pp_menu.classList.remove('hidden')
        } else {
            pp_menu.classList.add('hidden')
        }
    }) 
</script>                                       