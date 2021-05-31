<?php
require_once('Interfaces/IGender.php');

class Gender implements IGender
{
    protected float $probability = 0;
    protected ?string $gender = "undefined";

    function get_gender(string $name, string $country) : array{
        $url = "https://api.genderize.io?name=".$name."&country_id=".$country;

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));


        if(!property_exists($jsonData, "error")){
            $this->probability = floatval($jsonData->probability)*100;
            $this->gender =  $jsonData->gender;
        }

        curl_close($curlSession);

        return [
            "probability" => $this->probability,
            "gender" => $this->gender
        ];
    }
}
