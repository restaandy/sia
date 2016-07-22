<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DIKLAT JATENG</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()."aset/bootstrap/css/bootstrap.min.css"; ?>" rel="stylesheet">
    <!-- SLIDE -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url()."aset/bootstrap/js/jquery.min.js"; ?>"></script>
    <script src="<?php echo base_url()."aset/bootstrap/js/bootstrap.min.js"; ?>"></script>

      <?php
      $newdata = array(
          'angka1'  => rand(0,20),
          'angka2'     => rand(0,20)
      );

      $this->session->set_userdata($newdata);

      $this->session->set_userdata('hasil',$this->session->userdata('angka1')+$this->session->userdata('angka2'));

      ?>


  </head>
    <style type="text/css">
      body {
        /*background-color: #eaeaea;*/
          background : url("<?php echo base_url()."aset/img/bg.jpg"; ?>") no-repeat center center fixed;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
      }
      @import url(https://fonts.googleapis.com/css?family=Pacifico);
        .login-font {
            font-family: 'Pacifico', cursive;
        }
    </style>
  <body>

  <div class="container" style="padding-top:60px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    
    <div class="panel panel-default" style="border-radius:0px;-webkit-box-shadow: 5px 8px 8px -1px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 8px 8px -1px rgba(0,0,0,0.75);
box-shadow: 5px 8px 8px -1px rgba(0,0,0,0.75);border: 1px solid #333;">
      <div class="panel-body">
      

          <!-- LOgin -->
          
            <div class="col-xs-3">
              <center><img src="<?php echo base_url()."aset/img/logo.png" ?>" width="70%"></center>
            </div>
            <div class="col-xs-9" style="text-align: center;">
              <p style="margin-top: 3px;font-size: 2em;" class="login-font">Form Login</p>
            </div>
            <form action="<?php echo base_url()."auth/login" ?>" method="POST">
            <table class="table">
              
                <tr>
                  <td><label>NIP</label></td>
                  <td><label>:</label></td>
                  <td><input type="text" class="form-control input-sm" name="nip" placeholder="Masukan NIP . . ."></td>
                </tr>
                <tr>
                  <td><label>Password</label></td>
                  <td><label>:</label></td>
                  <td><input type="password" name="password" class="form-control input-sm" placeholder="Masukan Password . . ."></td>
                </tr>
                <tr>
                    <td><label>Captcha</label></td>
                    <td><label>:</label></td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6" style="padding-right: 0px;text-align: center;">
                                <p style="background: #333;font-weight: bold;color:#fff;padding: 5px;">
                                    <?php echo $this->session->userdata('angka1')." + ".$this->session->userdata('angka2')." = "; ?></p>
                            </div>
                            <div class="col-xs-6" style="padding-left: 5px;float: left;">
                                <input  type="number" class="form-control input-sm nomor2" name="hasil_capt" placeholder="Hasil . . ." required="required"><span style="color: red;" id="pesan2"></span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <select class="form-control input-sm" name="sebagai">
                            <option value="peserta">Peserta Didik</option>
                            <option value="coach">Coach / Consellor</option>
                            <option value="sv">Supervisor</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </td>
                </tr>

                <tr>
                  <td colspan="3" style="text-align:right;">
                    <button class="btn btn-default btn-sm">Batal</button>
                    <input type="submit" value="Masuk" class="btn btn-danger btn-sm">
                  </td>
                </tr>
            </table>
            </form>
          </div>
          <div class="panel-footer" style="padding: 0px;">
              <p style="font-size: 0.8em;margin-top: 5px;;text-align: center;">Copyright © 2016  BADAN DIKLAT JATENG</p>
          </div>
      </div>
    </div>


  </div>

  <script>
      $(document).ready(function(){
          $(".nomor2").keypress(function(data){
              if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
              {
                  $("#pesan2").html(" isikan angka").show().fadeOut("slow");
                  return false;
              }
          });
      });
  </script>


  </body>
</html>