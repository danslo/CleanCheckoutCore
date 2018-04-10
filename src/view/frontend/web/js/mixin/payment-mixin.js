/**
 * Copyright © 2018 Rubic. All rights reserved.
 * See LICENSE.txt for license details.
 */
define([
    'Magento_Checkout/js/checkout-data'
], function (checkoutData) {
    'use strict';

    return function (target) {
        return target.extend({
            /**
             * Set the default payment method if not set in local storage yet.
             */
            initialize: function() {
                if (checkoutData.getSelectedPaymentMethod() === null) {
                    checkoutData.setSelectedPaymentMethod(window.checkoutConfig.defaultPaymentMethod);
                }
                return this._super();
            }
        });
    };
});