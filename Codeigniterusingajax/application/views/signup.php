<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" ></script>
    <title>Sign Up</title>
</head>

<body>
    <h1>Sign Up</h1>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form class="signupForm" >
            Name:<br>
            <input type="text" id="name" name="name"></input>
            <input type="hidden" name="userid" id="userid"> 
            <br>
            <!--E-mail-->
            E-Mail :<br>
            <input type="email" id=email name="email"><br>
            <!--PassWord-->
            PassWord: <br>
            <input type="password" id="password" name="password" minlength="5"><br>
            <button type="submit" >Signup</button>

        </form>
        <a href="<?php echo base_url() ?>">Login </a>
    </body>

    </html>
   <script>
     $('.signupForm').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    remote: {
                        url: '<?php echo base_url() ?>validateEmail',
                        type: 'POST',
                        data: {
                            'email': function() {
                                return $('#email').val();
                            }
                            
                        },
                    },
                },
                password: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please Enter Name ",
                },
                
                email: {
                    required: "Please Enter Email",
                    remote: "  Already Exist so Please again enter Email",

                },
                password: {
                    required: "Please Enter PassWord",
                },
            },
    
        submitHandler: function(form) {
                     $.ajax({
                            url: "<?php echo base_url() ?>userSignup",
                            type: 'POST',
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            data: new FormData($('.signupForm')[0]),
                            success: function(response) {
                               //console.log(response.status);
                                if(response.status == 200){
                                    $('#submit').html('Signup');
                                    $('.signupForm')[0].reset();
                                    
                                    window.location.replace("<?php echo base_url('AuthController')?>")
                                }
                                else{
                                    alert(response.massage);
                                }
                            }
                     });
              }
       });


   </script>