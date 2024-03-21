<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\ProductEnquiry\Model\ResourceModel\BluethinkEnquiry;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @var $_idFieldName
     */
    protected $_idFieldName = 'bluethink_enquiry_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Bluethinkinc\ProductEnquiry\Model\BluethinkEnquiry::class,
            \Bluethinkinc\ProductEnquiry\Model\ResourceModel\BluethinkEnquiry::class
        );
    }
}
