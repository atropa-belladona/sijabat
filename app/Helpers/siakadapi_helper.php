<?php

use Config\Database;
use Config\Services;

function getSiakadConfig()
{
  $db = Database::connect();
  $session = Services::session();

  $config = $db->table('zz_siakad_config')->where('active', '1')->orderBy('id', 'desc')->get()->getRowObject();

  $options_siakad = [
    'baseURI' => $config->base_url,
    'timeout' => 10,
    'http_errors' => false
  ];

  $session->set([
    'siakad_token' => $config->token
  ]);

  return $options_siakad;
}

function getCaptchaSiakad()
{
  try {
    $client = Services::curlrequest(getSiakadConfig());

    $response = $client->get('captcha');
    return json_decode($response->getBody());
  } catch (Exception $ex) {
    return (object)[
      'status' => false,
      'error' => 'Tidak dapat terhubung ke SIAKAD UNJ'
    ];
  }
}

function siakad_authorize($log_as, $username, $password, $captcha_id, $securid)
{
  try {
    $client = Services::curlrequest(getSiakadConfig());

    $response = $client->request('POST', 'login', [
      'form_params' => [
        'mode' => $log_as,
        'username' => $username,
        'password' => $password,
        'captcha_id' => $captcha_id,
        'securid' => $securid
      ]
    ]);

    return json_decode($response->getBody());
  } catch (Exception $ex) {
    return (object)[
      'status' => false,
      'error' => $ex->getMessage()
    ];
  }
}

function getDataDosenSiakad($nidn)
{
  try {
    $client = Services::curlrequest();

    $response = $client->request('GET', 'http://103.8.12.212:36880/siakad_api/api/as400/dataDosen/' . $nidn . '/' . session('siakad_token'));

    return json_decode($response->getBody());
  } catch (Exception $ex) {
    return (object)[
      'status' => false,
      'error' => $ex->getMessage()
    ];
  }
}

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
