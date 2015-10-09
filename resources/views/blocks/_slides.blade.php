<section id="slides">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php for($i = 0; $i < count($slides); $i++):
                $active = ($i == 0)? 'active':'';
            ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?=$i ?>" class="<?=$active?>"></li>
            <?php endfor;?>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <?php foreach($slides as $key => $slide):

                $active = ($key == 0)? 'active': '';
                $caption = $slide->slide_trl->shift();
            ?>

            <div class="item {{$active}}">
                <img class="img-responsive" src="/images/{{$slide->img_name}}" >
                <div class="carousel-caption">
                    {!! $caption->slide_html !!}
                </div>
            </div><!--/item -->

            <?php endforeach;?>

        </div><!--/ carusell-inner -->

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div><!--carusel-example -->
</section><!--slides -->
