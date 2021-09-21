<?php

function date_str($date)
{
  setlocale(LC_ALL, 'id-ID', 'id_ID');

  return strftime("%d %B %Y", strtotime($date));
}

function number_format2($number)
{
  return number_format($number, 2, ',', '.');
}

function str_to_int($str_number)
{
  $str_number = str_replace('.', ',', $str_number);
  $str_number = str_replace(',', '.', $str_number);

  return $str_number;
}
