<script src="<?php echo base_url(); ?>assets/js/reservations.js"></script>
<?php $this->load->helper('form'); ?>
<section>
    <h2>Reservations at Pacific Trails</h2>
    <h3>My Reservations</h3>
    <?php if (!empty($reservation[0])) : ?>
    <input type="hidden" name="dateFlag" id="dateFlag" value="TRUE">
    <?php endif; ?>
    <?php echo form_open(base_url() . 'myreservations'); ?>
    <p>
        <?php echo form_label('*Email:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['email'];} else{$temp = "";} ?>
        <?php echo form_input(array('type' => 'email', 'id' => 'myEmail', 'name' => 'myEmail', 'value' => $temp, 'tabindex' => '1', 'required' => 'required', 'title' => 'Email (Format: xyz@abc.com)', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('First Name:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['fname'];} else{$temp = "";} ?>
        <?php echo form_input(array('id' => 'fName', 'name' => 'fName', 'value' => $temp, 'readonly' => 'true', 'autocomplete' => 'off', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Last Name:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['lname'];} else{$temp = "";} ?>
        <?php echo form_input(array('id' => 'lName', 'name' => 'lName', 'value' => $temp, 'readonly' => 'true', 'autocomplete' => 'off', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Phone:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['phone'];} else{$temp = "";} ?>
        <?php echo form_input(array('type' => 'tel', 'id' => 'myPhone', 'name' => 'myPhone', 'value' => $temp, 'readonly' => 'true', 'autocomplete' => 'off', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Address:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['address'];} else{$temp = "";} ?>
        <?php echo form_input(array('id' => 'myAddress', 'name' => 'myAddress', 'value' => $temp, 'readonly' => 'true',  'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Arrival Date:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['arrival'];} else{$temp = "";} ?>
        <?php echo form_input(array('type' => 'date', 'id' => 'arrDate', 'name' => 'arrDate', 'value' => $temp, 'readonly' => 'true', 'autocomplete' => 'off', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Departure Date:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['depDate'];} else{$temp = "";} ?>
        <?php echo form_input(array('type' => 'date', 'id' => 'depDate', 'name' => 'depDate', 'value' => $temp, 'readonly' => 'true', 'autocomplete' => 'off', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Comments:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['comments'];} else{$temp = "";} ?>
        <?php echo form_input(array('id' => 'myComment', 'name' => 'myComment', 'value' => $temp, 'readonly' => 'true', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Activities:'); ?>


        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['activityname'];} else{$temp = "";} ?>
        <?php echo form_input(array('id' => 'myActivity','name' => 'myActivity', 'value' => $temp, 'readonly' => 'true', 'class'=>'ips')); ?>


    </p>
    <p>
        <?php echo form_label('Packages:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['pname'];} else{$temp = "";} ?>
        <?php echo form_input(array('id' => 'myPackage','name' => 'myPackage', 'value' => $temp, 'readonly' => 'true', 'class'=>'ips')); ?>

    </p>
    <p>
        <?php echo form_label('When Date:'); ?>
        <?php if (!empty($reservation[0])) {$temp = $reservation[0]['dates'];} else{$temp = "";} ?>
        <?php echo form_input(array('type' => 'date', 'id' => 'whenDate', 'name' => 'whenDate', 'value' => $temp, 'readonly' => 'true', 'autocomplete' => 'off', 'class'=>'ips')); ?><br><br>
    </p>
    <p>
        <?php echo form_label(''); ?>
        <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit', 'tabindex' => '2')); ?>
    </p>
    <?php echo form_close(); ?>

</section>
