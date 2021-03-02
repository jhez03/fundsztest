<footer class="site-footer">
          
            <div class="site-footer__bottom">
                <div class="container">
                    <p class="site-footer__copy">&copy; Copyright 2021 by <a href="#">Fundsz.com</a></p>
                    <div class="site-footer__social">
                        <a href="#" data-target="html" class="scroll-to-target site-footer__scroll-top">
            <i class="kipso-icon-top-arrow"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo getSociallinks()->facebooklink;?>"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div><!-- /.site-footer__social -->
                    <!-- /.site-footer__copy -->
                </div><!-- /.container -->
            </div><!-- /.site-footer__bottom -->
        </footer><!-- /.site-footer -->

    </div><!-- /.page-wrapper -->


    <script src="<?php echo base_url(); ?>assets/new/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/TweenMax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/wow.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/countdown.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/vegas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- template scripts -->
    <script src="<?php echo base_url(); ?>assets/new/assets/js/theme.js"></script>

        
      

<script type="text/javascript">
var base_url= "<?php echo base_url();?>";
let current_page      = "<?php echo @FS::router()->fetch_class();?>";
</script>
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/ddslick.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/ddslick_options.js?ver=<?php echo date("U");?>"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/socket.io.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/notify.js"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.growl.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/css/jquery.growl.css">


   
    
    <script type="text/javascript">

      var lang_base_url= "<?php echo base_url(); ?>";


     <?php 
      if(@$is_referrer==1)
      {
      ?>

          let reff_id       = "<?php echo $referrer_id?>";

          let orig_reff_id       = "<?php echo $original_referrer_id?>";

          let top_referrer_id         = "<?php echo $top_referrer_id?>";

          let is_referrer   = 1;

          var accounts1     = [];

          if (typeof web3 !== "undefined") {

           

            (async function(){
              const accounts = await ethereum.request({ method: 'eth_accounts' })
              .then()
                .catch((accounts) => {
                  if (error.code === 4001) {
                    // EIP-1193 userRejectedRequest error
                    console.log('Please connect to MetaMask.');
                  } else {
                    console.error(error);
                  }
                });
              console.log("accounts",accounts);

              if (accounts.length == 0) {
                  
                    $.growl.error({ message: ("Your metamask account is locked please unlock") },{
                      position: {
                          from: "bottom",
                          align: "left"
                      }});           
                      
                      getAccount();          
                  
                  }
                  
                  else
                  {
                    accounts1     =   accounts;

                    location.href = lang_base_url+'/login/'+accounts1[0]+'/'+top_referrer_id;

                    console.log('accounts1ss accounts1ss' , accounts1[0]);
                  }

            })

          }
          else 
          {
              $.growl.error({ message: ("Metamask extension not added on your browser") });   
          }

          async function getAccount() {

          const accounts  =   await ethereum.enable();

          accounts1     =   accounts;

          location.href = lang_base_url+'/login/'+accounts1[0]+'/'+top_referrer_id;

          }
      <?php 
      }
      ?>

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

    socket.on('register_emi', function(response){
    $.notify(response.message,{ position:"bottom right",className:response.type1});
    })


  </script>
 
  <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/web3.min.js"></script>

  <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/FuLoaderJs.js?ver=<?php echo date('U')?>"></script>

  <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.waypoints.min.js" integrity="sha256-nHvT2t9u3BnTuIdqjisLCua1T0A9fph+yCsEESjP3TU=" crossorigin="anonymous"></script>

  <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.counterup.min.js" integrity="sha256-JtQPj/3xub8oapVMaIijPNoM0DHoAtgh/gwFYuN5rik=" crossorigin="anonymous"></script>


  <script type="text/javascript">
    $(document).ready(function()
    {
       $('.simple_accordion .card-link').click(function()
       {
          $('.simple_accordion .faq_row').removeClass("active_faq");
        
          $(this).parent().parent().parent().parent().addClass("active_faq")
          });
        
         

          var mousePointer = document.getElementById('alexa_animation')

          document.addEventListener('mousemove', function(e){

          var x = e.pageX / window.innerHeight;
              x = x * -10;

           var y = e.pageY / window.innerWidth;
              y = y * +10;

               var z = e.pageY / window.innerWidth;
              z = z * +20;
          
          $(mousePointer).css('-webkit-transform',"translate3d("+x+"%,"+y+"%,"+z+"px"+")");

          $(mousePointer).css('transform',"translate3d("+x+"%,"+y+"%,"+z+"px"+")");

        })
    });

    function start_counter() {
       
      $('.counter').counterUp({delay:10,time:1000});

    }

    function start_loader()
    {
      $('#cover-spin').show(0);
    }

    function stop_loader()
    {
      $('#cover-spin').hide(0);
    }

    </script>

    <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  

    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
      }
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/scripts.js"></script>
        <script type="text/javascript">
            function start_counter() {
    $('.counter').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}
$(document).ready(function()
{
start_counter();
});
        </script>
        <script type="text/javascript">
            function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('fa-plus fa-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
        </script>
  
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