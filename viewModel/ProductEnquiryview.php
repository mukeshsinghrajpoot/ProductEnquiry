<?php

namespace Bluethinkinc\ProductEnquiry\viewModel;

use Bluethinkinc\ProductEnquiry\Helper\Data;

class ProductEnquiryview implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    /**
     * @var helperData
     */
    protected $helperData;

    /**
     * Get The Helper data
     *
     * @param Data $helperData
     */
    public function __construct(
        Data $helperData
    ) {
        $this->helperData = $helperData;
    }
    /**
     * Get The getEnable data
     *
     * @return $data
     */
    public function getEnable()
    {
        $data = $this->helperData->ENQUIRYENABLEDISABLE();
        return $data;
    }
    /**
     * Get The getpdpEnable data
     *
     * @return $data
     */
    public function getpdpEnable()
    {
        $data = $this->helperData->PDPENABLEDISABLE();
        return $data;
    }
    /**
     * Get The getplpEnable data
     *
     * @return $data
     */
    public function getplpEnable()
    {
        $data = $this->helperData->PLPENABLEDISABLE();
        return $data;
    }
    /**
     * Get The getMessagesave data
     *
     * @return $data
     */
    public function getMessagesave()
    {
        $data = $this->helperData->PMESSAGE();
        return $data;
    }
    /**
     * Get The get Pdp button title data
     *
     * @return $data
     */
    public function getPdpbuttontitle()
    {
        $data = $this->helperData->plppdpbuttontitle();
        return $data;
    }
    /**
     * Get The get Pdp popup button title data
     *
     * @return $data
     */
    public function getPdppopupbuttontitle()
    {
        $data = $this->helperData->popupformbuttontitle();
        return $data;
    }
}
