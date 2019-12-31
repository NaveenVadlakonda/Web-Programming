
                    

        <section class="main-content">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="page-sub-title textcenter">
                            <h2>All Bookings</h2>
                            <div class="line"></div>
                        </div><!-- end .page-sub-title -->

                    </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

                    <div class="col-md-12 col-sm-12 col-xs-12">

                    <div>                           
                        <table border="2" width="900px">
                                <tr><th>Source</th><th>Destination</th><th>Date</th><th>Time</th><th>Cost</th><th>Payment Date</th></tr>
                                <?php if(!empty($details[0])){  for($i=0;$i<sizeof($details);$i++){ ?>
                                    <tr>
                                    <td> <?php echo $details[$i]['source'];?></td>
                                    <td><?php echo $details[$i]['destination'];?></td>
                                    <td><?php echo $details[$i]['date'];?></td>
                                    <td><?php echo $details[$i]['time'];?></td>
                                    <td>$ <?php echo $details[$i]['cost'];?></td>
                                    <td><?php echo $details[$i]['paymentDate'];?></td>
                                    </tr>
                                <?php }} ?>
                        </table>
                        <div class="clearfix"></div>
                    </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </section><!-- end .main-content -->


<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Your cart</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body">

            <table class="table table-hover" id="cart-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($cart[0])){
                        for($i=0;$i<sizeof($cart);$i++){ ?>
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td> <?php echo $cart[$i]['category'];?></td>
                        <td>$ <?php echo $cart[$i]['cost'];?></td>
                        <td><a href="javascript:void(0);" onclick="deleteRow('<?php echo $cart[$i]['id']; ?>');"> Delete </a></td>
                       <!-- <td><a><i class="fas fa-times"></i></a></td> -->
                    </tr>
                <?php } } ?>
              </tbody>
            </table>

          </div>
          <!--Footer-->
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            <a href="<?php echo site_url();?>/App/checkOut">Checkout</a>
          </div>
        </div>
      </div>
    </div>
<script>
    function deleteRow(id){
        $.ajax({
                url: "<?php echo site_url();?>/App/deleteCart",
                type: "POST",
                data:{
                        'id' : id,
                },
                success : function(response) { 
                    alert('Record Deleted');
                    location.reload();
                },
                error : function() {                                                
                }
        });
    }
</script>