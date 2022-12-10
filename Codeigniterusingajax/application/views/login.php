
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <title>Log in</title>
</head>

<body>
    <h1>Log in</h1>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form class="loginForm" method="post" >
            <!--E-mail-->
            E-Mail :<br>
            <input type="email" id="email" name="email"><br>
            <!--PassWord-->
            PASSWORD: <br>
            <input type="password" id="password" name="password" minlength="5"><br>
            <br><button type="submit" name="submit">login</button>
        </form>
        <a href="<?php echo base_url('signup') ?>">signup </a>
        
    </body>

    </html>
    <script>
       $('.loginForm').validate({
            rules: {
                 email: {
                    required: true,
                 },  
                password: {
                    required: true,
                },
            },
            messages: {
                
                email: {
                    required: "Please Enter Email",
                   // remote: "  Already Exist so Please again enter Email",

                },
                password: {
                    required: "Please Enter PassWord",
                },
            },
    
        submitHandler: function(form) {
                     $.ajax({
                            url: "<?php echo base_url()?>userLogin",
                            type: 'POST',
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            data: new FormData($('.loginForm')[0]),
                            success: function(response) {
                                if(response.status == 200){
                                    $('#submit').html('login');
                                    $('.loginForm')[0].reset();
                                    
                                   window.location.replace("<?php echo base_url()?>")
                                }
                                else{
                                    alert(response.message);
                                }
                            }
                     });
              }
       });


        
    </script>
