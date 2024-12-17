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
                        <?php

                            foreach ($data['contact'] as $contact) {
                                echo <<<EOD
                                    <a href="/
                                EOD;
                                
                                echo PROJECT_NAME;

                                echo <<<EOD
                                /pemilik/chatting/{$contact['id_user']}" class="flex items-center group space-x-3 rounded-md p-4 hover:bg-gray-100 cursor-pointer">
                                        <img src="{$contact['profile_user']}" alt="Profile" class="w-10 h-10 rounded-full">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-medium ">{$contact['username_user']}</h3>
                                        </div>
                                        <span class="text-xs text-gray-400 ">Kemarin</span>
                                    </a>
                                EOD;

                            }
                        ?>
    
                        <!-- Add more contacts as needed -->
                    </div>
                </div>
                </div>
            </div>
        </main>
        <script>   
        </script>
    </body>
<?php require "./views/Components/Foot.php"; ?>