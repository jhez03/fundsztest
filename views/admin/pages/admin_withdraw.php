<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Form actions layout section start -->
<section id="form-action-layouts">
  <div class="row">
    <div class="col-sm-6">
      <div class="content-header">Manage Contract Admin Details</div>
    </div>
     <div class="col-sm-6">
      <?php 
      if(!empty(FS::session()->flashdata('success')))
      {
      ?>
      <div class="alert alert-success"> <?php echo FS::session()->flashdata('success')?> </div>
      <?php 
      }
      else if(!empty(FS::session()->flashdata('error')))
      {
      ?>
      <div class="alert alert-danger"> <?php echo FS::session()->flashdata('error')?> </div>
      <?php 
      }
      ?>
    </div>
  </div>
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="from-actions-bottom-right"><!-- User Profile --></h4>
          
        </div>
        <div class="card-body">
          <div class="px-3">

            <form class="form" id="admin_withdraw" method="post"   >

              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i> ETH Price update</h4>
               
               <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">ETH Price (1 USD)</label>
                    <input type="text" id="balance" class="form-control border-primary" placeholder="" name="balance" value="<?php echo $balance;?>" disabled="disabled">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">Change Price</label>
                    <input type="text" id="amount" class="form-control border-primary" placeholder="Amount" name="amount" value="" disabled="disabled">
                  </div>
                  
                </div>



              </div>

              <div class="form-actions ">
                <button type="submit" class="btn btn-raised btn-primary" id="submit_btn" disabled="disabled">
                  <i class="fa fa-check-square-o"></i> <i class="fa fa-spinner fa-spin"></i> Submit
                </button>
              </div>

            </form>

            <form class="form" id="change_wallet1" method="post"   >

              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i> Change Admin Wallet Address</h4>
               <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">Existing Admin Wallet</label>
                    <input type="text" id="admin_wallet1" class="form-control border-primary" placeholder="" name="admin_wallet1" value="" disabled="disabled">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">Change Admin Wallet</label>
                    <input type="text" id="new_admin_wallet1" required class="form-control border-primary" placeholder="Wallet Address" name="new_admin_wallet1" value="" disabled="disabled">
                  </div>
                </div>
              </div>
        
              <div class="form-actions">
                <button type="button" class="btn btn-raised btn-primary" id="submit_btn1" disabled="disabled">
                  <i class="fa fa-check-square-o"></i> <i class="fa fa-spinner fa-spin"></i> Submit
                </button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
 
</section>
<!-- // Form actions layout section end -->

          </div>
        </div>

<script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/web3.min.js"></script> -->


  <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/web3.min.js"></script>



<script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/notifIt.min.js"></script>
<script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/css/notifIt.css">


