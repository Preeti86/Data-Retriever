<?php

        echo $before_widget;
        echo $before_title .  $after_title;

?>

<ul class="data-articles frontend">

    <?php

    $total_articles = count( $data_results->{'response'}->{'docs'} );

    for( $i = $total_articles - 1; $i >= $total_articles - $num_articles; $i-- ):

        ;?>

        <div class="data-articles">

            <div class="data-articles-info">
                <?php if( $display_image == '1' ): ?>

                    <?php if( count($data_results->{'response'}->{'docs'}[$i]->{'multimedia'}) > 0): ?>

                        <img width="120px" src="<?php echo "http://www.nytimes.com/" . $data_results->{'response'}->{'docs'}[$i]->{'multimedia'}[1]->{'url'}; ?>">

                    <?php endif; ?>

                <?php endif; ?>

                <div class="data-articles-name">
                    <a href="<?php echo $data_results->{'response'}->{'docs'}[$i]->{'web_url'}; ?>">
                        <?php echo $data_results->{'response'}->{'docs'}[$i]->{'headline'}->{'main'}; ?>
                    </a>
                </div>

                <div>
                    <?php echo $data_results->{'response'}->{'docs'}[$i]->{'lead_paragraph'}; ?>
                </div>

            </div>

        </div>


    <?php endfor; ?>

</ul>



<?php
    echo $after_widget;

?>
