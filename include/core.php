<?php
    function fetch_info($num, $db)
    {
        if(!$stmt = $db->prepare("select prenom, nom, solde from Clients where numCompte=?")){
            echo "<script> alert ('Impossible de preparer la requete :\n');</script>";
            die();
        }
        
        if (!$stmt->bind_param("s", $num)){
            echo '<script> alert ("Impossible de lier les donner");</script>';
            die();
        }
        if(!$stmt->execute()){
            echo '<script> alert ("Impossble d\'executer la requete");</script>';
            
        }

        $result = $stmt->get_result();
        if(!$ligne = $result->fetch_assoc()){
            return array();
            $stmt->close();
        }else{
            return array(
                "prenom" => $ligne['prenom'],
                "nom" => $ligne['nom'],
                "solde" => $ligne['solde']
            );
            $stmt->close();
        }


            

    }


    function validateAmount($montant, $solde, $typeTrans)
    {
        if ($typeTrans == getEnumFormat("RTR") && !($solde < $montant *(1 + 0.1))){
            return true;
        }

        if($typeTrans == getEnumFormat("DPT")){
            return true;
        }
        return false;
    }

    function getEnumFormat($typeTrans){
        switch ($typeTrans)
        {
            case "retrait":
                return "RTR";
                break;

            case "RTR":
                return "RTR";
                break;

            case "DPT":
                    return "DPT";
                    break;      

            case "depot":
                return "DPT";
                break;

            default:
                echo '<script> alert ("impossible de definir le le type de transfert");</script>';
                die();
                break;
        }
    }

    function insertImg($imgname, $style){
        echo "<img style=\"" . $style . "\" " . "src=\"CSS/img/" . $imgname . "\" />";
    }
?>