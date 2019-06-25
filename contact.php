<?php 
require 'head.php';
require 'header.php';
?>
<main>
    <h1 id="contact-title">Contact Us</h1>
    <div id='contact-body'>
        <p id='error-key' class="error">* required field</p>
        <?php
        $name = $email = $subject = $message = '';
        $nameErr = $emailErr = $messageErr = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['name'])) {
                $nameErr = 'Name is required';
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match('/^[a-zA-Z ]*$/',$name)) {
                    $nameErr = 'Invalid name.  Only letters and white space allowed.';
                }
            }

            if (empty($_POST['email'])) {
                $emailErr = 'E-mail is required';
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = 'Invalid E-mail';
                }
            }

            if (empty($_POST['subject'])) {
                $subject = 'No Subject';
            } else {
                $subject = test_input($_POST["subject"]);
            }

            if (empty($_POST['message'])) {
                $messageErr = 'Message is required';
            } else {
                $message = test_input($_POST["message"]);
            }

            if ($nameErr === '' && $emailErr === '' && $messageErr === '') {
                require 'vendor/autoload.php';
                $dotenv = Dotenv\Dotenv::create(__DIR__ . '/');
                $dotenv->load();
                $composed = new \SendGrid\Mail\Mail(); 
                $composed->setFrom($email, $name);
                $composed->setSubject($subject);
                $composed->addTo("Parkeralansmith@gmail.com", "Parker");
                $composed->addContent("text/plain", $message);
                $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                try {
                    $response = $sendgrid->send($composed);
                    if ($response->statusCode() > 199 && $response->statusCode() < 300){
                        $name = $email = $subject = $message = '';
                    } else {
                        echo "Error.  Message not sent.  Try again later.";
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: '. $e->getMessage() ."\n";
                }
            }
            // Writes a file with the information submitted via forms
            // $myfile = fopen('info.txt', 'w') or die('Unable to open file.');
            // fwrite($myfile, $name);
            // fwrite($myfile, $email);
            // fwrite($myfile, $subject);
            // fwrite($myfile, $message);
            // fclose($myfile);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        ?>
        <form method='post' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
            <label class='contact-label'>Name:</label>
            <span class='error'>* <?php echo $nameErr;?></span>
            <br>
            <input class='contact-input' type='text' name='name' value='<?php echo $name;?>'>
            <br>
            <label class='contact-label'>E-mail:</label>
            <span class='error'>* <?php echo $emailErr;?></span>
            <br>
            <input class='contact-input' type='text' name='email' value='<?php echo $email;?>'>
            <br>
            <label class='contact-label'>Subject:</label>
            <br>
            <input class='contact-input' type='text' name='subject'>
            <br>
            <label class='contact-label'>Message:</label>
            <span class='error'>* <?php echo $messageErr;?></span>
            <br>
            <textarea class='contact-input' rows='6' name='message'><?php echo $message;?></textarea>
            <br>
            <input type='submit' id='contact-submit' name='submit' value='Submit'>
        </form>
    </div>
</main>
<?php
require 'footer.php';
?>
