<img id="coast" src="<?php echo base_url(); ?>assets/images/trail.jpg" width="100%" />
<section>
    <h2>Activities at Pacific Trails Resort</h2>

    <?php foreach($activities as $activity) : ?>
    <h3>
        <?php echo $activity['activityname']; ?>
    </h3>
    <p>
        <?php echo $activity['activitydescription']; ?>
    </p>
    <?php endforeach; ?>
</section>
