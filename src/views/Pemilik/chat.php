<?php require "./views/Components/Head.php"; ?>
    <body class="overflow-hidden flex p-0 m-0">
        <?php require "./views/Components/sidebarPemilik.php" ?>
        <main class="flex flex-1">
            <div class="h-screen flex flex-1 bg-gray-100 mt-1">
                <!-- Contact List Sidebar -->
                <div id="contact-sidebar" class="w-fit  bg-white  border-r border-gray-200 overflow-y-auto">
                    <!-- Header -->
                    <div class="p-4 border-b border-gray-200 flex items-center justify-start shadow-sm">
                        <div id="button-expand" class=" h-full flex items-center justify-start">
                            <button onclick="expandContacList()" class="block">
                                <i class="fas text-warna-second fa-bars text-2xl"></i>
                            </button>
                        </div>
                        <h2 id="judul" class="text-xl p-0 ml-5  font-semibold">Contacts</h2>
                    </div>
    
                    <!-- Contact List -->
                    <div id="contact-list" class="p-2 w-64 ">    
                        <!-- Repeat for more contacts -->
                        <div class="flex items-center group space-x-3 rounded-md p-4 hover:bg-gray-100 cursor-pointer">
                            <img src="<?= ASSETS ?>image/profile-placeholder.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium ">test</h3>
                                <p class="text-sm text-gray-500 truncate ">test</p>
                            </div>
                            <span class="text-xs text-gray-400 ">Kemarin</span>
                        </div>
    
                        <!-- Add more contacts as needed -->
                    </div>
                </div>
    
               <!-- Chat Area -->
               <div class="flex w-auto flex-1 flex-col">
                    <!-- Chat Header -->
                    <div class="bg-white w-full p-4 border-b border-gray-200 flex items-center justify-between shadow-sm">
                        <div class="flex items-center space-x-3">
                            <img src="<?= ASSETS ?>image/profile-placeholder.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                            <div>
                                <h2 class="text-lg font-semibold">test</h2>
                                <p class="text-sm text-gray-500">Online</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 text-gray-500">
                            <button class="p-2 hover:text-gray-800">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="p-2 hover:text-gray-800">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
    
                    <!-- Chat Messages -->
                    <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
                        <!-- Sent Message -->
                        <div class="flex justify-end">
                            <div class="bg-warna-second text-white rounded-lg p-3 max-w-xs shadow-sm">
                                <p>Hallo</p>
                                <span class="text-xs text-blue-200 float-right">11:05 AM</span>
                            </div>
                        </div>
    
                        <!-- Received Message -->
                        <div class="flex justify-start">
                            <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                                <p>Hallo</p>
                                <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                            </div>
                        </div>
                    </div>
    
                    <!-- Input Field -->
                    <div class="bg-white p-4 border-t border-gray-200 flex items-center space-x-4">
                        <input type="text" placeholder="Type a message" class="flex-1 p-2 borde text-gray-700 font-Roboto-medium border-gray-300 rounded-full focus:outline-none focus:ring focus:ring-0">
                        <button class="text-warna-second hover:text-base-color">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
        <script>
            

            function expandContacList()
            {
                $("#judul").toggleClass("hidden");
                $("#contact-list").toggleClass("hidden");
                $("#button-expand").toggleClass("justify-center");
                $("#button-expand").toggleClass("justify-start");
                $("#button-expand").toggleClass("w-full");
            }
        </script>
    </body>
<?php require "./views/Components/Foot.php"; ?>