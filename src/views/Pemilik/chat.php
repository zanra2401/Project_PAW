<?php require "./views/Components/Head.php"; ?>
    <body class="overflow-x-hidden">
        <?php require "./views/Components/NavBar.php" ?>
        <div class="h-screen flex bg-gray-100 mt-1">
            <!-- Contact List Sidebar -->
            <div class="w-1/3 bg-white border-r border-gray-200 overflow-y-auto">
                <!-- Header -->
                <div class="p-4 border-b border-gray-200 flex items-center justify-start shadow-sm">
                    <div>
                        <a class="block" href="<?= (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '' ?>">
                            <i class="fas text-base-color fa-chevron-circle-left text-2xl"></i>
                        </a>
                    </div>
                    <h2 class="text-xl ml-2 font-semibold">Contacts</h2>
                </div>

                <!-- Contact List -->
                <div class="p-4">

                    <div class="flex items-center group space-x-3 p-2 border-b border-gray-500 hover:bg-base-color hover:text-white cursor-pointer">
                        <img src="<?= ASSETS ?>image/profile-placeholder.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                        
                        <div class="flex-1">
                            <h3 class="text-lg font-medium group-hover:text-white">John Doe</h3>
                            <p class="text-sm text-gray-500 truncate group-hover:text-white">Last message preview here...</p>
                        </div>
                        
                        <span class="text-xs text-gray-400 group-hover:text-white">10:45 AM</span>
                    </div>


                    <!-- Repeat for more contacts -->
                    <div class="flex items-center group space-x-3 p-2 hover:bg-base-color cursor-pointer">
                        <img src="<?= ASSETS ?>image/profile-placeholder.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                        <div class="flex-1">
                            <h3 class="text-lg font-medium group-hover:text-white">Jane Smith</h3>
                            <p class="text-sm text-gray-500 truncate group-hover:text-white">Last message preview here...</p>
                        </div>
                        <span class="text-xs text-gray-400 group-hover:text-white">Yesterday</span>
                    </div>

                    <!-- Add more contacts as needed -->
                </div>
            </div>

            <!-- Chat Area -->
            <div class="w-2/3 flex flex-col">
                <!-- Chat Header -->
                <div class="bg-white p-4 border-b border-gray-200 flex items-center justify-between shadow-sm">
                    <div class="flex items-center space-x-3">
                        <img src="<?= ASSETS ?>image/profile-placeholder.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                        <div>
                            <h2 class="text-lg font-semibold">Active Contact</h2>
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
                        <div class="bg-base-color text-white rounded-lg p-3 max-w-xs shadow-sm">
                            <p>Hello, how are you?</p>
                            <span class="text-xs text-blue-200 float-right">11:05 AM</span>
                        </div>
                    </div>

                    <!-- Received Message -->
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>

                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                            <p>I'm good, thanks! And you?</p>
                            <span class="text-xs text-gray-500 float-right">11:06 AM</span>
                        </div>
                    </div>
                </div>

                <!-- Input Field -->
                <div class="bg-white p-4 border-t border-gray-200 flex items-center space-x-4">
                    <input type="text" placeholder="Type a message" class="flex-1 p-2 borde text-gray-700 font-Roboto-medium border-gray-300 rounded-full focus:outline-none focus:ring focus:ring-0">
                    <button class="text-base-color hover:text-base-color">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </body>
<?php require "./views/Components/Foot.php"; ?>