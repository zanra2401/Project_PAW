<?php
$conn = new mysqli("localhost", "root", "", "cari_kost");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>


<?php require "./views/Components/Head.php" ?>

<body class="h-screen flex overflow-hidden">
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <main class="p-5 w-full min-h-screen flex flex-col gap-3 overflow-y-scroll">
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Pembayaran</h1>

            <!-- Search Section -->
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
                        <?php
              // Example database connection
              $conn = new mysqli("localhost", "username", "password", "dbname");

              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $query = "SELECT id_pembayaran, id_user, nama_user, tanggal_bayar, metode_bayar, jumlah_bayar, status_pembayaran FROM pembayaran";
              $result = $conn->query($query);

              // Output rows
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td class='px-6 py-4'>" . $row['id_pembayaran'] . "</td>
                          <td class='px-6 py-4'>" . $row['id_user'] . "</td>
                          <td class='px-6 py-4'>" . $row['nama_user'] . "</td>
                          <td class='px-6 py-4'>" . $row['tanggal_bayar'] . "</td>
                          <td class='px-6 py-4'>" . $row['metode_bayar'] . "</td>
                          <td class='px-6 py-4'>" . number_format($row['jumlah_bayar'], 0, ',', '.') . "</td>
                          <td class='px-6 py-4'>
                              <button class='px-4 py-2 text-white " . ($row['status_pembayaran'] == 'Sudah' ? 'bg-green-500' : 'bg-red-500') . " rounded-lg hover:bg-green-600' data-status='" . $row['status_pembayaran'] . "'>" . $row['status_pembayaran'] . "</button>
                          </td>
                      </tr>";
              }

              // Close connection
              $conn->close();
            ?>
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
                userName.includes(searchQuery) || status.includes(searchQuery);            row.style.display = matchesSearch ? "" : "none";
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