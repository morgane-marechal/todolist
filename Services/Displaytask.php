<?php
    class Displaytask{
        private $id;
        public $id_user;

        function __construct($id_user) {
            $this->id_user = $id_user;
        }

        public function displayTodolist(){
            global $bdd;
            $allComment = $bdd -> prepare("SELECT task.id, task.task, task.datecreate, task.datedone, task.taskdone, task.taskcancel, utilisateurs.login from task join utilisateurs on utilisateurs.id = task.id_user where utilisateurs.id = $this->id_user");
            $allComment -> execute();
            $result = $allComment->fetchAll(PDO::FETCH_ASSOC);
            //echo json_encode($result);
            //var_dump($result);
            //tableau html -->
            echo "<div id='todolist'><table>
            <thead><tr><td>A faire</td><td>Date de création</td><td>Utilisateur</td><td>Date de fin</td><td></td></tr></thead><tbody>";
            for ($i = (count($result)-1); $i >= 0; $i--) {
            echo "<tr><td>".$result[$i]['task']."</td><td> ".$result[$i]['datecreate']."</td><td>".$result[$i]['login']."</td><td>";
            if ($result[$i]['datedone']!=null){
                echo "<button id='done'>".$result[$i]['datedone']."</div>";
            }else{
                echo "<button id='done' name='$i' onclick='dateDone(".$result[$i]['id'].")'>Fait!</button></td>
                <td><button id='cancel".$result[$i]['id']."' class='del' onclick='myFunction()' <a class='delete' href=todolist.php?delete=".$result[$i]['id']."></a>Supprimer</button></td></tr>";

            }
            var_dump($result[$i]['id']);
            }
            echo "</tbody></table></div>";
            
        }


    public function delete(int $idtask){
        global $bdd;
        $delete= $bdd ->prepare("DELETE from task WHERE id = '$idtask'");
        $delete->execute();
    }
        
 

    }

?>