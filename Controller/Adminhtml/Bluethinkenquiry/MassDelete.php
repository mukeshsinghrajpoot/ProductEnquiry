<?php
/**
 * Copyright © BluethinkInc All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\ProductEnquiry\Controller\Adminhtml\Bluethinkenquiry;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Bluethinkinc\ProductEnquiry\Model\ResourceModel\BluethinkEnquiry\CollectionFactory;
use Bluethinkinc\ProductEnquiry\Model\BluethinkEnquiry;

class MassDelete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    public const ADMIN_RESOURCE = 'Bluethinkinc_ProductEnquiry::bluethink_enquiry_id';

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var BluethinkEnquiry
     */
    protected $bluethinkEnquiryFactory;

    /**
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param BluethinkEnquiry $bluethinkEnquiryFactory
     * @param Context $context
     */
    public function __construct(
        Filter $filter,
        CollectionFactory $collectionFactory,
        BluethinkEnquiry $bluethinkEnquiryFactory,
        Context $context
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->bluethinkEnquiryFactory = $bluethinkEnquiryFactory;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collections = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collections->getSize();
        foreach ($collections as $collection) {
            $result = $this->bluethinkEnquiryFactory->load($collection->getBluethinkEnquiryId());
            $result->delete();
        }
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));
        /* @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/index');
    }
}
