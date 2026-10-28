<?php
/** @var array $data */
$navigation = [
    ['label' => 'Home', 'path' => '', 'key' => 'home'],
    ['label' => 'Fighter Jets', 'path' => '/jetfighter', 'key' => 'jets'],
    ['label' => 'About', 'path' => '/about', 'key' => 'about'],
];
$active = $data['active'] ?? '';
?>
<!DOCTYPE html>
<html lang="en" class="tw-h-full tw-bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8'); ?> | Fighter Jets</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= BASEURL; ?>/css/tailwind.css" rel="stylesheet">
    <script defer src="<?= BASEURL; ?>/js/alpine-3.14.9.min.js"></script>
</head>
<body class="tw-min-h-full tw-font-sans tw-text-slate-800">
<a href="#main-content" class="tw-sr-only focus:tw-not-sr-only focus:tw-block focus:tw-bg-white focus:tw-p-3">Skip to content</a>
<div class="tw-min-h-screen">
    <nav class="tw-bg-slate-800" aria-label="Main navigation"
         x-data="{ mobileOpen: false, profileOpen: false }"
         @keydown.escape.window="mobileOpen = false; profileOpen = false">
        <div class="tw-mx-auto tw-max-w-7xl tw-px-4 sm:tw-px-6 lg:tw-px-8">
            <div class="tw-flex tw-h-16 tw-items-center tw-justify-between">
                <div class="tw-flex tw-items-center tw-gap-8">
                    <a href="<?= BASEURL; ?>/" class="tw-text-lg tw-font-bold tw-tracking-tight tw-text-white">Fighter <span class="tw-text-indigo-300">Jets</span></a>
                    <div class="tw-hidden tw-items-center tw-gap-2 md:tw-flex">
                        <?php foreach ($navigation as $item): ?>
                            <a href="<?= BASEURL . $item['path']; ?>"
                               class="tw-rounded-md tw-px-3 tw-py-2 tw-text-sm tw-font-medium <?= $active === $item['key'] ? 'tw-bg-slate-900 tw-text-white' : 'tw-text-slate-300 hover:tw-bg-slate-700 hover:tw-text-white'; ?>"
                               <?= $active === $item['key'] ? 'aria-current="page"' : ''; ?>><?= $item['label']; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tw-flex tw-items-center tw-gap-3">
                    <div class="tw-relative" @click.outside="profileOpen = false">
                        <button type="button" @click="profileOpen = !profileOpen" :aria-expanded="profileOpen.toString()"
                                aria-controls="profile-menu" aria-label="Open profile links"
                                class="tw-flex tw-h-9 tw-w-9 tw-items-center tw-justify-center tw-rounded-full tw-bg-indigo-500 tw-text-sm tw-font-bold tw-text-white focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-white focus:tw-ring-offset-2 focus:tw-ring-offset-slate-800">E</button>
                        <div id="profile-menu" x-cloak x-show="profileOpen" x-transition
                             class="tw-absolute tw-right-0 tw-z-20 tw-mt-3 tw-w-48 tw-rounded-md tw-bg-white tw-py-1 tw-shadow-lg tw-ring-1 tw-ring-black/5">
                            <p class="tw-px-4 tw-py-2 tw-text-xs tw-font-semibold tw-text-slate-500">Where to?</p>
                            <a href="<?= BASEURL; ?>/about" class="tw-block tw-px-4 tw-py-2 tw-text-sm hover:tw-bg-slate-100">About me?</a>
                            <a href="<?= BASEURL; ?>/jetfighter" class="tw-block tw-px-4 tw-py-2 tw-text-sm hover:tw-bg-slate-100">Go look at jets</a>
                        </div>
                    </div>
                    <button type="button" @click="mobileOpen = !mobileOpen" :aria-expanded="mobileOpen.toString()"
                            aria-controls="mobile-menu" aria-label="Toggle navigation"
                            class="tw-rounded-md tw-p-2 tw-text-slate-300 hover:tw-bg-slate-700 focus:tw-ring-2 focus:tw-ring-white md:tw-hidden">
                        <svg class="tw-h-6 tw-w-6" :class="{ 'tw-hidden': mobileOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                        <svg x-cloak class="tw-h-6 tw-w-6" :class="{ 'tw-hidden': !mobileOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="m6 6 12 12M6 18 18 6" /></svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" x-cloak x-show="mobileOpen" x-transition class="tw-space-y-1 tw-px-4 tw-pb-4 md:tw-hidden">
            <?php foreach ($navigation as $item): ?>
                <a href="<?= BASEURL . $item['path']; ?>"
                   class="tw-block tw-rounded-md tw-px-3 tw-py-2 tw-text-base tw-font-medium <?= $active === $item['key'] ? 'tw-bg-slate-900 tw-text-white' : 'tw-text-slate-300 hover:tw-bg-slate-700'; ?>"
                   <?= $active === $item['key'] ? 'aria-current="page"' : ''; ?>><?= $item['label']; ?></a>
            <?php endforeach; ?>
        </div>
    </nav>
    <header class="tw-bg-white tw-shadow-sm">
        <div class="tw-mx-auto tw-max-w-7xl tw-px-4 tw-py-6 sm:tw-px-6 lg:tw-px-8">
            <h1 class="tw-text-3xl tw-font-bold tw-tracking-tight tw-text-slate-900"><?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
        </div>
    </header>
    <main id="main-content" class="tw-mx-auto tw-max-w-7xl tw-px-4 tw-py-8 sm:tw-px-6 lg:tw-px-8">
