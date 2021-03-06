<?php
	/* Koneksi ke Database */
	mysql_connect("localhost","root");
	mysql_select_db("db_klinik");
	/*-------------------------------*/
	  date_default_timezone_set('Asia/Jakarta');

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Pelayanan Kesehatan Klinik Green Care Bandung</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Green Care</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo date("d-m-Y");?> - <?php echo $jam=date("H:i:s");	;?> &nbsp;Klinik Green Care Bandung &nbsp; <a href="./../../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../../assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
					<li>
                        <a  href="proses.php"><i class="fa fa-desktop fa-3x"></i> Lihat Proses</a>
                    </li>
					<li>
                        <a class="active-menu" href="rekammedis.php"><i class="fa fa-sitemap fa-3x"></i>Rekam Medis<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?pages=umum"><i class="fa fa-heart"></i>RM Poli Umum</a>
                            </li>
                            <li>
                                <a href="?pages=gigi"><i class="fa fa-plus-square"></i>RM Poli Gigi</a>
                            </li>
                        </ul>
                      </li>								
                  <li  >
                        <a  href="#"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	
                </ul>
            </div>
        </nav>  
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Pantauan Pasien Berobat</h2>   
                        <h5>Klinik Green Care Bandung </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
					 <table class="table table-hover">
						<thead>
						  <tr>
							<th><strong><div align="center"><span class="glyphicon glyphicon-align-center"></span>&nbsp ID Pasien</div></strong></th>
							<th><strong><div align="center"><span class="glyphicon glyphicon-user"></span>&nbsp Nama Pasien</div></strong></th>
							<th><strong><div align="center"><span class="glyphicon glyphicon-calendar"></span>&nbsp Keluhan</div></strong></th>
							<th><strong><div align="center"><span class="glyphicon glyphicon-Time"></span>&nbsp Ruang Rawat</div></strong></th>
							<th><div align="center"><span data-toggle="intip" title="Proses Input Pendaftaran" class="fa fa-steam"></span>&nbsp Pemeriksaan </div></strong></th>
							<th><div align="center"><span data-toggle="intip" title="Proses Input Pendaftaran" class="fa fa-steam"></span>&nbsp Diagnosa </div></strong></th>
							<th><div align="center"><span data-toggle="intip" title="Proses Input Pemeriksaan" class="fa fa-steam"></span>&nbsp Tindakan Dokter </div></strong></th>
							<th><div align="center"><span data-toggle="intip" title="Proses Input Pembayaran" class="fa fa-steam"></span>&nbsp Resep Obat </div></strong></th>
							<th><div align="center"><span data-toggle="intip" title="Proses Input Pembayaran" class="fa fa-steam"></span>&nbsp Saran Dokter </div></strong></th>
						  </tr>
						</thead>
						<tbody>
						<?php
                        $query ="SELECT t_rekam.*, t_daftar.*, t_dokter.*, t_pasien.* FROM t_rekam 
						inner join t_daftar ON t_rekam.id_daftar=t_daftar.id_daftar 
						INNER JOIN t_dokter ON t_daftar.id_dokter=t_dokter.id_dokter  
						INNER JOIN t_pasien ON t_daftar.id_pasien=t_pasien.id_pasien";
                        $sql = mysql_query($query);
                        ?>
                        <?php 
                        while ($hasil = mysql_fetch_array($sql))
                        {
                          $id_pasien = $hasil ['id_pasien'];
                          $nama_pasien = $hasil ['nama_pasien'];
                          $keluhan = $hasil ['keluhan'];
                          $nama_dokter = $hasil ['nama_dokter'];
                          $ruang_rawat = $hasil ['ruang_rawat'];
                          $pemeriksaan = $hasil ['pemeriksaan'];
                          $diagnosa = $hasil['diagnosa'];
                          $tindakan = $hasil['tindakan'];
                          $resep_obat = $hasil['resep_obat'];
                          $saran = $hasil['saran'];
                          
                        ?>
                        <tr>
                          <th><div align="center"><?php echo $id_pasien; ?></div></th>
                          <th><div align="center"><?php echo $nama_pasien; ?></div></th>
                          <th><div align="center"><?php echo $keluhan; ?></div></th>
                          <th><div align="center"><?php echo $ruang_rawat; ?> - <?php echo $nama_dokter; ?></div></th>
                          <th><div align="center"><?php echo $pemeriksaan; ?></div></th>
                          <th><div align="center"><?php echo $diagnosa; ?></div></th>
                          <th><div align="center"><?php echo $tindakan; ?></div></th>
                          <th><div align="center"><?php echo $resep_obat; ?></div></th>
                          <th><div align="center"><?php echo $saran; ?></div></th>
                        </tr>
                          
                        <?php

                        }
                        ?>

						</tbody>
					  </table>
					  <div class="form-panel col-lg-6">
						  <div class="col-lg-12 centered">
							<a href="rekammedis.php" type="button" class="text-right"> Close </span></a>
							</div>
						</div>
	</div>
                 <!-- /. ROW  -->
           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
    
   
</body>
</html>