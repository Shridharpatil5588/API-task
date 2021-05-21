<?php
include 'css/css.html';
if(isset($_POST['submit'])){
    $mobile=$_POST['mobile'];
    $url="http://apilayer.net/api/validate?access_key=4607f52f9aa4104a92f6fa89fbbc23be&number= $mobile";

   
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
    if($result['valid']==1){
        echo "Country Name: ".$result['country_name'].'<br/>';
        echo "Location: ".$result['location'].'<br/>';
        echo "Carrier: ".$result['carrier'].'<br/>';
    }else{
        echo "No data found";
    }
}

?>
<style>
.form
{
    background: rgba(19, 35, 47, 0.9); 
    padding: 40px;
    max-width: 600px;
    margin: 40px auto;
    border-radius: 4px;
    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}
span
{
    color: #1ab188;
    font-weight: bold;
}
label
{
    position: absolute;
    -webkit-transform: translateY(6px);
            transform: translateY(6px);
    left: 8px;
    color: rgba(255, 255, 255, 0.5);
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
   /* -webkit-backface-visibility: hidden;*/
    pointer-events: none;
    font-size: 22px;
}
label .req
{
    margin: 2px;
    color: #1ab188;
}

label.active
{
    -webkit-transform: translateY(50px);
            transform: translateY(50px);
    left: 2px;
    top: -5px;
    font-size: 14px;
}

label.active .req
{
    opacity: 0;
}

label.highlight
{
    color: #ffffff;
}
.field-wrap
{
    position: relative;
    margin-bottom: 40px;
}
.button-block
{
    display: block;
    width: 100%;
}


</style>
<div class="form">
        <h1>Mobile Details!</h1>
        <div id="mobile details">  
            <form method="post">
                <div class="field-wrap">
                    <label>
                        <span class="req"></span>
                    </label>
                    <input type="text" autocomplete="off" placeholder="ph.no with country code"  name="mobile"  required/>
                </div>           
                <span id="update_message"></span>
                <button type="submit" class="button button-block" name="submit">Submit</button>
            </form>
        </div>
    </div>

</form>