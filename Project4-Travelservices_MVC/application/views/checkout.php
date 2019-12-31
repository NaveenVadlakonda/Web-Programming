
        <section class="main-content">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="page-sub-title textcenter">
                            <h2>Check Out</h2>
                            <div class="line"></div>
                        </div><!-- end .page-sub-title -->

                    </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="card-body">
                                                     
                                <table border="2" width="900px">
                                    <tr><th>Category</th><th>Name</th><th>Date</th><th>Price</th></tr>
                                    <?php if(!empty($cart[0])){ 
                                            $total = 0;
                                            for($i=0;$i<sizeof($cart);$i++){ 
                                                $total += $cart[$i]['cost'];
                                    ?>
                                        <tr>
                                        <td> <?php echo $cart[$i]['category'];?></td>
                                        <td><?php echo $cart[$i]['source'];?>--<?php echo $cart[$i]['destination'];?></td>
                                        <td><?php echo $cart[$i]['date'];?></td>
                                        <td>$ <?php echo $cart[$i]['cost'];?></td>
                                        </tr>
                                    <?php } }?>
                                    <tr>
                                        <td><h3>Total</h3></td>
                                        <td></td>
                                        <td></td>
                                        <td><p><?php echo '$'.$total; ?></p></td>
                                    </tr>
                                </table>
                            <hr><br>
                            <br><br>
                            <h5 align="center">Payment</h5>
                            <hr>
                            <p align="center">Credit\Debit:
                                <img id="visa" src="http://i45.tinypic.com/2jdqu89.jpg" alt="visa" />
                                <img id="mastercard" src="http://i47.tinypic.com/357rfch.jpg" alt="mastercard" />
                                <img id="amex" src="http://i42.tinypic.com/25tyo9l.jpg" alt="amex" />
                                <img id="discover" src="http://i45.tinypic.com/2n23h9i.jpg" alt="discover" />
                            </p>
                            <form method="post" action="<?php echo site_url('/App/confirmPay')?>">
                                <div align="center" style="white-space:nowrap">
                                    <label for="nameOnCard">Name on card: </label>
                                    <input type="text" name="nameOnCard" id="nameOnCard" required>
                                </div>
                                <div align="center" style="white-space:nowrap">
                                    <label for="address">Billing Address: </label>
                                    <input placeholder="e.g. 33 Gilmer Street SE Atlanta, GA 30303" name="address" id="address" type="text" required/>
                                </div>
                                <div align="center" style="white-space:nowrap">
                                    <label for="phonenumber">Phone Number</label>
                                    <input placeholder="e.g. 404-413-2000" id="phonenumber" name="phonenumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" type="text" required/>
                                </div>
                                <div align="center" style="white-space:nowrap">
                                    <label for="creditCardNumber">Card Number: </label>
                                    <input onkeyup="getCardVendor(this.value)" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" type="text" id="creditCardNumber"
                                           name="creditCardNumber" placeholder="8888-8888-8888-8888" required>
                                </div>
                                <div align="center" style="white-space:nowrap">
                                    <label for="expirationMonth">Expiration Date: </label>
                                    <select id="expirationMonth" name="expirationMonth">
                                        <option>MM</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <a>/</a>
                                    <select name="expirationYear">
                                        <option>YYYY</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div align="center" style="white-space:nowrap">
                                    <label for="cvv">CCV/CVV: </label>
                                    <input type="text" pattern="[0-9]{3}" placeholder="123" name="cvv" id="cvv" required>
                                </div>
                                <br>
                                <p align="center"><input class="btn btn-primary" name="submit" value="Confirm and Pay" type="submit"></p>
                            </form>
                        </div>
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