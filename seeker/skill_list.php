<?php 
    $list = Skill::find_all_order_by_percentage($user_id);
?>

<?php if(count($list) > 0) {?>

<div class="container" style="border: 1px solid black;">
<p class="h1">Skill Info</p>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Skill</th>
        <th scope="col">Percentage</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($list as $item) { ?>
      
      <tr>
        <td><?php echo $item->skillName; ?></td>
        <td><?php echo $item->percentage; ?></td>
        <td>
          <form action="../includes/skill_handle.php" method='post'>
            <button class="btn btn-danger" value="<?php echo $item->id;?>" name='delete'>X</button>
          </form>
        </td>
      </tr>
      
    <?php }?> 
    </tbody>
  </table>
<?php }?>

<div style="padding:15px;">
<?php require_once('skill_create_form.php'); ?>
</div>

</div>
  

</div>
</div>