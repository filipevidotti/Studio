<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();

$url = plugins_url('..', __FILE__);
if (have_posts())
    the_post();
$id = get_the_ID();
$descricao = get_post_meta($id, 'descricao', true);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php'); ?>
        <title><?php the_title(); ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo $url; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $url; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $url; ?>/css/animate.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>	
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=112980195496066&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    </head>
    <body class="registro-webinario">
        <?php
        $headline = get_post_meta($id, 'headline', true);
        $data_webinario = get_post_meta($id, 'data_webinario', true);
        $data_webinario = explode('/', $data_webinario);
        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');
        
        $url_comentarios = get_post_meta($id, 'url_comentarios', true);
        $urlvideo = get_post_meta($id, 'video', true);
        $urlvideo = explode('watch?v=', $urlvideo);
        $urlvideo = explode('&', $urlvideo[1]);
        $urlvideo = '//www.youtube.com/embed/' . $urlvideo[0];
        ?>
        <div id="header">
            <div class="container">
                <h1><?php echo $headline; ?></h1>
            </div>
        </div>
        
        <div class="webinario">
            <div class="container">
                <iframe id="webinario-video" width="750" height="500" src="<?php echo $urlvideo; ?>?wmode=opaque&amp;showinfo=0&amp;autoplay=1&amp;controls=0&amp;modestbranding=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                <h2>Deixe seu comentário...</h2>
                <div class="col-md-3 col-md-offset-8" id="div-atualizar-comentarios"><button class="btn btn-primary" id="atualizar-comentarios"> Atualizar Comentários <i class="fa fa-refresh"></i></button></div>
                <div class="fb-comments" data-href="<?php echo $url_comentarios; ?>" data-width="750" data-numposts="5" data-colorscheme="light"></div>
            </div>
        </div>
        

        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>


        <script>
            jQuery('#atualizar-comentarios').click(function() {
                FB.XFBML.parse();
            });
        
        </script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <script src="<?php echo $url; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>

    </body>

</html>


