<?php
include ('includes/header.php');
?>
<div id="contact">
    <hr>
    <h1> Get in touch with us!</h1>
    <?php
    //check for header injections
    function has_header_injection($str){
        return preg_match("/[\r\n]/", $str);
    }
    if(isset ($_POST['contact-submit'])){
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $msg=$_POST['message']; 
        //check to see if $name or $email have header injections
        if(has_header_injection($name) || has_header_injection($email)){
            die();//if true, kill the script
        }
        //validation for all required fields
        if(!$name|| !$email || !$msg){
            echo '<h4 class="error">All fields are required.</h4><a href="contacts.php" class="button block"> Go back and try again</a>';
            exit;
        }
        //Add the recipient email to a variable
        $to="gracegicheru3@gmail.com";
        //create a subject
        $subject="$name sent you a message via your contact form";
        //construct the message
        $message ="Name: $name\r\n";
        $message .="Email:$email\r\n";
        $message .="Message:\r\n";
        if(isset($_POST['subscribe']) && $_POST['subscribe']=='Subscribe'){
            $message .="\r\n\r\n Please add $email to the mailing list. \r\n";
        }
        $message= wordwrap($message, 72);
        //set the mail headers into a variable
        $headers="MIME-Version:1.0\r\n";
        $headers.="Content-type:text/plain; charset=iso-8859-1\r\n";
        $headers.="From:$name<$email>\r\n";
        $headers.="X-Priority:1\r\n";
        $headers.="X-MSMail-priority:High\r\n\r\n";
        //send the email!
        mail($to, $subject,$message, $headers);
    
    ?>
    <h5>Thanks for contacting Gracie's</h5>
    <p> Please wait for 24 hours for a response.</p>
    <p><a href="/final" class="button block">&laquo; Go to Home page</p>
        <?php} else {?>
    <form action="" method="post" id="contact-form">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name">
        
         <label for="email">Your Email</label>
        <input type="email" id="email" name="email">
        
         <label for="message">Your Message</label>
        <textarea id="message" name="message"></textarea>
        
        <input type="checkbox" id="subscribe" name="subscribe" name="subscribe">
         <label for="subscribe">Subscribe to the Newsletter</label>
        <br><br >
        <input type="submit" class="button-next" name="contact-submit" value="Send Message">
    </form>
    <?php }?>
</div><!--contact-->
<?php
include ('includes/footer.php');
?>