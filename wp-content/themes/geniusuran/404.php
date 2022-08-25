<?php
get_header();
?>
<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
		<?php
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div>
</div>

<?php
//get_sidebar();
get_footer();
