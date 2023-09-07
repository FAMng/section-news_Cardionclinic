<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

use Bitrix\Main\Localization\Loc;

$this->setFrameMode(true); ?>

<div class="news-detail__nav">
    <h3 class="news-detail__nav-title"><?= Loc::getMessage('OTHER_NEWS'); ?></h3>
    <?php
    if (!empty($arResult['ITEMS'])): ?>
        <ul>
            <?php
            foreach ($arResult['ITEMS'] as $arItem): ?>
                <li class="news-detail__nav-text ">
                    <?php
                    if ($arItem['CODE'] == $arParams['ELEMENT_CODE']): ?>
                        <span class="news-detail__active"><?= $arItem['NAME'] ?></span>
                    <?php
                    else: ?>
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
                    <?php
                    endif; ?>
                </li>
            <?php
            endforeach; ?>
        </ul>
    <?php
    endif; ?>
</div>