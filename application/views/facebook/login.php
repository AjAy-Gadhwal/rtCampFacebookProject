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
    <div>
        <div class="center">
            <div class="center-inner">
                <div class="loginDiv">
                    <div class="loginText" >Login</div>
                    <input type="text" placeholder="Username" class="inputText marginTop" >
                    <input type="password" placeholder="Password"  class="inputText marginTop"  >
                    <div class="loginBtn marginTop" >
                        <a href="#" >
                            Login 
                        </a>                        
                    </div>
                    
                    <?php if (!$this->facebook->is_authenticated()) { ?>                        
                        <div class="loginBtn marginTop" >
                            <a href="<?php echo $this->facebook->login_url(); ?>" >
                                <i class="fa fa-facebook"></i> Login With Facebook 
                            </a>                        
                        </div>
                    <?php } ?>
                    <div class="loginBtn marginTop" >
                            <a href="<?php echo base_url().'FacebookApi/policies'; ?>" >
                                Privacy Policy
                            </a>                        
                        </div>
                </div>
            </div>
        </div>
    </div>  

    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

</body>
</html>