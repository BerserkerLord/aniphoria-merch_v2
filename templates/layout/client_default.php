<?php
/**
 *
 * @var \App\View\AppView $this
 */
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Página de ventas de mercancía de AniPhoria">

	<!-- title -->
	<title>AniPhoria - <?php echo $_COOKIE['whereami'] ?? 'Inicio' ?></title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="/webroot/img/clientes/dollier.jpg">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
    <?= $this->Html->css('/template_assets/css/all.min.css')?>
	<!-- bootstrap -->
    <?= $this->Html->css('/template_assets/bootstrap/css/bootstrap.css')?>
	<!-- owl carousel -->
    <?= $this->Html->css('/template_assets/css/owl.carousel.css')?>
	<!-- magnific popup -->
    <?= $this->Html->css('/template_assets/css/magnific-popup.css')?>
	<!-- animate css -->
    <?= $this->Html->css('/template_assets/css/animate.css')?>
	<!-- mean menu css -->
    <?= $this->Html->css('/template_assets/css/meanmenu.min.css')?>
	<!-- main style -->
    <?= $this->Html->css('/template_assets/css/main.css')?>
	<!-- responsive -->
    <?= $this->Html->css('/template_assets/css/responsive.css')?>
    <?= $this -> Html -> css('/css/cake.css') ?>
    <?= $this -> Html -> css('/css/bootstrap.min.css') ?>
    <?= $this -> Html -> css('/css/milligram.min.css') ?>
    <?= $this->Html->css('/css/normalize.css')?>

    <?= $this -> fetch('meta') ?>
    <?= $this -> fetch('css') ?>
    <?= $this -> fetch('script') ?>

</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner" style="padding-right: 15rem; padding-bottom: 7rem">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
                                <li>
                                    <?= $this -> Html -> link('Inicio', ['_name' => 'index'], ['escape' => false, 'class' => 'e']) ?>
                                </li>
                                <li>
                                    <?= $this -> Html -> link('Acerca De', ['_name' => 'about'], ['escape' => false, 'class' => 'e']) ?>
                                </li>
                                <li>
                                    <?= $this -> Html -> link('Productos', ['_name' => 'viewMerchandisingClient'], ['escape' => false, 'class' => 'e']) ?>
                                </li>
                                <li>
                                    <?= $this -> Html -> link('Contacto', ['_name' => 'contact'], ['escape' => false, 'class' => 'e']) ?>
                                </li>
								<li>
									<div class="header-icons">
										<?= $this -> Html -> link('<i class="fas fa-shopping-cart"></i>', ['_name' => 'shoppingCart'], ['escape' => false])?>
                                        <?php
                                            if(!$_SESSION['e'])
                                               echo $this -> Html ->link('<i class="fas fa-sign-in-alt"></i>', ['_name' => 'loginClient'], ['escape' => false]);
                                            else
                                               echo $this -> Html ->link('<i class="fas fa-sign-out-alt"></i>', ['_name' => 'logoutClient'], ['escape' => false]);
                                        ?>
									</div>
								</li>
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center container-fluid justify-content-center" style="padding-right: 8rem">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle"><?php echo($_COOKIE['whereami'] ?? 'Mercancía'); ?></p>
                            <h1>AniPhoria</h1>
                            <?= setcookie('whereami','', -1) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid justify-content-center">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>


	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Sobre Nosotros</h2>
						<p>La verdad solo somos unos sujetos haciendo un proyecto de tópicos web.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Contáctanos</h2>
						<ul>
							<li>Celaya, Gto. MEX</li>
							<li>soporte@aniphoria.com</li>
							<li>+52 663 067 1333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Páginas</h2>
						<ul>
                            <li>
                                <?= $this -> Html -> link('Inicio', ['_name' => 'index'], ['escape' => false, 'class' => 'e']) ?>
                            </li>
                            <li>
                                <?= $this -> Html -> link('Acerca De', ['_name' => 'about'], ['escape' => false, 'class' => 'e']) ?>
                            </li>
                            <li>
                                <?= $this -> Html -> link('Productos', ['_name' => 'viewMerchandisingClient'], ['escape' => false, 'class' => 'e']) ?>
                            </li>
                            <li>
                                <?= $this -> Html -> link('Contacto', ['_name' => 'contact'], ['escape' => false, 'class' => 'e']) ?>
                            </li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="#">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 justify-content-center" style="text-align: center">
					<p>Copyrights &copy; 2021 - <a href="https://cat-bounce.com/">AniPhoria</a>, Todos los izquierdos reservados.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
    <?= $this -> Html -> script('/template_assets/js/jquery-1.11.3.min.js') ?>
	<!-- bootstrap -->
    <?= $this -> Html -> script('/template_assets/bootstrap/js/bootstrap.min.js') ?>
	<!-- count down -->
    <?= $this -> Html -> script('/template_assets/js/jquery.countdown.js') ?>
	<!-- isotope -->
    <?= $this -> Html -> script('/template_assets/js/jquery.isotope-3.0.6.min.js') ?>
	<!-- waypoints -->
    <?= $this -> Html -> script('/template_assets/js/waypoints.js') ?>
	<!-- owl carousel -->
    <?= $this -> Html -> script('/template_assets/js/owl.carousel.min.js') ?>
	<!-- magnific popup -->
    <?= $this -> Html -> script('/template_assets/js/jquery.magnific-popup.min.js') ?>
	<!-- mean menu -->
    <?= $this -> Html -> script('/template_assets/js/jquery.meanmenu.min.js') ?>
	<!-- sticker js -->
    <?= $this -> Html -> script('/template_assets/js/sticker.js') ?>
	<!-- main js -->
    <?= $this -> Html -> script('/template_assets/js/main.js') ?>

</body>
</html>
