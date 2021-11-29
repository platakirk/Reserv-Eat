<?php
$login_err ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ccard=$_POST['card'];
    $mmonth=$_POST['month'];
    $yyear=$_POST['year'];
    $ccvc=$_POST['cvcc'];
    $year = date("Y");
    $month = date("m");

    $problem_alert ="<div class='alert alert-warning' role='alert'>
        Somthing went wrong. Please try again later. <br>
        <a href='mongopayments.php' class = btn btn-danger>Reload</a> 
        </div>";

    $uppercase = preg_match('@[A-Z]@', $ccard);
    $lowercase = preg_match('@[a-z]@', $ccard);
    $specialChars = preg_match('@[^\w]@', $ccard);

    if(empty($ccard) || empty($mmonth) || empty($yyear) || empty($ccvc)){
        $log_err="Please fill up the fields.";
    }else if(strlen($ccard)<16 || $uppercase || $lowercase || $specialChars){
        $log_err="Please correctly fill the card number";
    }else if($yyear >= $year){
        if(!(($mmonth < $month) && ($yyear = $year))){

            ////////////payment intent
            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/payment_intents",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"data\":{\"attributes\":{\"amount\":10000000,\"payment_method_allowed\":[\"card\",\"paymaya\"],\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"any\"}},\"currency\":\"PHP\"}}}",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Authorization: Basic c2tfdGVzdF96NUJrRHY2ejh5Wnc2cGFzcENMalVHY2Y6",
                "Content-Type: application/json"
            ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $intint=$response;

            curl_close($curl);

            $dint = json_decode($intint);

            if ($err) {
                echo $problem_alert;
            } else {

                ////start of payment method
                $sttring="{\"data\":{\"attributes\":{\"details\":{\"card_number\":\"".$ccard."\",\"exp_month\":".$mmonth.",\"exp_year\":".$yyear.",\"cvc\":\"".$ccvc."\"},\"type\":\"card\"}}}";

                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/payment_methods",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $sttring,
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Basic cGtfdGVzdF81U1Zjc0ZZeldoZG9XdTNrajdtZmNjdjY6",
                    "Content-Type: application/json"
                ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                $mettres = $response;
                $dmett=json_decode($mettres);

                curl_close($curl);

                if ($err) {
                    echo $problem_alert;
                } else {

                    //////attach to payment intent
                    $intid=$dint->data->id;
                    $mettid=$dmett->data->id;
                    $intstr="https://api.paymongo.com/v1/payment_intents/".$intid."/attach";
                    $metstr="{\"data\":{\"attributes\":{\"payment_method\":\"".$mettid."\"}}}";

                    
                    $curl = curl_init();

                    curl_setopt_array($curl, [
                    CURLOPT_URL => $intstr,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $metstr,
                    CURLOPT_HTTPHEADER => [
                        "Accept: application/json",
                        "Authorization: Basic c2tfdGVzdF96NUJrRHY2ejh5Wnc2cGFzcENMalVHY2Y6",
                        "Content-Type: application/json"
                    ],
                    ]);

                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    $finall = $response;
                    curl_close($curl);

                    if ($err) {
                        echo $problem_alert;
                    } else {
                        $dfinal = json_decode($finall);
                        $resid = $_SESSION['resId'];
                        $payid = $dfinal->data->id;
                        $amount=100000;
                        $brand=$dfinal->data->attributes->payments[0]->attributes->source->brand;
                        $fourdigi=$dfinal->data->attributes->payments[0]->attributes->source->last4;

                        $sql="INSERT INTO paymentmongo (id, resId, amount, paid, paymentType, brand, lastfour) VALUES (?,?,?,?,?,?,?)";
                        if($stmt=$conn->prepare($sql)){
                            $stmt->bind_param("sssssss", $parampay, $paramres, $paramamount, $parampaid, $paramcard, $parambrand, $paramlast);
                            $parampaid="paid";
                            $paramcard="card";
                            $parampay=$payid;
                            $paramres=$resid;
                            $paramamount=$amount;
                            $parambrand=$brand;
                            $paramlast=$fourdigi;
                            if($stmt->execute()){
                                header("location: finishpay.php");
                            }else{
                                $log_err = $resid. "<br>". $payid. "<br>". $amount. "<br>". $brand. "<br>". $fourdigi;
                                echo "<div class='alert alert-warning' role='alert'>
                                Failed to insert into database <br>
                                <a href='mongopayments.php' class = btn btn-danger>Reload</a> 
                                </div>";
                            }
                        }
                        else{
                            $log_err="prepare statement error";
                        }

                    }
                }

            }

        }else{
            $log_err="Card is expired";
        }
    }else{
        $log_err="Card is expired";
    }
}



?>