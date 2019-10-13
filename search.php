<!DOCTYPE html>
<html>
    <head>
        <title>Website Informasi</title>
        <link rel="icon" href="logo.png" sizes="16x16">
        <link rel="STYLESHEET"type="text/css"HREF="efekcss.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="header1">   
            <div class="dropdown">
                <button class="dropbtn"><a class="tombol" href="index.html">Home</a>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a class="tombol" href="bantuan.php">Bantuan</a>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Tentang Saya
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a class="tombol" href="pendidikan.html">Pendidikan</a>
                    <a class="tombol" href="kontak.html">Kontak</a>
                </div>
            </div>
        </div><br><br><br>
        <header>
            <h1 class="judul">WEB INFORMASI PRIBADI</h1>
        </header>
        <div class="isi">
            <div class="bghd">
                <header>
                    <center><font color="white">
                        <br><br>
                        <p><div class="img"></div></p>
                            <br><font color="black" size="5"><b>Dokza Equaristo</b></font><br><br>
                            <div class="from">
                                <form action="search.php" method="post">
                                    <input type="text" name="search"/>
                                    <input type="Submit" value="Cari"> 
                                </form>
                            </div>
                            <br>
                        </font>
                    </center>
                </header>
            </div>
        </div><br>
        <div class="isi">
            <div class="kiri">
				<h3 align="center">Artikel</h3>
				<ul>
					<li><a href="pemrograman.html">Pemrograman</a></li>
					<li><a href="desain.html">Desain</a></li>
					<li><a href="sk.html">Sistem Komputer</a></li>
				</ul>
			</div>
			<div class="kanan">
                <div style="text-align: right">
                    <span id="hari"></span>
                    <script language="javascript">
                        timer();
                        function timer(){
                            var nama = new Date();
                            var thn = nama.getFullYear();
                            var bln = nama.getMonth();
                            var hr = nama.getDay();
                            var tgl = nama.getDate();
                            var namahr = new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
                            var namabln = new Array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                            var tanggal = new Date();
                            var jm = tanggal.getHours();
                            var m = tanggal.getMinutes();
                            var s = tanggal.getSeconds();
                            if (m < 10){
                                m = "0" + m
                            }
                            if (s < 10){
                                s = "0" + s
                            }
                            document.getElementById('hari').innerHTML = namahr[hr]+", "+tgl+" "+namabln[bln]+" "+thn+ " "+ jm + ":" + m + ":" + s + " ";
                            setTimeout(timer,1000);
                        }
                    </script>
                </div>
                <center>
                <?php 
                    $serverName = "localhost";
                    $username = "root";
                    $password = "";
                    $databaseName = "formulir1";
                    $conn = mysqli_connect($serverName, $username, $password, $databaseName);
                    $get=$_POST['search'];
                    if(isset($get)){
                        $show = "select * from formulir1 where Nama like '%".$get."%'";	
                        /*$show="SELECT * FROM formulir1 where Nama LIKE '%{$get}'";*/
                        $result = mysqli_query($conn,$show);
                        if($rows=mysqli_fetch_assoc($result)){
                            echo "<br>Data Ditemukan<br><br>";
                            echo " NIS ";
                            echo $rows['NIS'];
                            echo ",";
                            echo " Atas Nama ";
                            echo $rows['Nama'];
                            echo ",";
                            echo " Beralamat di ";
                            echo $rows['Alamat'];
                            echo ",";
                            echo " Memeluk Agama ";
                            echo $rows['Agama'];
                            echo ",";
                            echo " Berjenis Kelamin ";
                            echo $rows['Jenis_Kelamin'];
                            echo ",";
                            echo " Mengambil Jurusan ";
                            echo $rows['Jurusan'];
                            echo ",";
                            echo " di Kelas ";
                            echo $rows['Kelas'];
                            echo ",";
                            echo " Lahir di ";
                            echo $rows['Tempat'];
                            echo ",";
                            echo " Tanggal ";
                            echo $rows['Tanggal_Lahir'];
                            echo "<br><br>";
                        }   
                        else{
                            exit('Data Tidak Ditemukan');
                        }   
                    }
                    else{
                        echo "Query SQL Salah";
                    }    
                ?>
            </center>
        </div>
        <div class="footer">
            <center>
                <b>Dokza Equaristo</b><br>
            </center>
        </div>
    </body>
</html>