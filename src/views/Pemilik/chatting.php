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
                    <div id="contact-list" class="p-2 w-96 ">    
                    <?php
                            foreach ($data['contact'] as $contact) {
                                echo <<<EOD
                                    <a href="/
                                EOD;

                                $project_name = PROJECT_NAME;
                                
                                echo PROJECT_NAME;

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
    
               <!-- Chat Area -->
               <div class="flex w-auto flex-1 flex-col">
                    <!-- Chat Header -->
                    <div class="bg-white w-full p-4 border-b border-gray-200 flex items-center justify-between shadow-sm">
                        <div class="flex items-center space-x-3">
                            <img src="<?= $data['user']['profile_user'] ?>" alt="Profile" class="w-10 h-10 rounded-full">
                            <div>
                                <h2 class="text-lg font-semibold"><?= $data['user']['username_user'] ?></h2>
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
                    <div id="chatMessages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
                        <!-- Sent Message -->
                        <?php 
                            foreach ($data['chat'] as $chat) {
                                $datetime = new DateTime($chat['tanggal_chat']);
                                if ($chat['id_user_pengirim'] == $_SESSION['id_user'])
                                {
                                    echo <<<EOD
                                    <div class="flex justify-end">
                                        <div class="bg-warna-second text-white rounded-lg p-3 max-w-xs shadow-sm">
                                            <p>{$chat['isi_chat']}</p>
                                            <span class="text-xs text-blue-200 float-right">{$datetime->format('l, F j, Y g:i A')}</span>
                                        </div>
                                    </div>
                                    EOD;
                                }
                                else
                                {
                                    echo <<<EOD
                                    <div class="flex justify-start">
                                        <div class="bg-gray-200 text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                                            <p>{$chat['isi_chat']}</p>
                                            <span class="text-xs text-gray-500 float-right">{$datetime->format('l, F j, Y g:i A')}</span>
                                        </div>
                                    </div>
                                    EOD;
                                }
                            }
                        ?>
                        
    
                    </div>
    
                    <!-- Input Field -->
                    <div class="bg-white p-4 border-t border-gray-200 flex items-center space-x-4">
                        <input id="textMessage" type="text" placeholder="Type a message" class="flex-1 border-none p-2 borde text-gray-700 font-Roboto-medium border-gray-300 rounded-full focus:outline-none focus:ring focus:ring-0">
                        <button onclick="sendMessage()" class="text-warna-second hover:text-base-color">
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

            chatMessages.scrollTo({
                top: chatMessages.scrollHeight, // Ketinggian total halaman
                behavior: 'auto'               // Animasi scroll yang halus
            });

          
            setInterval(
                function () {
                    fetch("/<?= PROJECT_NAME ?>/pencari/getMessage/<?= $data['id_user'] ?>")
                    .then(response => response.json())
                    .then(data => {
                        chat = ``;
                        data.forEach(message => {
                            const now = new Date(message['tanggal_chat']);
                            let humanReadable = now.toLocaleString("en-EN", {
                                weekday: "long",  // Nama hari (Senin, Selasa, ...)
                                year: "numeric",  // Tahun
                                month: "long",    // Nama bulan lengkap
                                day: "numeric",   // Tanggal
                                hour: "numeric",  // Jam (2 digit)
                                minute: "2-digit", // Menit
                                hour12: true     // Gunakan format 24 jam
                            });

                            humanReadable = humanReadable.replace(/pukul|at/gi, '').trim();
                            if (message['id_user_pengirim'] == <?= $_SESSION['id_user'] ?>)
                            {
                                chat +=  `
                                <div class="flex justify-end">
                                    <div class="bg-warna-second w-fit text-white rounded-lg p-3 max-w-xs shadow-sm">
                                        <p>${message['isi_chat']}</p>
                                        <span class="text-xs text-blue-200 float-right">${humanReadable}</span>
                                    </div>
                                </div>`
                                
                            }
                            else
                            {
                                
                                chat += `<div class="flex justify-start">
                                    <div class="bg-gray-200 w-fit text-gray-800 rounded-lg p-3 max-w-xs shadow-sm">
                                        <p>${message['isi_chat']}</p>
                                        <span class="text-xs text-gray-500 float-right">${humanReadable}</span>
                                    </div>
                                </div>`
                            
                            }
                            chatMessages.innerHTML = chat;
                        });
                        chatMessages.scrollTo({
                            top: chatMessages.scrollHeight, // Ketinggian total halaman
                            behavior: 'auto'               // Animasi scroll yang halus
                        });
                    })
                    .catch(error => console.error('Error fetching messages:', error));
                }
            ,3000);


            setInterval(
                function () {
                    fetch("/<?= PROJECT_NAME ?>/pencari/getContact")
                    .then(response => response.json())
                    .then(data => {
                        contacts = ``;
                        data.forEach(contact => {
                            contacts += `<a href="/<?= PROJECT_NAME ?>/pencari/chatting/${contact[0]['id_user']}" class="flex relative items-center group space-x-3 rounded-md p-4 hover:bg-gray-100 cursor-pointer">
                                    <img src="${contact[0]['profile_user']}" alt="Profile" class="w-10 h-10 rounded-full">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-medium ">${contact[0]['username_user']}</h3>
                                    </div>`
                            if (contact['unread'] > 0){
                                contact += `<span class="flex justify-center items-center right-0 -mt-2 -mr-2 w-5 h-5 bg-warna-second text-white text-xs font-semibold rounded-full">
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

            function sendMessage(){
                const now = new Date();
                let humanReadable = now.toLocaleString("en-EN", {
                    weekday: "long",  // Nama hari (Senin, Selasa, ...)
                    year: "numeric",  // Tahun
                    month: "long",    // Nama bulan lengkap
                    day: "numeric",   // Tanggal
                    hour: "numeric",  // Jam (2 digit)
                    minute: "2-digit", // Menit
                    hour12: true     // Gunakan format 24 jam
                });

                humanReadable = humanReadable.replace(/pukul|at/gi, '').trim();

                chatMessages.innerHTML += `
                    <div class="flex justify-end">
                        <div class="bg-warna-second text-white rounded-lg p-3 max-w-xs shadow-sm">
                            <p>${textMessage.value}</p>
                            <span class="text-xs text-blue-200 float-right">${humanReadable}</span>
                        </div>
                    </div>
                `;

                chatMessages.scrollTo({
                    top: chatMessages.scrollHeight, // Ketinggian total halaman
                    behavior: 'auto'               // Animasi scroll yang halus
                });

                let message = textMessage.value;
                let data = {
                    message: message
                }

                fetch("/<?= PROJECT_NAME ?>/pemilik/sendMessage/<?= $data['id_user'] ?>", {
                    method: "POST",
                    headers: {
                    'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    console.log("SUCCESS");
                }).catch(error => console.error('Error fetching messages:', error))
            }
        </script>
    </body>
<?php require "./views/Components/Foot.php"; ?>