<?php


class Hellper {
    function flashAlert($judul, $message = [])
    {
        echo "
        <div class='bg-red-100 border top-2 right-2 z-40 absolute  alert border-red-400 text-red-700 px-4 py-3 rounded' role='alert'>
            <div class='top-0 left-auto w-full flex justify-between'>
                <strong class='font-bold'>{$judul}</strong>
                <button onclick='deleteError(event)'><i class='fas relative w-full h-full fa-x'></i></button>    
            </div>
        ";

        
        foreach ($message as $mess)
        {
            echo "<p>$mess</p>";
        }
        echo "</div>";

        echo "
        <script>
            function deleteError(event)
            {
                event.target.parentNode.parentNode.parentNode.remove();
            }
        </script>
        ";
    }

    function flashSuccess($judul, $message = [])
    {
        echo "
        <div class='bg-blue-100 z-40 border top-2 right-2 absolute  alert border-blue-400 text-blue-700 px-4 py-3 rounded' role='alert'>
            <div class='top-0 left-auto w-full flex justify-between'>
                <strong class='font-bold'>{$judul}</strong>
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