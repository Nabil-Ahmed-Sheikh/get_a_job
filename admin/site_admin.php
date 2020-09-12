<?php require_once('../layouts/admin_header.php'); ?>

<?php 
    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    
    // 2. Records per page ($per_page)
    $per_page = 10;
    
    // 3. Total record count ($total_count)
    $total_count = Admin::count_all();
    
    // find all photos
    // $photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    
    $sql = "SELECT * from admin Limit {$per_page} OFFSET {$pagination->offset()}";
    $list = Admin::find_by_sql($sql);
    
    // neet to add ?page=$page to all links we want to
    // maintain the current page (or store $page in session)        
?>


    <!-- ===== Start of Main Search Section ===== -->
    <section style="min-height:60vh">
        <div class="container">
        <p class="h3"><?php echo $session->message; ?></p>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Admins</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($list as $item){ ?>

                    <tr>
                    <th scope="row"><a href="" data-toggle="modal" data-target="<?php echo '#modal'.$item->id; ?>"><?php echo $item->name; ?></a>
                    
                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo 'modal'.$item->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <p class="h3">Admin Info:</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <ul>
                                        <li>Name:  <?php echo $item->name; ?></li>
                                        <li>Email:  <?php echo $item->email; ?></li>
                                        <li>Phone Number:  <?php echo $item->phoneNumber; ?></li>
                                    </ul>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                                        
                    </th>
            
                    <td>
                    <form action="../includes/admin_handler.php" method="post">
                        <?php if($item->id != $session->user_id) {?>
                        <button type="submit" name='delete' value='<?php echo $item->id;?>' class="btn btn-danger">X</button>
                        <?php }?>
                    </form>
                    </td>
                    </tr>


                <?php } ?>
                </tbody>
            </table>

                

        </div>

    </section>
    <!-- ===== End of Main Search Section ===== -->

<div class="container" >
<div class="container" style="text-align: center" >
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  New Admin
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../includes/admin_handler.php" method="post">
            <label for="name">Name</label>
            <input class='form-control' id='name' name='name' type="text">
            <label for="email">Email</label>
            <input class='form-control' id='email' name='email' type="text">
            <label for="phoneNumber">Phone Number</label>
            <input class='form-control' id='phoneNumber' name='phoneNumber' type="text">
            <label for="password">Password</label>
            <input class='form-control' id='password' name='password' type="text">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" name="add" class="btn btn-primary" value="add" placeholder="Add">
      </div>
      </form>
    </div>
  </div>
</div>        
    
</div>

<div class="container" style="padding-bottom:15px">
<!-- Start of Pagination -->
<div class="col-md-12 mt10">
    <ul class="pagination list-inline text-center">

        <?php if($pagination->total_pages() > 1) { ?>
                
        <?php   if($pagination->has_previous_page()) { ?>
            <li><a href="site_admin.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
        <?php } ?>

        <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                if($i == $page) { ?>
                    <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
        <?php   } else { ?>
                    <li><a href="site_admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                
        <?php        }
                } ?>

        <?php   if($pagination->has_next_page()) { ?>
            <li><a href="site_admin.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                
        <?php    } ?>

        <?php    } ?>
    </ul>
</div>
 <!-- End of Pagination -->
</div>


<?php require_once('../layouts/admin_footer.php') ?>