<?php require_once('../layouts/admin_header.php'); ?>
<?php $list = IndustryType::find_all(); ?>

<?php 
    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    
    // 2. Records per page ($per_page)
    $per_page = 8;
    
    // 3. Total record count ($total_count)
    $total_count = IndustryType::count_all();
    
    // find all photos
    // $photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    
    $sql = "SELECT * from industry_type Limit {$per_page} OFFSET {$pagination->offset()}";
    $list = IndustryType::find_by_sql($sql);
    
    // neet to add ?page=$page to all links we want to
    // maintain the current page (or store $page in session)        
?>

    <!-- ===== Start of Main Search Section ===== -->
    <section style="min-height:80vh">
    
        <div class="container">
        <p class='h4'><?php echo $session->message; ?></p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($list as $item){?>
            <tr>
            <form action="../includes/industry_type_handler.php" method="post">
              <input type="hidden" name='id' value='<?php echo $item->id; ?>'>
              <td><input type="text" name='name' class='form-control' value='<?php echo $item->name; ?>'></td>
              <td><textarea class='form-control' name="description" id="" cols="30" rows="5"><?php echo $item->description; ?></textarea></td>
              <td>
                <button type='sumbit' name='edit' class='btn btn-warning'>Edit</button>
              </td>
            </form>              
            </tr>
          <?php } ?> 
          </tbody>
        </table>

        <div>
            <!-- Button trigger modal -->
            <div class="col text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
              Add More
              </button>
            </div>
          

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Industry Type</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../includes/industry_type_handler.php" method="post">
                    <label for="mname">Industry Name</label>
                    <input type="text" class='form-control' name='name' id='mname'>
                    <label for="mdes">Description</label>
                    <textarea class="form-control" name="description" id="mdes" cols="30" rows="10"></textarea>
                  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" name='create' class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>

        </div>

    </section>
    <!-- ===== End of Main Search Section ===== -->

<div class="container" style="padding-bottom:15px">
<!-- Start of Pagination -->
<div class="col-md-12 mt10">
    <ul class="pagination list-inline text-center">

        <?php if($pagination->total_pages() > 1) { ?>
                
        <?php   if($pagination->has_previous_page()) { ?>
            <li><a href="industry_list.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
        <?php } ?>

        <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                if($i == $page) { ?>
                    <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
        <?php   } else { ?>
                    <li><a href="industry_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                
        <?php        }
                } ?>

        <?php   if($pagination->has_next_page()) { ?>
            <li><a href="industry_list.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                
        <?php    } ?>

        <?php    } ?>
    </ul>
</div>
 <!-- End of Pagination -->
</div>


<?php require_once('../layouts/admin_footer.php') ?>