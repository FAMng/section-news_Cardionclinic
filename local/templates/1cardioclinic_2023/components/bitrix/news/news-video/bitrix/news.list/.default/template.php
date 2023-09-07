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

$this->setFrameMode(true);
?>
<div class="news__wrapper">
    <h1 class="page__title--inside"><?= Loc::getMessage('NEWS_TITLE_PAGE'); ?></h1>
    <?php
    foreach ($arResult["ITEMS"] as $arItem):
        $this->AddEditAction(
            $arItem['ID'],
            $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")
        );
        $this->AddDeleteAction(
            $arItem['ID'],
            $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
            ["CONFIRM" => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]
        );
        ?>
        <div class="news__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <?php
            if ($arItem["DETAIL_TEXT"] || $arItem["DISPLAY_PROPERTIES"]["VIDEO"]): ?>
                <a class="news__img-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                    <img
                            class="news__img"
                            src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                            alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                            title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                            loading="lazy"
                    /></a>
            <?php
            else: ?>
                <p class="news__img-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                    <img
                            class="news__img"
                            src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                            alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                            title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                            loading="lazy"
                    />
                </p>
            <?php
            endif; ?>
            <div class="news__content">
                <?php
                if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):
                    if ($arItem["DETAIL_TEXT"] || $arItem["DISPLAY_PROPERTIES"]["VIDEO"]): ?>
                        <a class="news__content-title" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                            <?= $arItem["NAME"] ?>
                        </a>
                    <?php
                    else: ?>
                        <p class="news__content-title"><?= $arItem["NAME"] ?></p>
                    <?php
                    endif;
                endif;
                if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                    <p class="news__description"><?= $arItem["PREVIEW_TEXT"]; ?></p>
                <?php
                endif;
                if ($arItem["DETAIL_TEXT"] || $arItem["DISPLAY_PROPERTIES"]["VIDEO"]): ?>
                    <a class="news__btn btn btn__more" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <?= Loc::getMessage('SHOW_MORE_ARTICLE'); ?>
                    </a>
                <?php
                endif; ?>
            </div>
        </div>
    <?php
    endforeach;
    if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <?php
    endif; ?>
</div>