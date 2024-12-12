
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Font Awesome CDN for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarItems = document.querySelectorAll('[data-target]');
            const contentSections = document.querySelectorAll('[data-content]');
            const dropdownToggles = document.querySelectorAll('[data-dropdown-toggle]');

            // Sidebar click functionality
            sidebarItems.forEach(item => {
                item.addEventListener('click', () => {
                    const targetId = item.getAttribute('data-target');

                    // Reset active state for all sidebar items
                    sidebarItems.forEach(sidebar => {
                        sidebar.classList.remove('text-[#c48d6e]');
                    });

                    // Set active state for the clicked sidebar item
                    item.classList.add('text-[#c48d6e]');

                    // Hide all content sections
                    contentSections.forEach(section => {
                        section.classList.add('hidden');
                    });

                    // Show the targeted section
                    const targetSection = document.getElementById(targetId);
                    targetSection.classList.remove('hidden');
                });
            });

            // Dropdown toggle functionality
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const targetId = toggle.getAttribute('data-dropdown-toggle');
                    const target = document.getElementById(targetId);

                    // Toggle the visibility of the dropdown
                    target.classList.toggle('hidden');

                    // Rotate the arrow icon for the dropdown
                    toggle.querySelector('svg').classList.toggle('rotate-180');
                });
            });
        });
    </script>
</head>
<body class="bg-gray-100 font-sans w-full h-full m-0">
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">PUSAT BANTUAN</h1>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <!-- Sidebar -->
            <aside class="lg:col-span-1 bg-white rounded-lg shadow p-4">
                <ul class="space-y-3">
                    <li class="font-medium cursor-pointer flex items-center" data-target="section1">
                        <i class="fas fa-search mr-3"></i> Pencarian dan Pemesanan
                    </li>
                    <li class="font-medium cursor-pointer flex items-center" data-target="section2">
                        <i class="fas fa-check-circle mr-3"></i> Seputar Check-in
                    </li>
                    <li class="font-medium cursor-pointer flex items-center" data-target="section3">
                        <i class="fas fa-sign-out-alt mr-3"></i> Check-out dan Pengembalian Deposit
                    </li>
                    <li class="font-medium text-[#c48d6e] cursor-pointer flex items-center" data-target="section4">
                        <i class="fas fa-times-circle mr-3"></i> Pembatalan dan Perubahan Pesanan
                    </li>
                    <li class="font-medium cursor-pointer flex items-center" data-target="section5">
                        <i class="fas fa-tags mr-3"></i> Harga dan Promosi
                    </li>
                    <li class="font-medium cursor-pointer flex items-center" data-target="section6">
                        <i class="fas fa-bed mr-3"></i> Tinggal di Rukita
                    </li>
                </ul>
            </aside>

            <!-- Content -->
            <section class="lg:col-span-3 bg-white rounded-lg shadow p-6">
                <div id="section1" data-content class="hidden">
                    <h2 class="text-xl font-semibold mb-4">Pencarian dan Pemesanan</h2>
                    <div>
                        <button data-dropdown-toggle="dropdown1" class="w-full text-left font-medium flex justify-between items-center">
                            Informasi 1
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="dropdown1" class="text-sm mt-1 hidden">
                            <p>Detail untuk informasi 1.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div id="section2" data-content class="hidden">
                    <h2 class="text-xl font-semibold mb-4">Seputar Check-in</h2>
                    <div>
                        <button data-dropdown-toggle="dropdown2" class="w-full text-left font-medium flex justify-between items-center">
                            Informasi Check-in
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="dropdown2" class="text-sm mt-1 hidden">
                            <p>Detail untuk informasi check-in.</p>
                        </div>
                    </div>
                </div>

                <div id="section3" data-content class="hidden">
                    <h2 class="text-xl font-semibold mb-4">Check-out dan Pengembalian Deposit</h2>
                </div>

                <div id="section4" data-content>
                    <h2 class="text-xl font-semibold mb-4">Pembatalan dan Perubahan Pesanan</h2>
                    <div>
                        <button data-dropdown-toggle="dropdown3" class="w-full text-left font-medium flex justify-between items-center">
                            Ketentuan Pembatalan
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="dropdown3" class="text-sm mt-1 hidden">
                            <p>Informasi terkait pembatalan pesanan.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

