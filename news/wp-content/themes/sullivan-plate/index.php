<?php
get_header();

while (have_posts()) : the_post();
	echo '<div class="blog-post">'."\n";
    if (has_post_thumbnail()) echo the_post_thumbnail("full");

    the_title('<h2>', '</h2>');
    the_date('', '<strong style="display: block; margin-bottom: 1em;">', '</strong>');

    the_content();
  echo "</div>\n";

  echo '<div class="hr"></div>'."\n";
endwhile;

the_posts_pagination(array(
	'mid_size' => 0,
	'prev_text' => 'Prev',
	'next_text' => 'Next',
	'before_page_number' => 'Page '
));

get_footer();
?>