<?php
define ("TITLE", "Team | Gracie's fine dining");
include ('includes/header.php');
include('includes/array.php')
?>
<div id="team-members" class="cf">
    <hi>Our Team at Gracie's</hi>
    <p>We're small, but mighty. Gracie's Fine Dining has been a family-owned and run business since the dirty thirties, and we're proud of it! When you get these three together, you never know what can happen. But you can count on one thing: <strong> The best food you've ever had. </strong></p>
    <hr>
    <?php
    foreach ($teamMembers as $member){
        echo "$member[name] &[position] &[age]";}
         ?>
</div><!--team-members-->
<?php
include ('includes/footer.php');
?>