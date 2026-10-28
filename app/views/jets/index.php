<?php /** @var array $data */ ?>
<p class="tw-mb-6 tw-text-slate-600">Some fighter jets I like. No particular ranking.</p>
<div class="tw-grid tw-gap-5 sm:tw-grid-cols-2 lg:tw-grid-cols-3">
    <?php foreach ($data['jet'] as $jet): ?>
        <article class="tw-rounded-xl tw-border tw-border-slate-200 tw-bg-white tw-p-6">
            <h2 class="tw-text-xl tw-font-bold tw-text-slate-900"><?= htmlspecialchars($jet['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <dl class="tw-mt-4 tw-space-y-3 tw-text-sm">
                <?php foreach (['manufacturer' => 'Manufacturer', 'country' => 'Country', 'role' => 'Role'] as $field => $label): ?>
                    <div>
                        <dt class="tw-font-medium tw-text-slate-500"><?= $label; ?></dt>
                        <dd class="tw-mt-1"><?= htmlspecialchars($jet[$field], ENT_QUOTES, 'UTF-8'); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </article>
    <?php endforeach; ?>
</div>
<?php if (empty($data['jet'])): ?>
    <p class="tw-rounded-lg tw-bg-white tw-p-6">No fighter jets have been added yet.</p>
<?php endif; ?>