<script type="text/javascript">
var admin_redirect = "<?php echo base_url().'sitesettings';?>";  
const m_contract_abi = [{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"_user","type":"address"},{"indexed":false,"internalType":"uint256","name":"_value","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"_time","type":"uint256"}],"name":"BreakageEvent","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"_user","type":"address"},{"indexed":false,"internalType":"uint256","name":"_value","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"_vipID","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"_time","type":"uint256"}],"name":"BuyMembershipEvent","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"_user","type":"address"},{"indexed":false,"internalType":"address","name":"_upline9","type":"address"},{"indexed":false,"internalType":"address","name":"_upline10","type":"address"},{"indexed":false,"internalType":"address","name":"_upline11","type":"address"},{"indexed":false,"internalType":"address","name":"_upline12","type":"address"},{"indexed":false,"internalType":"uint256","name":"_uplineAmount9To12","type":"uint256"}],"name":"InfinityHouseBonus","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"_user","type":"address"},{"indexed":false,"internalType":"address","name":"_sponser","type":"address"},{"indexed":false,"internalType":"address[]","name":"receiver","type":"address[]"},{"indexed":false,"internalType":"uint256","name":"_value","type":"uint256"}],"name":"MatchingCarBonus","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"_user","type":"address"},{"indexed":false,"internalType":"address","name":"_level1","type":"address"},{"indexed":false,"internalType":"address","name":"_level2","type":"address"},{"indexed":false,"internalType":"address","name":"_level3","type":"address"},{"indexed":false,"internalType":"address","name":"_level4","type":"address"},{"indexed":false,"internalType":"address","name":"_level5","type":"address"},{"indexed":false,"internalType":"address","name":"_level6","type":"address"},{"indexed":false,"internalType":"address","name":"_level7","type":"address"},{"indexed":false,"internalType":"address","name":"_level8","type":"address"},{"indexed":false,"internalType":"uint256","name":"_levelValue","type":"uint256"}],"name":"MatrixCommission","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"_user","type":"address"},{"indexed":false,"internalType":"address","name":"_sponser","type":"address"},{"indexed":false,"internalType":"uint256","name":"_value","type":"uint256"}],"name":"RefBonus","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"_user","type":"address"},{"indexed":true,"internalType":"address","name":"_referrer","type":"address"},{"indexed":false,"internalType":"uint256","name":"_value","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"_vipID","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"_time","type":"uint256"}],"name":"regMemberEvent","type":"event"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"constant":true,"inputs":[],"name":"GRACE_PERIOD","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"MEMBERSHIP_PRICE","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"PERIOD_LENGTH","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"","type":"address"},{"internalType":"uint256","name":"","type":"uint256"}],"name":"_teamNetworkEarnWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"admin","outputs":[{"internalType":"address payable","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"blockTime","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"bool","name":"_lockStatus","type":"bool"}],"name":"contractLock","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"currUserID","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"_usdValue","type":"uint256"},{"internalType":"uint256","name":"_days","type":"uint256"}],"name":"donate","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":true,"stateMutability":"payable","type":"function"},{"constant":false,"inputs":[{"internalType":"address payable","name":"_toUser","type":"address"},{"internalType":"uint256","name":"_amount","type":"uint256"}],"name":"failSafe","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"isContract","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"lockStatus","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"_placementSponser","type":"uint256"},{"internalType":"uint256","name":"_referrerID","type":"uint256"},{"internalType":"uint256","name":"_orginalRefID","type":"uint256"},{"internalType":"uint256","name":"_usdValue","type":"uint256"}],"name":"subscription","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":true,"stateMutability":"payable","type":"function"},{"constant":false,"inputs":[{"internalType":"address payable","name":"_newAdminWallet","type":"address"}],"name":"updateAdminWallet","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"_newBlockTime","type":"uint256"}],"name":"updateBlockTime","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"_gracePeriod","type":"uint256"}],"name":"updateGracePeriod","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"_MatchingBonusUplineLimit","type":"uint256"}],"name":"updateMatchingBonusUplineLimit","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"_usdPrice","type":"uint256"}],"name":"updateUSDPrice","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"usdPrice","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"userList","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"","type":"address"}],"name":"users","outputs":[{"internalType":"bool","name":"isExist","type":"bool"},{"internalType":"uint256","name":"id","type":"uint256"},{"internalType":"uint256","name":"referrerID","type":"uint256"},{"internalType":"uint256","name":"orginalRefID","type":"uint256"},{"internalType":"uint256","name":"placementSponser","type":"uint256"},{"internalType":"uint256","name":"donated","type":"uint256"},{"internalType":"uint256","name":"totalEarnedETH","type":"uint256"},{"internalType":"uint256","name":"teamNetworkEarnETH","type":"uint256"},{"internalType":"bool","name":"blocked","type":"bool"},{"internalType":"uint256","name":"membershipExpired","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"_user","type":"address"}],"name":"viewMembershipExpired","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"_user","type":"address"}],"name":"viewUserDirectReferral","outputs":[{"internalType":"address[]","name":"","type":"address[]"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"_user","type":"address"}],"name":"viewUserReferral","outputs":[{"internalType":"address[]","name":"","type":"address[]"}],"payable":false,"stateMutability":"view","type":"function"}];

const m_contract_address = '0xbfce11ee2e69006090803e170035e75e21295ed5';

const admin_address = '0x1204BdAc6e2C38cD08Cbf9F7C1BDda5C69E82073';


function msg(type,txt){
  if(type == 'Success'){
   notif({ msg: '<i class="fa fa-check-circle" aria-hidden="true"></i>'+" "+txt, type: "success" });
  }else{
     notif({ msg: '<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'+" "+txt, type: "error" });
  }

}


// custom code for lesser than
jQuery.validator.addMethod('lesserThan', function(value, element, param) {
return ( parseFloat(value) <= parseFloat($('#balance').val()) );
}, 'Must be less than Balance' );

jQuery.validator.addMethod('greaterZero', function(value, element, param) {
return ( parseFloat(value) > 0 );
}, 'Must be greater than Zero' );

