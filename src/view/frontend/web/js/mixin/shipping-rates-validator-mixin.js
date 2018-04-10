/**
 * Copyright © 2018 Rubic. All rights reserved.
 * See LICENSE.txt for license details.
 */
define([

], function () {
    'use strict';

    /**
     * Set shipping validator delay from configuration.
     */
    return function (target) {
        target.validateDelay = window.checkoutConfig.shippingValidateDelay;
        return target;
    };
});