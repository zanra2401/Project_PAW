<?php 
    require "./views/Components/Head.php"; 
    
    $foto_profile = $data['data_user'][0]['profile_user'];

?>
    <script src="<?= NODE_MODULES ?>leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="<?= NODE_MODULES ?>leaflet/dist/leaflet.css">  
    <script src="<?= JS ?>/libs/chart.js"></script>
    <script src="<?= JS ?>/libs/fullcalendar.js"></script>    
    <body class="overflow-hidden flex p-0 m-0 h-screen ">
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="flex-1 flex flex-col p-5 overflow-y-auto">
            <span class="mb-3 font-Roboto-medium h-10 text-gray-600"> <i class="fas fa-hotel"></i> <a href="">Kost</a> <i class="fas fa-chevron-right mr-2"></i> <i class="fas fa-plus-square"></i> <a href="">Tambah Kost</a> <i class="fas fa-chevron-right"></i> </span>
            <div  class="container">
                <input type="hidden" id="jsObject" name="jsObject">
                <div class="flex flex-col space-y-5">
                    <div id="gambar-preview" class="w-full gap-3 grid grid-cols-4">
                        <button type="button" onchange="tambahFoto(event)" class="w-full relative aspect-square rounded-lg bg-gray-200">
                            <i class="fas fa-plus text-gray-700 text-[300%]"></i>
                            <input type="file" class="w-full  absolute left-0 top-0 h-full opacity-0" multiple>
                        </button>
                    </div>
                    <?= (isset($_SESSION['errors_tambahkost']['gambar'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['gambar']}</p>" : "" ?>
                   

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-heading text-gray-700"></i>
                        <input value="<?= (isset($_SESSION['data_sebelumnya']) ? "{$_SESSION['data_sebelumnya']['nama']}" : "") ?>" id="nama-kost" type="text" class="ml-5 border-none text-gray-700 focus:outline-none flex-1 font-Roboto-medium" placeholder="Nama Kost">
                    </div>
                    <?= (isset($_SESSION['errors_tambahkost']['nama'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['nama']}</p>" : "" ?>


                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-money-bill text-gray-700"></i>
                        <input id="harga-kost" value="<?= (isset($_SESSION['data_sebelumnya']) ? "{$_SESSION['data_sebelumnya']['harga']}" : "") ?>" type="number" class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium" placeholder="Harga Kost">
                    </div>

                    <?= (isset($_SESSION['errors_tambahkost']['harga'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['harga']}</p>" : "" ?>


                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-city text-gray-700"></i>
                        <select id="provinsi" class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                        </select>
                    </div>

                    <?= (isset($_SESSION['errors_tambahkost']['provinsi'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['provinsi']}</p>" : "" ?>


                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-city text-gray-700"></i>
                        <select id="kota" class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                        </select>
                    </div>

                    <?= (isset($_SESSION['errors_tambahkost']['kota'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['kota']}</p>" : "" ?>


                    <div class="w-full border-2 flex py-1 px-4 items-center  rounded-md border-gray-200 ">
                        <i class="fas fa-user text-gray-700"></i>
                        <select id="jenis-kelamin" class="ml-5 text-gray-700 focus:outline-none border-none flex-1 font-Roboto-medium">
                            <option value="putri">Putri</option>
                            <option value="putra">Putra</option>
                        </select>
                    </div>

                    <?= (isset($_SESSION['errors_tambahkost']['tipe'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['tipe']}</p>" : "" ?>


                    <h2 class="font-Roboto-medium">Fasilitas Kamar</h2>
                    <ul id="Fasilitas-Kamar" class="px-6">
                    </ul>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-sink text-gray-700"></i>
                        <select id="fasilitas_kamar"  class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                            <option value="" disabled selected>Pilih Fasilitas Kamar di Kost anda</option>

                            <?php
                                foreach ($data['fasilitas_kamar'] as $fk)
                                {
                                    echo "<option value='{$fk['id_fasilitas']}'>{$fk['nama_fasilitas']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <?= (isset($_SESSION['errors_tambahkost']['fasilitas_kamar'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['fasilitas_kamar']}</p>" : "" ?>


                    <h2 class="font-Roboto-medium">Fasilitas Bersama</h2>
                    <ul id="Fasilitas-Bersama" class="px-6">
                    </ul>

                    <div class="w-full border-2 flex py-1 px-4 items-center rounded-md border-gray-200 ">
                        <i class="fas fa-bed text-gray-700"></i>
                        <select id="fasilitas_bersama"  class="ml-5 text-gray-700 border-none focus:outline-none flex-1 font-Roboto-medium">
                            <option value="" disabled selected>Pilih Fasilitas Bersama di Kost anda</option>

                            <?php
                                foreach ($data['fasilitas_bersama'] as $fb)
                                {
                                    echo "<option value='{$fb['id_fasilitas']}'>{$fb['nama_fasilitas']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <?= (isset($_SESSION['errors_tambahkost']['fasilitas_bersama'])) ? " <p class='text-red-500 font-Roboto-medium'>{$_SESSION['errors_tambahkost']['fasilitas_bersama']}</p>" : "" ?>

                    
                    <!-- <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                        <h1 class="text-2xl font-bold text-center mb-4">Input Lantai dan Kamar</h1>
                        
                        <div class="mb-4">
                            <label for="numFloors" class="block font-medium mb-2">Masukkan jumlah lantai:</label>
                            <input 
                                type="number" 
                                id="numFloors" 
                                min="1" 
                                placeholder="Contoh: 3"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>
                        <button 
                            id="generateFloors" 
                            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                            Generate Input Kamar
                        </button>

                        <div id="floorInputs" class="mt-4"></div>

                    </div> -->

                    <h2 class="font-Roboto-medium">Lokasi Kost Anda</h2>
                    <div class="w-full  grid grid-cols-2 gap-2 ">
                        <span class="border-2 py-1 px-4 items-center rounded-md border-gray-200">
                            <span  class="font-Roboto-medium text-gray-700">
                                lat :
                            </span> 
                            <input value="<?= (isset($_SESSION['data_sebelumnya']) ? "{$_SESSION['data_sebelumnya']['lat']}" : "") ?>" id="lat-input" type="text" class="ml-5 border-none text-gray-700 focus:outline-none flex-1 font-Roboto-medium" placeholder="Latitude" disabled>
                        </span>
                        <span  class="border-2 px-4 py-1 items-center rounded-md border-gray-200">
                            <span class="font-Roboto-medium text-gray-700">
                                long :
                            </span>
                            <input value="<?= (isset($_SESSION['data_sebelumnya']) ? "{$_SESSION['data_sebelumnya']['long']}" : "") ?>" id="long-input" type="text" class="ml-5 border-none text-gray-700 focus:outline-none flex-1 font-Roboto-medium" placeholder="Longitude" disabled>
                        </span>
                    </div>  
                    <?= (isset($_SESSION['errors_tambahkost']['lat']) or isset($_SESSION['errors_tambahkost']['long'])) ? " <p class='text-red-500 font-Roboto-medium'>lat dan lng wajib di isi</p>" : "" ?>


                    <div class="w-1/2 h-[400px]">
                        <div id="map-set" class='h-full rounded-md'></div>
                    </div>

                    <button id="tambah-button" type="button" class="w-full py-4 px-4 bg-red-500 text-white text-center rounded-lg"> <i class="fas fa-plus-square"></i> Tambah</button>
                </div>
            </div>
        </main>

        <?php
            if (isset($_SESSION['errors_tambahkost'])) {
                unset($_SESSION['errors_tambahkost']);
            }

            if (isset($_SESSION['data_sebelumnya'])) {
                unset($_SESSION['data_sebelumnya']);
            }
        ?>

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
                provinsiID : 11,
                kotaID : 1101,
                jenisKelamin : "",
                fasilitas: {
                    kamar: {},
                    bersama: {}
                },
                lokasi: {
                    lat: "",
                    long: "",
                },
                
            };
            
            function readFileAsync(file) {
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        resolve(e.target.result);  // Return the result when the file is read
                    };
                    reader.onerror = reject;  // Reject the promise if there's an error
                    reader.readAsDataURL(file);  // Start reading the file
            });
}

            function deleteFoto(event)
            {
                const id = event.target.dataset.id;
                delete dataKost.gambar[parseInt(id)];
                event.target.parentNode.parentNode.remove();
            }

            async function tambahFoto(event) {
                for (let i = 0; i < event.target.files.length; i++) {
                    dataKost.gambar[id] = event.target.files[i];

                    const result = await readFileAsync(event.target.files[i]);

                    gambarPreview.innerHTML += `
                        <div class="relative">
                            <button type="button" data-id=${id} onclick="deleteFoto(event)" class="absolute top-1 rounded-md overflow-hidden right-0 aspect-square">
                                <i data-id=${id} class="fas p-2 w-full h-full z-10 text-white fa-trash"></i>
                            </button>
                            <img class="rounded-lg aspect-square object-cover" src="${result}" />
                        </div>
                    `;
                    id += 1;
                }
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
                    dataKost['kotaID'] = kotas[0]['id'];
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
            const fasilitasKamar = document.getElementById("fasilitas_kamar");
            const fasilitasKamarContainer = document.getElementById("Fasilitas-Kamar");
            const fasilitasBersama = document.getElementById("fasilitas_bersama");
            const fasilitasBersamaContainer = document.getElementById("Fasilitas-Bersama");
            const hiddenField = document.getElementById("jsObject");


            async function kirimDataDenganRedirect(dataKost) {
                const form = document.createElement("form");
                form.method = "POST";
                form.action = "/<?= PROJECT_NAME ?>/pemilik/tambahkost";
                form.enctype = "multipart/form-data"; // Untuk upload file

                // Menambahkan field 'nama'
                form.appendChild(buatInputTersembunyi("nama", namaKost.value));

                // Menambahkan field 'harga'
                form.appendChild(buatInputTersembunyi("harga", hargaKost.value));

                // Menambahkan field 'provinsiID'
                form.appendChild(buatInputTersembunyi("provinsiID", dataKost.provinsiID));

                // Menambahkan field 'kotaID'
                form.appendChild(buatInputTersembunyi("kotaID", dataKost.kotaID));

                // Menambahkan field 'jenisKelamin'
                form.appendChild(buatInputTersembunyi("tipe", jenisKelamin.value));

                // Menambahkan field fasilitas (bersama & kamar) dalam bentuk JSON
                form.appendChild(buatInputTersembunyi("fasilitas", JSON.stringify(dataKost.fasilitas)));

                // Menambahkan field lokasi (lat & long)
                form.appendChild(buatInputTersembunyi("lat", latInput.value));
                form.appendChild(buatInputTersembunyi("long", longInput.value));

                // Menambahkan file gambar ke form
                Object.keys(dataKost.gambar).forEach((id) => {
                    const fileInput = document.createElement("input");
                    fileInput.type = "file";
                    fileInput.hidden = "true";
                    fileInput.name = `gambar[${id}]`; // Mengatur nama file agar bisa diakses dengan array di PHP
                    fileInput.multiple = true;
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(dataKost.gambar[id]);
                    fileInput.files = dataTransfer.files;
                    form.appendChild(fileInput);
                    console.log()
                });

                // Menambahkan form ke body dan submit
                document.body.appendChild(form);
                form.submit();
            }

            // Fungsi untuk membuat input hidden
            function buatInputTersembunyi(name, value) {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = name;
                input.value = value;
                return input;
            }
            

            function hapusFasilitasKamar(event)
            {
                delete dataKost['fasilitas'].kamar[event.target.parentNode.parentNode.dataset.id];
                event.target.parentNode.parentNode.remove();
            }

            function hapusFasilitasBersama(event)
            {
                delete dataKost['fasilitas'].bersama[event.target.parentNode.parentNode.dataset.id];
                event.target.parentNode.parentNode.remove();
            }

            fasilitasKamar.addEventListener("change", () => {
                if (fasilitasKamar.value in dataKost['fasilitas']['kamar'])
                {
                    return;   
                }


                fasilitasKamarContainer.innerHTML += `
                <li data-id="${fasilitasKamar.value}" class='list-item list-disc'>
                    <span>
                        ${fasilitasKamar[fasilitasKamar.selectedIndex].innerHTML}
                    </span>
                    <button onclick="hapusFasilitasKamar(event)">
                        <i class="fas fa-trash w-full h-full p-2 aspect-square text-rose-700"></i>
                    </button>
                </li>`;
                dataKost["fasilitas"]['kamar'][fasilitasKamar.value] = fasilitasKamar[fasilitasKamar.selectedIndex].innerHTML;
            });

            fasilitasBersama.addEventListener("change", () => {
                if (fasilitasKamar.value in dataKost['fasilitas']['bersama'])
                {
                    return;   
                }


                fasilitasBersamaContainer.innerHTML += `
                <li data-id="${fasilitasBersama.value}" class='list-item list-disc'>
                    <span>
                        ${fasilitasBersama[fasilitasBersama.selectedIndex].innerHTML}
                    </span>
                    <button onclick="hapusFasilitasBersama(event)">
                        <i class="fas fa-trash w-full h-full p-2 aspect-square text-rose-700"></i>
                    </button>
                </li>`;
                dataKost["fasilitas"]['bersama'][fasilitasBersama.value] = fasilitasBersama[fasilitasBersama.selectedIndex].innerHTML;
            });

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


            $("#tambah-button").on('click', function () {
                kirimDataDenganRedirect(dataKost);
            });

                const numFloorsInput = document.getElementById("numFloors");
                const generateFloorsBtn = document.getElementById("generateFloors");
                const floorInputsContainer = document.getElementById("floorInputs");
                const showResultsBtn = document.getElementById("showResults");
                const resultsContainer = document.getElementById("results");

                generateFloorsBtn.addEventListener("click", () => {
                    const numFloors = parseInt(numFloorsInput.value);
                    floorInputsContainer.innerHTML = ""; // Hapus input sebelumnya
                    resultsContainer.classList.add("hidden");
                    showResultsBtn.classList.add("hidden");

                    if (isNaN(numFloors) || numFloors < 1) {
                        alert("Masukkan jumlah lantai yang valid (>= 1).");
                        return;
                    }

                    // Generate input untuk setiap lantai
                    for (let i = 1; i <= numFloors; i++) {
                        const floorDiv = document.createElement("div");
                        floorDiv.classList = "floor-input mb-3";

                        floorDiv.innerHTML = `
                            <label class="block font-medium mb-1">
                                Lantai ${i} - Masukkan jumlah kamar:
                            </label>
                            <input 
                                type="number" 
                                min="0"
                                placeholder="Jumlah kamar lantai ${i}"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="floor-${i}"
                            />
                        `;
                        floorInputsContainer.appendChild(floorDiv);
                    }

                    // Tampilkan tombol hasil
                    showResultsBtn.classList.remove("hidden");
                });

            </script>

    </body>
<?php require "./views/Components/Foot.php"; ?>