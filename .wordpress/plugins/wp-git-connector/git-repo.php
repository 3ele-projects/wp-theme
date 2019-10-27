<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3ele_Agentur
 */

get_header();
?>





	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<!-- Header -->
<div class="container">

<div class="row">
	<?php
        require_once __DIR__ . '/vendor/autoload.php';
        $client = new \Github\Client();
        $repositories = $client->api('user')->repositories('3ele-projects'); ?>

        <?php foreach  ($repositories as $repo):?>
    <div class="card col-lg-12">
      <h5 class="card-header"> <span class="badge badge-secondary"><?php  echo $repo['language']; ?></span><?php  echo $repo['name']; ?></h5>
      <div class="card-body">


        <p class="card-text"><?php  echo $repo['description']; ?>.</p>
        <a href="<?php  echo $repo['url']; ?>" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    <?php endforeach; ?>
    	</div><!-- #primary -->
    	</div><!-- #primary -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
