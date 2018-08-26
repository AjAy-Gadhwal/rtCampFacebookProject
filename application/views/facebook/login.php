<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       html {
            overflow: hidden;
        }

        body {
            padding: 0;
            margin: 0;
            font-family: Helvetica, Sans-serif;
            font-size: 16px;
            color: #333;
            line-height: 1.5;
            overflow: hidden;
        }
        
        .bg {
            background-image: url(".././assets/images/Blue-Bulbs.jpg");    
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: fixed;
            width: 100%;
            z-index:-1;
        }

        .bg::after {
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 100%;
            display: block;
            left: 0;
            top: 0;
            content: "";
            background: linear-gradient(135deg,rgba(63, 81, 181, 0.55) 0,#1e2ee96b 100%)
        }


        .loginDiv {
            width: 450px;
            margin: 20vh auto;
            border: 1px solid #000;
            background: #0000009e;
            /* padding: 0 20px 20px; */
            box-shadow: 3px 3px 10px 1px black;
            overflow: hidden;
        }

        .loginText {
            text-align: center;
            font-size: 2.5em;
            font-family: sans-serif;
            color: cornflowerblue;
            padding: 0.3em;
            padding-bottom: 0px;
            letter-spacing: 2px;
        }

        .inputText {
            background-color: #00000059;
            padding: 0.8em;
            border: 0px solid;
            border-bottom: 2px solid #b9642a;
            color: gray;
            outline: none;
            transition-duration: 1s;
            width: 79%;
            margin: 1em 2em;
            margin-bottom: 0.5em;
            font-size: 1em;
            letter-spacing: 1.5px;
        }

        .inputText:hover {
            border-bottom: 2px solid #3045b5;
        }

        .inputText:focus {
            border-bottom: 2px solid #27b686;
        }

        .loginBtn {
            background: linear-gradient(-90deg, #27b686, #3045b5);
            padding: 10px;
            color: white;       
            width: 79%;
            margin: 1em 2em;
            font-size: 1em;
            transition-duration: 1s;
            border: 3px solid black;    
            font-family: sans-serif;
            text-align: center;
        }

        
        .loginBtn:hover {    
            background: linear-gradient(-90deg, #3045b5, #27b686);
        }

        .loginBtn:focus  {    
            border: 2px solid #3045b5;    
        }

        .loginBtn > a {
            text-decoration: none;
            color: white;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .privacyPolicy > a {
            float: right;
            margin-right: 2em;
            margin-bottom: 1em;
            text-decoration: none;
            color: #6495ed;
            font-weight: bold;
            letter-spacing: 2px;    
        }
    </style>
</head>
<body style="overflow:hidden;"  >    
    <div class="bg">
    </div>
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
        <div class="privacyPolicy marginTop" >
            <a href="<?php echo base_url().'FacebookApi/policies'; ?>" >
                Privacy Policy
            </a>                        
        </div>
    </div>             

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

</body>
</html>