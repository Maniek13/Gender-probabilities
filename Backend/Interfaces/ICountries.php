<?php
interface ICountries{
    public function get_all_from(string $region) : array;
}