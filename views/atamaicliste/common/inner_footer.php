
   <div class="container pt-2">
                <div class="row">
                  
                    <div class="col-lg-12 mb-5 mb-lg-0">
                      <div class="text-center footer-section">
                        <a href="" class=""><img src="<?php echo base_url(); ?>assets/img/site/<?php echo getSiteLogo();?>" class="img-fluid"></a>  <br>
                         <p class="mt-3 mb-2"><?php echo getcopyrightext();?> </p>
                        
                        <a class="btn  btn-social" href="<?php echo getSociallinks()->facebooklink;?>"  target="_blank"><i class="fa fa-fw fa-facebook-square"></i></a>
                        <a class="btn  btn-social" href="<?php echo getSociallinks()->twitterlink;?>" target="_blank"><i class="fa fa-fw fa-twitter-square"></i></a>
                        <a class="btn btn-social " href="<?php echo getSociallinks()->telegram_link;?>" target="_blank"><i class="fa fa-fw fa-telegram"></i></a>
                       
                    </div>
             </div>
                  
                </div>

            </div>
    <!-- end footer section -->
    

</div>
    <script type="text/javascript">
      var base_url = "<?php echo base_url()?>";
      var juego_id="<?php echo FS::session()->userdata('con_u_id'); ?>"
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url()?>assets/front/vendor/jquery/jquery.min.js"></script>

    <script src="<?php echo base_url()?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/ddslick.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/ddslick_options.js?ver=<?php echo date("U");?>"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.growl.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/css/jquery.growl.css">

    <script type="text/javascript" src="<?php echo base_url()?>assets/socket.io.js"></script>

    <?php if($this->uri->segment(2) != "support") { ?>
    <script type="text/javascript">

    let user_address  =   "<?php echo FS::session()->userdata('address');?>";

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

    if(!empty(juego_id()))
    {
      ?>

      let countUseruplines  = "<?php echo countUseruplines();?>";

      let current_page      = "<?php echo @FS::router()->fetch_class();?>";

      <?php 
    }

    ?>

    </script>

  <?php } ?>

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

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/bignumber.min.js"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/web3.min.js?1234"></script>
    
    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/Pre_Loader.js?ver=<?php echo date('U')?>"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/FuLoaderJs.js?ver=<?php echo date('U')?>"></script>

<!--     <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/userchat.js?ver=<?php echo date('U')?>"></script>
 -->
    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/sharer.min.js"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/Chart.min.js"></script>

    <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.validate.js"></script>

    <script type="text/javascript">
      
      $('#about_partner').validate({

    rules: {
        partner_id: {
            required: true
        } 
    },
    submitHandler: function(form)
    {
        start_loader();

        let partnerData = {"partner_id" : $('#partner_id').val(),'user_address':user_address} ;

        socket.emit('partnerDetails',base_urll,partnerData);
    }

  });

      $('#levelPassCheck').validate({

      rules: {
          levelPasswrd: {
              required: true,
              remote: {
                      url: base_urll+"/levelPassCheck",
                      type: "post",
                      data: {
                              levelid: function()
                              {
                                  return "<?php echo FS::session()->userdata('con_u_id')?>";
                              }
                            }
                  },
          } 
      },
      submitHandler: function(form)
      {
          start_loader();
          
          location.reload() 
      },
      messages : {levelPasswrd:{ remote :'Invalid Password !!!'} }

  });

      

  socket.on('partnerDetails', function(data){

  if(data.user_address == user_address && data.address !='')
  {
    $('.data-add').css('display','flex');

    $('#show_partner_id').html(data.contract_id);

    $('#show_partner_level').html(data.current_level);

    $('#show_partner_address').html(data.address);

    let explorer_link   =   "https://ropsten.etherscan.io/address/"+data.address;

    $('#explorer_link').attr("href", explorer_link);
  }
  else
  {
  /*$.growl.error({ message: ("Invalid Partner Id") },{

  })*/
  }

  stop_loader();

  })

    </script>
