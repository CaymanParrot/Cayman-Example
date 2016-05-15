<?php
/**
 * File for Category service
 */

namespace My\Application\Service\Account;

use My\Application\Db\CategoryRow;
use My\Exception\ExceptionRecordNotFound;
use My\Exception\ExceptionRecordNotUnique;

/**
 * Class for Shop service
 *
 */
class Category extends \My\Application\BaseService
{
    /**
     * Create
     * @param Category\Create\Input $input
     * @return Category\Create\Output
     */
    function create(Category\Create\Input $input)
    {
        $output = new Category\Create\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        $em  = $db->getEntityManager();
        
        $this->tokenRow = $em->findAuthTokenByCode($input->token);
        
        $viewSysEntitySubType = $db->ViewSystemEntitySubtypesByCode();
        $tblCategory          = $db->CategoryTable();
        $viewCategory         = $db->ViewCategoryByTypeAndSubtypeAndCode();
        
        $entitySubTypeCode = $input->category->entity_subtype_code;
        $entitySubType = $viewSysEntitySubType->findByCode($entitySubTypeCode);
        if (empty($entitySubType)) {
            throw new ExceptionRecordNotFound('Entity subtype not found: ' . $entitySubTypeCode);
        }
        
        $parentCategory = null;
        if ($input->category->parent_category_code) {
            $parentCode = $input->category->parent_category_code;
            $parentCategory = $viewCategory->findByTypeAndSubtypeAndCode(
                $entitySubType->entity_type_id, $entitySubType->id, $parentCode
            );
            if (empty($parentCategory)) {
                throw new ExceptionRecordNotFound('Parent category not found');
            }
            if ($parentCategory->entity_subtype_id != $entitySubType->id) {
                throw new ExceptionInvalidInput('Entity subtype mismatch with parent category');
            }
        }
        
        $category = $viewCategory->findByTypeAndSubtypeAndCode(
            $entitySubType->entity_type_id, $entitySubType->id, $input->category->code
        );
        if (! empty($category)) {
            throw new ExceptionRecordNotUnique('Category code is not unique');
        }
        
        $categoryRow = new CategoryRow();
        $categoryRow->account_id_owner   = $this->tokenRow->account_id_owner;
        $categoryRow->user_id_owner      = $this->tokenRow->user_id_owner;
        
        $categoryRow->entity_type_id     = $entitySubType->entity_type_id;
        $categoryRow->entity_subtype_id  = $entitySubType->id;
        $categoryRow->entity_status_id   = $entitySubType->default_status_id;
        
        $categoryRow->code               = $input->category->code;
        $categoryRow->name               = $input->category->name;
        $categoryRow->short_description  = $input->category->short_description;
        $categoryRow->long_description   = $input->category->long_description;
        $categoryRow->parent_category_id = $parentCategory ? $parentCategory->id : null;
        
        $output->category = $em->entityCreate($tblCategory, $categoryRow);
        
        return $output;
    }
    
    
}
