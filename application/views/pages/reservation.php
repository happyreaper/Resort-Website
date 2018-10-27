<script src="<?php echo base_url(); ?>assets/js/reservations.js">


</script>
<?php $this->load->helper('form'); ?>
<section>
    <h2>Reservations at Pacific Trails</h2>
    <h3>Contact Us</h3>
    <?php if (!empty($reservationData)) : ?>
    <input type="hidden" name="dateFlag" id="dateFlag" value="TRUE">
    <?php endif; ?>
    <p>Required information is marked with an asterik (&#42;).</p>
    <?php echo form_open(base_url() . 'reservation', array('id' => 'reservationForm')); ?>
    <p>
        <?php echo form_label('*First Name:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['fname'];}else{$temp = '';} ?>
        <?php echo form_input(array('id' => 'fName', 'name' => 'fName', 'value' => $temp, 'autocomplete' => 'on', 'required' => 'required', 'pattern' => '[a-zA-Z]+', 'title' => 'Alphabets only', 'class'=>'ips')); ?>
        <?php echo form_error('fName'); ?>
    </p>
    <p>
        <?php echo form_label('*Last Name:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['lname'];}else{$temp = '';} ?>
        <?php echo form_input(array('id' => 'lName', 'name' => 'lName', 'value' => $temp, 'autocomplete' => 'on', 'required' => 'required', 'pattern' => '[a-zA-Z]+', 'title' => 'Alphabets only', 'class'=>'ips')); ?>
        <?php echo form_error('lName'); ?>
    </p>
    <p>
        <?php echo form_label('*Email:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['email'];}else{$temp = '';} ?>
        <?php echo form_input(array('type' => 'email', 'id' => 'myEmail', 'name' => 'myEmail', 'value' => $temp, 'required' => 'required','autocomplete' => 'on', 'title' => 'Email (Format: xyz@abc.com)', 'class'=>'ips')); ?>
        <?php echo form_error('myEmail'); ?>
    </p>
    <p>
        <?php echo form_label('Phone:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['phone'];}else{$temp = '';} ?>
        <?php echo form_input(array('type' => 'tel', 'id' => 'myPhone', 'name' => 'myPhone', 'value' => $temp, 'autocomplete' => 'on', 'pattern' => '\d{10}', 'title' => 'Phone Number (Format: 9999999999)', 'class'=>'ips')); ?>
        <?php echo form_error('myPhone'); ?>
    </p>
    <p>
        <?php echo form_label('Address:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['address'];}else{$temp = '';} ?>
        <?php echo form_input(array('id' => 'myAddress', 'name' => 'myAddress', 'value' => $temp,  'class'=>'ips')); ?>
        <?php echo form_error('myAddress'); ?>
    </p>
    <p>
        <?php echo form_label('Arrival Date:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['arrival'];}else{$temp = '';} ?>
        <?php echo form_input(array('type' => 'date', 'id' => 'arrDate', 'name' => 'arrDate', 'value' => $temp, 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('Nights:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['no_ofnights'];}else{$temp = '';} ?>
        <?php echo form_input(array('type' => 'number', 'id' => 'Nights', 'name' => 'Nights', 'value' => $temp, 'autocomplete' => 'on', 'max' => '14', 'min' => '1', 'title' => 'Range: 1 - 14', 'class'=>'ips')); ?>
        <?php echo form_error('Nights'); ?>
    </p>
    <p>
        <?php echo form_label('*Comments:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['comments'];}else{$temp = '';} ?>
        <?php echo form_input(array('id' => 'myComment', 'name' => 'myComment', 'value' => $temp,  'required' => 'required', 'class'=>'ips')); ?>
        <?php echo form_error('myComment'); ?>
    </p>
    <p>
        <?php echo form_label('Activities:'); ?>
        <?php $temp = "";
                        foreach($activities as $activity){
                        $arrayActivities[$activity['activityid']] = $activity['activityname'];
                        if (!empty($reservationData)){
                           if($reservationData['activityid'] == $activity['activityid']){
                              $temp = $activity['activityid'];
                           }
                        }
                     }
                     ?>
        <?php echo form_dropdown('myActivity', $arrayActivities, $temp, array('id' => 'myActivity')); ?>
    </p>
    <p>
        <?php echo form_label('*Packages:'); ?>
        <?php $temp = ""; 
                        foreach($yurts as $y){
                        $arrayPackages[$y['pid']] = $y['pname'];
                        if (!empty($reservationData)){
                           if($reservationData['packageid'] == $y['pid']){
                              $temp = $y['pid'];
                           }
                        }
                     }
                     ?>
        <?php echo form_dropdown('myPackage', $arrayPackages, $temp, array('id' => 'myPackage', 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label('When Date:'); ?>
        <?php if (!empty($reservationData)) {$temp = $reservationData['dates'];}else{$temp = '';} ?>
        <?php echo form_input(array('type' => 'date', 'id' => 'whenDate', 'name' => 'whenDate',  'value' => $temp, 'class'=>'ips')); ?>
    </p>
    <p>
        <?php echo form_label(''); ?>
        <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
    </p>
    <?php echo form_close(); ?>
</section>
