<?php //dd($params)?>
<ul>
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