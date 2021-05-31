<?php
interface IGender{
    public function get_gender(string $name, string $country) : array;
}