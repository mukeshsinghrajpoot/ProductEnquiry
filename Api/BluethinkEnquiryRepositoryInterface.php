<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\ProductEnquiry\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BluethinkEnquiryRepositoryInterface
{

    /**
     * Save bluethink_enquiry
     *
     * @param \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface $bluethinkEnquiry
     * @return \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface $bluethinkEnquiry
    );

    /**
     * Retrieve bluethink_enquiry
     *
     * @param string $bluethinkEnquiryId
     * @return \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($bluethinkEnquiryId);

    /**
     * Retrieve bluethink_enquiry matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquirySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete bluethink_enquiry
     *
     * @param \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface $bluethinkEnquiry
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface $bluethinkEnquiry
    );

    /**
     * Delete bluethink_enquiry by ID
     *
     * @param string $bluethinkEnquiryId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bluethinkEnquiryId);
}
