<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="<?php echo base_url('assets/css/myStyle.css') ?>" rel = "stylesheet" type = "text/css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="bg"></div>  
    <div class="header">        
        <div class="menu">
            <ul>        
                <li>
                    <a href="<?php echo base_url('FacebookApi/') ?>" title="Login">
                        <i class="fa fa-sign-in"> LOGIN </i>
                    </a>    
                </li>
            </ul>
        </div>
    </div>
    <div class="container" style="top: 25vh;" >
        <div class="containerHeader">
            Google Data Using Policy.
        </div>
        <div class="gridContainer">            
            <ul style="font-size:15px;">
                <li><u><b><h2>Google Data Using Policy.</h2></b></u>
                    <ol>
                        <li> Application will take google username, email and profile details for identifying with facebook login user.
                        <li> Application will use login user google drive for backup facebook albums to google drive.
                        <li> Application will make new folder or file to your google drive with unique name to store facebook albums to google drive.
                        <li> Application will delete folder or file if folder or file already exist in google drive.
                    </ol>
                </li>
                <br>

                <li><u><b><h2>Facebook Data Using Policy.</h2></b></u>
                    <ol>
                        <li> Application will take facebook name, email and profile details for making unique name folder, file or zip to download albums
                        <li> Application will use user facebook albums to display user albums photos to user and give option user to download albums and backup to google drive by google login and ask user to google allow google data access like (profile, drive data).
                    </ol>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>


