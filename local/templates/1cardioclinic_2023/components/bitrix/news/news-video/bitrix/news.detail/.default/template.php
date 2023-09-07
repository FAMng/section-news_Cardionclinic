<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<div class="news-detail__body">
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1 class = "news-detail__title"><?=$arResult["NAME"]?></h1>
	<?endif;?>
	<?if (isset($arResult["DISPLAY_PROPERTIES"]["VIDEO"])) :?>
		<div class="news-detail__video">
			<?$videoProperty = $arResult["DISPLAY_PROPERTIES"]["VIDEO"];
			echo $videoProperty["DISPLAY_VALUE"];?>
		</div>
	<?endif;?>
		<p class = "news-detail__text">
			<?if($arResult["DETAIL_TEXT"] != ''):?>
				<?=$arResult["DETAIL_TEXT"];?>
			<?else:?>
				<?=$arResult["PREVIEW_TEXT"];?>
			<?endif;?>
		</p>
</div>