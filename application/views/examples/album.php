<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="<?php echo base_url('assets/css/myStyle.css')?>" rel = "stylesheet" type = "text/css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="bg"></div>  
    <div class="header"></div>
    <div class="container">
        <div class="grid-container" style="color:white;" >           
            <?php foreach($album["data"] as $img) { ?>                
                <a href="#">           
                    <div class="grid-item" style="background-image: url('<?php print_r($img["source"]); ?>')" >                    
                        <span class="imgName" >
                            <label>
                                <input type="checkbox" > 
                                <i class="fa fa-square-o" aria-hidden="true"></i> 
                                <span class="name"> AjAy </span>
                            </label>
                        </span>
                        <span class="imgIcons" >
                            <i class="fa fa-download" aria-hidden="true" style="border-right: 1px solid;" ></i>
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </span>
                    </div>                                 
                </a>               
            <?php } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="<?php echo base_url('assets/js/myScript.js')?>" ></script>
</body>
</html>