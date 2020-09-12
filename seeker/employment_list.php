<?php 
    $employment_list = Employment::find_all_order_by_date($user_id);
?>

<?php if(count($list) > 0) {?>

<div class="container" style="border: 1px solid black;">
<p class="h1">Employment Info</p>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Company Name</th>
        <th scope="col">Designation</th>
        <th scope="col">Department</th>
        <th scope="col">Location</th>
        <th scope="col">Start Date</th>
        <th scope="col">Worked Till</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($employment_list as $item) { ?>
      
      <tr>
        <td><?php echo $item->companyName; ?></td>
        <td><?php echo $item->designation; ?></td>
        <td><?php echo $item->department; ?></td>
        <td><?php echo $item->location ;?></td>
        <td><?php echo $item->workedFrom ;?></td>
        <td><?php echo $item->workedTill; ?></td>
        <td>
          <form action="../includes/employment_handle.php" method='post'>
            <button class="btn btn-danger" value="<?php echo $item->id;?>" name='delete'>X</button>
          </form>
        </td>
      </tr>
      
    <?php }?> 
    </tbody>
  </table>
<?php }?>

<div style="padding:15px;">
<?php require_once('employment_create_form.php'); ?>
</div>

</div>
  

</div>
</div>