<?php /** @var array $data */ ?>
<div class="container">
    <h1 class="mt-4"><?= $data['title']; ?></h1>
    <img src="<?= BASEURL; ?>/img/pic1.jpg" alt="Puppy"
    style="width: 200px; height: 200px; object-fit: cover;" class="rounded-circle">
    <p>Je m'appelle <?= $data['name']; ?></p>
    <p>Je m'appelle <?= $data['bum']; ?></p>
</div>