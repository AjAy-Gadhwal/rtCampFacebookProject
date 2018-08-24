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
    <form id="albums" action="/facebookApi/googleDrive" method="post">
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
                        <a href="javascript:;" title="Download Selected Albums" class="downloadSelectedAlbum" >
                            <i class="fa fa-download" ></i> SELECTED                                
                        </a>                 
                    </li>
                    <li>   
                        <a href="javascript:;" title="Backup Selected Albums"  onclick="$('#albums').submit();" >
                            <i class="fa fa-google" > </i> SELECTED                           
                        </a>                 
                    </li>
                    <li>   
                        <a href="javascript:;" title="Download All Albums" class="downloadAllAlbum" >
                            <i class="fa fa-download" ></i> ALL ALBUMS                                
                        </a>                 
                    </li>
                    <li>   
                        <a href="javascript:;" title="Backup All Albums" class="driveAllAlbum"  >
                            <i class="fa fa-google"> </i> ALL ALBUMS                               
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
                ALBUMS
            </div>
            <div class="gridContainer">
                <?php foreach($albums["albums"]["data"] as $album) { ?> 
                    <?php if($album["count"] != 0) { ?>  
                        <div class="gridItem">
                            <div class="image" style="background-image: url('<?php print_r($album["picture"]["data"]["url"]); ?>')" >                                       
                            </div>  
                            <div class="imageData">   
                                <div class="imageName">                                       
                                    <label>
                                        <input type="checkbox" name="selectedAlbums[]" value="<?php echo $album['id'].'~/~'.$album['name']; ?>" > 
                                        <i class="fa fa-square-o" aria-hidden="true"></i> 
                                        <span class="name"> <?php print_r($album["name"].' ('.$album["count"].')'); ?> </span>
                                    </label>
                                </div>
                                <div class="imageIcon">                                       
                                    <i class="fa fa-download downloadAlbum" aria-hidden="true" style="border-right: 1px solid;" data-url="<?php echo 'albumId='.$album['id'].'&albumName='.$album["name"]; ?>" ></i>
                                    <a href="<?php echo base_url('FacebookApi/googleDrive?albumId='.$album['id'].'&albumName='.$album['name'])?>">           
                                        <i class="fa fa-google" aria-hidden="true" style="border-right: 1px solid;"  ></i>
                                    </a>
                                    <a href="<?php echo base_url('FacebookApi/albumPlay?albumId='.$album['id'])?>">           
                                        <i class="fa fa-play" aria-hidden="true" style="border-right: 1px solid;" ></i>                                    
                                    </a>
                                    <a href="<?php echo base_url('FacebookApi/album?albumId='.$album['id'].'&albumName='.$album['name'])?>">           
                                        <i class="fa fa-file-image-o " aria-hidden="true" ></i>                                    
                                    </a>                                                 
                                </div>
                            </div>                    
                        </div>                  
                    <?php } ?>
                <?php } ?> 
            </div>
        </div>
    </form>

    <div class="modelDiv">
        <div class="model">
            <div class="modelHeader">
                <div class="modelTitle">
                    Album Ziping
                </div>
                <!-- <span class="modelClose">&times;</span> -->
            </div>
            <div class="modelBody">
                <img class="zipingImg" src="<?php echo base_url('assets/images/ziping.gif'); ?>" alt="">
                <img class="zipingImgUpload" src="<?php echo base_url('assets/images/zipUpload.gif'); ?>" alt="">
            </div>
            <!-- <div class="modelFooter">
                <a href="" class="modelBtn downloadZip" disabled >Download</a>
                <button class="modelBtn" disabled >Close</button>
            </div> -->
        </div>
    </div>

    <div id="googleAuth" >
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