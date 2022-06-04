extends file="parent:frontend/checkout/shipping_costs.tpl"}
    {block name='frontend_checkout_shipping_costs_country'}
        {$smarty.block.parent}
        <input type="hidden" id="deliveryCountriesAndStatesConfig" data-config="{$deliveryCountriesAndStatesConfig|@json_encode|escape}">
        <div class="shipping-costs--zipcode">
            {block name='frontend_checkout_shipping_costs_country_label'}
                <label for="basket_zipcode">{s name="ShippingLabelDeliveryZipcode"}Post code{/s}</label>
            {/block}
            
            {block name='frontend_checkout_shipping_costs_country_selection'}
                <div class="zipcodeField">
                    <input id="basket_zipcode" type="number" min="10000" max="999999" step="1" name="shippingZipcode" value="{if $shippingZipcode}{$shippingZipcode}{/if}" data-auto-submit="true" style="width: 100%;">
                </div>
                <div class="errorField">{s name="basketZipcodeError"}We are not able to deliver to this code.{/s}</div>
            {/block}
        </div>
    {/block}
