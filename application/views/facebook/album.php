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
        <div class="profile">
            <div class="profileImage">
                <img src="<?php echo $_SESSION["picture"] ?>" alt="">
            </div>
            <div class="profileName">
                <?php echo $_SESSION["name"] ?>
            </div>
        </div>

        <div class="menu">
            <div class="mobileMenu">
                <i class="fa fa-bars fa-times"></i>
            </div>
            <ul>                
                <li>   
                    <a href="./albums" title="Albums">
                        <i class="fa fa-file-image-o" aria-hidden="true"> ALBUMS </i>                                 
                    </a>                 
                </li>
                <li>
                    <a href="<?php echo base_url('FacebookApi/logout') ?>" title="Logout">
                        <i class="fa fa-power-off"></i>
                    </a>    
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="containerHeader">
            <?php echo $_GET['albumName']; ?> ALBUM
        </div>
        <div class="gridContainer">
            <?php foreach($album["data"] as $img) { ?>                
                <div class="gridItem">
                    <div class="image" style="background-image: url('<?php print_r($img["source"]); ?>'); border-radius: 0.5rem;" >                                       
                    </div>                               
                </div>
            <?php } ?> 
        </div>
    </div>

    <!-- <div class="imageModal">
        <center>
            <img src="" alt="">
        </center>
    </div> -->
    <div id="googleAuth" class="profileImageLeft" >
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script>
        var baseUrl = "<?= base_url('FacebookApi') ?>";       
    </script>
    <script src="<?php echo base_url('assets/js/myScript.js') ?>" ></script>    
</body>
</html>
