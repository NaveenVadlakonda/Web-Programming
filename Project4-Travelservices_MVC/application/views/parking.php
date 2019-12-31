
                    <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="search-content">

                                <form action="<?php echo site_url('/App/pcheckOut')?>" method="post" novalidate autocomplete="off" class="idealforms searchtours">

                                    <div class="row">
                                     <input type="hidden" name="destination" value="<?php echo $details[0]['place']; ?>">                                             
                                    <h1>Parkings available in <?php echo $details[0]['place']; ?>  are:</h1>

                                  <?php if(!empty($details[0])){  for($i=0;$i<sizeof($details);$i++){ ?>
                                    
                                      <input type="radio" name="parking" id="q<?php echo $details[$i]['pid']; ?>" value="<?php echo $details[$i]['pid']; ?>">
                                      <label class="form-check-label" for="q<?php echo $details[$i]['pid']; ?>"><?php echo $details[$i]['parkingName'];?>-- $<?php echo $details[$i]['cost'];?></label>
                                    
                                    <?php }} ?>                                    
                                    </div>
                                                                            
                                    <div> 
                                      <button type="submit" name="search" class="btn btn-lg green-color">Check out</button>                                   
                                    </div>
                                </form>
                                </div><!-- end .search-content -->

                            </div><!-- end .col-sm-12 -->

                        </div><!-- end .second-parallax-content -->

                    </div><!-- end .main-parallax-content -->

                </div><!-- end .background .parallax -->

            </div><!-- end .main-baner -->

        </header><!-- end .header -->




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
                        <td> <?php echo $cart[$i]['category'];?> </td>
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
              <a data-dismiss="modal" data-toggle="modal" data-target="#modalAbandonedCart">Checkout</a>  
            
          </div>
        </div>
      </div>
    </div>


<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Pre-Pay parking service
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-3">
            <p></p>
            <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
          </div>

          <div class="col-9">
            <p>Do you want to purchase parking service at your destination?</p>
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-info">Yes</a>
        <a type="button"  class="btn btn-info waves-effect" href="<?php echo site_url();?>/App/checkOut" >No Continue Checkout</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->
 <script type="text/javascript">
        
    function updatecart(source,destination,date,time,username,cost){
        $.ajax({
                url: "<?php echo site_url();?>/App/addCart",
                type: "POST",
                data:{
                        'source' : source,
                        'destination' : destination,
                        'date' : date,
                        'time': time,
                        'username': username,
                        'cost' : cost
                },
                success : function(response) { 
                    alert('Item Added to Cart');
                    window.location.href = "<?php echo site_url();?>/App/Home";
                },
                error : function() {                                                
                }
        });
    }        
</script>
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