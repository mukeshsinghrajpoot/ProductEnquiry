<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\ProductEnquiry\Controller\Adminhtml;

abstract class Bluethinkenquiry extends \Magento\Backend\App\Action
{

    public const ADMIN_RESOURCE = 'Bluethinkinc_ProductEnquiry::top_level';
    /**
     * This is a coreregistry variable
     *
     * @var $_coreRegistry
     */
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Bluethinkinc'), __('Bluethinkinc'))
            ->addBreadcrumb(__('Product Enquiry'), __('Product Enquiry'));
        return $resultPage;
    }
}
