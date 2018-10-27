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
      
}
}
?>

    <?php $this->load->helper('form'); ?>
    <section>
        <h2>My Cart</h2>
        <div id="shopping-cart">
            <?php
            if(isset($_SESSION["cart_item"])){
                $item_total = 0;
            ?>
                <table>
                    <tbody>
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
                            <td>
                                <?php echo $item["name"]; ?>
                            </td>
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
                    </tbody>
                </table>
                <?php
            }
            ?>
        </div>
        <br /><br />

        <?php echo form_open(base_url() . 'placeyourorder', array('id' => 'shoppingForm')); ?>
        <p>
            <?php echo form_label('*First Name:'); ?>
            <?php if (!empty($shoppingData)) {$temp = $shoppingData['fname'];}else{$temp = '';} ?>
            <?php echo form_input(array('id' => 'fName', 'name' => 'fName', 'value' => $temp, 'autocomplete' => 'on', 'required' => 'required', 'pattern' => '[a-zA-Z]+', 'title' => 'Alphabets only', 'class'=>'ips')); ?>
            <?php echo form_error('fName'); ?>
        </p>
        <p>
            <?php echo form_label('*Last Name:'); ?>
            <?php if (!empty($shoppingData)) {$temp = $shoppingData['lname'];}else{$temp = '';} ?>
            <?php echo form_input(array('id' => 'lName', 'name' => 'lName', 'value' => $temp, 'autocomplete' => 'on', 'required' => 'required', 'pattern' => '[a-zA-Z]+', 'title' => 'Alphabets only', 'class'=>'ips')); ?>
            <?php echo form_error('lName'); ?>
        </p>
        <p>
            <?php echo form_label('*Email:'); ?>
            <?php if (!empty($shoppingData)) {$temp = $shoppingData['email'];}else{$temp = '';} ?>
            <?php echo form_input(array('type' => 'email', 'id' => 'myEmail', 'name' => 'myEmail', 'value' => $temp, 'required' => 'required', 'autocomplete' => 'on', 'title' => 'Email (Format: xyz@abc.com)', 'class'=>'ips')); ?>
            <?php echo form_error('myEmail'); ?>
        </p>

        <p>
            <?php echo form_label(); ?>
            <?php echo form_submit(array('value' => 'Buy', 'class' => 'buy')); ?>
        </p>
        <?php echo form_close(); ?>

    </section>
