<?php require "./views/Components/Head.php" ?>

<body class="h-screen flex overflow-hidden">
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <main class="p-5 w-full min-h-screen flex flex-col gap-3 overflow-y-scroll">
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Pembayaran</h1>

            <!-- Search Filter Section (Optional) -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Search</label>
                    <input type="text" id="searchInput"
                        class="block w-64 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Payment Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">ID Pembayaran
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">ID User</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Nama User</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Tanggal Bayar
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Metode Bayar
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Jumlah Bayar
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Status
                                Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody id="paymentTable" class="bg-white divide-y divide-gray-200">
                        <!-- Example row (You can replace these with data from your database) -->
                        <tr>
                            <td class="px-6 py-4">001</td>
                            <td class="px-6 py-4">001</td>
                            <td class="px-6 py-4">Danendra Mahardhika</td>
                            <td class="px-6 py-4">2024-12-15</td>
                            <td class="px-6 py-4">QRIS</td>
                            <td class="px-6 py-4">Rp. 1,000,000</td>
                            <td class="px-6 py-4">
                                <button class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600"
                                    data-status="Belum">Belum</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">002</td>
                            <td class="px-6 py-4">002</td>
                            <td class="px-6 py-4">Nabilah Rizqi Amalia</td>
                            <td class="px-6 py-4">2024-12-10</td>
                            <td class="px-6 py-4">Ditempat</td>
                            <td class="px-6 py-4">Rp. 750,000</td>
                            <td class="px-6 py-4">
                                <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600"
                                    data-status="Sudah">Sudah</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
    const searchInput = document.getElementById("searchInput");
    const paymentRows = document.querySelectorAll("#paymentTable tr");

    // Search Functionality
    searchInput.addEventListener("input", function() {
        const searchQuery = this.value.toLowerCase();
        paymentRows.forEach(row => {
            const paymentId = row.querySelector("td:nth-child(1)")?.textContent.toLowerCase() || "";
            const userId = row.querySelector("td:nth-child(2)")?.textContent.toLowerCase() || "";
            const userName = row.querySelector("td:nth-child(3)")?.textContent.toLowerCase() || "";
            const status = row.querySelector("td:nth-child(7) button")?.textContent.toLowerCase() || "";

            const matchesSearch = paymentId.includes(searchQuery) || userId.includes(searchQuery) ||
                userName.includes(searchQuery) || status.includes(searchQuery);
            row.style.display = matchesSearch ? "" : "none";
        });
    });

    // Toggle Button Status (Sudah/Belum)
    document.querySelectorAll("#paymentTable button").forEach(button => {
        button.addEventListener("click", function() {
            const buttonStatus = this.textContent;
            const newStatus = buttonStatus === "Sudah" ? "Belum" : "Sudah";
            this.textContent = newStatus;
            this.classList.toggle("bg-red-500", newStatus === "Sudah");
            this.classList.toggle("bg-green-500", newStatus === "Belum");
        });
    });
    </script>

    <?php require './views/Components/Foot.php' ?>
</body>