<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\ProductEnquiry\Api\Data;

interface BluethinkEnquirySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get bluethink_enquiry list.
     *
     * @return \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface[]
     */
    public function getItems();

    /**
     * Set product_sku list.
     *
     * @param \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
