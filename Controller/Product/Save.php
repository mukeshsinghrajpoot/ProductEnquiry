<?php
/**
 * Copyright © BluethinkInc All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\ProductEnquiry\Controller\Product;
 
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Bluethinkinc\ProductEnquiry\Model\BluethinkEnquiry;
use Magento\Framework\Controller\Result\JsonFactory;
use Bluethinkinc\ProductEnquiry\Helper\Data;
use Bluethinkinc\ProductEnquiry\Helper\Email;
 
class Save extends Action
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var BluethinkEnquiry
     */
    protected $bluethinkEnquiry;
    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    private $dateTime;
    /**
     * @var helperData
     */
    protected $helperData;
    /**
     * @var helperEmail
     */
    protected $helperEmail;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param BluethinkEnquiry $bluethinkEnquiry
     * @param JsonFactory $resultJsonFactory
     * @param \Magento\Framework\Stdlib\DateTime $dateTime
     * @param Data $helperData
     * @param Email $helperEmail
     */
 
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        BluethinkEnquiry $bluethinkEnquiry,
        JsonFactory $resultJsonFactory,
        \Magento\Framework\Stdlib\DateTime $dateTime,
        Data $helperData,
        Email $helperEmail
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->bluethinkEnquiry = $bluethinkEnquiry;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->dateTime = $dateTime;
        $this->helperData = $helperData;
        $this->helperEmail = $helperEmail;
        parent::__construct($context);
    }

    /**
     * Execute method.
     *
     * @return ResultFactory
     */
    public function execute()
    {
        try {
            $resultJson = $this->resultJsonFactory->create();
            $created_at=$this->dateTime->formatDate(true);
            $product_name = $this->getRequest()->getPost('product_name');
            $product_sku =  $this->getRequest()->getPost('product_sku');
            $first_name  =   $this->getRequest()->getPost('first_name');
            $last_name   =   $this->getRequest()->getPost('last_name');
            $subject = $this->getRequest()->getPost('subject');
            $email = $this->getRequest()->getPost('email');
            $message = $this->getRequest()->getPost('message');
            $data=['product_name' => $product_name,'product_sku'=>$product_sku,
            'first_name'=>$first_name,'last_name'=>$last_name,
            'subject'=>$subject,'email'=>$email,'message'=>$message,
            'created_at'=>$created_at];
            if ($data) {
                $congigmessage=$this->helperData->PMESSAGE();
                $ReceiverName=$this->helperData->RECEIVERNAME();
                $ToEmail=$this->helperData->TOEMAIL();
                $pagereloadtime=$this->helperData->pagereloadtime();
                $model = $this->bluethinkEnquiry;
                $customerdetails=['receivername'=>$ReceiverName,'email'=>$ToEmail,
                'product_name' => $product_name,'product_sku'=>$product_sku,
                'first_name'=>$first_name,'last_name'=>$last_name,
                'product_subject'=>$subject,'enquiry_email'=>$email,
                'message'=>$message];
                $emailresponce=$this->helperEmail->sendEmail($customerdetails);
                $model->setData($data)->save();
                $result = ["success" => 200,"messages" => __($congigmessage),"pagereloadtime"=>$pagereloadtime];
            }
        } catch (\Exception $e) {
            $result = ["success" => 400,"messages" => __($e->getMessage())];
        }
        return $resultJson->setData($result);
    }
}
