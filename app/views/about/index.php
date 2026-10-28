<?php /** @var array $data */ ?>
<section class="tw-flex tw-flex-col tw-gap-6 tw-rounded-xl tw-border tw-border-slate-200 tw-bg-white tw-p-6 sm:tw-flex-row sm:tw-p-8">
    <img src="<?= BASEURL; ?>/img/pic1.jpg" alt="Puppy" class="tw-h-40 tw-w-40 tw-rounded-full tw-object-cover">
    <div>
        <h2 class="tw-text-2xl tw-font-bold">About me? que?</h2>
        <p class="tw-mt-4">Je m'appelle <?= htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="tw-mt-2">Je m'appelle <?= htmlspecialchars($data['bum'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="tw-mt-4 tw-max-w-2xl tw-leading-7 tw-text-slate-600">I like fighter jets. Here's a puppy.</p>
        <a href="<?= BASEURL; ?>/about/page" class="tw-mt-4 tw-inline-block tw-font-semibold tw-text-indigo-600 hover:tw-text-indigo-800">Another page of something &rarr;</a>
    </div>
</section>
