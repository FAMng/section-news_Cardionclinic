<?php

use Bitrix\Main\Data\Cache;

class SunWebNavlistComponent extends \CBitrixComponent
{

    /**
     * Стандартный метод, вызывается до исполнения компонента
     * @param array $params Массив параметров компонента
     * @return array
     */
    public function onPrepareComponentParams($params): array
    {
        $params['IBLOCK_ID'] = (int)$params['IBLOCK_ID'];

        return $params;
    }

    public function executeComponent()
    {
        $items = [];

        if ($this->arParams['IBLOCK_ID']) {

            $cache = Bitrix\Main\Data\Cache::createInstance();
            if ($cache->initCache(86400, 'SunWebNavlistItems', 'sw.navlist'))
            {
                $items = $cache->getVars();
            }
            elseif ($cache->startDataCache())
            {
                $res = CIBlockElement::GetList(
                    ['SORT'=>"ASC", 'ID'=>'DESC'],
                    ['=IBLOCK_ID' => $this->arParams['IBLOCK_ID']],
                    false,
                    false,
                    ['ID', 'NAME', 'DETAIL_PAGE_URL']
                );

                while ($arItem = $res->GetNext()) {
                    $items[] = $arItem;
                }

                $cache->endDataCache($items);
            }

        }


        $this->arResult['ITEMS'] = $items;
        $this->includeComponentTemplate();
    }
}