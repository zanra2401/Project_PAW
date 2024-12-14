<?php


class Hellper {
    function flashAlert($message = [])
    {
        echo "
        <div class='bg-red-100 border absolute  alert border-red-400 text-red-700 px-4 py-3 rounded' role='alert'>
            <div class='top-0 left-auto w-full flex justify-between'>
                <strong class='font-bold'>Registrasi Gagal!</strong>
                <button onclick='deleteError(event)'><i class='fas relative w-full h-full fa-close'></i></button>    
            </div>
        ";

        
        foreach ($message as $mess)
        {
            echo "<p>$mess</p>";
        }


        echo "
        </div>";

        echo "
        <script>
            function deleteError(event)
            {
                event.target.parentNode.parentNode.parentNode.remove();
            }
        </script>
        ";
    }
}

$hellper = new Hellper();