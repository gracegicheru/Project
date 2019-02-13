<?php
include ('includes/header.php');
include ('includes/array.php');

function strip_bad_chars($input){
    $output=preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
    return $output;
}
if(isset($_GET['item'])){
    $menuItem= strip_bad_chars($_GET['item']);
    $dish=$menuItems [$menuItem];
}
function suggestedTip($price, $tip){
    $totalTip=$price * $tip;
    echo ($totalTip);
}
?>
<hr>
<div id="dish">
    <h1> <?php echo $dish['title']; ?> <span class="price"><sup>$</sup><?php echo $dish['price'];?></span></h1>
    <br>
    <p><strong>Suggested beverage: <?php echo $dish ['drink'];?></strong></p>
    <p><em>Suggested Tip:<sup>$</sup><?php suggestedTip($dish['price'], 0.10); ?></em></p>
</div><!--dish-->
<hr>
<a href="menu.php" class="button previous">&laquo; Back to Menu</a>