<?php 

 if(@FS::router()->fetch_class()=='dashboard')
{
?>


<!-- DC Popup Notifications CSS -->

<script>
                    <?php     
                     $user_levels      =   unserialize($users->user_levels);

                     $curr_levels      =   array_slice($user_levels,0,$users->current_level);         
                    if(!empty($USER_L_P))
                    {   
                        $i = 0;

                        foreach($USER_L_P as $result) 
                        { 
                          $i++;
                            $level = $users->current_level + 1; 

                    ?>
            
               
                  
                            
                              <?php 

                              if(array_key_exists($result->id-1,$curr_levels))
                              {
                                
                                $future       =   strtotime($curr_levels[$result->id-1]['end_date']);

                                $timefromdb   =   strtotime(date('Y-m-d H:i:s'));

                                $timeleft     =   $future-$timefromdb;

                                $daysleft     =   round((($timeleft/24)/60)/60); 

                                if($daysleft<14)
                                {
                  

                                if($i==1)
                                {
                                  if(isset($notify1->notification))
                                  {
                                  if($notify1->notification==1)
                                  {
                                    $notify="yes";
                                  }
                                  else
                                  {
                                    $notify="no";
                                  }
                                  }
                                  else
                                  {
                                     $notify="yes";
                                  }
                                }
                                else
                                {
                                  if(isset($notify2->notification))
                                  {
                                  if($notify2->notification==1)
                                  {
                                    $notify="yes";
                                  }
                                  else
                                  {
                                    $notify="no";
                                  }
                                  }
                                  else
                                  {
                                     $notify="yes";
                                  }
                                }
                                if($notify=="yes")
                                {
                                ?>
                                $.growl.popup({ title : "Notification" ,  message: ("<?php echo "Plan ".$i;?>"+"  account is less than 14 days of yours next renewal date.kindly extend these plan to avoid plan deactivation. "+'<br/><br/><input style="cursor:pointer;" type="checkbox" class="never" id="never" name="never" value="never">Never show this message again until my Next Renewal Date is due.</input>') },{

                                });
                               <?php 
                                }
                                }
                               

                              }

                            

                     
                    }
                  }
                  ?>


$(document).on('click','.never',function(e){
    start_loader();
      
      $.ajax({
              url: base_urll+"/notification",
              type: "POST",
              data: {value: '1'}, 
              dataType: "JSON",
              success: function(resp) 
              {
                  if(resp == 1)
                  {
                     stop_loader();
                    location.href   =   base_urll+'/dashboard';
                  }
                  else
                  {
                    $('.show_text').hide();

                    stop_loader();

                      $.growl.error({ message: ("Invalid ETH Address Or ID !!!") },{

                     });
                  }
              }
          })
  });

//   console.log(earn_array[0].name);

var level_value = JSON.parse($('#level_value').val());
var color_value = JSON.parse($('#color_value').val());
var data_value = JSON.parse($('#data_value').val());


var bar_data = JSON.parse($('#bar_data').val());
var bar_label = JSON.parse($('#bar_label').val());





let is_referrer = 0;

function draw_barchart(__level_value,__data_value)
{

var ctx = document.getElementById('myChart').getContext('2d');
 

var data = {
    datasets: [{
        data: __data_value.reverse(),
        backgroundColor: color_value,
        label: 'My dataset' // for legend
    }],
    labels: __level_value.reverse()
};

var pieOptions = {
  events: false,

  maintainAspectRatio: false, // for piechart size
   legend: {
            display: true,

            position:"bottom",
            maxWidth: 200,
            padding: 100,
            lineCap: 'string',
            lineDash: 'number[]',
           labels: {
                 fontColor: 'rgb(255, 99, 132)',
                 fontFamily: "Comic Sans MS",
                 boxWidth: 60,
                 boxHeight: 100,
                 usePointStyle:false,
                     // fontStyle: 'bold',
                         fontColor: ' #FFFFFF',
                          fontSize: 15, // to show labels at bottom
            }
        },
    elements: {
        arc: {
            borderWidth: 0 // for remove outline
        }
    }, layout: {
        padding: {
            left: 20,
            right: 20,
            top: 0,
            bottom: 0
        }},
   
  animation: {
    duration: 500,
    easing: "easeOutQuart",
    onComplete: function () {
      var ctx = this.chart.ctx;
      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
      ctx.textAlign = 'center';
      ctx.textBaseline = 'bottom';

      this.data.datasets.forEach(function (dataset) {

        for (var i = 0; i < dataset.data.length; i++) {
          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
              start_angle = model.startAngle,
              end_angle = model.endAngle,
              mid_angle = start_angle + (end_angle - start_angle)/2;

          var x = mid_radius * Math.cos(mid_angle);
          var y = mid_radius * Math.sin(mid_angle);

          ctx.fillStyle = '#fff';
          if (i == 3){ // Darker text color for lighter background
            ctx.fillStyle = '#444';
          }
        }
      });               
    }
  }

};


var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: pieOptions
});


}



var ctx_bar = document.getElementById('myChartbar').getContext('2d');


var lineChart = new Chart(ctx_bar, {
    type: 'line',

    data: {
    labels:bar_label,
      datasets: [{
        label: "Referral",
        data:bar_data,
         backgroundColor: "#041D3A",
         borderColor: "#197C88"
      }]
    },
      options: {
        scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
    }
  })


</script>

<?php 
} 
?>


<script type="text/javascript">
  function copy() {
  var copyText = document.getElementById("ref_url");

  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  document.execCommand("copy");

 // alert("Copied the URL: " + copyText.value);

  $.growl.notice({ message: ("Copied the URL: " + copyText.value) });
} 

</script>

<script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.dataTables.min.js"></script>  

<script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/slick.js"></script> 
<script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/main.js"></script>   


<script>  
  
 $(document).ready(function(){  
      $('#upline_data').DataTable();  
 });  

 $(document).ready(function(){  
      $('#lostprofits_data').DataTable();  
 });  
 </script>

   <script type="text/javascript">
      $(document).ready(function()
      {
         $('.simple_accordion .card-link').click(function()
         {
          $('.simple_accordion .faq_row').removeClass("active_faq");
         $(this).parent().parent().parent().parent().addClass("active_faq")
         });
      });

      /*(function($){
      $(window).on("load",function(){
        
        $(".scroll-content").mCustomScrollbar({
          autoHideScrollbar:true,
          theme:"white",
          axis:"x"
        });
        
      });
    })(jQuery);*/

      
    </script>

    <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  

    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
      }
    </script> -->
    <script>
    $('#email_form').validate({

        rules: {
            email: {
                required: true,
                email:true,
            } 
        },
        submitHandler: function(form)
        {
        var email=$('#email').val();
         start_loader();

         $.ajax({
              url: base_urll+"/email",
              type: "POST",
              data: {value: email}, 
              dataType: "JSON",
              success: function(resp) {
                console.log(resp);
                  if(resp == 1)
                  {
                    console.log(resp);
                    stop_loader();

                    $.growl.notice({ message: ("Email updated successfully") },{

                       });
                  }
                  else
                  {
                    $('.show_text').hide();

                    stop_loader();

                      $.growl.error({ message: ("Invalid Email Address !!!") },{

                       });
                  }
              }
          })
        
        },
        messages : {email:{ required :'Email field is required'} }

        });

</script>
<!--
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

</script>-->
<script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script> 
    </body>
    </html>