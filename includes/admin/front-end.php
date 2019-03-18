<?php

        echo $before_widget;
        echo $before_title .  $after_title;

?>

<ul class="ckan-articles frontend">

    <?php

    $total_articles = count( $ckan_results->{'response'}->{'docs'} );

    for( $i = $total_articles - 1; $i >= $total_articles - $num_articles; $i-- ):

        ;?>

        <div class="ckan-articles">

            <div class="ckan-articles-info">
                <?php if( $display_image == '1' ): ?>

                    <?php if( count($ckan_results->{'response'}->{'docs'}[$i]->{'multimedia'}) > 0): ?>

                        <img width="120px" src="<?php echo "http://www.nytimes.com/" . $ckan_results->{'response'}->{'docs'}[$i]->{'multimedia'}[1]->{'url'}; ?>">

                    <?php endif; ?>

                <?php endif; ?>

                <div class="ckan-articles-name">
                    <a href="<?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'web_url'}; ?>">
                        <?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'headline'}->{'main'}; ?>
                    </a>
                </div>

                <div>
                    <?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'lead_paragraph'}; ?>
                </div>

            </div>

        </div>


    <?php endfor; ?>

</ul>



<?php
    echo $after_widget;

?>
