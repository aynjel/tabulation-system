<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $score=[16,11,8,2,5,16,6,8,8,16,2,2,2,1];
        
        rsort($score);
        
        $count=array_count_values($score);
        echo "<br>";
        $i=0;
        $rank=0;
        $dupctr=1;
        for($i;$i<count($score);$i++){
            $dup=$count[$score[$i]];           
            if($count[$score[$i]]===1){
                $rank++;
                echo "SCORE: ".$score[$i]." RANK:".($rank)."<br>";   
            }
            else if($dup>1 && $dupctr<$dup) {
                echo "SCORE: ".$score[$i]." RANK:".($rank+1.5)."<br>";
                $dupctr++;
            }
            else{                
                echo "SCORE: ".$score[$i]." RANK:".($rank+1.5)."<br>"; 
                $rank+=$dup;
                $dupctr=1;
            }
        }
        
        
        
        
        ?>
    </body>
</html>