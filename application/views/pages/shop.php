<?php
$this->load->library('session');
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
   case "add":
      if(!empty($_POST["quantity"])) {
         $itemArray = array($_GET["code"]=>array('name'=>$_GET["name"], 'code'=>$_GET["code"], 'quantity'=>$_POST["quantity"], 'price'=>$_GET["cost"]));
         
         if(!empty($_SESSION["cart_item"])) {
            if(in_array($_GET["code"],array_keys($_SESSION["cart_item"]))) {
               foreach($_SESSION["cart_item"] as $k => $v) {
                     if($_GET["code"] == $k) {
                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                           $_SESSION["cart_item"][$k]["quantity"] = 0;
                        }
                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                     }
               }
            } else {
               $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
            }
         } else {
            $_SESSION["cart_item"] = $itemArray;
         }
      }
   break;
}
}
?>
    <?php $this->load->helper('form'); ?>
    <section>

        <h2>Shop at Pacific Trails</h2>
        <div class="tab">
            <div class="left">
                <img src="<?php echo base_url(); ?>assets/images/trailguide.jpg" alt="Trail Guide">
                <img src="<?php echo base_url(); ?>assets/images/yurtyoga.jpg" alt="Yurt Guide" class="yogaimg">
            </div>
            <div class="right">
                <h3>Pacific Trails Hiking Guide</h3>
                <p>Guided hikes to the best trails around Pacific Trails Resort. Each hike includes a detailed route, distance, elevation change and estimated time. 187 pages. Softcover. $19.95</p>
                <?php echo form_open(base_url()."shop?action=add&code=P1&name=Pacific Trails Hiking Guide&cost=19.95"); ?>
                <?php echo form_input(array('type' => 'number', 'name' => 'quantity', 'value' => '1')); ?>
                <?php echo form_submit(array('value' => 'Add to cart')); ?>
                <?php echo form_close(); ?>
                <h3 class="rightdown">Yurt Yoga</h3>
                <p>Enjoy the restorative poses of yurt yoga in the comfort of your own home. Each pose is illustrated with several photographs, an explanation and a description of the restorative benefits. 206 pages. Softcover. $24.95</p>
                <?php echo form_open(base_url()."shop?action=add&code=P2&name=Yurt Yoga&cost=24.95"); ?>
                <?php echo form_input(array('type' => 'number', 'name' => 'quantity', 'value' => '1')); ?>
                <?php echo form_submit(array('value' => 'Add to cart')); ?>
                <?php echo form_close(); ?>
            </div>
        </div>

    </section>
