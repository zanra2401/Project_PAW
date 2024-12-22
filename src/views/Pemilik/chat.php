<?php 
    require "./views/Components/Head.php"; 
    $foto_profile = $data['data_user'][0]['profile_user'];

?>
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
                    <div id="contact-list" class="p-2 w-80 ">    
                        <!-- Repeat for more contacts -->
                        <?php
                            foreach ($data['contact'] as $contact) {
                                echo <<<EOD
                                    <a href="/
                                EOD;
                                
                                echo PROJECT_NAME;

                                $project_name =  PROJECT_NAME;


                                echo <<<EOD
                                /pemilik/chatting/{$contact[0]['id_user']}" class="flex relative items-center group space-x-3 rounded-md p-4 hover:bg-gray-100 cursor-pointer">
                                        <img src="/{$project_name}/{$contact[0]['profile_user']}" alt="Profile" class="w-10 h-10 rounded-full">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-medium ">{$contact[0]['username_user']}</h3>
                                        </div>
                                EOD;
                                if ($contact['unread'] > 0)
                                {
                                    echo <<<EOD
                                            <span class="flex justify-center items-center right-0 -mt-2 -mr-2 w-5 h-5 bg-warna-second text-white text-xs font-semibold rounded-full">
                                                {$contact['unread']}
                                            </span>
                                    EOD;
                                }
                                        
                                echo "</a>";
                            }
                        ?>
                    </div>
                </div>
                </div>
            </div>
        </main>
            <script>   
             setInterval(
                function () {
                    fetch("/<?= PROJECT_NAME ?>/pencari/getContact")
                    .then(response => response.json())
                    .then(data => {
                        contacts = ``;
                        data.forEach(contact => {
                            contacts += `<a href="/<?= PROJECT_NAME ?>/pemilik/chatting/${contact[0]['id_user']}" class="flex relative items-center group space-x-3 rounded-md p-4 hover:bg-gray-100 cursor-pointer">
                                    <img src="/<?= PROJECT_NAME ?>/${contact[0]['profile_user']}" alt="Profile" class="w-10 h-10 rounded-full">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-medium ">${contact[0]['username_user']}</h3>
                                    </div>`
                            if (contact['unread'] > 0){
                                contacts += `<span class="flex justify-center items-center right-0 -mt-2 -mr-2 w-5 h-5 bg-warna-second text-white text-xs font-semibold rounded-full">
                                    ${contact['unread']}
                                </span>`
                            }
                            contacts += `</a>`;
                        });

                        document.getElementById("contact-list").innerHTML = contacts;
            
                    })
                    .catch(error => console.error('Error fetching messages:', error));
                }
            ,3000);
        </script>
    </body>
<?php require "./views/Components/Foot.php"; ?>