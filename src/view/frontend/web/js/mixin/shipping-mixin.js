/**
 * Copyright © 2018 Rubic. All rights reserved.
 * See LICENSE.txt for license details.
 */
define([], function () {
    'use strict';

    return function (target) {
        return target.extend({
            /**
             * Override shipping template so we can hide rates when there's only 1 available.
             */
            defaults: {
                template: 'Rubic_CleanCheckout/shipping',
                shippingFormTemplate: 'Magento_Checkout/shipping-address/form',
                shippingMethodListTemplate: 'Rubic_CleanCheckout/shipping-address/shipping-method-list',
                shippingMethodItemTemplate: 'Rubic_CleanCheckout/shipping-address/shipping-method-item'
            },

            /**
             * Determines if we should completely hide shipping block.
             */
            shouldHideShipping: function () {
                return window.checkoutConfig.hideShippingMethods && this.rates().length === 1;
            }
        });
    }
});