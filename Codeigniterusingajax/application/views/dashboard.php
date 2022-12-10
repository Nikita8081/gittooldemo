 <!DOCTYPE html>
 <html lang="en">
 <head>
   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" ></script>
    <title>Document</title>
 </head>
 <body>
 <h1>hello <span class ="h1" ></span> </h1>
<form method="post" action="<?php echo base_url('AuthController')?>"></form>
<a href="<?php echo base_url() ?>xyz">logout </a>
 </body>
 </html>

<script>
       getName();
     function getName() {
                     $.ajax({
                            url: "<?php echo base_url() ?>dashboardget",
                            type: 'POST',
                            dataType: 'json',
                           // processData: false,
                            //contentType: false,
                           // data: new FormData($('.signupForm')[0]),
                            success: function(response) {
                               //console.log(response.status);
                                if(response.status == 200){
                                    $('.h1').html(response.name);
                                   // $('.signupForm')[0].reset();
                                    
                                   // window.location.replace("<?php echo base_url('AuthController')?>")
                                }
                                else{
                                    alert(response.massage);
                                }
                            }
                     });
              }
       
</script>