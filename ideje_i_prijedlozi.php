<?php
set_include_path('C:\xampp\htdocs\smart-social-medicinar-test\test1\PHPMailer-master');
require 'PHPMailerAutoload.php';

	if (isset($_GET['do'])) {
		switch ($_GET['do'])
		 {
		 case "send":

			  $fname = $_POST['fname'];
			  $femail = $_POST['femail'];
			  $fsendmail = $_POST['fsendmail'];

			if (!preg_match("/\S+/",$fname))
			{
			  unset($_GET['do']);
			  $message = "Molimo unesite ime!";
			  break;
			}
			if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$femail))
			{
			  unset($_GET['do']);
			  $message = "Molimo unesite Email adresu!";
			  break;
			}
		   
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			// $mail->Username = "testictestan@gmail.com";
			// $mail->Password = "ovojesifra14*";
			$mail->Username = "medicinar.mef@gmail.com";
			$mail->Password = "m3dicinar5";
			$mail->SetFrom($femail);
			$mail->Subject = "[Medicinar] Komentar od - ".$fname;
			$mail->Body = "Komentar: <br/><br/>".$fsendmail;
			// $mail->AddAddress("testictestan@gmail.com");
			$mail->AddAddress("medicinar.mef@gmail.com");
			 if(!$mail->Send())
				{
				// echo "Mailer Error: " . $mail->ErrorInfo;
				$message = "Greska prilikom slanja! Molimo, pokusajte malo kasnije.";
				}
				else
				{
				$message = "Poruka uspjesno poslana!";
				}
		
			unset($_GET['do']);
			   
			break;
		 
		 default: break;
		 }
	 }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport"    content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Medicinar">
        <meta name="author"      content="MEF Zagreb">

        <title>Ideje i prijedlozi</title>

        <link rel="shortcut icon" href="assets/images/icon-ss.png">

        <!-- Bootstrap -->
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Icons -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
        <!-- Custom styles -->
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="assets/js/template.js"></script>
        
        <style>
            .imgLogo{
                max-width: 130px;
            }
        </style>
    </head>
    <body class="home_cover2">

        <header id="header">
            <div id="head" class="parallax" parallax-speed="2">
                <h1 id="logo" class="text-center">
                    </p>
                </h1>
            </div>

            <nav class="navbar navbar-default navbar-sticky">
                <div class="container-fluid">

                    <div class="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="o_casopisu.html">O ČASOPISU</a></li>
                             
                            <li><a href="urednistvo.html">UREDNIŠTVO</a></li>
                            <li><a href="upute_za_pisanje.html">UPUTE ZA PISANJE</a></li>
							<li><a href="arhiva.html">ARHIVA</a></li>
                            <li class="active"><a href="ideje_i_prijedlozi.php">IDEJE I PRIJEDLOZI</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->			
                </div>	
            </nav>
        </header>
		
    <main id="main">
        <div class="container">
			<div class="row">
				
				<div class="col-sm-8 col-sm-push-2 text-center" id="respond">
					<h3 id="reply-title">Javite nam se...</h3>
					<br/>
					<form action="ideje_i_prijedlozi.php?do=send" method="POST" id="commentform" class="text-left">
						<div class="form-group">
							<label for="inputName">Ime i prezime</label>
							<input type="text" class="form-control" id="inputName" placeholder="Unesite ime i prezime" name="fname" >
						</div>
						<div class="form-group">
							<label for="inputEmail">Email adresa</label>
							<input type="email" class="form-control" id="inputEmail" placeholder="Unesite email adresu" name="femail" >
						</div>
						<div class="form-group">
							<label for="inputComment">Ideje i prijedlozi</label>
							<textarea name="fsendmail" class="form-control" rows="9"></textarea>
						</div>
						<div class="row">
							<div class="col-xs-8 text-left">
								<?php
									if (isset($message)) echo '<p style="color:red;">'.$message.'</p>';
								?>
							</div>
							<div class="col-xs-4 text-right">
								<button type="submit" class="btn btn-action">Submit</button>
							</div>
						</div>
					</form>
				</div> <!-- /respond -->
				
			</div>
        </div>	<!-- /container -->

    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9 widget">
                    <h3 class="widget-title">Kontakt</h3>
                    <div class="widget-body">
                        <p>
							<a href="mailto:medicinar@mef.hr">medicinar@mef.hr</a><br>
                            Medicinski fakultet Sveučilišta u Zagrebu<br><br>
                            <strong>Adresa:</strong> <br>Šalata 3<br> 10000 Zagreb<br> Hrvatska
                        </p>	
                    </div>
                </div>

                <div class="col-md-3 widget">
                    <h3 class="widget-title">Follow us</h3>
                    <div class="widget-body">
                        <p class="follow-me-icons">
                            <a href="https://www.facebook.com/Medicinar" target="_blank"><i class="fa fa-facebook-square fa-2"></i></a>
                        </p>
                    </div>
                </div>


            </div> <!-- /row of widgets -->
        </div>
    </footer>

    <footer id="underfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 widget col-md-offset-6">
                    <div class="widget-body">
                        <p class="text-right">
                            2014 &copy; Medicinski fakultet Sveučilišta u Zagrebu. Sva prava pridržana. Logotip Medicinara je registrirani zaštitni znak u Republici Hrvatskoj.<br>
							Website by <a href="https://www.facebook.com/vanja.smailovic">Vanja Smailović</a>.
						</p>
                    </div>
                </div>
            </div> <!-- /row of widgets -->
        </div>
    </footer>

</body>
</html>
