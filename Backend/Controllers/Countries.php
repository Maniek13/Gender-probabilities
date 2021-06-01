<?php
require_once('Interfaces/ICountries.php');

class Countries implements ICountries{
    protected array $list;

    function get_all_from(string $region) : array{
        $url = "https://restcountries.eu/rest/v2/region/".$region."?fields=name;alpha2Code";

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        $this->list = $jsonData;

        curl_close($curlSession);

        return $this->list;
    }
}
