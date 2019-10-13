<!DOCTYPE html>
<html>
    <head>
        <title>Website Informasi</title>
        <link rel="icon" href="logo.png" sizes="16x16">
        <link rel="STYLESHEET"type="text/css"HREF="efekcss.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <script language="javascript">
        function Kirim()
        {
            var yakin = confirm("Apakah Kamu Yakin Memesan?");
        }
    </script>
    </head>
    <body>
        <div class="header1">   
            <div class="dropdown">
                <button class="dropbtn"><a class="tombol" href="index.html">Home</a>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a class="tombol" href="#">Bantuan</a>
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
                <h3 align="center">Bantuan</h3>
                <FORM action= # method= POST>
                    <pre><hr>
                    <form method="POST"><b>
Nama          : <input type="text" size="22" maxlength="70" name="Name" placeholder="Nama Anda"><br>
Alamat        : <input type="text" size="22" maxlength="70" name="Alamat" placeholder="Alamat Anda"><br>
Email         : <input type="text" size="22" maxlength="70" name="Email" placeholder="Email Anda"><br>
Complain      : <input type="text" size="22" maxlength="1000" name="Complain" placeholder="Complain Anda"><br>
<input type="submit" value="Kirim" onclick="Kirim()"><input type="submit" value="Reset"></pre>
                    </form>
                </form>

                <?php
	                if($_SERVER['REQUEST_METHOD'] == "POST")
                	{
                        if(isset($_POST['Name']) && isset($_POST['Alamat']) && isset($_POST['Email']) && isset($_POST['Complain']))
                        {
                            echo '<pre><b>';
                            echo "<br>Nama          : ";
                            echo $_POST['Name'];
                            echo "<br>Alamat        : ";
                            echo $_POST['Alamat'];
                            echo "<br>Email         : ";
                            echo $_POST['Email'];
                            echo "<br>Complain      : ";
                            echo $_POST['Complain'];
                            echo '</pre></b>';

                            $Nama = $_POST['Name'];
                            $Alamat = $_POST['Alamat'];
                            $Email = $_POST['Email'];
                            $Complain = $_POST['Complain'];

                            $serverName = "localhost";
                            $username = "root";
                            $password = "";
                            $databaseName = "formulir1";
                            $conn = mysqli_connect($serverName, $username, $password, $databaseName);
                            if(mysqli_connect_error())
                            {
                                echo '<b>';
                                echo "<p>There is an error occurred during the database connection.</p>";
                                echo "<p>Please try again after some time</p>";
                                echo "<p>Exiting....</p>";
                                echo '</b>';
                                exit();
                            }
    
                            $tableName = "bantuan";
                            $sqlQuery  = "insert into $tableName(Nama, Alamat, Email, Complain) 
                            VALUES ('$Nama','$Alamat','$Email','$Complain')";
                            $retRes = $conn->query($sqlQuery);
                            if($retRes)
                            {
                                echo '<b>';
                                echo "<p>Data successfully inserted into the table.</p>";
                                echo '</b>';
                            }
                            else 
                            {
                                echo '<b>';
                                echo "<p>Some error occurred during inserting the data into the table...exiting...</p>";
                                echo '</b>';
                                exit();
                            }
                        }
                    }
                ?>
            </div>	
        </div>
        <div class="footer">
            <center>
                <b>Dokza Equaristo</b><br>
            </center>
        </div>
    </body>
</html>