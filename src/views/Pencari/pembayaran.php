<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kos-Kosan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID&currency=USD"></script>
    <style>
    /* Custom styles */
    .hidden {
        display: none;
    }

    .container {
        max-width: 700px;
    }

    .card-input {
        max-width: 400px;
        margin: 0 auto;
    }

    .table-container {
        max-width: 500px;
        margin: 0 auto;
    }
    </style>
</head>

<body class="bg-gray-50">

    <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg mt-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Pembayaran Kos-Kosan</h1>
        </div>

        <div class="border-t border-gray-300 pt-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Pilih Opsi Pembayaran</h2>
            <div class="flex justify-center space-x-6 mb-8">
                <!-- QRIS Option -->
                <button
                    class="payment-option bg-gray-100 p-6 rounded-lg hover:bg-gray-200 transition duration-200 shadow-lg text-center"
                    id="qris-option">
                    <img src="#" alt="QRIS" class="w-32 h-20 mx-auto mb-4">
                    <p class="text-lg font-semibold">QRIS</p>
                </button>
                <!-- In-Store Option -->
                <button
                    class="payment-option bg-gray-100 p-6 rounded-lg hover:bg-gray-200 transition duration-200 shadow-lg text-center"
                    id="in-store-option">
                    <img src="#" alt="In-Store" class="w-32 h-20 mx-auto mb-4">
                    <p class="text-lg font-semibold">Ditempat</p>
                </button>
            </div>
        </div>

        <div class="card-input mb-6">
            <label for="kost-id" class="block text-sm font-medium text-gray-700">ID Kost</label>
            <input type="text" id="kost-id" class="p-3 w-full border border-gray-300 rounded-md mt-2"
                placeholder="Masukkan ID Kost" />
        </div>

        <div class="table-container mb-6">
            <table class="table-auto w-full border border-gray-300 text-gray-700">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Keterangan</th>
                        <th class="px-4 py-2">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">Total Pembayaran</td>
                        <td class="px-4 py-2">Rp 2,500,000</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <button class="bg-[#68422d] text-white p-4 rounded-lg hover:bg-[#5a3724] transition duration-200"
                id="continue-button">
                Lanjutkan Pembayaran
            </button>
        </div>
    </div>

    <!-- QRIS Section -->
    <div id="qris-section" class="hidden">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Pembayaran QRIS</h3>
        <p class="text-sm text-gray-600 mb-4">Scan kode QR menggunakan aplikasi QRIS untuk melakukan pembayaran.</p>
        <div id="qris-code-container" class="mt-4">
            <img src="qris-sample.png" alt="QRIS Code" class="w-32 h-32 mx-auto">
        </div>
    </div>



    <!-- In-Store Section -->
    <div id="in-store-section" class="hidden">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Pembayaran Ditempat</h3>
        <p class="text-sm text-gray-600">Lakukan pembayaran secara langsung di lokasi dengan kasir kami.</p>
    </div>

    <script>
    // Set up PayPal button
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '2500000' // Total payment
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Pembayaran berhasil, terima kasih ' + details.payer.name.given_name);
                window.location.href = 'confirm.php'; // Redirect after payment
            });
        }
    }).render('#paypal-button-container');

    // Show payment sections based on selection
    document.querySelectorAll('.payment-option').forEach(option => {
        option.addEventListener('click', function() {
            document.getElementById('qris-section').classList.add('hidden');
            document.getElementById('paypal-section').classList.add('hidden');
            document.getElementById('shopee-section').classList.add('hidden');
            document.getElementById('in-store-section').classList.add('hidden');

            if (this.id === 'qris-option') {
                document.getElementById('qris-section').classList.remove('hidden');
            } else if (this.id === 'paypal-option') {
                document.getElementById('paypal-section').classList.remove('hidden');
            } else if (this.id === 'shopee-option') {
                document.getElementById('shopee-section').classList.remove('hidden');
            } else if (this.id === 'in-store-option') {
                document.getElementById('in-store-section').classList.remove('hidden');
            }
        });
    });
    </script>
</body>

</html>