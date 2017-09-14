<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
        <?php print htmlentities($title) ?>
        </title>
    </head>
    <body>
        <?php
        if ( $errors ) {
            print '<ul class="errors">';
            foreach ( $errors as $field => $error ) {
                print '<li>'.htmlentities($error).'</li>';
            }
            print '</ul>';
        }
        ?>
        <form method="POST" action="">

   <label for="name">Cedula:</label><br/>
            <input type="text" name="identificationCard" value="<?php print htmlentities($identificationCard) ?>"/>
            <br/>

            <label for="firstname">Name:</label><br/>
            <input type="text" name="firstname" value="<?php print htmlentities($firstname) ?>"/>
            <br/>
             <label for="surnames">Apellidos:</label><br/>
            <input type="text" name="surnames" value="<?php print htmlentities($surnames) ?>"/>
            <br/>

            <label for="phone">Phone:</label><br/>
            <input type="text" name="phone" value="<?php print htmlentities($phone) ?>"/>
            <br/>
            <label for="email">Email:</label><br/>
            <input type="text" name="email" value="<?php print htmlentities($email) ?>" />
            <br/>
            <label for="address">Address:</label><br/>
            <textarea name="address"><?php print htmlentities($address) ?></textarea>
            <br/>
            <label for="idRole">Role:</label><br/>
            <input type="text" name="idRole" value="<?php print htmlentities($idRole) ?>" />
            <br/>

            <input type="hidden" name="form-submitted" value="1" />
            <input type="submit" value="Submit" />
        </form>
        
    </body>
</html>
