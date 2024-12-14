<?php require './views/Components/HeadReviewGambar.php' ?>
<body>
    <nav class="w-full h-14 bg-warna-second flex items-center">
        <div class="pl-6">
            <a href="/project_paw/pencari/kostpage" class="text-lg font-bold text-white hover:text-base-color duration-300"><i class="fa-solid fa-chevron-left"></i></a>
        </div>
        <div class="mx-auto">
            <h1 class="font-semibold text-xl text-white">Griya kost Umi Sri</h1>
        </div>
    </nav>

    <div class="mx-auto w-1/2 grid gap-6 mt-6 mb-10">
        <h1 class="font-semibold text-xl">Foto/Video Kost</h1>
        <div class="grid gap-2">
            <div>
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail"  class="cursor-pointer rounded-lg">
            </div>
            <div class="grid grid-cols-2 gap-2">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
            </div>
            <div>
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
            </div>
            <div class="grid grid-cols-2 gap-2">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
            </div>
            <div>
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
            </div>
            <div class="grid grid-cols-2 gap-2">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
            </div>
            <div>
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
            </div>
            <div class="grid grid-cols-2 gap-2">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
                <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="" id="thumbnail" class="cursor-pointer rounded-lg">
            </div>
        </div>
    </div>
    
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
      <img
        src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840"
        alt="Zoomed Image"
        class="w-[800px] h-[600px] object-cover rounded-lg shadow-lg"
      />
      <button class="absolute top-5 right-5 text-white text-2xl font-bold" id="closeModal">&times;</button>
    </div>





  <script>
    const thumbnails = document.querySelectorAll("#thumbnail");
    const modal = document.getElementById("imageModal");
    const closeModal = document.getElementById("closeModal");

    thumbnails.forEach((thumbnail) => {
      thumbnail.addEventListener("click", () => {
        modal.classList.remove("hidden");
      });
    })

    closeModal.addEventListener("click", () => {
      modal.classList.add("hidden");
    });

    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.classList.add("hidden");
      }
    });
  </script>
</body>