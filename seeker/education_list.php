<?php 
    $list = Education::find_all_order_by_date($user_id);
?>

<?php if(count($list) > 0) {?>

<div class="container" style="border: 1px solid black;">
<p class="h1">Educational Info</p>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Degree</th>
        <th scope="col">Institution</th>
        <th scope="col">Passing Year</th>
        <th scope="col">CGPA</th>
        <th scope="col">Scale</th>
        <th scope="col">Division</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($list as $item) { ?>
      
      <tr>
        <td><?php echo $item->degreeTitle; ?></td>
        <td><?php echo $item->institution; ?></td>
        <td><?php echo $item->passYear; ?></td>
        <td><?php echo $item->cgpa ;?></td>
        <td><?php echo $item->scale ;?></td>
        <td><?php echo $item->division; ?></td>
        <td>
          <form action="../includes/education_handle.php" method='post'>
            <button class="btn btn-danger" value="<?php echo $item->id;?>" name='delete'>X</button>
          </form>
        </td>
      </tr>
      
    <?php }?> 
    </tbody>
  </table>
<?php }?>

<div style="padding:15px;">
<?php require_once('education_create_form.php'); ?>
</div>

</div>
  

</div>
</div>