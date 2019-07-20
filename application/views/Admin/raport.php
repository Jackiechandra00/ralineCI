
<!DOCTYPE html>
<html>
<head>
	<title>Export</title>
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh3IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/script/css/lel.css">
<script src="<?php echo base_url() ?>script/css/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>script/css/sweetalert2.min.css">
<script type="<?php echo base_url() ?>/script/js/script.jss"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</head>
<body>
<div class="container" style="border-width: 1px;">
	<div class="row">
		<div class="container" style="border-width: 2px; border-color:#d6d6c2; margin-left: 0px; margin-right: 20px; ">
			<div class="row">
				<div style="margin-left: 0px; padding: 10px 10px 10px 10px; margin-top: 70px;">
					<table style="width: 370px;">
						<tr>
							<td><b>Nama Sekolah</b></td>
							<td>:</td>
							<td> SMA ISLAM ULUN NUHA</td>
						</tr>
						<tr>
							<td><b>Nama Siswa</b></td>
							<td>:</td>
							<td> <?= $siswa->nama ?></td>
						</tr>
						<tr>
							<td><b>NIS/NISN</b></td>
							<td>:</td>
							<td> <?= $siswa->nis ?>/<?= $siswa->nisn ?></td>
						</tr>
					</table>
				</div>
				<div style="margin-left: 100px;  padding: 10px 10px 10px 10px; margin-top: 70px;" >
					<table style="width: 370px;">
						<tr>
							<td><b>Kelas</b></td>
							<td>:</td>
							<td> <?= $siswa->kelas ?></td>
						</tr>
						<tr>
							<td><b>Penilaian</b></td>
							<td>:</td>
							<td> UAS</td>
						</tr>
						<tr>
							<td><b>Tahun Pelajaran</b></td>
							<td>:</td>
							<td> <?= $thn->tahun_akademik ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>




	<div style="margin-top: 70px;">
		<h5 style="color: #2F669F;"><b></b></h5>

		<table border="2" style="width:800px; text-align: center;">
			<tr>
				<td rowspan="2" style="width: 500px; text-align: center; "><br><br><br><br><br><B>CAPAIAN HASIL BELAJAR</B><br><br><br><br><br><br>	</td>
			</tr>
		</table>
		</div>



	<div style="margin-top: 50px;">
		<h5 style="color: #2F669F;"><b>Sikap Sosial</b></h5>

		<table border="2" style="width:800px; text-align: center;">
			<tr>
				<td style="width: 100px; text-align: center; font-weight: 700">
					<?php if(isset($desk)): ?>
						<?= $desk->predikat_sosial ?>
					<?php endif; ?>
				</td>
				<td rowspan="2" style="width: 500px; text-align: center; font-weight: 700">
					<br><br><br><br>
					<?php if(isset($desk)): ?>
						<?= $desk->deskripsi_sosial ?>
					<?php endif; ?>
					<br><br><br><br>
				</td>
			</tr>
		</table>
		</div>

	<div style="margin-top: 50px;">
		<h5 style="color: #2F669F;"><b>Sikap Spiritual</b></h5>

		<table border="2" style="width:800px; text-align: center;">
			<tr>
				<td style="width: 100px; text-align: center; font-weight: 700">
					<?php if(isset($desk)): ?>
						<?= $desk->predikat_spiritual ?>
					<?php endif; ?>
				</td>
				<td rowspan="2" style="width: 500px; text-align: center; font-weight: 700">
					<br><br><br><br>
					<?php if(isset($desk)): ?>
						<?= $desk->deskripsi_spiritual ?>
					<?php endif; ?>
					<br><br><br><br>
				</td>
			</tr>
		</table>
		</div>
	
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div style="margin-top: 50px;">
	<table border="2" style="width:800px; text-align: center;">
			<tr>
				<td rowspan="2"><b>KKM</b></td>
				<td colspan="4"><b>Predikat</b></td>
				
				
			</tr>
			<tr>
				<td style="width: 700px; text-align: center;"><b>K=KURANG</b></td>
				<td style="width: 700px; text-align: center;"><b>C=CUKUP/SEDANG</b></td>
				<td style="width: 700px; text-align: center;"><b>B=BAIK</b></td>				
				<td style="width: 700px; text-align: center;"><b>SB=SANGAT BAIK</b></td>		
			</tr>
			
			<tr>
				<td align="center">75</td>
				<td><	75</td>
				<td>76 S/D 83</td>
				<td>84 S/D 93</td>
				<td>94 S/D 100</td>
			</tr>
			
			<tr>
				<td align="center">70</td>
				<td>< 70</td>
				<td>71 S/D 80</td>
				<td>81 S/D 90</td>
				<td>91 S/D 100</td>
			</tr>
			
			</th></tr></table>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div style="margin-top: 300px;"></div>
