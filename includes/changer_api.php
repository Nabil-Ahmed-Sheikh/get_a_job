<?php require_once('initialize.php');?>

<?php 
    if(isset($_GET['id'])){
        $set = Set::find_by_eid($_GET['id']);
        echo json_encode($set);
        
    } elseif (isset($_GET['cid'])){
        $id = $_GET['cid'];
        $sql = "Select personalinfo.* from personalinfo inner join applyTable on personalinfo.id = applyTable.aid where applyTable.id=".$id;
        $candidates = PersonalInfo::find_by_sql($sql);
        echo json_encode($candidates);
        
    }
?>