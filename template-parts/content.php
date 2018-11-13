<?php
if ( have_rows( 'content' ) ) :

	while ( have_rows( 'content' ) ) : the_row();

		get_template_part( 'template-parts/page-component/' . get_row_layout() );

	endwhile;

endif;
?>