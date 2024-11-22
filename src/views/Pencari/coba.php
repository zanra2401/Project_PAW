<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Carousel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .carousel {
            position: relative;
            width: 80%;
            max-width: 600px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .carousel-track-container {
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.4s ease-in-out;
            transform: translateX(0);
        }

        .carousel-slide {
            min-width: 100%;
            transition: opacity 0.4s ease-in-out;
        }

        .carousel-slide img {
            width: 100%;
            display: block;
            border-radius: 10px;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            z-index: 10;
        }

        .left-button {
            left: 10px;
        }

        .right-button {
            right: 10px;
        }

        .carousel-button:focus {
            outline: none;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            font-weight: 700;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            z-index: 10;
            opacity: 0; /* Tombol disembunyikan */
            transition: opacity 0.3s ease-in-out;
            pointer-events: none; /* Tidak bisa diklik */
        }

        .carousel:hover .carousel-button {
            opacity: 1; /* Tampilkan tombol saat di-hover */
            pointer-events: auto; /* Aktifkan klik */
        }

        .left-button {
            left: 10px;
        }

        .right-button {
            right: 10px;
        }

        .carousel-button:focus {
            outline: none;
        }

        .hidden {
            display: none; /* Sembunyikan tombol secara penuh */
        }

        .carousel-prev-button {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            background-color: #e5e7e9;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
        }

        .carousel-prev-icon-svg {
            width: 35%;
        }

    </style>
</head>
<body>
    
    <button type="button" class="carousel-prev-button" data-carousel-prev>
        <span class="carousel-prev-icon">
            <svg class="carousel-prev-icon-svg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
        </span>
    </button>

    <div class="carousel">
        <div class="carousel-track-container">
            <ul class="carousel-track">
                <li class="carousel-slide current-slide">
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Image 1">
                </li>
                <li class="carousel-slide">
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Image 2">
                </li>
                <li class="carousel-slide">
                    <img src="https://images.rukita.co/buildings/building/f94aeed2-71b.jpg?tr=c-at_max%2Cw-3840" alt="Image 3">
                </li>
            </ul>
        </div>
        <button class="carousel-button left-button">&lt;</button>
        <button class="carousel-button right-button">&gt;</button>
    </div>
    <script>

        const track = document.querySelector('.carousel-track');
        const slides = Array.from(track.children);
        const nextButton = document.querySelector('.right-button');
        const prevButton = document.querySelector('.left-button');

        const slideWidth = slides[0].getBoundingClientRect().width;

        // Atur posisi setiap slide berdampingan
        slides.forEach((slide, index) => {
            slide.style.left = `${slideWidth * index}px`;
        });

        const updateButtons = (currentIndex) => {
            // Sembunyikan tombol `prev` jika di slide pertama
            if (currentIndex === 0) {
                prevButton.classList.add('hidden');
            } else {
                prevButton.classList.remove('hidden');
            }

            // Sembunyikan tombol `next` jika di slide terakhir
            if (currentIndex === slides.length - 1) {
                nextButton.classList.add('hidden');
            } else {
                nextButton.classList.remove('hidden');
            }
        };

        const moveToSlide = (track, currentSlide, targetSlide) => {
            track.style.transform = `translateX(-${targetSlide.style.left})`;
            currentSlide.classList.remove('current-slide');
            targetSlide.classList.add('current-slide');

            const targetIndex = slides.findIndex(slide => slide === targetSlide);
            updateButtons(targetIndex);
        };

        // Awalnya, tombol prev disembunyikan (karena di slide pertama)
        updateButtons(0);

        // Tambahkan event listener pada tombol
        prevButton.addEventListener('click', () => {
            const currentSlide = track.querySelector('.current-slide');
            const prevSlide = currentSlide.previousElementSibling;
            if (prevSlide) moveToSlide(track, currentSlide, prevSlide);
        });

        nextButton.addEventListener('click', () => {
            const currentSlide = track.querySelector('.current-slide');
            const nextSlide = currentSlide.nextElementSibling;
            if (nextSlide) moveToSlide(track, currentSlide, nextSlide);
        });


    </script>
</body>
</html>
