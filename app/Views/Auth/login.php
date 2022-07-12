<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('img/favicon.png') ?>" type="image/x-icon">

  <!--====================================================================================================================================-->
  <title>SIJABAT | Sistem Informasi Jabatan</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed&display=swap" rel="stylesheet">

  <style>
    html,
    body {
      /* background-image: url('img/black.jpg'); */
      /* background-image: url('https://source.unsplash.com/1600x900/?nature'); */
      background: rgb(0, 172, 107);
      background: radial-gradient(circle, rgba(0, 172, 107, 1) 0%, rgba(0, 139, 86, 1) 0%, rgba(5, 105, 66, 1) 68%, rgba(10, 69, 46, 1) 100%);
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
      font-family: 'IBM Plex Sans Condensed', sans-serif;
    }

    .container {
      height: 100%;
      align-content: center;
    }

    .card {
      /* height: 340px; */
      margin-top: auto;
      margin-bottom: auto;
      width: 740px;
      background-color: rgba(245, 245, 245, .925) !important;
    }

    .card-header h3 {
      color: white;
    }

    .social_icon {
      position: absolute;
      right: 20px;
      top: -45px;
    }

    input:focus {
      outline: 0 0 0 0 !important;
      box-shadow: 0 0 0 0 !important;

    }

    .remember {
      color: white;
    }

    .remember input {
      width: 20px;
      height: 20px;
      margin-left: 15px;
      margin-right: 5px;
    }

    .login_btn {
      color: black;
      background-color: #FFC312;
      width: 100px;
    }

    .login_btn:hover {
      color: black;
      background-color: white;
    }

    .links {
      color: white;
    }

    .links a {
      margin-left: 4px;
    }

    @media(max-height: 420px) {
      .social_icon span {
        display: none;
      }
    }
  </style>
</head>

<body class="small">
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div id="login-box" class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center mb-2">
              <img src="<?= base_url('img/logo_unj_green.png'); ?>" width="auto" height="250" />
              <?php // if ($_SERVER['CI_ENVIRONMENT'] == 'development') : 
              ?>
              <!-- <div>
                  Dosen : [nidn] [nidn] ;
                  Operator Unit : operator_unit operator ;
                  Verifikator unit : verifikator verifikator123 ;
                  Koordinator BUK : koordinator koordinator123 ;
                  Tim Penilai PAK : reviewer reviewer123 ;
                </div> -->
              <?php //endif 
              ?>
            </div>
            <div class="col-md-6">
              <form action="<?= route_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <h3 align="center" style="color: green">Sistem Informasi Jabatan</h3> <br>

                <div class="form-group">
                  <i class="fa fa-tag"></i>
                  <label for="log_as">Login sebagai</label>
                  <select name="log_as" id="log_as" class="form-control <?php if (session('errors.log_as')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                    <option value="">Pilih ...</option>
                    <?php foreach ($auth_groups as $auth_group) : ?>
                      <option value="<?= $auth_group->id; ?>" <?= ($auth_group->id == old('log_as')) ? 'selected' : ''; ?>><?= $auth_group->description; ?></option>
                    <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= session('errors.log_as') ?>
                  </div>
                </div>

                <div class="form-group">
                  <i class="fa fa-users"></i>
                  <label for="login">Username</label>
                  <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Username" value="<?= old('login'); ?>" autocomplete="off">
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>

                <div class="form-group">
                  <i class="fa fa-key"></i>
                  <label for="password">Password</label>
                  <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Password" value="">
                  <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                  </div>
                </div>

                <div class="form-group">
                  <?php if ($captcha->id == null) : ?>
                    <span class="text-danger"><?= $captcha->quest; ?></span>
                  <?php else : ?>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <span class="security-field">Berapakah <?= $captcha->quest; ?> ?</span>
                        </span>
                      </div>
                      <input type="text" id="securid" name="securid" class="form-control" placeholder="Jawaban" required="" autocomplete="off">
                      <input type="hidden" name="captcha_id" id="captcha_id" value="<?= $captcha->id; ?>" />
                    </div>
                  <?php endif ?>

                </div>

                <?php if ($config->allowRemembering) : ?>
                  <div class="form-group">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <?= lang('Auth.rememberMe') ?>
                      </label>
                    </div>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                  <div class="action-button mb-2">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
                  </div>
                  <div class="msg-block">
                    <?= view('App\Auth\_message_block') ?>

                    <?php if (session('app_error')) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error !</strong> <?= session('app_error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php endif ?>

                  </div>
                </div>


                <div class="d-flex justify-content-between">
                  <?php if ($config->allowRegistration) : ?>
                    <p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                  <?php endif; ?>
                  <?php if ($config->activeResetter) : ?>
                    <p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                  <?php endif; ?>
                </div>

              </form>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <div class="d-flex flex-column">
            <h6 class="text-center text-dark">Copyright &copy; <?= (date('Y') == 2021) ? '2021' : '2021 - ' . date('Y'); ?> : Universitas Negeri Jakarta</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>