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


                    if (file_exists("dsm.txt") or file_exists("ge.txt")) {
                        foreach ($i = ['DSM','GE'] as $curso) { 
                            if ($curso == 'DSM' && file_exists("dsm.txt")) {
                                $handle = fopen("dsm.txt","r");
                            }
                            elseif ($curso == 'GE' && file_exists("ge.txt")){
                                $handle = fopen("ge.txt","r");
                            }

                            else{
                                continue;
                            }

                            echo "<ul class='list-group'>";   

                            while (!feof($handle)) {
                                $line = fgets($handle);
                
                                if ($line) {
                                    echo " <li class='list-group-item d-flex justify-content-between align-items-center'>".$line."<span class='badge badge-primary badge-pill'>";
                                    echo $curso."</span>";
                                }
                            }
                            echo "</ul>"; 
                            fclose($handle);
                        }
                    }

                    else{
                        echo "<div class='alert alert-warning' role='alert'>";
                        echo 'Não há nenhuma solicitação registrada';
                        echo '</div>';
                    }
                    

                         
            ?>
        
        </div>'

    </div>
</body>
</html>