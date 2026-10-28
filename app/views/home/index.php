<?php /** @var array $data */ ?>
<section class="tw-rounded-xl tw-bg-slate-900 tw-p-6 tw-text-white sm:tw-p-10">
    <p class="tw-text-sm tw-font-semibold tw-uppercase tw-tracking-widest tw-text-indigo-300">My little jet collection</p>
    <h2 class="tw-mt-4 tw-text-3xl tw-font-bold sm:tw-text-4xl">Welcome yall</h2>
    <p class="tw-mt-4 tw-text-lg tw-text-slate-300">My name is <?= htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'); ?>.</p>
    <p class="tw-mt-2 tw-max-w-2xl tw-leading-7 tw-text-slate-300">A bunch of fighter jets I like, all in one place. That's pretty much it.</p>
    <div class="tw-mt-6 tw-flex tw-flex-wrap tw-gap-3">
        <a href="<?= BASEURL; ?>/jetfighter" class="tw-rounded-md tw-bg-indigo-500 tw-px-4 tw-py-3 tw-text-sm tw-font-semibold hover:tw-bg-indigo-400">Explore Fighter Jets</a>
        <a href="https://youtu.be/dQw4w9WgXcQ?si=KA79sFOhofrSPwln" class="tw-rounded-md tw-bg-slate-700 tw-px-4 tw-py-3 tw-text-sm tw-font-semibold hover:tw-bg-slate-600">Real Cool Button</a>
    </div>
</section>
