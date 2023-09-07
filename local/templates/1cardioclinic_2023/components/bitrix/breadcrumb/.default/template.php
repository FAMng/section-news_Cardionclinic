<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;?>

<?

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<div class="breadcrumbs"><div class="container"><ul class="breadcrumbs__list" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li class="breadcrumbs__item" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				'.'
				<a class="breadcrumbs__item-link" href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					'.$title.'
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</li>';
	}
	else
	{
		$strReturn .= '
			<li class="breadcrumbs__item">'.'
				<a class="breadcrumbs__item-link">'.$title.'</a>
			</li>';
	}
}

$strReturn .= '</ul></div></div>';

return $strReturn;
?>

