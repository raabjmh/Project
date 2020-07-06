<script>
  function changeCurrency(str) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            setTimeout(
                  function()
                  {
                     location.reload();
                  }, 0001);

        };
        xmlhttp.open("GET","changecurrency.php?currency="+str,true);
        xmlhttp.send();

}
</script>
 <?php

               function printValue($price){
                   $localprice=$price*$_SESSION['local_currency']/$_SESSION['currency']['rates']['USD'];
                   $localprice=number_format((float)$localprice, 2, '.', '');
                   return $localprice." ". $_SESSION['currency_name'];

              }
              function changeCurrency($currency){
                $_SESSION['local_currency']= $_SESSION['currency']['rates'][$value];
                $_SESSION['currency_name']=$value;

              }
              $endpoint = 'latest';
              $access_key = 'a9dd80413e547de3b17303c5332c6b42';

              // Initialize CURL:
              $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

              // Store the data:
              $json = curl_exec($ch);
              curl_close($ch);

              // Decode JSON response:
              $exchangeRates = json_decode($json, true);
              if(!isset($_SESSION['local_currency'])){

                $_SESSION['local_currency']=$exchangeRates['rates']['USD'];
                $_SESSION['currency_name']='USD';
                $_SESSION['currency']=$exchangeRates;
             }


               if(isset($_GET["currency"])){

                 $value=$_GET["currency"];
                   $_SESSION['local_currency']= $_SESSION['currency']['rates'][$value];
                   $_SESSION['currency_name']=$value;
               }
             //  echo changeCurrency($from,$to);

?>
<div class="header">
<div class="row">
 <div class="col-sm-3">
 <a href="customer-main.php">
 <img id ="logo"
     src="img/gym.png"
     width="220"
     height="120"
     alt="GymsGuider Logo"
/></a>
</div>
<div class="col-sm-3 d-flex align-items-right">
</div>
 <div class="col-sm-3 d-flex align-items-center">

 <div class="btn-group">
      <button type="button" class="btn btn-outline-secondary">

          <img src="img/ChangeCurrency.jpg"
               width="15"
               height="15"
               alt ="change currency"/>
         <?php echo $_SESSION['currency_name'];?></button>
      <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>

      <select class="dropdown-menu" multiple size="25" name="currency" style="width:270px" onchange="changeCurrency(this.value)">
        <option class="dropdown-item" value="USD" >United States Dollars</option>
        <option class="dropdown-item" value="EUR">Euro</option>
        <option class="dropdown-item" value="GBP">United Kingdom Pounds</option>
        <option class="dropdown-item" value="DZD">Algeria Dinars</option>
        <option class="dropdown-item" value="AUD">Australia Dollars</option>
        <option class="dropdown-item" value="BSD">Bahamas Dollars</option>
        <option class="dropdown-item" value="BBD">Barbados Dollars</option>
        <option class="dropdown-item" value="BMD">Bermuda Dollars</option>
        <option class="dropdown-item" value="CAD">Canada Dollars</option>
        <option class="dropdown-item" value="CLP">Chile Pesos</option>
        <option class="dropdown-item" value="CNY">China Yuan Renmimbi</option>
        <option class="dropdown-item" value="DKK">Denmark Kroner</option>
        <option class="dropdown-item" value="XCD">Eastern Caribbean Dollars</option>
        <option class="dropdown-item" value="EGP">Egypt Pounds</option>
        <option class="dropdown-item" value="FJD">Fiji Dollars</option>
        <option class="dropdown-item" value="XAU">Gold Ounces</option>
        <option class="dropdown-item" value="HKD">Hong Kong Dollars</option>
        <option class="dropdown-item" value="HUF">Hungary Forint</option>
        <option class="dropdown-item" value="ISK">Iceland Krona</option>
        <option class="dropdown-item" value="INR">India Rupees</option>
        <option class="dropdown-item" value="IDR">Indonesia Rupiah</option>
        <option class="dropdown-item" value="ILS">Israel New Shekels</option>
        <option class="dropdown-item" value="JMD">Jamaica Dollars</option>
        <option class="dropdown-item" value="JPY">Japan Yen</option>
        <option class="dropdown-item" value="JOD">Jordan Dinar</option>
        <option class="dropdown-item" value="KRW">Korea (South) Won</option>
        <option class="dropdown-item" value="LBP">Lebanon Pounds</option>
        <option class="dropdown-item" value="MYR">Malaysia Ringgit</option>
        <option class="dropdown-item" value="NZD">New Zealand Dollars</option>
        <option class="dropdown-item" value="NOK">Norway Kroner</option>
        <option class="dropdown-item" value="PKR">Pakistan Rupees</option>
        <option class="dropdown-item" value="PHP">Philippines Pesos</option>
        <option class="dropdown-item" value="SAR">Saudi Arabia Riyal</option>
        <option class="dropdown-item" value="XAG">Silver Ounces</option>
        <option class="dropdown-item" value="SGD">Singapore Dollars</option>
        <option class="dropdown-item" value="ZAR">South Africa Rand</option>
        <option class="dropdown-item" value="KRW">South Korea Won</option>
        <option class="dropdown-item" value="XDR">Special Drawing Right (IMF)</option>
        <option class="dropdown-item" value="SEK">Sweden Krona</option>
        <option class="dropdown-item" value="CHF">Switzerland Francs</option>
        <option class="dropdown-item" value="TWD">Taiwan Dollars</option>
        <option class="dropdown-item" value="THB">Thailand Baht</option>
        <option class="dropdown-item" value="TTD">Trinidad and Tobago Dollars</option>
        <option class="dropdown-item" value="ZMK">Zambia Kwacha</option>
        <option class="dropdown-item" value="EUR">Euro</>
        <option class="dropdown-item" value="XCD">Eastern Caribbean Dollars</option>
        <option class="dropdown-item" value="XAG">Silver Ounces</option>
      </select>

    </div>
 </div>

 <div class="col-sm-3 d-flex align-items-center">
 <li class="dropdown">
    <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
        <img src="img/user1.png"  height="80" width="80" class="img-circle special-img"> </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-cog"></i> Account</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                </ul>
</li>
<p style="color:blue;"><?php echo "Welcome: ".$_SESSION['login_customer']; ?></p>

</div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
</div>
</div>
