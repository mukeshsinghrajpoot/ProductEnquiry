<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\ProductEnquiry\Api\Data;

interface BluethinkEnquiryInterface
{

    public const LAST_NAME = 'last_name';
    public const MESSAGE = 'message';
    public const EMAIL = 'email';
    public const SUBJECT = 'subject';
    public const PRODUCT_SKU = 'product_sku';
    public const PRODUCT_NAME = 'product_name';
    public const BLUETHINK_ENQUIRY_ID = 'bluethink_enquiry_id';
    public const CREATED_AT = 'created_at';
    public const FIRST_NAME = 'first_name';

    /**
     * Get bluethink_enquiry_id
     *
     * @return string|null
     */
    public function getBluethinkEnquiryId();

    /**
     * Set bluethink_enquiry_id
     *
     * @param string $bluethinkEnquiryId
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setBluethinkEnquiryId($bluethinkEnquiryId);

    /**
     * Get product_sku
     *
     * @return string|null
     */
    public function getProductSku();

    /**
     * Set product_sku
     *
     * @param string $productSku
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setProductSku($productSku);

    /**
     * Get product_name
     *
     * @return string|null
     */
    public function getProductName();

    /**
     * Set product_name
     *
     * @param string $productName
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setProductName($productName);

    /**
     * Get first_name
     *
     * @return string|null
     */
    public function getFirstName();

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setFirstName($firstName);

    /**
     * Get last_name
     *
     * @return string|null
     */
    public function getLastName();

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setLastName($lastName);

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     *
     * @param string $email
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setEmail($email);

    /**
     * Get subject
     *
     * @return string|null
     */
    public function getSubject();

    /**
     * Set subject
     *
     * @param string $subject
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setSubject($subject);

    /**
     * Get message
     *
     * @return string|null
     */
    public function getMessage();

    /**
     * Set message
     *
     * @param string $message
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setMessage($message);

    /**
     * Get created_at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     *
     * @param string $createdAt
     * @return \Bluethinkinc\ProductEnquiry\BluethinkEnquiry\Api\Data\BluethinkEnquiryInterface
     */
    public function setCreatedAt($createdAt);
}