$('#admin_withdraw').validate({
  rules: {
    amount: {
      required: true,
      number: true,
     
    },
    
  },
    highlight: function (element) {
//$(element).parent().addClass('error')
},
unhighlight: function (element) {
  $(element).parent().removeClass('error')
},
 submitHandler: function(e, t) {
    t.preventDefault();
    var amount = $('#amount').val();
      sendAmount();
  }

});


    


    if (typeof web3 !== "undefined") {


    (async function() {
        const accounts = await ethereum.request({
                method: 'eth_accounts'
            })
            .then()
            .catch((accounts) => {
                if (error.code === 4001) {
                    // EIP-1193 userRejectedRequest error
                    console.log('Please connect to MetaMask.');
                } else {
                    console.error(error);
                }
            });
        console.log("accounts", accounts);
        if (accounts.length == 0) {

        } else {
           

 

        }


        window.web3 = new Web3(web3.currentProvider);

        var McontractInfo = (m_contract_abi);

        m_contract = new web3.eth.Contract(McontractInfo, m_contract_address);

      m_contract.methods.usdPrice().call().then(function(usdPrice){ 
   
                usdPrice = usdPrice;

                console.log(usdPrice);
                var res = (parseFloat(usdPrice) / 1000000000000000000);
                $('#balance').val(res);
      });
              
              
            web3.eth.getAccounts(function(err, accounts){
              console.log(err);
              console.log(accounts);
              if (err != null) {
                  console.log(err)
              }
              else if (accounts.length == 0) {
                   msg('Error','Please Unlock Admin Account');
                   window.setTimeout(function () {
                    location.href = admin_redirect;
                  }, 2000);
              }
              else
              {
                accounts1     =   accounts;
                //console.log('accounts1ss accounts1ss' , accounts1[0]);
                
               
                m_contract.methods.admin().call().then(function(admin_address){ 

                  if(accounts1[0].toLowerCase() == admin_address.toLowerCase()){
                    $('#amount').attr("disabled", false);
                    $('#submit_btn').attr("disabled", false);
                    $('#submit_btn').html('<i class="fa fa-check-square-o"></i> Submit');

                    m_contract.methods.admin().call().then(function(Wallet1){
                      $('#admin_wallet1').val(Wallet1);
                      $('#new_admin_wallet1, #submit_btn1').attr("disabled", false);
                      $('#submit_btn1').html('<i class="fa fa-check-square-o"></i> Submit');
                    })

                    

                  }else{
                    msg('Error','Only Admin can update');
                     window.setTimeout(function () {
                      location.href = admin_redirect;
                    }, 2000);
                  }
                  
                })
              }

            })
             })();
          }
          else 
          {
            msg('Error','Metamask extension not added on your browser');
             window.setTimeout(function () {
              location.href = admin_redirect;
            }, 2000);
          }

$('#submit_btn1').click(function(){
  m_contract.methods.admin().call().then(function(admin_address){ 
      if(accounts1[0].toLowerCase() == admin_address.toLowerCase()){
        $('#new_admin_wallet1, #submit_btn1, #submit_btn, #submit_btn2').attr("disabled", false);
        $('#submit_btn1').html('<i class="fa fa-check-square-o"></i> <i class="fa fa-spinner fa-spin"></i> Submit');
        var new_addr = $('#new_admin_wallet1').val();
          /*m_contract.methods.changeAdminWallet1(new_addr).send({from:accounts1[0],gasPrice: "10000000000",gas:"212000"}).then(function(reguserresult){ 
            msg('Success','Wallet Address Successfully changed');
            window.setTimeout(function () {
              location.href = admin_redirect;
            }, 1000);
          })*/
          var datas = m_contract.methods.updateAdminWallet(new_addr).encodeABI();
            var tx = {
                from: accounts1[0], 
                gasPrice: "10000000000",//10
                gas: "212000",
                to: m_contract_address,
                data: datas
            }
          web3.eth.sendTransaction(tx,function(error,txid) {
            msg('Success','Wallet Address Successfully changed');
            window.setTimeout(function () {
              location.href = admin_redirect;
            }, 1000);
          })
      }else{
            msg('Error','Only Admin can update');
             window.setTimeout(function () {
              location.href = admin_redirect;
            }, 2000);
        }
    })
})


function sendAmount(){

  var amount = $('#amount').val();
  $('#submit_btn, #submit_btn1, #submit_btn2').attr("disabled", "disabled");
  $('#submit_btn').html('<i class="fa fa-check-square-o"></i> <i class="fa fa-spinner fa-spin"></i> Submit');
  $('#amount').attr("disabled", "disabled");
  var amount_wei = (parseFloat(amount) * 1000000000000000000);
  //alert(amount_wei.toString()+'==='+accounts1[0]);
   m_contract.methods.admin().call().then(function(admin_address){ 
      if(accounts1[0].toLowerCase() == admin_address.toLowerCase()){
        //$('#amount').attr("disabled", false);
        //$('#submit_btn').attr("disabled", false);
          //msg('Error','Please be patient!');        
          /*m_contract.methods.adminWithdraw(amount_wei.toString()).send({from:accounts1[0],gasPrice: "10000000000",gas:"212000"}).then(function(reguserresult){ 
            msg('Success','Withdraw Successfully done');
            window.setTimeout(function () {
              location.href = admin_redirect;
            }, 1000);
          })*/
          var datas = m_contract.methods.updateUSDPrice(amount_wei.toString()).encodeABI();
            var tx = {
                from: accounts1[0], 
                gasPrice: "10000000000",//10
                gas: "212000",
                to: m_contract_address,
                data: datas
            }
          web3.eth.sendTransaction(tx,function(error,txid) {
            console.log(error);
            console.log(txid);
            if(txid && txid != "") { alert(txid);
              console.log(txid);
              var txids = txid.toString();

            }
          })
      }else{
             msg('Error','Only Admin can update');
             window.setTimeout(function () {
              location.href = admin_redirect;
            }, 2000);
        }

    })

}


</script>