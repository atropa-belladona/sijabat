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

function seo_friendly_url($string)
{
  $string = str_replace(array('[\', \']'), '', $string);
  $string = preg_replace('/\[.*\]/U', '', $string);
  $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
  $string = htmlentities($string, ENT_COMPAT, 'utf-8');
  $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string);
  $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $string);

  return strtolower(trim($string, '-'));
}
