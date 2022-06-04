{extends file="parent:frontend/checkout/ajax_cart.tpl"}

                                {* Total sum *}
                                {block name='frontend_checkout_cart_footer_field_labels_total'}
                                    <div class="prices--articles">
                                        <span class="prices--articles-text">{s name="CartFooterLabelTotal" namespace="frontend/checkout/cart_footer"}{/s}</span>
                                        <span class="prices--articles-amount">
                                            {$sAmount|currency}{s name="Star" namespace="frontend/listing/box_article"}{/s}
                                        </span>
                                    </div>
                                {/block}
