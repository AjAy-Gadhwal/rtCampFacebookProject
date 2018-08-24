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
    <div class="bg" style="height:100vh;" ></div>  
    <div class="slider">
        <?php foreach($album["data"] as $img) { ?>                                    
            <div class="slide hide" >
                <img src="<?php print_r($img['source']); ?>" alt="">
            </div>
        <?php } ?>
            
        <div class="silderFooter">
            <div class="silderFooterBtn">
                <center>                    
                    <button class="slideBtn prev" onclick="prevSlide()" >
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button class="slideBtn play" onclick="playSlide(event)" >
                        <i class="fa fa-play" ></i>
                        <!-- <i class="fa fa-pause" aria-hidden="true"></i> -->
                    </button>
                    <button class="slideBtn next" onclick="nextSlide()" >
                        <i class="fa fa-angle-right"></i>
                    </button> 
                </center>
            </div>
        </div>
    </div>   

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="<?php echo base_url('assets/js/myScript.js')?>" ></script>
    <script>
        window.onload = function() {
            // playSlide();
        };
    </script>
</body>
</html>