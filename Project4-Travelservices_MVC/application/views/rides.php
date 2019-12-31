
                    <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="search-content">

                                    <form action="<?php echo site_url('/App/searchRides')?>" method="post" novalidate autocomplete="off" class="idealforms searchtours">

                                        <div class="row">

                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="field">
                                                    <select id="destination" name="source">
                                                        <option value="default">From</option>
                                                        <option value="Charlotte">Charlotte</option>
                                                        <option value="Virginia">Virginia</option>
                                                        <option value="Florida">Florida</option>
                                                        <option value="New York">New York</option>
                                                        <option value="Texas">Texas</option>
                                                        <option value="Atlanta">Atlanta</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">

                                                <div class="field">
                                                    <select id="destination" name="destination">
                                                        <option value="default">To</option>
                                                        <option value="Charlotte">Charlotte</option>
                                                        <option value="Virginia">Virginia</option>
                                                        <option value="Florida">Florida</option>
                                                        <option value="New York">New York</option>
                                                        <option value="Texas">Texas</option>
                                                        <option value="Atlanta">Atlanta</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">

                                                <div class="field">
                                                    <input name="event" type="text" placeholder="Date" class="datepicker">
                                                </div>


                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">

                                                <div class="field">
                                                    <select id="destination" name="seats">
                                                        <option value="default">Number of seats</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">

                                                <div class="field buttons">
                                                    <button type="submit" name="search" class="btn btn-lg green-color">Search</button>
                                                </div>

                                            </div>

                                        </div>
                                    </form>
                                </div><!-- end .search-content -->

                            </div><!-- end .col-sm-12 -->

                        </div><!-- end .second-parallax-content -->

                    </div><!-- end .main-parallax-content -->

                </div><!-- end .background .parallax -->

            </div><!-- end .main-baner -->

        </header><!-- end .header -->

        <section class="main-content">
            <?php if($temp1 == 1){ ?>
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="page-sub-title textcenter">
                            <h2>All rides</h2>
                            <div class="line"></div>
                        </div><!-- end .page-sub-title -->

                    </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

                    <div class="col-md-12 col-sm-12 col-xs-12">

                         <div>                           
                                <table border="2" width="1000px">
                                <tr><th>Source</th><th>Destination</th><th>Date</th><th>Time</th><th>Cost</th><th>ADD</th></tr>
                                <?php for($i=0;$i<sizeof($details);$i++){ ?>
                                    <tr>
                                    <td> <?php echo $details[$i]['source'];?></td>
                                    <td><?php echo $details[$i]['destination'];?></td>
                                    <td><?php echo $details[$i]['date'];?></td>
                                    <td><?php echo $details[$i]['time'];?></td>
                                    <td>$ <?php echo $details[$i]['cost'];?></td>
                                    <td> <button class="btn" onclick="updatecart('<?php echo $details[$i]['source']; ?>','<?php echo $details[$i]['destination']; ?>','<?php echo $details[$i]['date']; ?>' ,'<?php echo $details[$i]['time']; ?>','<?php echo $username; ?>','<?php echo $details[$i]['cost']; ?>')">Select
                                        </button></td>
                                    </tr>
                                <?php } ?>
                                        </table>
                                <div class="clearfix"></div>

                        </div><!-- end .page-content -->
                    </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        <?php  } else{echo $message;}?>
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
            <p>Do you want to purchase parking service in your destination?</p>
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-info" href="<?php echo site_url();?>/App/parking">Yes</a>
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
                        'category': 'Flight',
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