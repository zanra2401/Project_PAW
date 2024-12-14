
<?php require "./views/Components/Head.php"; ?>
    <script src="<?= NODE_MODULES ?>leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="<?= NODE_MODULES ?>leaflet/dist/leaflet.css">  
    <script src="<?= JS ?>/libs/chart.js"></script>
    <script src="<?= JS ?>/libs/fullcalendar.js"></script>    
    <body class="overflow-hidden flex p-0 m-0 h-screen ">
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="flex-1 flex flex-col p-5 overflow-y-auto">
            <span class="mb-3 font-Roboto-medium h-10 text-gray-600"> <i class="fas fa-hotel"></i> <a href="">Kost</a> <i class="fas fa-chevron-right mr-2"></i> <i class="fas fa-plus-square"></i> <a href="">Tambah Kost</a> <i class="fas fa-chevron-right"></i> </span>
            <div class="container">
                <form action="" class="flex flex-col space-y-5">

                    <div id="gambar-preview" class="w-full gap-3 grid grid-cols-4">
                        <button  onchange="tambahFoto(event)" class="w-full relative aspect-square rounded-lg bg-gray-200">
                            <i class="fas fa-plus text-gray-700 text-[300%]"></i>
                            <input type="file" class="w-full  absolute left-0 top-0 h-full opacity-0">
                        </button>
                    </div>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-heading text-gray-700"></i>
                        <input id="nama-kost" type="text" class="ml-5 border-none text-gray-700 focus:outline-none flex-1 font-Roboto-medium" placeholder="Nama Kost">
                    </div>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-money-bill text-gray-700"></i>
                        <input id="harga-kost" type="number" class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium" placeholder="Harga Kost">
                    </div>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-city text-gray-700"></i>
                        <select id="provinsi" class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                        </select>
                    </div>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-city text-gray-700"></i>
                        <select id="kota" class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                        </select>
                    </div>

                    <div class="w-full border-2 flex py-1 px-4 items-center  rounded-md border-gray-200 ">
                        <i class="fas fa-user text-gray-700"></i>
                        <select id="jenis-kelamin" class="ml-5 text-gray-700 focus:outline-none border-none flex-1 font-Roboto-medium">
                            <option value="putri">Putri</option>
                            <option value="putra">Putra</option>
                        </select>
                    </div>

                    <h2 class="font-Roboto-medium">Fasilitas Kamar</h2>
                    <ul id="Fasilitas-Kamar">

                    </ul>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-sink text-gray-700"></i>
                        <select  class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                            <option value="Dapur">Dapur</option>
                            <option value="Parkiran">Parkiran</option>
                        </select>
                    </div>

                    <h2 class="font-Roboto-medium">Fasilitas Bersama</h2>
                    <ul id="Fasilitas-Bersama">

                    </ul>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-bed text-gray-700"></i>
                        <select  class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                            <option value="Dapur">Tempat Tidur</option>
                            <option value="Parkiran">Parkiran</option>
                        </select>
                    </div>

                    <h2 class="font-Roboto-medium">Lokasi Kost Anda</h2>
                    <div class="w-full  grid grid-cols-2 gap-2 ">
                        <span class="border-2 py-1 px-4 items-center rounded-md border-gray-200">
                            <span  class="font-Roboto-medium text-gray-700">
                                lat :
                            </span> 
                            <input id="lat-input" type="text" class="ml-5 border-none text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium" placeholder="Nama Kost" disabled>
                        </span>
                        <span  class="border-2 px-4 py-1 items-center rounded-md border-gray-200">
                            <span class="font-Roboto-medium text-gray-700">
                                long :
                            </span>
                            <input id="long-input" type="text" class="ml-5 border-none text-gray-700 focus:outline-none flex-1 font-Roboto-medium" placeholder="Nama Kost" disabled>
                        </span>
                    </div>  

                    <div class="w-1/2 h-[400px]">
                        <div id="map-set" class='h-full rounded-md'></div>
                    </div>

                    <button class="w-full py-4 px-4 bg-warna-second text-white text-center rounded-lg"> <i class="fas fa-plus-square"></i> Tambah</button>
                </form>
            </div>
        </main>

        <script>
            const alidade = 'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png';
            const openstreetmap = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const stadiamaps = 'https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png';
            const gambarPreview = document.getElementById("gambar-preview");
            const provinsi = document.getElementById("provinsi");
            const kota = document.getElementById("kota");
            const reader = new FileReader();
            var id = 0;
            var dataKost = {
                nama : "",
                harga : 0,
                gambar : {},
                provinsiID : 0,
                kotaID : 0,
                jenisKelamin : "",
                fasilitasn: {},
                lokasi: {
                    lat: "",
                    long: "",
                },
                
            };
            
            reader.onload = function (e) {
                gambarPreview.innerHTML += `
                <div class="relative">
                    <button type="button" data-id=${id} onclick="deleteFoto(event)" class="absolute top-1 rounded-md overflow-hidden right-0 aspect-square "><i data-id=${id} class="fas p-2 w-full h-full z-10 text-white fa-trash"></i></button>
                    <img class="rounded-lg aspect-square object-cover" src="${e.target.result}"/>
                </div>
                `;
                id += 1;
            };

            function deleteFoto(event)
            {
                const id = event.target.dataset.id;
                delete dataKost.gambar[parseInt(id)];
                event.target.parentNode.parentNode.remove();
            }

            async function tambahFoto(event)
            {
                dataKost.gambar[id] = event.target.files[0];
                await reader.readAsDataURL(event.target.files[0]);
            }

            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
            .then(response => response.json())
            .then(provinces => {
                provinces.forEach(element => {
                    provinsi.innerHTML += `<option data-id="${element["id"]}" value='${element["name"]}'>${element["name"]}</option>`
                });
            });
        
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/11.json`)
                .then(response => response.json())
                .then(kotas => {
                    kotas.forEach(element => {
                        kota.innerHTML += `<option class="w-full h-full" data-id="${element["id"]}" value='${element["name"]}'>${element["name"]}</option>`
                    })
                });
        

            provinsi.addEventListener('change', (e)=>{
                kota.innerHTML = ""
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi[provinsi.selectedIndex].dataset.id}.json`)
                .then(response => response.json())
                .then(kotas => {
                    kotas.forEach(element => {
                        kota.innerHTML += `<option data-id="${element['id']}" value='${element["name"]}'>${element["name"]}</option>`
                    })
                });
            })


            const namaLokasiMap = document.getElementById("nama-lokasi-map");
            const cariLokasiMap = document.getElementById("cari-lokasi-map")
            const mapSet = L.map('map-set').setView([20, 20], 5);
            const latInput = document.getElementById('lat-input');
            const longInput = document.getElementById('long-input');

            const markerLayerMapSet = L.layerGroup().addTo(mapSet);

            L.tileLayer(stadiamaps, {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(mapSet);

            L.marker([20, 20]).addTo(markerLayerMapSet);

            mapSet.on('click', (e) => {
                mapSet.setView([e.latlng.lat, e.latlng.lng],e.target._zoom);
                markerLayerMapSet.clearLayers();
                dataKost.lokasi.lat = e.latlng.lat;
                dataKost.lokasi.long = e.latlng.lng;
                L.marker([e.latlng.lat, e.latlng.lng]).addTo(markerLayerMapSet);
                latInput.value = `${e.latlng.lat}`;
                longInput.value = `${e.latlng.lng}`;
                console.log(dataKost);
            });

            // cariLokasiMap.addEventListener('click', async (e) => {
            //     console.log("a")
            //     const url = `https://nominatim.openstreetmap.org/search?q=${namaLokasiMap.value}&format=json&addressdetails=1`;
                

            //     await fetch(url).then(async (result) => {
            //         await result.json().then((r) => {
            //             mapSet.setView([r[0].lat, r[0].lon], 15);
            //             markerLayerMapSet.clearLayers();
            //             L.marker([r[0].lat, r[0].lon]).addTo(markerLayerMapSet)
            //         })
            //     });

                
            // })



            // INPUT HANDLER
            const namaKost = document.getElementById("nama-kost");
            const hargaKost = document.getElementById("harga-kost");
            const jenisKelamin = document.getElementById("jenis-kelamin");
            

            namaKost.addEventListener('keyup', function () 
            {
                dataKost.nama = namaKost.value;
                console.log(dataKost);
            });

            hargaKost.addEventListener('keyup', function () {
                dataKost.harga = hargaKost.value;
            });

            kota.addEventListener("change", function () {
                dataKost.kotaID = kota[kota.selectedIndex].dataset.id;
            });

            provinsi.addEventListener("change", function () {
                dataKost.provinsiID = provinsi[provinsi.selectedIndex].dataset.id;
            });

            jenisKelamin.addEventListener("change", function () {
                dataKost.jenisKelamin = jenisKelamin.value;
            });
        </script>
    </body>
<?php require "./views/Components/Foot.php"; ?>