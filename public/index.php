<?php
	include '_inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Webdesigner - Développeur Front-End</title>
	<link rel="stylesheet" href="css/app.css">
	<link href="css/royal_preloader.min.css" rel="stylesheet">
	<script src="https://use.fontawesome.com/1c4825b396.js"></script>
</head>
<body>
<div class="wrapper">
	<header class="header">
		<a href="#" class="header__logo">
			<span>Benjamin Danielis</span>
			<em>Graphiste - Webdesigner & Développeur front-end</em>
		</a>
		<div class="share">
			<button class="share-toggle-button" style="transform: matrix(1, 0, 0, 1, 0, 0);">
				<i class="share-icon fa fa-share-alt" style="transform: matrix(1, 0, 0, 1, 0, 0);"></i>
			</button>
			<ul class="share-items">
				<li class="share-item">
					<a href="#" class="share-button" style="z-index: 1; transform: matrix(0.95, 0, 0, 0.95, 0, 0);">
						<i class="share-icon fa fa-linkedin" aria-hidden="true" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i>
					</a>
				</li>
				<li class="share-item">
					<a href="#" class="share-button" style="z-index: 1; transform: matrix(0.95, 0, 0, 0.95, 0, 0);">
						<i class="share-icon fa fa-facebook" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i>
					</a>
				</li>
			</ul>
		</div>
		<nav class="header__menu">
			<a class="menu__item" href="#">Portfolio</a>
			<a class="menu__item" href="#">Compétences</a>
			<a class="menu__item" href="#">Services</a>
			<a class="menu__item" href="#contact">Contact</a>
		</nav>
	</header>
	<section class="content">
		<article class="works">
			<div class="container">
				<h2>Portfolio</h2>
				<div class="works_cat" id="filter">
					<button data-filter="*" class="works_cat_button">Tous mes travaux</button>
					<button data-filter=".web" class="works_cat_button">Web-design</button>
					<button data-filter=".print" class="works_cat_button">Print</button>
				</div>
            <div class="show_work">
               <i class="fa fa-times-circle-o" aria-hidden="true"></i>
               <img src="img/work_mr.jpg" class="screen" alt="">
               <button class="viewDemo">Aperçu</button>
            </div>
				<ul class="cards">
					<li class="card">
						<a href="">
							<img src="img/work_mr.jpg">
							<div class="card_details">
								<h5>Mauvais Raccord</h5>
							</div>
						</a>
					</li>
					<li class="card">
						<a href="">
							<img src="img/work_spoune.jpg">
							<div class="card_details">
								<h5>Spoune Scupture</h5>
							</div>
						</a>
					</li>
					<li class="card">
						<a href="">
							<img src="img/work_bo.jpg">
							<div class="card_details">
								<h5>Back-office perso</h5>
							</div>
						</a>
					</li>
					<li class="card">
						<a href="">
							<img src="img/work_portfolio.jpg">
							<div class="card_details">
								<h5>Benjamin Danielis Portfolio</h5>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="skills">
			<div class="container">
				<h2>Mes Compétences</h2>
				<div class='skills__item'>
					<img src="img/skillsHtml5.png" alt="">
				</div>
				<div class='skills__item'>
					<img src="img/skillsCss3.png" alt="">
				</div>
				<div class='skills__item'>
					<img src="img/skillsSass.png" alt="">
				</div>
				<div class='skills__item'>
					<img src="img/skillsJs.png" alt="">
				</div>
				<div class='skills__item'>
					<img src="img/skillsPs.png" alt="">
				</div>
				<div class='skills__item'>
					<img src="img/skillsWp.png" alt="">
				</div>
			</div>
		</article>
		<article class="services">
			<div class="container">
				<h2>Services</h2>
				<p><span>Web-Designer freelance </span>, je m'occupe de la réalisation de votre design. Une idée de projet vous trotte dans la tête ?
					N'hesitez pas à me contacter, je vous accompagnerais du début à la fin, tout en faisant force de proposition pour vous apporter les meilleures solutions pour vous et votre projet!</p>
				<div class="service">
					<h3>Design</h3>
					<p>Après avoir discuté de votre projet et avoir identifié vos cibles, il est important de réaliser un design adapté à celle-ci. Ceci a pour but de vous représenter de manière efficace sur internet et de donner confiance à vos visiteurs.</p>
				</div>
				<div class="service">
					<h3>Référencement</h3>
					<p>Un bon site sans visibilité sur internet ne sert à rien, il est important de bien choisir ses mots-clés et de respecter certaines règles et standards pour se faire une place sur internet !</p>
				</div>
			</div>
		</article>
		<article class="contact" id="contact">
			<div class="container">
				<h2>Contact</h2>
					<?php if(array_key_exists('errors', $_SESSION)): ?>
						<div class="errors">
							<?= implode('<br>', $_SESSION['errors']); ?>
						</div>
					<?php endif; ?>
				<?php if(array_key_exists('success', $_SESSION)): ?>
					<div class="success">
						Votre email a bien été envoyé.
					</div>
				<?php endif; ?>
				<form action="mail.php" class="form_contact" method="POST">
					<?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>
					<?= $form->text('nom', 'Nom'); ?>
					<?= $form->email('email', 'Email'); ?>
					<?= $form->text('sujet', 'Sujet'); ?>
					<?= $form->textarea('message', 'Message...'); ?>
               <input type="submit" class="fc_submit" value="Envoyer">
				</form>
			</div>
		</article>
      <footer class="footer">
         <div class="container">
            <p>Web-design & developpement par Benjamin Danielis - © 2016</p>
         </div>
      </footer>
	</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/share.js"></script>
<!--<script type="text/javascript" src="js/royal_preloader.min.js"></script>-->
<!--<script type="text/javascript">
	Royal_Preloader.config({
		mode:       'number',
		text:       'MelonHTML5 - Royal Preloader...',
		background: '#1e222b'
	});
</script>-->
</body>
</html>
<?php
	unset($_SESSION['inputs']);
	unset($_SESSION['success']);
	unset($_SESSION['errors']);
?>
