<?php
/**
 * Module part for displaying client module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_client_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_client_module_bg' ) == 'image' && Kirki::get_option( 'front_page_client_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_client_module_id' ); ?>" class="sm-section module client-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
		<div class="module-caption col-md-12 text-center">
					<h2><span>PROCESSO DE</span> TRABALHO</h2>
					
					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div>
		<div class="row">
							

			
												
					<div class="icon-service-box col-md-3 text-center wow fadeInLeft" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
						
						<div class="service-icon">
							<i class="fa fa-money"></i>
						</div><!-- .service-icon -->

													<h3 class="service-title"><span>Orçamento</span></h3>
						
						<p class="service-content">
						O cliente apresenta sua necessidade ao Studio, que avalia os melhores recursos e técnicas para serem aplicados e garantirem o melhor resultado seja para vídeo, música, áudio e locução. Após avaliação do Studio o trabalho a ser executado é enviado um orçamento de produção. . </p>
						
						
						<div class="spacer"></div>
					</div><!-- .icon-service-box -->
									
					<div class="icon-service-box col-md-3 text-center wow fadeInRight" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
						
						<div class="service-icon">
							<i class="fa fa-coffee"></i>
						</div><!-- .service-icon -->

													<h3 class="service-title"><span>Pré-Produção</span> </h3>
						
													<p class="service-content">
													Após aprovado o orçamento, parte-se pra fase inicial da produção. 
Nos vídeos são feitos storyboards, e pesquisas de luz/cor e locação.  Nas gravações de banda e artistas solo, são feitas audições, ensaios, definições de arranjos, ritmos e tons, contratação de músicos e ajustes de todos os preparativos
</p>
						
						
						<div class="spacer"></div>
					</div><!-- .icon-service-box -->
									
					<div class="icon-service-box col-md-3 text-center wow fadeInRight" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
						
						<div class="service-icon">
							<i class="fa fa-camera"></i>
						</div><!-- .service-icon -->

													<h3 class="service-title"><span>Produção</span> </h3>
						
													<p class="service-content">A captação é um momento crucial no processo. O Studio Independente preza pela utilização dos melhores equipamentos de captação de áudio e de vídeo, para manter a mais alta qualidade e fidelidade, proporcionando um resultado de alto nível. </p>
						
						
						<div class="spacer"></div>
					</div><!-- .icon-service-box -->
					
						<div class="icon-service-box col-md-3 text-center wow fadeInLeft" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
						
						<div class="service-icon">
							<i class="fa fa-play"></i>
						</div><!-- .service-icon -->

													<h3 class="service-title"><span>Pós-Produção</span></h3>
						
						<p class="service-content">
						Este é o momento de tratar o material captado. O Studio faz a montagem, edição, mixagem, masterização e entrega o material final para o cliente, que tem direito a correções e ajustes durante o processo. </p>
						
						
						<div class="spacer"></div>
					</div><!-- .icon-service-box -->
					
				 
					</div>
		
			
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #client -->
