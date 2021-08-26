<?php

use Config\Services;

// get sisterws curl options
function getSisterWSOptions()
{
  $options = [
    'baseURI' => 'http://sister.unj.ac.id/ws.php/1.0/',
    'timeout'  => 5,
    'http_errors' => false
  ];

  return $options;
}

// create cookie sister_token for authorization in sister ws
function sister_authorize()
{
  $options = [
    'baseURI' => 'http://sister.unj.ac.id/ws.php/1.0/',
    'timeout'  => 3,
    'http_errors' => false
  ];

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('POST', 'authorize', [
    'form_params' => [
      'username' => 'QPVDH8nKbIULIZ9sbkycMv3SYwW2c5tlCbEnaHH+f8c=',
      'password' => 'SmFRI1E3knS+/4zloS+zP+Iv5G3tLvqui2y3z/p50YaTJC0SWJ1Qj4DIt2QGe2aX',
      'id_pengguna' => 'f4045ace-b951-406c-b411-1167b99bb031'
    ]
  ]);

  // if OK
  if ($response->getStatusCode() == 200) {
    $body = json_decode($response->getBody());

    // set cookie for sister token
    helper('cookie');
    set_cookie('sister_token', 'Bearer ' . $body->token, 3600);

    return $response;
  }

  // if Error
  $error_msg = $response->getReason();

  return redirect()->back()->with('app_error', $error_msg);
}

// get referensi unitkerja
function sister_getReferensiUnitKerja($id_perguruantinggi)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (!has_cookie('sister_token')) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('GET', 'referensi/unit_kerja', [
    'headers' => [
      'Authorization' => get_cookie('sister_token')
    ],
    'query' => [
      'id_perguruan_tinggi' => $id_perguruantinggi
    ]
  ]);

  return $response;
}

// get data dosen
function sister_getDataPegawai()
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (!has_cookie('sister_token')) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('GET', 'referensi/sdm', [
    'headers' => [
      'Authorization' => get_cookie('sister_token')
    ]
  ]);

  return $response;
}

// get data penugasan
function sister_getProfileSDM($id_sdm)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (!has_cookie('sister_token')) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('GET', 'data_pribadi/profil/' . $id_sdm, [
    'headers' => [
      'Authorization' => get_cookie('sister_token')
    ]
  ]);

  return $response;
}

// get data penugasan
function sister_getDataPenugasanPegawai($id_sdm)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (!has_cookie('sister_token')) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('GET', 'penugasan', [
    'headers' => [
      'Authorization' => get_cookie('sister_token')
    ],
    'query' => [
      'id_sdm' => $id_sdm
    ]
  ]);

  return $response;
}

// get data penugasan detail
function sister_getDataPenugasanDetail($id_penugasan)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (!has_cookie('sister_token')) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('GET', 'penugasan/' . $id_penugasan, [
    'headers' => [
      'Authorization' => get_cookie('sister_token')
    ]
  ]);

  return $response;
}

// -------------------------------------------------------------------------------------

/**
 * general function to get data using PATH parameter by id_sdm
 * @get_path is GET PATH without "/" mark at the beginning 
 */
function sister_query_getDataByIdSDM($get_path, $id_sdm)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (!has_cookie('sister_token')) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('GET', $get_path, [
    'headers' => [
      'Authorization' => get_cookie('sister_token')
    ],
    'query' => [
      'id_sdm' => $id_sdm
    ]
  ]);

  return $response;
}

/**
 * general function to get data using query-string parameter by id_sdm
 * @get_path is GET PATH without "/" mark at the beginning 
 */
function sister_path_getDataByIdSDM($get_path, $id_sdm)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (!has_cookie('sister_token')) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $response = $client->request('GET', $get_path . $id_sdm, [
    'headers' => [
      'Authorization' => get_cookie('sister_token')
    ]
  ]);

  return $response;
}


// --------------------------------------------------------------------------------------

// GET Data Pokok
function sister_getDataProfileSDM($id_sdm)
{
  $get_path = 'data_pribadi/profil/';

  $response = sister_path_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDataAlamatSDM($id_sdm)
{
  $get_path = 'data_pribadi/alamat/';

  $response = sister_path_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDataFotoSDM($id_sdm)
{
  $get_path = 'data_pribadi/foto/';

  $response = sister_path_getDataByIdSDM($get_path, $id_sdm);

  return $response->getBody();
}


// GET Pendidikan Formal
function sister_getListDataPendidikanFormal($id_sdm)
{
  $get_path = 'pendidikan_formal';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET Penugasan
function sister_getDataListPenugasanSDM($id_sdm)
{
  $get_path = 'penugasan';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDataPenugasanSDM($id_sdm)
{
  $data = sister_getDataListPenugasanSDM($id_sdm);

  $data = array_reverse($data);

  return $data[0];
}
