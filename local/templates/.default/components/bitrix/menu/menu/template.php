<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<?if (empty($arResult['ALL_ITEMS'])) return; ?>

<nav class="menu">
	<ul>
		<?php foreach ($arResult['ALL_ITEMS'] as $arItem): ?>
			<?php if($arItem['SELECTED']): ?>
				<li><a class="active" href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a></li>
			<?php else: ?>
				<li><a href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</nav>

