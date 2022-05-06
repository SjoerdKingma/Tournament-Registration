<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up completed</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="libs/jquery-3.4.1.min.js"></script>

    <script>
        $(document).ready(function(){
            //Load nav
            $("#nav-container").load("Shared/nav.html");
        });
    </script>
</head>
<body>
    <div id="nav-container"></div>
    <section>
        <h2>Congratiolations!</h2>
        <h3>You are now signed up for the tournament.</br> Click the button below to see who else signed up.</h3>
        <div id="btn_view_participants_container">
            <a href="participants.php" id="btn_view_participants" class="button">View participants</a>
        </div>
        
    </section>
    
    
    
    <?php
        //Add participant data to json file
        require 'helpers/jsonHelper.php';
        $helper = new jsonHelper;
        $participant = new Participant(($_POST['Firstname']), ($_POST['Lastname']), ($_POST['Email']), ($_POST['DateOfBirth']));
        $helper->addparticipant($participant, "data/participants.json");
    ?>
</body>
</html>