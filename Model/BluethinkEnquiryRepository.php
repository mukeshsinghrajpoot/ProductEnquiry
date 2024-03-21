<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\ProductEnquiry\Model;

use Bluethinkinc\ProductEnquiry\Api\BluethinkEnquiryRepositoryInterface;
use Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterface;
use Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquiryInterfaceFactory;
use Bluethinkinc\ProductEnquiry\Api\Data\BluethinkEnquirySearchResultsInterfaceFactory;
use Bluethinkinc\ProductEnquiry\Model\ResourceModel\BluethinkEnquiry as ResourceBluethinkEnquiry;
use Bluethinkinc\ProductEnquiry\Model\ResourceModel\BluethinkEnquiry\CollectionFactory
 as BluethinkEnquiryCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class BluethinkEnquiryRepository implements BluethinkEnquiryRepositoryInterface
{

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var BluethinkEnquiry
     */
    protected $searchResultsFactory;

    /**
     * @var BluethinkEnquiryCollectionFactory
     */
    protected $bluethinkEnquiryCollectionFactory;

    /**
     * @var BluethinkEnquiryInterfaceFactory
     */
    protected $bluethinkEnquiryFactory;

    /**
     * @var ResourceBluethinkEnquiry
     */
    protected $resource;
    /**
     * @param ResourceBluethinkEnquiry $resource
     * @param BluethinkEnquiryInterfaceFactory $bluethinkEnquiryFactory
     * @param BluethinkEnquiryCollectionFactory $bluethinkEnquiryCollectionFactory
     * @param BluethinkEnquirySearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceBluethinkEnquiry $resource,
        BluethinkEnquiryInterfaceFactory $bluethinkEnquiryFactory,
        BluethinkEnquiryCollectionFactory $bluethinkEnquiryCollectionFactory,
        BluethinkEnquirySearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->bluethinkEnquiryFactory = $bluethinkEnquiryFactory;
        $this->bluethinkEnquiryCollectionFactory = $bluethinkEnquiryCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        BluethinkEnquiryInterface $bluethinkEnquiry
    ) {
        try {
            $this->resource->save($bluethinkEnquiry);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the bluethinkEnquiry: %1',
                $exception->getMessage()
            ));
        }
        return $bluethinkEnquiry;
    }

    /**
     * @inheritDoc
     */
    public function get($bluethinkEnquiryId)
    {
        $bluethinkEnquiry = $this->bluethinkEnquiryFactory->create();
        $this->resource->load($bluethinkEnquiry, $bluethinkEnquiryId);
        if (!$bluethinkEnquiry->getId()) {
            throw new NoSuchEntityException(__('bluethink_enquiry with id "%1" does not exist.', $bluethinkEnquiryId));
        }
        return $bluethinkEnquiry;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->bluethinkEnquiryCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        BluethinkEnquiryInterface $bluethinkEnquiry
    ) {
        try {
            $bluethinkEnquiryModel = $this->bluethinkEnquiryFactory->create();
            $this->resource->load($bluethinkEnquiryModel, $bluethinkEnquiry->getBluethinkEnquiryId());
            $this->resource->delete($bluethinkEnquiryModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the bluethink_enquiry: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($bluethinkEnquiryId)
    {
        return $this->delete($this->get($bluethinkEnquiryId));
    }
}
