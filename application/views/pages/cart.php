<?php
$this->load->library('session');
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
   case "remove":
      if(!empty($_SESSION["cart_item"])) {
         foreach($_SESSION["cart_item"] as $k => $v) {
               if($_GET["code"] == $k)
                  unset($_SESSION["cart_item"][$k]);           
               if(empty($_SESSION["cart_item"]))
                  unset($_SESSION["cart_item"]);
         }
      }
   break;
   case "empty":
      unset($_SESSION["cart_item"]);
   break;   
}
}
?>
    <script src="<?php echo base_url(); ?>assets/js/placeorder.js"></script>
    <section>
        <h2>My Cart</h2>
        <div id="shopping-cart">
            <h3>Order details </h3>
            <a id="btnEmpty" href="<?php echo base_url(); ?>cart?action=empty">Empty Cart</a>
            <br /><br />
            <?php
                            if(isset($_SESSION["cart_item"])){
                                $item_total = 0;
                        ?>
                <table>

                    <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Code</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Price</strong></th>
                    </tr>
                    <?php    
                                        foreach ($_SESSION["cart_item"] as $item){
                                    ?>
                    <tr>
                        <td><strong><?php echo $item["name"]; ?></strong></td>
                        <td>
                            <?php echo $item["code"]; ?>
                        </td>
                        <td>
                            <?php echo $item["quantity"]; ?>
                        </td>
                        <td>
                            <?php echo "$".$item["price"]; ?>
                        </td>
                    </tr>
                    <?php
                                        $item_total += ($item["price"]*$item["quantity"]);
                                        }
                                        ?>

                        <tr>
                            <td colspan="5" align=right><strong>Total:</strong>
                                <?php echo "$".$item_total; ?>
                            </td>
                        </tr>

                </table>
                <br /><br />

                <?php
            }
            ?>
        </div>
        <button id="myButton" onclick=<?php if(!empty($_SESSION[ 'cart_item'])){ ?>"placeOrder()"<?php } else{?>"alert('Cart is empty');"<?php } ?>>Place order</button>
    </section>
    <br /><br />
