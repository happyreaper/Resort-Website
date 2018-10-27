<img id="coast" src="<?php echo base_url(); ?>assets/images/yurt.jpg" width="100%" />
<section>
    <h2>The Yurts at Pacific Trails</h2>
    <dl>
        <dt>What is a yurt?</dt>
        <dd>Our luxury yurts are permanent structures four feet off the ground. Each yurt has canvas walls, a wooden floor, and a roof dome that can be opened.</dd>
        <dt>How are the yurts furnished?</dt>
        <dd>Each yurt is furnished with a queen-size bed with down quilt and gas-fired stove. The luxury camping experience also includes electricity and a sink with hot and cold running water. Shower and restroom facilities are located in the lodge.</dd>
        <dt>What should i bring?</dt>
        <dd>Bring a sense of adventure and some time to relax! Most guests also pack comfortable walking shoes and plan to dress for changing weather with layers of clothing.</dd>
    </dl>

    <h3>Yurts Packages</h3>
    <p>A variety of luxury yurt packages are available. Chose a package from below and contact us to begin your reservation. We're happy to build a custom package just for you.</p>


    <table>
        <tr>
            <th>Package Name</th>
            <th>Description</th>
            <th>Nights</th>
            <th>Cost per Person</th>
        </tr>
        <?php foreach($yurts as $y):  ?>
        <?php
         echo "<tr><td>" . $y['pname'] . "</td><td class='yu'>" . $y['pdesc'] . "</td><td>" . $y['nights'] . "</td><td>" . $y['cost']."$" . "</td></tr>";  //$row['index'] the index here is a field name
        ?>
            <?php endforeach;?>
    </table>

</section>
