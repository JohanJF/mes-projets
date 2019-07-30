<?php 

try {

        // On se connecte à notre base de données
     
    $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    // On analyse la variable POST action (qui permet éventuellement de gérer plusieurs scripts de mise à jour)
    /*if( $_POST['action'] == "updateListeOrder")
    {*/
        // On récupère le tableau des ID de chaque élément
        $elements = $_POST['element'];
     
        // On indique le premier indice de position souhaité
        $position = 1;
     
        // Et on met à jour la base de données
        foreach($elements as $id)
        {
            $result = $conn->prepare('
                        UPDATE list 
                        SET position = '.$position.' 
                        WHERE id_list = :id AND id_board_foreign = :id_tableau
                    ');

            $result->execute(
                                array(
                                    'id' => $id,
                                    'id_tableau' => $_POST['id_tableau']
                                )
            );
            $position++;
        }
        echo $position;
        echo 'success !';
    //}
    
} catch (Exception $e) {
   echo $e->getMessage();
}



 ?>