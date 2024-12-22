<?php require './views/Components/HeadReviewGambar.php' ?>
<body>
    <nav class="w-full h-14 bg-warna-second flex items-center">
        <div class="pl-6">
            <a href="/project_paw/pencari/kostpage/<?= $data['id']?>" class="text-lg font-bold text-white hover:text-base-color duration-300"><i class="fa-solid fa-chevron-left"></i></a>
        </div>
        <div class="mx-auto">
            <h1 class="font-semibold text-xl text-white"><?= $data['judul']?></h1>
        </div>
    </nav>


    <div class="mx-auto w-1/2 grid gap-6 mt-6 mb-10">
        <h1 class="font-semibold text-xl">Foto Kost</h1>
        <div class="grid gap-2">
        <?php
            $data_gambar = $data['gambar'];
            $gap = count($data_gambar) - 1;
            $top = 0; 
            $counter = 0;
            $path = "/" . PROJECT_NAME . "/";

            while ($top <= $gap) {
                if ($counter % 2 == 0) {
                    $imagePath = $path . $data_gambar[$top]['path_gambar'];
                    echo <<<EOD
                    <div>
                        <img src="{$imagePath}" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
                    </div>
                    EOD;
                    $top += 1;
                } else {
                    echo <<<EOD
                    <div class="grid grid-cols-2 gap-2">
                    EOD;
                    
                    $imageCount = 0; 
                    while ($imageCount < 2 && $top <= $gap) {
                        $imagePath = $path . $data_gambar[$top]['path_gambar'];
                        echo <<<EOD
                            <img src="{$imagePath}" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
                        EOD;
                        $top += 1;
                        $imageCount += 1;
                    }
                    
                    echo "</div>"; 
                }

                $counter += 1; 
            }
            ?>

        </div>
    </div>
    
    <!-- <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
      <img
        src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840"
        alt="Zoomed Image"
        class="w-[800px] h-[600px] object-cover rounded-lg shadow-lg"
      />
      <button class="absolute top-5 right-5 text-white text-2xl font-bold" id="closeModal">&times;</button>
    </div> -->





  <script>
    // const thumbnails = document.querySelectorAll("#thumbnail");
    // const modal = document.getElementById("imageModal");
    // const closeModal = document.getElementById("closeModal");

    // thumbnails.forEach((thumbnail) => {
    //   thumbnail.addEventListener("click", () => {
    //     modal.classList.remove("hidden");
    //   });
    // })

    // closeModal.addEventListener("click", () => {
    //   modal.classList.add("hidden");
    // });

    // modal.addEventListener("click", (e) => {
    //   if (e.target === modal) {
    //     modal.classList.add("hidden");
    //   }
    // });
  </script>
</body>