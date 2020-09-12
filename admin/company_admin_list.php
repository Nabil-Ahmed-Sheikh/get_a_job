<?php require_once('../layouts/admin_header.php'); ?>

<?php 
    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    
    // 2. Records per page ($per_page)
    $per_page = 10;
    
    // 3. Total record count ($total_count)
    $total_count = CompanyAdmin::count_all();
    
    // find all photos
    // $photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    
    $sql = "SELECT * from company_admin Limit {$per_page} OFFSET {$pagination->offset()}";
    $list = CompanyAdmin::find_by_sql($sql);
    
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
                    <th scope="col">Company</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($list as $item){ ?>

                    <tr>
                    <th scope="row"><a href="" data-toggle="modal" data-target="<?php echo '#modal'.$item->id; ?>"><?php echo $item->companyName; ?></a>
                    <?php $industry = IndustryType::find_by_id($item->industryType); ?>
                    
                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo 'modal'.$item->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel"><?php echo $item->companyName; ?></h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <p class="h4">Company Info:</p>
                                    <ul>
                                        <li>Company Name:  <?php echo $item->companyName; ?></li>
                                        <li>Company Type:  <?php echo $industry->name; ?></li>
                                        <li>Business Description:  <?php echo $item->businessDescription; ?></li>
                                        <li>Website: <a href="<?php echo $item->websiteURL; ?>"><?php echo $item->websiteURL; ?></a></li>
                                    </ul>

                                    <p class="h4">Contact Person Info:</p>
                                    <ul>
                                        <li>Name:  <?php echo $item->contactPersonName; ?></li>
                                        <li>Designation:  <?php echo $item->contactPersonDesignation; ?></li>
                                        <li>Email:  <?php echo $item->contactPersonEmail; ?></li>
                                        <li>Phone Number:  <?php echo $item->contactPersonNumber; ?></li>
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
                    <form action="../includes/delete_company_admin.php" method="post">
                        <button type="submit" name='delete' value='<?php echo $item->id;?>' class="btn btn-danger">X</button>
                    </form>
                    </td>
                    </tr>


                <?php } ?>
                </tbody>
            </table>

                

        </div>

    </section>
    <!-- ===== End of Main Search Section ===== -->

<div class="container" style="padding-bottom:15px">
<!-- Start of Pagination -->
<div class="col-md-12 mt10">
    <ul class="pagination list-inline text-center">

        <?php if($pagination->total_pages() > 1) { ?>
                
        <?php   if($pagination->has_previous_page()) { ?>
            <li><a href="company_admin_list.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
        <?php } ?>

        <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                if($i == $page) { ?>
                    <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
        <?php   } else { ?>
                    <li><a href="company_admin_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                
        <?php        }
                } ?>

        <?php   if($pagination->has_next_page()) { ?>
            <li><a href="company_admin_list.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                
        <?php    } ?>

        <?php    } ?>
    </ul>
</div>
 <!-- End of Pagination -->
</div>


<?php require_once('../layouts/admin_footer.php') ?>