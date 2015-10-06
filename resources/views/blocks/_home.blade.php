<header class="fixed">
    <div class="site-size">

        <div class="logo-holder pull-left">
            Logo
        </div>


        <ul  class="lng-switch pull-right">
            <?php foreach($arrLng as $lng):
            $params['lng'] = $lng['prefix'];

            ?>
            <li>
                <a href="<?=action($controller,$params ) ?>">
                    <?=$lng['prefix'] ?>
                </a>
            </li>
            <?php endforeach; ?>

        </ul>



        <ul class="menu-holder pull-right">
            <?php foreach($struct as $st):
                $href = "#". $st->id_name;
                $linkName = $st->trl->shift()->trl;

            ?>
            <li><a href="{{$href}}">{{$linkName}}</a></li>

            <?php endforeach; ?>

        </ul>

    </div><!--/site-size -->
</header>