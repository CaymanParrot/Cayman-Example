<?php
/**
 * File for Item service
 */

namespace My\Application\Service\Account;

use My\Application\Db;
use My\Application\Db\ItemRow;
use My\Application\Db\CategoryEntityRow;
use My\Exception\ExceptionRecordNotFound;
use My\Exception\ExceptionRecordNotUnique;
use My\Exception\ExceptionInvalidInput;

/**
 * Class for Item service
 *
 */
class Item extends \My\Application\BaseService
{
    /**
     * Create
     * @param Item\Create\Input $input
     * @return Item\Create\Output
     */
    function create(Item\Create\Input $input)
    {
        $output = new Item\Create\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        $em  = $db->getEntityManager();
        
        $this->tokenRow = $em->findAuthTokenByCode($input->token);
        
        $viewSysEntitySubType = $db->ViewSystemEntitySubtypesByCode();
        $tblItem              = $db->ItemTable();
        $tblCategoryEntity    = $db->CategoryEntityTable();
        $viewCategory         = $db->ViewCategoryByTypeAndSubtypeAndCode();
        $viewItem             = $db->ViewItemByTypeAndSubtypeAndCode();
        
        $entitySubTypeCode = $input->item->entity_subtype_code;
        $entitySubType = $viewSysEntitySubType->findByCode($entitySubTypeCode);
        if (empty($entitySubType)) {
            throw new ExceptionRecordNotFound('Entity subtype not found: ' . $entitySubTypeCode);
        }
        if (Db::ENTITY_TYPE_ITEM != $entitySubType->entity_type_id) {
            throw new ExceptionInvalidInput('Invalid entity subtype');
        }
        
        $category = $viewCategory->findByTypeAndSubtypeAndCode(
            Db::ENTITY_TYPE_CATEGORY, Db::ENTITY_SUBTYPE_ITEM_CATEGORY, $input->item->category_code
        );
        if (empty($category)) {
            throw new ExceptionRecordNotFound('Category not found');
        }
        
        $item = $viewItem->findByTypeAndSubtypeAndCode(
            $entitySubType->entity_type_id, $entitySubType->id, $input->item->code
        );
        if (! empty($item)) {
            throw new ExceptionRecordNotUnique('Item code is not unique');
        }
        
        $itemRow = new ItemRow();
        $itemRow->account_id_owner   = $this->tokenRow->account_id_owner;
        $itemRow->user_id_owner      = $this->tokenRow->user_id_owner;
        
        $itemRow->entity_type_id     = $entitySubType->entity_type_id;
        $itemRow->entity_subtype_id  = $entitySubType->id;
        $itemRow->entity_status_id   = $entitySubType->default_status_id;
        
        $itemRow->code               = $input->item->code;
        $itemRow->manufacturer_code  = $input->item->manufacturer_code;
        $itemRow->name               = $input->item->name;
        $itemRow->short_description  = $input->item->short_description;
        $itemRow->long_description   = $input->item->long_description;
        $itemRow->unit               = $input->item->unit;
        $itemRow->is_integer_unit    = $input->item->is_integer_unit ? true : false;
        
        /**
         * @var ItemRow
         */
        $output->item = $em->entityCreate($tblItem, $itemRow);
        
        $categoryEntityRow = new CategoryEntityRow();
        $categoryEntityRow->entity_id   = $output->item->id;
        $categoryEntityRow->category_id = $category->id;
        $output->category_entity        = $em->entityCreate($tblCategoryEntity, $categoryEntityRow);
        
        return $output;
    }
    
    
}
