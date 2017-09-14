<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>users</title>
        <style type="text/css">
            table.users {
                width: 100%;
            }
            
            table.users thead {
                background-color: #eee;
                text-align: left;
            }
            
            table.users thead th {
                border: solid 1px #fff;
                padding: 3px;
            }
            
            table.users tbody td {
                border: solid 1px #eee;
                padding: 3px;
            }
            
            a, a:hover, a:active, a:visited {
                color: blue;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div><a href="index.php?op=new">Add new user</a></div>
        <table class="users" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><a href="?orderby=identificationCard">Cedula</a></th>

                    <th><a href="?orderby=name">Name</a></th>
                    <th><a href="?orderby=surnames">Apellido</a></th>

                    <th><a href="?orderby=phone">Phone</a></th>
                    <th><a href="?orderby=email">Email</a></th>
                    <th><a href="?orderby=address">Address</a></th>
                    <th><a href="?orderby=idRole">Role</a></th>

                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php print htmlentities($user->identificationCard); ?></td>

                    <td><a href="index.php?op=show&id=<?php print $user->id; ?>"><?php print htmlentities($user->firstname); ?></a></td>
                    <td><?php print htmlentities($user->surnames); ?></td>
                   
                    <td><?php print htmlentities($user->phone); ?></td>
                    <td><?php print htmlentities($user->email); ?></td>
                    <td><?php print htmlentities($user->address); ?></td>
                    <td><?php print htmlentities($user->idRole); ?></td>
                    
                    <td><a href="index.php?op=delete&id=<?php print $user->id; ?>">delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
