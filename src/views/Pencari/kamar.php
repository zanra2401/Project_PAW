<?php 
    require './views/Components/HeadKamar.php';
?>
<body class="bg-gray-100">

    <nav class="w-full h-14 bg-[#c48d6e] flex items-center">
        <div class="pl-6">
            <a href="/project_paw/pencari/kostpage/<?= $data['id']?>" class="text-lg font-bold text-white hover:text-base-color duration-300"><i class="fa-solid fa-chevron-left"></i></a>
        </div>
        <div class="mx-auto">
            <h1 class="font-semibold text-xl text-white"><?= $data['judul']?></h1>
        </div>
    </nav>
    <div class="mt-5 flex items-center justify-center">

        <div class="container mx-auto p-4 ">

            <div class="relative flex justify-center">
            <div class="w-1/2 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-red-500"></div>
            </div>
            
            <div class="bg-white border-4 border-gray-700 rounded-b-lg shadow-lg p-6 mt-1">
                <h1 class="text-2xl font-bold text-center mb-6">Denah Kost</h1>
            
            <?php 
                $lantai = 1;
                foreach($data['data_kamar'] AS $lan){
                    echo <<<EDO
                        <div class="mb-8">
                            <h2 class="text-lg font-semibold mb-4 text-center">Lantai $lantai</h2>
                            <div class="grid grid-cols-7 gap-4">
                    EDO;
                    foreach($lan AS $kamar){
                        if($kamar[1] == 'terisi'){
                            echo <<<EDO
                                <div class="bg-[#83493d] border border-[#83493d] rounded-md shadow p-4 text-center text-white">
                                    <p class="text-lg font-semibold">Kamar {$kamar[0]}</p>
                                    <p class="text-sm">Terisi</p>
                                </div>
                            EDO;
                        } else {
                            echo <<<EDO
                                <div class="bg-white border border-[#83493d] rounded-md shadow p-4 text-center">
                                    <p class="text-lg font-semibold">Kamar {$kamar[0]}</p>
                                    <p class="text-sm">Kosong</p>
                                </div>
                            EDO;
                        }
                    }
                    echo <<<EDO
                            </div>
                        </div>
                    EDO;

                    $lantai += 1;
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
