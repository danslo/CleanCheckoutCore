<?php
/**
 * Copyright © 2018 Rubic. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Rubic\CleanCheckout\ConfigProvider;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\ScopeInterface;

class CheckoutConfigProvider implements ConfigProviderInterface
{
    const CONFIG_PATH_HIDE_SHIPPING_METHODS   = 'clean_checkout/shipping/hide_shipping_methods';
    const CONFIG_PATH_HIDE_SHIPPING_TITLE     = 'clean_checkout/shipping/hide_shipping_title';
    const CONFIG_PATH_SHIPPING_VALIDATE_DELAY = 'clean_checkout/shipping/shipping_validate_delay';
    const CONFIG_PATH_DEFAULT_PAYMENT_METHOD  = 'clean_checkout/general/default_payment_method';
    const CONFIG_PATH_FORCE_TOTALS_FULL_MODE  = 'clean_checkout/general/force_totals_full_mode';
    const CONFIG_PATH_ALWAYS_SHOW_CART_ITEMS  = 'clean_checkout/general/always_show_cart_items';
    const CONFIG_PATH_STEP_TRANSITION_SPEED   = 'clean_checkout/general/step_transition_speed';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param UrlInterface $url
     */
    public function __construct(ScopeConfigInterface $scopeConfig, UrlInterface $url)
    {
        $this->scopeConfig = $scopeConfig;
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return [
            'hideShippingMethods' => (bool)$this->scopeConfig->getValue(
                self::CONFIG_PATH_HIDE_SHIPPING_METHODS,
                ScopeInterface::SCOPE_STORE
            ),
            'hideShippingTitle' => (bool)$this->scopeConfig->getValue(
                self::CONFIG_PATH_HIDE_SHIPPING_TITLE,
                ScopeInterface::SCOPE_STORE
            ),
            'shippingValidateDelay' => $this->scopeConfig->getValue(
                self::CONFIG_PATH_SHIPPING_VALIDATE_DELAY,
                ScopeInterface::SCOPE_STORE
            ),
            'forceTotalsFullMode' => (bool)$this->scopeConfig->getValue(
                self::CONFIG_PATH_FORCE_TOTALS_FULL_MODE,
                ScopeInterface::SCOPE_STORE
            ),
            'defaultPaymentMethod' => $this->scopeConfig->getValue(
                self::CONFIG_PATH_DEFAULT_PAYMENT_METHOD,
                ScopeInterface::SCOPE_STORE
            ),
            'alwaysShowCartItems' => (bool)$this->scopeConfig->getValue(
                self::CONFIG_PATH_ALWAYS_SHOW_CART_ITEMS,
                ScopeInterface::SCOPE_STORE
            ),
            'stepTransitionSpeed' => (int)$this->scopeConfig->getValue(
                self::CONFIG_PATH_STEP_TRANSITION_SPEED,
                ScopeInterface::SCOPE_STORE
            )
        ];
    }
}
