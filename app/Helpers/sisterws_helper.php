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

function encryptToken($token)
{
  $encrypter = Services::encrypter();

  return $encrypter->encrypt($token);
}

// Decrypt token
function decryptToken($token)
{
  $encrypter = Services::encrypter();

  return $encrypter->decrypt($token);
}

// create cookie sister_token for authorization in sister ws
function sister_authorize()
{
  $client = Services::curlrequest(getSisterWSOptions());

  $session = Services::session();


  $response = $client->request('POST', 'authorize', [
    'form_params' => [
      'username' => $session->get('sister_username'),
      'password' => $session->get('sister_password'),
      'id_pengguna' => $session->get('sister_pengguna')
    ]
  ]);

  try {
    // if OK
    if ($response->getStatusCode() == 200) {
      $body = json_decode($response->getBody());

      $plain_token = 'Bearer ' . $body->token;

      // set cookie for sister token
      helper('cookie');
      set_cookie('sister_token', md5(uniqid()), 3600);

      $_SESSION['sister_token'] = encryptToken($plain_token);

      // for development purpose
      // disable in production
      set_cookie('sister_plain_token', $plain_token, 3600);

      return $response;
    }

    $error_msg = $response->getReason();

    return redirect()->back()->with('app_error', $error_msg);
  } catch (Exception $ex) {
    // if Error
    return redirect()->back()->with('app_error', $ex->getMessage());
  }
}

// get referensi unitkerja
function sister_getReferensiUnitKerja($id_perguruantinggi)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', 'referensi/unit_kerja', [
    'headers' => [
      'Authorization' => $token
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
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', 'referensi/sdm', [
    'headers' => [
      'Authorization' => $token
    ]
  ]);

  return $response;
}

// get data penugasan
function sister_getProfileSDM($id_sdm)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', 'data_pribadi/profil/' . $id_sdm, [
    'headers' => [
      'Authorization' => $token
    ]
  ]);

  return $response;
}

// get data penugasan
function sister_getDataPenugasanPegawai($id_sdm)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', 'penugasan', [
    'headers' => [
      'Authorization' => $token
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
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', 'penugasan/' . $id_penugasan, [
    'headers' => [
      'Authorization' => $token
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
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', $get_path, [
    'headers' => [
      'Authorization' => $token
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
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', $get_path . $id_sdm, [
    'headers' => [
      'Authorization' => $token
    ]
  ]);

  return $response;
}

function sister_path_getDataByID($get_path, $id)
{
  helper('cookie');

  // if it doesnt have token to authorize
  if (get_cookie('sister_token') == null) {
    $sa = sister_authorize();
  }

  $client = Services::curlrequest(getSisterWSOptions());

  $token = session('sister_token');

  $token = decryptToken($token);

  $response = $client->request('GET', $get_path . $id, [
    'headers' => [
      'Authorization' => $token
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

function sister_getListDataJabatanFungsional($id_sdm)
{
  $get_path = 'jabatan_fungsional';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getListDataKepangkatan($id_sdm)
{
  $get_path = 'kepangkatan';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDetailKepangkatan($id)
{
  $get_path = 'kepangkatan/';

  $response = sister_path_getDataByID($get_path, $id);

  return json_decode($response->getBody());
}


// get dokumen sdm
function sister_getDataListDokumenSDM($id_sdm)
{
  $get_path = 'dokumen';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getUnduhDokumen($id_document)
{
  $get_path = 'dokumen/';

  $id_document = $id_document . '/download';

  $response = sister_path_getDataByID($get_path, $id_document);

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


// GET Pengajaran
function sister_getDataListPengajaran($id_sdm)
{
  $get_path = 'pengajaran';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET Visiting Scientist
function sister_getDataListVisitingScientist($id_sdm)
{
  $get_path = 'visiting_scientist';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET List Bahan Ajar SDM
function sister_getDataListBahanAjar($id_sdm)
{
  $get_path = 'bahan_ajar';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET List Detasering
function sister_getDataListDetasering($id_sdm)
{
  $get_path = 'detasering';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET List Orasi Ilmiah
function sister_getDataListOrasiIlmiah($id_sdm)
{
  $get_path = 'orasi_ilmiah';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET List Pembimbing Dosen
function sister_getDataListPembimbingDosen($id_sdm)
{
  $get_path = 'bimbing_dosen';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET List Tugas Tambahan
function sister_getDataListTugasTambahan($id_sdm)
{
  $get_path = 'bimbing_dosen';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}




// GET Penelitian
function sister_getDataListPenelitianSDM($id_sdm)
{
  $get_path = 'penelitian';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDataListPublikasiSDM($id_sdm)
{
  $get_path = 'publikasi';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDataListHakiSDM($id_sdm)
{
  $get_path = 'kekayaan_intelektual';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}


// GET Pengabdian
function sister_getDataListPengabdianSDM($id_sdm)
{
  $get_path = 'pengabdian';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET Pengelola Jurnal
function sister_getDataListPengelolaJurnalSDM($id_sdm)
{
  $get_path = 'pengelola_jurnal';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET List data pembicara
function sister_getDataListPembicaraSDM($id_sdm)
{
  $get_path = 'pembicara';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

// GET List data jabatan struktural
function sister_getDataListJabstrukSDM($id_sdm)
{
  $get_path = 'jabatan_struktural';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}



// GET Penunjang
function sister_getDataListAnggotaProfesiSDM($id_sdm)
{
  $get_path = 'anggota_profesi';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDataListPenghargaanSDM($id_sdm)
{
  $get_path = 'penghargaan';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}

function sister_getDataListPenunjangLainSDM($id_sdm)
{
  $get_path = 'penunjang_lain';

  $response = sister_query_getDataByIdSDM($get_path, $id_sdm);

  return json_decode($response->getBody());
}
