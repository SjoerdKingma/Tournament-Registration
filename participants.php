<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>participants Overview</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="libs/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div id="nav-container"></div>
    <section>
        <h2>Participants</h2>
        <div id="scrollDownContainer">
            <div id="scrollDown" class="small_button">Scroll to bottom</div>
        </div>

        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Date of Birth</th>
            </tr>
        </table>

        <div id="scrollTopContainer">
            <div id="scrollTop" class="small_button">Scroll to top</div>
        </div>
        
    </section>
    

    <?php
        require 'helpers/jsonHelper.php';

        $helper = new jsonHelper;
        $json = $helper->readJson("data/participants.json");
    ?>

    <script>
        $(document).ready(function(){
            //Load nav
            $("#nav-container").load("Shared/nav.html");
            
                populateTable();
                addScrollingEvents();
            
            });

            function populateTable(){
                //Get data
                var json = '<?php echo $json ?>'; //Get json string from PHP variable
                var data = JSON.parse(json); //Convert json text to javascript object

                //Populate table with data object
                var htmlRows ="";
                
                try{
                    if (!data.participants.length >= 1){
                        alert("Could not get data.");
                        return;
                    }
                }
                catch(ex){
                    console.log(ex);
                    alert("Could not get data");
                }
                

                for(var i=0; i<data.participants.length; i++){
                    var participant = data.participants[i];
                    htmlRows += "<tr><td>" + participant.first_name + "</td><td>" + participant.last_name +"</td><td>" + participant.email + "</td><td>" + participant.date_of_birth +"</td></tr>" ;
                }

                $("table").append(htmlRows);
            }

            function addScrollingEvents(){
                //Scroll Down
                $("#scrollDown").click(function() {
                    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
                    return false;
                });

                //Scroll Up
                $("#scrollTop").click(function() {
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                });
            }
    </script>
</body>
</html>