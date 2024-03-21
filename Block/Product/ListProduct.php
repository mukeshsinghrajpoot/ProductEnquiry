<?php
namespace Bluethinkinc\ProductEnquiry\Block\Product;

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\ProductList\Item\Block;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Registry;
use Magento\Catalog\Model\CategoryFactory;
use Bluethinkinc\ProductEnquiry\Helper\Data;

class ListProduct extends Block
{
    /**
     * @var Registry
     */
    protected $_registry;
    /**
     * @var categoryFactory
     */
    protected $_categoryFactory;
    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * ListProduct constructor.
     * @param Context $context
     * @param Registry $_registry
     * @param CategoryFactory $_categoryFactory
     * @param Data $_helperData
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $_registry,
        CategoryFactory $_categoryFactory,
        Data $_helperData,
        array $data = []
    ) {
        $this->_registry = $_registry;
        $this->_categoryFactory = $_categoryFactory;
        $this->_helperData = $_helperData;
        parent::__construct($context, $data);
    }

    /**
     * Get post parameters
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return array
     */
    public function productenquirycat()
    {
        $current_cat_id = $this->_registry->registry('current_category')->getId();
        $categoryData = $this->_categoryFactory->create()->load($current_cat_id);
        $getContent=$categoryData->getData('product_enquiry_cat');
        return $getContent;
    }
    /**
     * Get Enable Extention
     *
     * @return data
     */
    public function getEndableModule()
    {
        return $this->_helperData->ENQUIRYENABLEDISABLE();
    }
    /**
     * Get Button Title List page
     *
     * @return data
     */
    public function getButtontitlelistpage()
    {
        return $this->_helperData->plppdpbuttontitle();
    }
    /**
     * Get Button Popup Title
     *
     * @return data
     */
    public function getPopupbuttontilelistpage()
    {
        return $this->_helperData->popupformbuttontitle();
    }
}
