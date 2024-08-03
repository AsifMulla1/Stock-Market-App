<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="<?=base_url() ?>Assets/images/logo.png" sizes="32x32" type="image/png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:"Poppies",sans-serif;
        }
        body{
            display: flex;
            justify-content:center;
            align-items: center;
            min-height:100vh;
            background-image: url('<?=base_url() ?>Assets/images/ShareMarket.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .wrapper{
            width: 420px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: white;
            border-radius: 10px;
            padding:30px 40px;
        }
        .wrapper h1{
            font-size: 36px;
            text-align: center;
        }
        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding:20px 45px 20px 20px;
        }
        .input-box input::placeholder{
            color:#fff;
        }
        .input-box input:focus{
           box-shadow:0 0 0 0.1rem rgb(250, 250, 253);
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }
        .wrapper .remember-forgot{
            display: flex;
            justify-content: space-between;
            font-size:14.5px;
            margin: -15px 0 15px;
        }
        .remember-forgot label input{
            accent-color: #fff;
            margin-right: 3px;

        }
        .remember-forgot a{
            color: #fff;
            text-decoration: none;
            
        }
        .remember-forgot a:hover{
            text-decoration: underline;
        }
        .wrapper .btn{
            width: 100%;
            height: 45px;
            background-color: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;

        }
        .wrapper .register-Link{
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }
        .register-Link p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;

        }
       .register-Link p a:hover{
        text-decoration: underline;
       }

       .validationText{
        color: red;
        margin-left:12px;
        font-size: 12px;
        font-family: sans-serif;
        font-weight: 900;
       }
       

       #loadings{
            position: Absolute;
            width:100%;
            height:100vh;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
        }
    </style>
</head>
<body onload="myFunction();">
    <div id="loadings">
       <img src="<?=base_url() ?>Assets/images/Loading.gif" alt="" height="50px" width="50px">
    </div>
    <script>
        var base_path="<?php echo base_url();?>";
     </script>
    
    <div class="wrapper">
        <form role="form" id="Form" action="" method="post" >
            <h1>Login</h1>
            <p style="text-align: center;"  class="validationText" id="errorLogin"></p>
            <div class="input-box">
                <input type="text" placeholder="Username" id="username" name="username" value="<?php if(!empty($data)) echo $data[0]->username;?>"  required>
                <i class="fa-solid fa-user"></i>
                <p class="validationText" id="erroruname"></p>
            </div>
            
            <div class="input-box">
                <input type="password" placeholder="Password"  id="password" name="password" value="<?php if(!empty($data)) echo $data[0]->password;?>"  required>
                <i class="fa-solid fa-lock"></i>
                <p class="validationText" id="errorpassword"></p>
            </div>
            
            <!-- <div class="remember-forgot">
                <label for="">
                    <input type="checkbox">Remember me
                </label>
                <a href="">Forgot password?</a>
            </div> -->
            <button type="button" class="btn" id="btn_login">Login</button>
            <div class="register-Link">
                <p>Designed & Developed By <a href="">Asif Mulla</a></p>
            </div>
        </form>
    </div>
   
   
    <script  src="<?php echo base_url();?>Assets/js/jquery.min.js"></script> 
    <script src="<?php echo base_url();?>Assets/js/CreateJs/login.js"></script> 
    

    <script>

var preloaders = document.getElementById("loadings");
function myFunction(){
    setTimeout(() => { preloaders.style.display="none";}, "500");
}

</script>
</body>
</html>