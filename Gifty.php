<?php

namespace Gifty;

use Shopware\Components\Plugin;

class Gifty extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Checkout' => 'extendCheckout',
        ];

    }

    private function getConfig()
    {
        return $this->container->get('shopware.plugin.config_reader')->getByPluginName('Gifty', Shopware()->Shop());
    }

    public function extendCheckout(\Enlight_Controller_ActionEventArgs $args)
    {
        $config = $this->getConfig();
        $basket = $args->getSubject()->getBasket();

        $currentAmount = $basket['sAmount'];
        $minGiftPriceBGN = $config['gift_min_price_bgn'];
        $minGiftPriceEUR = $config['gift_min_price_eur'];
        $discountGiftItemBgn = $config['gift_item_number_discount_bgn'];
        $discountGiftItemEur = $config['gift_item_number_discount_eur'];
        $giftItemNumber = $config['gift_item_number'];
        $currency = $basket['sCurrencyName'];


        if ($currency == 'BGN') {
            if($currentAmount >= $minGiftPriceBGN){
                Shopware()->Modules()->Basket()->sAddArticle($giftItemNumber);
                Shopware()->Modules()->Basket()->sAddArticle($discountGiftItemBgn);
            }
            else if ($currentAmount < $minGiftPriceBGN) {

                foreach ($args->getSubject()->getBasket()['content'] as $item) {
                    if($item['ordernumber'] == $giftItemNumber){
                        Shopware()->Modules()->Basket()->sDeleteArticle($item['id']);
                    }
                    if($item['ordernumber'] == $discountGiftItemBgn){
                        Shopware()->Modules()->Basket()->sDeleteArticle($item['id']);
                    }
                }

            }
        } else if ($currency == 'EUR') {
            if($currentAmount >= $minGiftPriceEUR){
                Shopware()->Modules()->Basket()->sAddArticle($giftItemNumber);
                Shopware()->Modules()->Basket()->sAddArticle($discountGiftItemEur);
            }
            else if ($currentAmount < $minGiftPriceEUR) {

                foreach ($args->getSubject()->getBasket()['content'] as $item) {
                    if($item['ordernumber'] == $giftItemNumber){
                        Shopware()->Modules()->Basket()->sDeleteArticle($item['id']);
                    }
                    if($item['ordernumber'] == $discountGiftItemEur){
                        Shopware()->Modules()->Basket()->sDeleteArticle($item['id']);
                    }
                }

            }
        }



    }
}