<div class="container" style="border-width: 1px;">
	<div class="row">
		<div class="container" style="border-width: 2px; border-color:#d6d6c2; margin-left: 0px; margin-right: 20px; ">
			<div class="row">
				<div style="margin-left: 0px; padding: 10px 10px 10px 10px; margin-top: 50px;">
					<table style="width: 370px;">
						<tr>
							<td><b>Nama Sekolah</b></td>
							<td>:</td>
							<td> SMA ISLAM ULUN NUHA</td>
						</tr>
						<tr>
							<td><b>Nama Siswa</b></td>
							<td>:</td>
							<td> <?= $siswa->nama ?></td>
						</tr>
						<tr>
							<td><b>NIS/NISN</b></td>
							<td>:</td>
							<td> <?= $siswa->nis ?>/<?= $siswa->nisn ?></td>
						</tr>
					</table>
				</div>
				<div style="margin-left: 100px;  padding: 10px 10px 10px 10px; margin-top: 50px;" >
					<table style="width: 370px;">
						<tr>
							<td><b>Kelas</b></td>
							<td>:</td>
							<td> <?= $siswa->kelas ?></td>
						</tr>
						<tr>
							<td><b>Penilaian</b></td>
							<td>:</td>
							<td> UAS</td>
						</tr>
						<tr>
							<td><b>Tahun Pelajaran</b></td>
							<td>:</td>
							<td> <?= $thn->tahun_akademik ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- batas box -->
	<!-- INI ADALAH HASIL PAGE SETELAH TOMBOL CARI DIKLIK-->
	<!-- Ini adalah hasil raport Jurusan IPA -->
	<div style="margin-top: 20px;">
		<h5 style="color: #2F669F;"><b>Pengetahuan</b></h5>
		<table border="2" style="width:800px; text-align: center;">
			<tr>
				<th rowspan="2">No.</td>
				<td rowspan="2" style="width: 300px; text-align: center;"><b>Mata Pelajaran</b></td>
				<td rowspan="2"><b>KKM</b></td>
				<td colspan="3"><b>Pengetahuan</b></td>
				
				
			</tr>
			<tr>
				<td><b>&nbsp;&nbsp;Nilai&nbsp;&nbsp;</b></td>
				<td><b>&nbsp;Predikat&nbsp;</b></td>
				<td style="width: 700px; text-align: center;"><b>Deskripsi</b></td>				
				
			</tr>
			<tr>
				<td colspan="6	" align="left" style="padding-left: 10px;"><b>Kelompok A (Umum)</b></td>
			</tr>
			<tr>
				<td rowspan="11">1.</td>
				<td align="left"> &nbsp;Pengetahuan Agama Islam</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="left">&nbsp; a. Fiqih</td>
				<td><?= $nilai[0 ]["kkm"] ?></td>
				<td><?= $nilai[0]["k3"] ?></td>
				<td><?= $nilai[0]["predikat"] ?></td>
				<td><?= $nilai[0]["deskripsi_k3"] ?></td>
				<?php // echo print_r($nilai) ?>
			</tr>
			<tr>
				<td align="left">&nbsp;&nbsp;b. Hadist</td>
				<td><?= $nilai[1 ]["kkm"] ?></td>
				<td><?= $nilai[1]["k3"] ?></td>
				<td><?= $nilai[1]["predikat"] ?></td>
				<td><?= $nilai[1]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td  align="left">&nbsp;&nbsp;c. Tafsir</td>
				<td><?= $nilai[2 ]["kkm"] ?></td>
				<td><?= $nilai[2 ]["k3"] ?></td>
				<td><?= $nilai[2]["predikat"] ?></td>
				<td><?= $nilai[2]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td  align="left">&nbsp;&nbsp;d. Ushul Fiqih</td>
				<td><?= $nilai[3 ]["kkm"] ?></td>
				<td><?= $nilai[3]["k3"] ?></td>
				<td><?= $nilai[3]["predikat"] ?></td>
				<td><?= $nilai[3]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->

			</tr>
			<tr>
				<td align="left">&nbsp;&nbsp;e. Aqidah</td>
				<td><?= $nilai[4 ]["kkm"] ?></td>
				<td><?= $nilai[4 ]["k3"] ?></td>
				<td><?= $nilai[4]["predikat"] ?></td>
				<td><?= $nilai[4]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td align="left">&nbsp;&nbsp;f. Musthalah Hadist</td>
				<td><?= $nilai[5 ]["kkm"] ?></td>
				<td><?= $nilai[5]["k3"] ?></td>
				<td><?= $nilai[5]["predikat"] ?></td>
				<td><?= $nilai[5]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;g. Ushul Tafsir</td>
				<td><?= $nilai[6 ]["kkm"] ?></td>
				<td><?= $nilai[6]["k3"] ?></td>
				<td><?= $nilai[6]["predikat"] ?></td>
				<td><?= $nilai[6]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
				
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;h. Tajwid</td>
				<td><?= $nilai[7 ]["kkm"] ?></td>
				<td><?= $nilai[7]["k3"] ?></td>
				<td><?= $nilai[7]["predikat"] ?></td>
				<td><?= $nilai[7]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;i. Manhaj</td>
				<td><?= $nilai[8 ]["kkm"] ?></td>
				<td><?= $nilai[8]["k3"] ?></td>
				<td><?= $nilai[8]["predikat"] ?></td>
				<td><?= $nilai[8]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
				
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;j. Akhlak</td>
				<td><?= $nilai[9 ]["kkm"] ?></td>
				<td><?= $nilai[9 ]["k3"] ?></td>
				<td><?= $nilai[9]["predikat"] ?></td>
				<td><?= $nilai[9]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">Pendidikan Pancasila dan Kewarganegaraan</td>
				<td><?= $nilai[10 ]["kkm"] ?></td>
				<td><?= $nilai[10 ]["k3"] ?></td>
				<td><?= $nilai[10]["predikat"] ?></td>
				<td><?= $nilai[10]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">Bahasa Indonesia</td>
				<td><?= $nilai[11]["kkm"] ?></td>
				<td><?= $nilai[11]["k3"] ?></td>
				<td><?= $nilai[11]["predikat"] ?></td>
				<td><?= $nilai[11]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>4.</td>
				<td align="left">Bahasa Inggris</td>
				<td><?= $nilai[12]["kkm"] ?></td>
				<td><?= $nilai[12]["k3"] ?></td>
				<td><?= $nilai[12]["predikat"] ?></td>
				<td><?= $nilai[12]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>5.</td>
				<td align="left">Matematika</td>
				<td><?= $nilai[13]["kkm"] ?></td>	
				<td><?= $nilai[13]["k3"] ?></td>
				<td><?= $nilai[13]["predikat"] ?></td>
				<td><?= $nilai[13]["deskripsi_k3"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>6.</td>
				<td align="left">Sejarah Indonesia</td>
				<td><?= $nilai[14 ]["kkm"] ?></td>
				<td><?= $nilai[14]["k3"] ?></td>
				<td><?= $nilai[14]["predikat"] ?></td>
				<td><?= $nilai[14]["deskripsi_k3"] ?></td>

			</tr>
		
		</th></tr></table>
	

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>	
		<table border="2" style="width:800px; text-align: center;">
			<tr>
				<th rowspan="2">No.</td>
				<td rowspan="2" style="width: 300px; text-align: center;"><b>Mata Pelajaran</b></td>
				<td rowspan="2"><b>KKM</b></td>
				<td colspan="3"><b>Pengetahuan</b></td>
				
				
			</tr>
			<tr>
				<td><b>&nbsp;&nbsp;Nilai&nbsp;&nbsp;</b></td>
				<td><b>&nbsp;Predikat&nbsp;</b></td>
				<td style="width: 700px; text-align: center;"><b>Deskripsi</b></td>				
				
			</tr>
		
			<tr>
				<td colspan="6" align="left" style="padding-left: 10px;"><b>Kelompok B (Umum)</b></td>
			</tr>
			<tr>
				<td>1.</td>
				<td align="left">Seni Budaya</td>
				<td><?= $nilai[15]["kkm"] ?></td>
				<td><?= $nilai[15]["k3"] ?></td>
				<td><?= $nilai[15]["predikat"] ?></td>
				<td><?= $nilai[15]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
				<td><?= $nilai[16]["kkm"] ?></td>
				<td><?= $nilai[16]["k3"] ?></td>
				<td><?= $nilai[16]["predikat"] ?></td>
				<td><?= $nilai[16]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">Prakarya dan Kewirausahaan</td>
				<td><?= $nilai[17]["kkm"] ?></td>
				<td><?= $nilai[17]["k3"] ?></td>
				<td><?= $nilai[17]["predikat"] ?></td>
				<td><?= $nilai[17]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td>4.</td>
				<td align="left">IPS Terpadu</td>
				<td><?= $nilai[18]["kkm"] ?></td>
				<td><?= $nilai[18]["k3"] ?></td>
				<td><?= $nilai[18]["predikat"] ?></td>
				<td><?= $nilai[18]["deskripsi_k3"] ?></td>
			</tr><br>
			<tr>
				<td colspan="6" align="left" style="padding-left: 10px;"><b>Kelompok C (Peminatan)</b></td>
			</tr>
			<tr>
				<td>1.</td>
				<td align="left">Matematika</td>
				<td><?= $nilai[19]["kkm"] ?></td>
				<td><?= $nilai[19]["k3"] ?></td>
				<td><?= $nilai[19]["predikat"] ?></td>
				<td><?= $nilai[19]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">Biologi</td>
				<td><?= $nilai[20]["kkm"] ?></td>
				<td><?= $nilai[20]["k3"] ?></td>
				<td><?= $nilai[20]["predikat"] ?></td>
				<td><?= $nilai[20]["deskripsi_k3"] ?></td>s
			</tr>

			<tr>
				<td>3.</td>
				<td align="left">Fisika</td>
				<td><?= $nilai[21]["kkm"] ?></td>
				<td><?= $nilai[21]["k3"] ?></td>
				<td><?= $nilai[21]["predikat"] ?></td>
				<td><?= $nilai[21]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td>4.</td>
				<td align="left">Kimia</td>
				<td><?= $nilai[22]["kkm"] ?></td>
				<td><?= $nilai[22]["k3"] ?></td>
				<td><?= $nilai[22]["predikat"] ?></td>
				<td><?= $nilai[22]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td rowspan="7">5.</td>
				<td align="left">Bahasa Arab</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="left">&nbsp; a. Nahwu</td>
				<td><?= $nilai[23]["kkm"] ?></td>
				<td><?= $nilai[23]["k3"] ?></td>
				<td><?= $nilai[23]["predikat"] ?></td>
				<td><?= $nilai[23]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; b. Sharaf</td>
				<td><?= $nilai[25]["kkm"] ?></td>
				<td><?= $nilai[25]["k3"] ?></td>
				<td><?= $nilai[25]["predikat"] ?></td>
				<td><?= $nilai[25]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; c. Mudahatsah</td>
				<td><?= $nilai[26]["kkm"] ?></td>
				<td><?= $nilai[26]["k3"] ?></td>
				<td><?= $nilai[26]["predikat"] ?></td>
				<td><?= $nilai[26]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; d. Balaghah</td>
				<td><?= $nilai[27]["kkm"] ?></td>
				<td><?= $nilai[27]["k3"] ?></td>
				<td><?= $nilai[27]["predikat"] ?></td>
				<td><?= $nilai[27]["deskripsi_k3"] ?></td>
			</tr>
				<tr>
				<td align="left">&nbsp; e. Khat-Imlah</td>
				<td><?= $nilai[28]["kkm"] ?></td>
				<td><?= $nilai[28]["k3"] ?></td>
				<td><?= $nilai[28]["predikat"] ?></td>
				<td><?= $nilai[28]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; f. Muthola'ah</td>
				<td><?= $nilai[29]["kkm"] ?></td>
				<td><?= $nilai[29]["k3"] ?></td>
				<td><?= $nilai[29]["predikat"] ?></td>
				<td><?= $nilai[29]["deskripsi_k3"] ?></td>
			</tr>
			<tr>
				<td colspan="6" align="left" style="padding-left: 10px;"><b>Kelompok D (Keunggulan Sekolah)</b></td>
			</tr>
			<tr>
				<td>1</td>
				<td align="left">Tahfiz</td>
				<td><?= $nilai[30]["kkm"] ?></td>
				<td><?= $nilai[30]["k3"] ?></td>
				<td><?= $nilai[30]["predikat"] ?></td>
				<td><?= $nilai[30]["deskripsi_k3"] ?></td>
			</tr>
		<!-- 	<tr>
				<td rowspan="3">2</td>
				<td align="left">Lainnya</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="padding-left: 10px; text-align: left;">a. </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td  style="padding-left: 10px; text-align: left;">b. </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr> -->
			
		</table>


		<!-- <baru> -->

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div style="margin-top: 300px;">
<div class="container" style="border-width: 1px;">
	<div class="row">
		<div class="container" style="border-width: 2px; border-color:#d6d6c2; margin-left: 0px; margin-right: 20px; ">
			<div class="row">
				<div style="margin-left: 0px; padding: 10px 10px 10px 10px; margin-top: 30px;">
					<table style="width: 370px;">
						<tr>
							<td><b>Nama Sekolah</b></td>
							<td>:</td>
							<td> SMA ISLAM ULUN NUHA</td>
						</tr>
						<tr>
							<td><b>Nama Siswa</b></td>
							<td>:</td>
							<td> <?= $siswa->nama ?></td>
						</tr>
						<tr>
							<td><b>NIS/NISN</b></td>
							<td>:</td>
							<td> <?= $siswa->nis ?>/<?= $siswa->nisn ?></td>
						</tr>
					</table>
				</div>
				<div style="margin-left: 100px;  padding: 10px 10px 10px 10px; margin-top: 30px;" >
					<table style="width: 370px;">
						<tr>
							<td><b>Kelas</b></td>
							<td>:</td>
							<td> <?= $siswa->kelas ?></td>
						</tr>
						<tr>
							<td><b>Penilaian</b></td>
							<td>:</td>
							<td> UAS</td>
						</tr>
						<tr>
							<td><b>Tahun Pelajaran</b></td>
							<td>:</td>
							<td> <?= $thn->tahun_akademik ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- batas box -->
	<!-- INI ADALAH HASIL PAGE SETELAH TOMBOL CARI DIKLIK-->
	<!-- Ini adalah hasil raport Jurusan IPA -->
	<div style="margin-top: 20px;">
		<h5 style="color: #2F669F;"><b>Keterampilan</b></h5>
		<table border="2" style="width:800px; text-align: center;">
			<tr>
				<th rowspan="2">No.</td>
				<td rowspan="2" style="width: 400px; text-align: center;"><b>Mata Pelajaran</b></td>
				<td rowspan="2"><b>KKM</b></td>
				<td colspan="3"><b>Keterampilan</b></td>
				
				
			</tr>
			<tr>
				<td><b>&nbsp;&nbsp;Nilai&nbsp;&nbsp;</b></td>
				<td><b>&nbsp;Predikat&nbsp;</b></td>
				<td style="width: 700px; text-align: center;"><b>Deskripsi</b></td>				
				
			</tr>
			<tr>
					<td colspan="6	" align="left" style="padding-left: 10px;"><b>Kelompok A (Umum)</b></td>
			</tr>
			<tr>
				<td rowspan="11">1.</td>
				<td align="left"> &nbsp;Pengetahuan Agama Islam</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="left">&nbsp; a. Fiqih</td>
				<td><?= $nilai[0 ]["kkm"] ?></td>
				<td><?= $nilai[0]["k4"] ?></td>
				<td><?= $nilai[0]["predikat"] ?></td>
				<td><?= $nilai[0]["deskripsi_k4"] ?></td>
				<?php // echo print_r($nilai) ?>
			</tr>
			<tr>
				<td align="left">&nbsp;&nbsp;b. Hadist</td>
				<td><?= $nilai[1 ]["kkm"] ?></td>
				<td><?= $nilai[1]["k4"] ?></td>
				<td><?= $nilai[1]["predikat"] ?></td>
				<td><?= $nilai[1]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td  align="left">&nbsp;&nbsp;c. Tafsir</td>
				<td><?= $nilai[2 ]["kkm"] ?></td>
				<td><?= $nilai[2 ]["k4"] ?></td>
				<td><?= $nilai[2]["predikat"] ?></td>
				<td><?= $nilai[2]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td  align="left">&nbsp;&nbsp;d. Ushul Fiqih</td>
				<td><?= $nilai[3 ]["kkm"] ?></td>
				<td><?= $nilai[3]["k4"] ?></td>
				<td><?= $nilai[3]["predikat"] ?></td>
				<td><?= $nilai[3]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->

			</tr>
			<tr>
				<td align="left">&nbsp;&nbsp;e. Aqidah</td>
				<td><?= $nilai[4 ]["kkm"] ?></td>
				<td><?= $nilai[4 ]["k4"] ?></td>
				<td><?= $nilai[4]["predikat"] ?></td>
				<td><?= $nilai[4]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td align="left">&nbsp;&nbsp;f. Musthalah Hadist</td>
				<td><?= $nilai[5 ]["kkm"] ?></td>
				<td><?= $nilai[5]["k4"] ?></td>
				<td><?= $nilai[5]["predikat"] ?></td>
				<td><?= $nilai[5]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;g. Ushul Tafsir</td>
				<td><?= $nilai[6 ]["kkm"] ?></td>
				<td><?= $nilai[6]["k4"] ?></td>
				<td><?= $nilai[6]["predikat"] ?></td>
				<td><?= $nilai[6]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
				
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;h. Tajwid</td>
				<td><?= $nilai[7 ]["kkm"] ?></td>
				<td><?= $nilai[7]["k4"] ?></td>
				<td><?= $nilai[7]["predikat"] ?></td>
				<td><?= $nilai[7]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;i. Manhaj</td>
				<td><?= $nilai[8 ]["kkm"] ?></td>
				<td><?= $nilai[8]["k4"] ?></td>
				<td><?= $nilai[8]["predikat"] ?></td>
				<td><?= $nilai[8]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
				
			</tr>

			<tr>
				<td align="left">&nbsp;&nbsp;j. Akhlak</td>
				<td><?= $nilai[9 ]["kkm"] ?></td>
				<td><?= $nilai[9 ]["k4"] ?></td>
				<td><?= $nilai[9]["predikat"] ?></td>
				<td><?= $nilai[9]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">Pendidikan Pancasila dan Kewarganegaraan</td>
				<td><?= $nilai[10 ]["kkm"] ?></td>
				<td><?= $nilai[10 ]["k4"] ?></td>
				<td><?= $nilai[10]["predikat"] ?></td>
				<td><?= $nilai[10]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">Bahasa Indonesia</td>
				<td><?= $nilai[11]["kkm"] ?></td>
				<td><?= $nilai[11]["k4"] ?></td>
				<td><?= $nilai[11]["predikat"] ?></td>
				<td><?= $nilai[11]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>4.</td>
				<td align="left">Bahasa Inggris</td>
				<td><?= $nilai[12]["kkm"] ?></td>
				<td><?= $nilai[12]["k4"] ?></td>
				<td><?= $nilai[12]["predikat"] ?></td>
				<td><?= $nilai[12]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>5.</td>
				<td align="left">Matematika</td>
				<td><?= $nilai[13]["kkm"] ?></td>	
				<td><?= $nilai[13]["k4"] ?></td>
				<td><?= $nilai[13]["predikat"] ?></td>
				<td><?= $nilai[13]["deskripsi_k4"] ?></td>
				<!-- <?php echo print_r($nilai) ?> -->
			</tr>
			<tr>
				<td>6.</td>
				<td align="left">Sejarah Indonesia</td>
				<td><?= $nilai[14 ]["kkm"] ?></td>
				<td><?= $nilai[14]["k4"] ?></td>
				<td><?= $nilai[14]["predikat"] ?></td>
				<td><?= $nilai[14]["deskripsi_k4"] ?></td>

			</tr>
		
			<tr>
				<td colspan="6" align="left" style="padding-left: 10px;"><b>Kelompok B (Umum)</b></td>
			</tr>
			<tr>
				<td>1.</td>
				<td align="left">Seni Budaya</td>
				<td><?= $nilai[15]["kkm"] ?></td>
				<td><?= $nilai[15]["k4"] ?></td>
				<td><?= $nilai[15]["predikat"] ?></td>
				<td><?= $nilai[15]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
				<td><?= $nilai[16]["kkm"] ?></td>
				<td><?= $nilai[16]["k4"] ?></td>
				<td><?= $nilai[16]["predikat"] ?></td>
				<td><?= $nilai[16]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">Prakarya dan Kewirausahaan</td>
				<td><?= $nilai[17]["kkm"] ?></td>
				<td><?= $nilai[17]["k4"] ?></td>
				<td><?= $nilai[17]["predikat"] ?></td>
				<td><?= $nilai[17]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td>4.</td>
				<td align="left">IPS Terpadu</td>
				<td><?= $nilai[18]["kkm"] ?></td>
				<td><?= $nilai[18]["k4"] ?></td>
				<td><?= $nilai[18]["predikat"] ?></td>
				<td><?= $nilai[18]["deskripsi_k4"] ?></td>
			</tr></th></tr></table>

			<br><br><br><br><br><br><br><br><br>	
		<table border="2" style="width:800px; text-align: center;">
			<tr>
				<th rowspan="2">No.</td>
				<td rowspan="2" style="width: 300px; text-align: center;"><b>Mata Pelajaran</b></td>
				<td rowspan="2"><b>KKM</b></td>
				<td colspan="3"><b>Keterampilan</b></td>
				
			</tr>
			<tr>
				<td><b>&nbsp;&nbsp;Nilai&nbsp;&nbsp;</b></td>
				<td><b>&nbsp;Predikat&nbsp;</b></td>
				<td style="width: 700px; text-align: center;"><b>Deskripsi</b></td>				
				
			</tr>
		
			<tr>
				<td colspan="6" align="left" style="padding-left: 10px;"><b>Kelompok C (Peminatan)</b></td>
			</tr>
			<tr>
				<td>1.</td>
				<td align="left">Matematika</td>
				<td><?= $nilai[19]["kkm"] ?></td>
				<td><?= $nilai[19]["k4"] ?></td>
				<td><?= $nilai[19]["predikat"] ?></td>
				<td><?= $nilai[19]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">Biologi</td>
				<td><?= $nilai[20]["kkm"] ?></td>
				<td><?= $nilai[20]["k4"] ?></td>
				<td><?= $nilai[20]["predikat"] ?></td>
				<td><?= $nilai[20]["deskripsi_k4"] ?></td>s
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">Fisika</td>
				<td><?= $nilai[21]["kkm"] ?></td>
				<td><?= $nilai[21]["k4"] ?></td>
				<td><?= $nilai[21]["predikat"] ?></td>
				<td><?= $nilai[21]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td>4.</td>
				<td align="left">Kimia</td>
				<td><?= $nilai[22]["kkm"] ?></td>
				<td><?= $nilai[22]["k4"] ?></td>
				<td><?= $nilai[22]["predikat"] ?></td>
				<td><?= $nilai[22]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td rowspan="7">5.</td>
				<td align="left">Bahasa Arab</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="left">&nbsp; a. Nahwu</td>
				<td><?= $nilai[23]["kkm"] ?></td>
				<td><?= $nilai[23]["k4"] ?></td>
				<td><?= $nilai[23]["predikat"] ?></td>
				<td><?= $nilai[23]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; b. Sharaf</td>
				<td><?= $nilai[24]["kkm"] ?></td>
				<td><?= $nilai[24]["k4"] ?></td>
				<td><?= $nilai[24]["predikat"] ?></td>
				<td><?= $nilai[24]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; c. Mudahatsah</td>
				<td><?= $nilai[25]["kkm"] ?></td>
				<td><?= $nilai[25]["k4"] ?></td>
				<td><?= $nilai[25]["predikat"] ?></td>
				<td><?= $nilai[25]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; d. Balaghah</td>
				<td><?= $nilai[26]["kkm"] ?></td>
				<td><?= $nilai[26]["k4"] ?></td>
				<td><?= $nilai[26]["predikat"] ?></td>
				<td><?= $nilai[26]["deskripsi_k4"] ?></td>
			</tr>
				<tr>
				<td align="left">&nbsp; e. Khat-Imlah</td>
				<td><?= $nilai[27]["kkm"] ?></td>
				<td><?= $nilai[27]["k4"] ?></td>
				<td><?= $nilai[27]["predikat"] ?></td>
				<td><?= $nilai[27]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td align="left">&nbsp; f. Muthola'ah</td>
				<td><?= $nilai[28]["kkm"] ?></td>
				<td><?= $nilai[28]["k4"] ?></td>
				<td><?= $nilai[28]["predikat"] ?></td>
				<td><?= $nilai[28]["deskripsi_k4"] ?></td>
			</tr>
			<tr>
				<td colspan="6" align="left" style="padding-left: 10px;"><b>Kelompok D (Keunggulan Sekolah)</b></td>
			</tr>
			<tr>
				<td>1</td>
				<td align="left">Tahfiz</td>
				<td><?= $nilai[29]["kkm"] ?></td>
				<td><?= $nilai[29]["k4"] ?></td>
				<td><?= $nilai[29]["predikat"] ?></td>
				<td><?= $nilai[29]["deskripsi_k4"] ?></td>
			</tr>
		<!-- 	<tr>
				<td rowspan="3">2</td>
				<td align="left">Lainnya</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="padding-left: 10px; text-align: left;">a. </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td  style="padding-left: 10px; text-align: left;">b. </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr> -->
			
		</table>


			
</th></tr></table></div>
<div style="margin-top: 50px"></div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="container" style="border-width: 1px;">
	<div class="row">
		<div class="container" style="border-width: 2px; border-color:#d6d6c2; margin-left: 0px; margin-right: 20px; ">
			<div class="row">
				<div style="margin-left: 0px; padding: 10px 10px 10px 10px;">
					<table style="width: 300px;">
						<tr>
							<td><b>Nama Sekolah</b></td>
							<td>:</td>
							<td> NAMA SEKOLAH</td>
						</tr>
						<tr>
							<td><b>Nama Siswa</b></td>
							<td>:</td>
							<td> NAMA SISWA</td>
						</tr>
						<tr>
							<td><b>NIS/NISN</b></td>
							<td>:</td>
							<td> NIS SISWA</td>
						</tr>
					</table>
				</div>
				<div style="margin-left: 100px;  padding: 10px 10px 10px 10px;">
					<table style="width: 300px;">
						<tr>
							<td><b>Kelas</b></td>
							<td>:</td>
							<td> KELAS</td>
						</tr>
						<tr>
							<td><b>Penilaian</b></td>
							<td>:</td>
							<td> UAS</td>
						</tr>
						<tr>
							<td><b>Tahun Pelajaran</b></td>
							<td>:</td>
							<td> TAHUN PELAJARAN</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- batas box -->
	<!-- INI ADALAH HASIL PAGE SETELAH TOMBOL CARI DIKLIK-->
	<!-- Ini adalah hasil raport Jurusan IPA -->
	<div style="margin-top: 30px;">
		<h5 style="color: #2F669F;"><b>Ekstrakulikuler </b></h5>

		<table border="2" style="width:700px; text-align: center;">
			<tr>
				<th rowspan="2">No.</td>
				<td rowspan="2" style="width: 300px; text-align: center;"><b>Kegiatan</b></td>
			</tr>
			<tr>
				<td><b>Nilai</b></td>
				<td style="width: 500px; text-align: center;"><b>Deskripsi</b></td>			
			</tr>
			<tr>
				<td rowspan="1">1.</td>
				<td align="left"> &nbsp;TATA BOGA</td>
				<td>
					<?php if (isset($ekskul[0])): ?>
						<?php echo $ekskul[0]["nilai_ex"] ?>
					<?php endif; ?>
				</td>
				<td>
					<?php if (isset($ekskul[0])): ?>
						<?php echo $ekskul[0]["deskripsi_ex"] ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">&nbsp;RENANG</td>
				<td></td>
				<td></td>
				
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">&nbsp;ARABIC CLUB</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>4.</td>
				<td align="left">&nbsp;TAKLIM</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>5.</td>
				<td align="left">&nbsp;JURNALISTIK</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>6.</td>
				<td align="left">&nbsp;SAINS CLUB</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>7.</td>
				<td align="left">&nbsp;BELA DIRI</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>8.</td>
				<td align="left">&nbsp;FUTSAL</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>9.</td>
				<td align="left">&nbsp;PRAMUKA</td>
				<td></td>
				<td></td>
			</tr>


		</th></tr></table>
</div>
<div style="margin-top: 30px;">
		<h5 style="color: #2F669F;"><b>Prestasi </b></h5>

		<table border="2" style="width:700px; text-align: center;">
			<tr>
				<th rowspan="2">No.</td>
				<td rowspan="2" style="width: 300px; text-align: center;"><b>Kegiatan</b></td>
			</tr>
			<tr>
			
				<td style="width: 500px; text-align: center;"><b>Deskripsi</b></td>			
			</tr>
			<tr>
				<td rowspan="1">1.</td>
				<td align="left"> &nbsp;Ekstrakulikuler</td>
				<td>
					<?php if(isset($prestasi)): ?>
						<?= $prestasi->ekskul ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">&nbsp;Keikutsertaan dalam Organisasi / Kegiatan</td>
				<td>
					<?php if(isset($prestasi)): ?>
						<?= $prestasi->ikut_serta ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">&nbsp;Catatan Khusus Lainnya</td>
				<td>
					<?php if(isset($prestasi)): ?>
						<?= $prestasi->catatan_khusus ?>
					<?php endif; ?>
				</td>
			</tr>
			</th>
			</tr>
			</table>	
</div>
<br><br>
<div style="margin-top: 250px;">
		<h5 style="color: #2F669F;"><b>Ketidakhadiran</b></h5>

		<table border="2" style="width:700px; text-align: center;">
			<tr>
				<th rowspan="2">No.</td>
				<td rowspan="2" style="width: 300px; text-align: center;"><b>Alasan Tidak Hadir</b></td>
			</tr>
			<tr>
			
				<td style="width: 500px; text-align: center;"><b>Jumlah</b></td>			
			</tr>
			<tr>
				<td rowspan="1">1.</td>
				<td align="left"> &nbsp;Sakit</td>
				<td>
					<?php if(isset($absen)): ?>
						<?= $absen->sakit ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>2.</td>
				<td align="left">&nbsp;Izin</td>
				<td>
					<?php if(isset($absen)): ?>
						<?= $absen->izin ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>3.</td>
				<td align="left">&nbsp;Tanpa Keterangan</td>
				<td>
					<?php if(isset($absen)): ?>
						<?= $absen->alpha ?>
					<?php endif; ?>
				</td>
			</tr>
			</th>
			</tr>
			</table>
</div>
<div style="margin-top: 30px;">
		<h5 style="color: #2F669F;"><b>Catatan Wali Kelas</b></h5>

		<table border="2" style="width:700px; text-align: center;">
			<tr>
				<td rowspan="2" style="width: 300px; text-align: center; ">
					<br>
					<?php if(isset($catatanWk)): ?>
						<?= $catatanWk->keterangan ?>	
					<?php endif; ?>
					<br>
					<br>
				</td>
			</tr>
		</table>
		</div>

<div style="margin-top: 30px;">
		<h5 style="color: #2F669F;"><b>Tanggapan Orang tua/Wali</b></h5>

		<table border="2" style="width:700px; text-align: center;">
			<tr>
				
				<td rowspan="2" style="width: 300px; text-align: center;"><br><br><br><br></td>
			</tr>
		</table>
		</div>


<div class="container" style="border-width: 1px;">
	<div class="row">
		<div class="container" style="border-width: 2px; border-color:#d6d6c2; margin-left: 0px; margin-right: 20px; ">
			<div class="row">
				<div style="margin-left: 0px; padding: 10px 10px 10px 10px; margin-top: 30px;">
					<table style="width: 300px;">
						<tr>
							<td><b>Diberikan DI</b></td>
							<td>:</td>
							<td> <b>Medan</b></td>
						</tr>
						<tr>
							<td><b>Tanggal </b></td>
							<td>:</td>
							<td><b> 22 DESEMBER 2018 </b></td>
						</tr>

					</table>
<br>
<br>
<br>
				<table style="width: 0px;">
						<tr>
							<td><b>Orang Tua / Wali Peserta Didik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wali Kelas</b></td>
							<td></td>
							<td></td>
						</tr>

				</table>
	
				<br>
				<br>
				<br>
				<br>
				
				<span>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Winda Novia Sari, S.Pd</b></span>
				<br>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 70px;"></div>
		</body>
</html>