<?php
namespace Bluethinkinc\ProductEnquiry\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Psr\Log\LoggerInterface;
use Bluethinkinc\ProductEnquiry\Helper\Data;
use Magento\Store\Model\StoreManagerInterface;

class Email extends \Magento\Framework\App\Helper\AbstractHelper
{
    public const EMAIL_TEMPLATE ='product_enquiry/email_configuration/email_template';
    /**
     * This is a inlineTranslation
     *
     * @var inlineTranslation $inlineTranslation
     */
    protected $inlineTranslation;
    /**
     * This is a transportBuilder
     *
     * @var transportBuilder $transportBuilder
     */
    protected $transportBuilder;
    /**
     * @var logger
     */
    protected $logger;
    /**
     * @var helperData
     */
    protected $helperData;
    /**
     * This is a storeManager
     *
     * @var storeManager $storeManager
     */
    private $storeManager;
    /**
     * This is a construct
     *
     * @param Context $context
     * @param StateInterface $inlineTranslation
     * @param TransportBuilder $transportBuilder
     * @param LoggerInterface $logger
     * @param Data $helperData
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        StateInterface $inlineTranslation,
        TransportBuilder $transportBuilder,
        LoggerInterface $logger,
        Data $helperData,
        StoreManagerInterface $storeManager,
    ) {
        $this->inlineTranslation = $inlineTranslation;
        $this->transportBuilder = $transportBuilder;
        $this->logger = $logger;
        $this->helperData = $helperData;
        $this->storeManager = $storeManager;
    }
    /**
     * This is a sendEmail
     *
     * @param customerdetails $customerdetails
     */
    public function sendEmail($customerdetails)
    {
        $receivername=$customerdetails['receivername'];
        $email1=$customerdetails['email'];
        $emails=explode(',', $email1);
        $productname=$customerdetails['product_name'];
        $productsku=$customerdetails['product_sku'];
        $firstname=$customerdetails['first_name'];
        $lastname=$customerdetails['last_name'];
        $productsubject=$customerdetails['product_subject'];
        $enquiryemail=$customerdetails['enquiry_email'];
        $message=$customerdetails['message'];
        foreach ($emails as $key => $value) {
            $email=$value;
            $this->logger->debug('Product Enquiry start');
            $data = [
            'customer_name' => $receivername,
            'customer_email' => $enquiryemail,
            'product_name' => $productname,
            'product_sku' => $productsku,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'product_subject' => $productsubject,
            'enquiry_email' => $enquiryemail,
            'message' => $message,
            'store' => $this->storeManager->getStore()
            ];
                $this->logger->debug('toEmail == '.$email);
                $this->inlineTranslation->suspend();
                $template = $this->helperData->EMAILTEMPLATE();
                $transport = $this->transportBuilder
                ->setTemplateIdentifier($template)
                ->setTemplateOptions(
                    [
                        'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                        'store' => $this->storeManager->getStore()->getid()
                    ]
                )
                ->setTemplateVars($data)
                ->setFrom(['name' => $firstname.' '.$lastname,'email' => $enquiryemail])
                ->addTo($email)
                ->getTransport();
            try {
                $transport->sendMessage();
                $this->inlineTranslation->resume();
                //return 1;
            } catch (\Exception $e) {
                $this->logger->critical($e->getMessage());
            }
            $this->inlineTranslation->resume();
            $this->logger->debug('Product Enquiry end');

        }
    }
}
