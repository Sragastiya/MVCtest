<?php /** @var array $data */ ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3 class="display-7">Fighter Jets Lists</h3>
            <?php foreach( $data['jet'] as $jet) : ?>
                <ul>
                <li><?= $jet['name'] ?></li>
                <li><?= $jet['manufacturer'] ?></li>
                <li><?= $jet['country'] ?></li>
                <li><?= $jet['role'] ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>
