 <?php global $myVAR; ?>

    <script>
    var myVAR_language=<?php echo json_encode($myVAR); ?>;
    function getvalidationmsg(textmsg)
    {
    if(textmsg)
    {
    if(myVAR_language[textmsg])
    {
    textmsg = textmsg.replace('.', '');
    return myVAR_language[textmsg];
    }
    else
    {
    return textmsg;
    }
    }
    else
    {
    return '';
    }
    }
    </script>

<!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   
    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.min.js"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.growl.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/css/jquery.growl.css">

    <script type="text/javascript" src="<?php echo base_url()?>assets/socket.io.js"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/ddslick.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/ddslick_options.js?ver=<?php echo date("U");?>"></script>


    <?php 
        if(@$is_referrer==1)
        {
    ?>
    
    <?php 
        }
        else
        {
        if($title!="Login")
        {
            ?>
                
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">    </script>
                                
                            
            <?php
        }
        }
    ?>
    
    <script type="text/javascript">

    var host                    =   window.location.hostname;

    var hosts                   =   window.location.origin;

    var res                     =   hosts.substring(0, 5);

    if(host=='localhost'  || host=='127.0.0.1')
    {
        var socket              =   io.connect( 'http://'+window.location.hostname+':2053',{transports:['websocket'], upgrade: false}, {'force new connection': true} );
    }
    else if(host=='fundsz.com' && res=='http:')
    {
        var socket              =   io.connect( 'http://'+window.location.hostname+':2053',{transports:['websocket'], upgrade: false}, {'force new connection': true} );
    }
    else if(host=='fundsz.com' && res=='https')
    {
        var socket              =   io.connect( 'https://'+window.location.hostname+':2053',{transports:['websocket'], upgrade: false}, {'force new connection': true} );
    }
    
    function start_loader()
    {
      $('#cover-spin').show(0);
    }

    function stop_loader()
    {
      $('#cover-spin').hide(0);
    }

    <?php 
        if(@$is_referrer==1)
        {
    ?>
        let log_reff_id                  = "<?php echo $referrer_id?>";

        let log_original_reff_id         = "<?php echo $original_referrer_id?>";

        let top_referrer_id              = "<?php echo $top_referrer_id?>";



        let is_referrer         = 1;
    <?php 
        }
        else
        {

         if($title!="Login")
        {
         
    ?>
        
        let is_referrer   = 0;

                       $('#myModal').modal({
                                                backdrop: 'static',
                                                keyboard: true, 
                                                show: true
                        }); 

                         $('#close_modal').click(function(){
                        location.href="<?php echo base_url();?>en/";
                        });
    
                        
                    
    <?php
        }
        }
    ?>

    

    </script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/bignumber.min.js"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/web3.min.js?12345"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/Pre_Loader.js?ver=<?php echo date('U')?>"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/FuLoaderJs.js?ver=<?php echo date('U')?>"></script>

    <script type="text/javascript">
        
        $('#manual_login').validate({

    rules: {
        manual_value: {
            required: true
        },
        captcha: {
            required: true,
            remote: {
                      url: base_urll+"/captchaCheck",
                      type: "post",
                      data: {
                              captcha: function()
                              {
                                  return $("#captcha").val(); 
                              }
                            }
                  },
        } 
    },
    submitHandler: function(form)
    {
        /*if(grecaptcha.getResponse() == "") {

            $("#recaptcha_error").html('This field is required');
            
            $("#recaptcha_error").show();
        }
        else 
        {*/
            start_loader();

            var data = $('#manual_value').val();
            //console.log(data);
             $.ajax({
                url: base_urll+'/login_manual',
                type: "POST",             
                data:"value="+data+'&captcha='+$('#captcha').val(),
                cache: false,             
                processData: false,      
                dataType: "JSON",      
                success: function(data) {
                     console.log('data data' , data);
                     console.log('data data' , data.message);
                     console.log('data status' , data.status);
                     console.log('data status' , data.value);

                    if(data.status == 2)
                    {   
                        stop_loader();

                        //grecaptcha.reset();

                        $.growl.error({ message: ("Invalid Input !!!") },{

                        })
                    }
                    else if(data.status == 1)
                    {
                        localStorage.setItem('userAdd' , data.value);
                        
                        socket.emit('check_level',base_urll,data.value,data.level);
                        setTimeout(function(){ 
                        stop_loader();
                        location.href   =   base_urll+'/earnMoney';
                        }, 3000);

                    }
                    else
                    {
                        findUsers(data.id,data.value);

                        /*$.growl.error({ message: ("Invalid KBC Address Or ID !!!") },{

                        });*/
                    }
                },
                error: function (error) {
                    console.log('Login error',error);
                }
            });
        /*}*/

    },
    messages : {captcha:{ remote :'Invalid captcha or captcha expired !!!'} }

    });

    </script>

    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

    <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  

    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
      }
    </script> -->
<script type="text/javascript">
  $(document).ready(function(){
     $(document).bind("contextmenu",function(e){
        return false;
    });
});
 
 $(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});

// For  F12
$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});


/*document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};*/

/*For ctrl+u*/
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 85)) {
            return false;
        } else {
            return true;
        }
};

$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});

</script>
        
    </body>
    </html>