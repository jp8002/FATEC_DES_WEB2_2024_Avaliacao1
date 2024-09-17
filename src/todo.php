<?php
    require "head.html";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todos</title>
</head>
<body>

    <div class="container-fluid">
        
        <div class="mx-auto mt-5 w-50">
            
            
            <h1 class="text-center">Todos os registros cadastrados</h1>
            <hr>
            
            <?php
        
                foreach ($i = ['DSM','GE'] as $curso) { 
        
                     if ($curso == 'DSM') {
                        $handle = fopen("dsm.txt","r");
                    }
                    else{
                        $handle = fopen("ge.txt","r");
                    }
        
                    echo "<ul class='list-group'>";   
                    while (!feof($handle)) {
                        $line = fgets($handle);
        
                        if (!empty($line)) {
                            echo " <li class='list-group-item d-flex justify-content-between align-items-center'>".$line."<span class='badge badge-primary badge-pill'>";
                            echo $curso."</span>";
                        }
                    }
                    echo "</ul>"; 
                    fclose($handle);
                }
            ?>
        
        </div>'

    </div>
</body>
</html>