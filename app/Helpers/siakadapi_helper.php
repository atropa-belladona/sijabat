<?php


function getAllFakultas()
{
  // get Fakultas from SIAKAD API
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'http://103.8.12.212:36880/siakad_api/api/as400/fakultas/All');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);

  curl_close($curl);

  return json_decode($result);
}

function getFakultasByKode($kd_fakultas)
{
  // get Fakultas from SIAKAD API
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "http://103.8.12.212:36880/siakad_api/api/as400/fakultas/$kd_fakultas");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);

  curl_close($curl);

  return json_decode($result);
}
