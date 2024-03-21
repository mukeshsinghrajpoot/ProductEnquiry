<?php
namespace Bluethinkinc\ProductEnquiry\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public const PRODUCT_ENABLE_DISABLE ='product_enquiry/general/enable';
    public const PLP_ENABLE_DISABLE ='product_enquiry/general/plpenable';
    public const PDP_ENABLE_DISABLE ='product_enquiry/general/pdpenable';
    public const PRODUCT_MESSAGE ='product_enquiry/general/enquiry_message';
    public const TO_EMAIL ='product_enquiry/email_configuration/send_to_email';
    public const RECEIVER_NAME ='product_enquiry/email_configuration/send_to_email_name';
    public const EMAIL_TEMPLATE ='product_enquiry/email_configuration/email_template';
    public const ENQUIRY_RELOAD_TIME ='product_enquiry/general/enquiry_reload_time';
    public const ENQUIRY_PLP_PDP_TITLE ='product_enquiry/general/enquiry_button_title';
    public const ENQUIRY_POPUP_TITLE ='product_enquiry/general/pop_form_button_title';
    /**
     * This is a storemanager
     *
     * @var storeManager $storeManager
     */
    private $storeManager;
    /**
     * This is a scopeConfig
     *
     * @var scopeConfig $scopeConfig
     */
    protected $scopeConfig;
    /**
     * @var Configurationvalue
     */
    /**
     * This is a construct
     *
     * @param StoreManagerInterface $storeManager
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * This is a product enquiry enable disable value Get
     *
     * @return NOTIFYENABLEDISABLE
     */
    public function ENQUIRYENABLEDISABLE()
    {
        return $this->scopeConfig->getValue(
            self::PRODUCT_ENABLE_DISABLE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry list page enable disable value Get
     *
     * @return PLPENABLEDISABLE
     */
    public function PLPENABLEDISABLE()
    {
        return $this->scopeConfig->getValue(
            self::PLP_ENABLE_DISABLE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry product detail page enable disable value Get
     *
     * @return PDPENABLEDISABLE
     */
    public function PDPENABLEDISABLE()
    {
        return $this->scopeConfig->getValue(
            self::PDP_ENABLE_DISABLE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry message value Get
     *
     * @return PMESSAGE
     */
    public function PMESSAGE()
    {
        return $this->scopeConfig->getValue(
            self::PRODUCT_MESSAGE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry email value Get
     *
     * @return TOEMAIL
     */
    public function TOEMAIL()
    {
        return $this->scopeConfig->getValue(
            self::TO_EMAIL,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry Receiver name value Get
     *
     * @return RECEIVERNAME
     */
    public function RECEIVERNAME()
    {
        return $this->scopeConfig->getValue(
            self::RECEIVER_NAME,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry Email Template value Get
     *
     * @return EMAILTEMPLATE
     */
    public function EMAILTEMPLATE()
    {
        return $this->scopeConfig->getValue(
            self::EMAIL_TEMPLATE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry pop page reload time value Get
     *
     * @return pagereloadtime
     */
    public function pagereloadtime()
    {
        return $this->scopeConfig->getValue(
            self::ENQUIRY_RELOAD_TIME,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry plp pdp button title value Get
     *
     * @return pagereloadtime
     */
    public function plppdpbuttontitle()
    {
        return $this->scopeConfig->getValue(
            self::ENQUIRY_PLP_PDP_TITLE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
    /**
     * This is a product enquiry pop up form button title value Get
     *
     * @return pagereloadtime
     */
    public function popupformbuttontitle()
    {
        return $this->scopeConfig->getValue(
            self::ENQUIRY_POPUP_TITLE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }
}
