<?php

/**
 * File for database class
 */

namespace My\Application;

/**
 * Class for Database
 *
 */
class Db
{

    const ENTITY_TYPE_TOKEN      = 1;
    const ENTITY_TYPE_USER       = 2;
    const ENTITY_TYPE_ACCOUNT    = 3;
    const ENTITY_TYPE_ADDRESS    = 4;
    const ENTITY_TYPE_PHONE      = 5;
    const ENTITY_TYPE_CATEGORY   = 6;
    const ENTITY_TYPE_ITEM       = 7;
    //const ENTITY_TYPE_BASKET     = 8;
    const ENTITY_TYPE_ORDER      = 9;
    const ENTITY_TYPE_ORDER_ITEM = 10;
    const ENTITY_TYPE_ASSET      = 11;
    const ENTITY_TYPE_PAGE       = 12;
    const ENTITY_TYPE_ITEM_PRICE = 71;
    const ENTITY_TYPE_ITEM_CODE  = 72;
    
    
    
    const ENTITY_SUBTYPE_EMAIL_TOKEN            = 11;
    const ENTITY_SUBTYPE_AUTH_TOKEN             = 12;
    
    const ENTITY_SUBTYPE_SYSTEM_USER            = 20;
    const ENTITY_SUBTYPE_INDIVIDUAL_USER        = 21;
    const ENTITY_SUBTYPE_COMPANY_USER           = 22;
    
    const ENTITY_SUBTYPE_SYSTEM_ACCOUNT         = 30;
    const ENTITY_SUBTYPE_INDIVIDUAL_ACCOUNT     = 31;
    const ENTITY_SUBTYPE_RETAILER_ACCOUNT       = 32;
    const ENTITY_SUBTYPE_WHOLESALER_ACCOUNT     = 33;
    const ENTITY_SUBTYPE_SUPPLIER_ACCOUNT       = 34;
    
    const ENTITY_SUBTYPE_BILLING_ADDRESS        = 41;
    const ENTITY_SUBTYPE_DELIVERY_ADDRESS       = 42;
    const ENTITY_SUBTYPE_CORRESPONDENCE_ADDRESS = 43;
    const ENTITY_SUBTYPE_REGISTERED_ADDRESS     = 44;
    
    const ENTITY_SUBTYPE_MOBILE_PHONE           = 51;
    const ENTITY_SUBTYPE_LANDLINE_PHONE         = 52;
    const ENTITY_SUBTYPE_WORK_PHONE             = 53;
    const ENTITY_SUBTYPE_OTHER_PHONE            = 54;
    
    const ENTITY_SUBTYPE_ITEM_CATEGORY          = 61;
    const ENTITY_SUBTYPE_BUYER_CATEGORY         = 62;
    const ENTITY_SUBTYPE_SELLER_CATEGORY        = 63;
    const ENTITY_SUBTYPE_ORDER_CATEGORY         = 64;
    const ENTITY_SUBTYPE_ASSET_CATEGORY         = 65;
    const ENTITY_SUBTYPE_PAGE_CATEGORY          = 66;
    
    const ENTITY_SUBTYPE_STOCK_ITEM             = 71;
    const ENTITY_SUBTYPE_SERVICE_ITEM           = 72;
    
    const ENTITY_SUBTYPE_CUSTOMER_ORDER         = 91;
    const ENTITY_SUBTYPE_RETAILER_ORDER         = 92;
    const ENTITY_SUBTYPE_WHOLESALER_ORDER       = 93;
    
    const ENTITY_SUBTYPE_CUSTOMER_ORDER_ITEM    = 101;
    const ENTITY_SUBTYPE_RETAILER_ORDER_ITEM    = 102;
    const ENTITY_SUBTYPE_WHOLESALER_ORDER_ITEM  = 103;
    
    const ENTITY_SUBTYPE_IMAGE_ASSET            = 111;
    const ENTITY_SUBTYPE_IMAGE_LINK_ASSET       = 112;
    const ENTITY_SUBTYPE_VIDEO_ASSET            = 113;
    const ENTITY_SUBTYPE_VIDEO_LINK_ASSET       = 114;
    const ENTITY_SUBTYPE_DOCUMENT_ASSET         = 115;
    const ENTITY_SUBTYPE_DOCUMENT_LINK_ASSET    = 116;
    
    const ENTITY_SUBTYPE_USER_PAGE              = 121;
    const ENTITY_SUBTYPE_ACCOUNT_PAGE           = 122;
    
    const ENTITY_SUBTYPE_DEFAULT_ITEM_PRICE     = 711;
    const ENTITY_SUBTYPE_DEFAULT_ITEM_COST      = 721;

}
