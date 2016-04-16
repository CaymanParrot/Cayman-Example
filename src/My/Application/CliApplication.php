<?php
/**
 * File for Application class
 */

namespace My\Application;

use Cayman\Application\CliApplication as CaymanCliApp;

/**
 * Class for Application
 *
 * @method \My\Application\Manager\AssetManager     getAssetManager($id = 'default')
 * @method \My\Application\Manager\CacheManager     getCacheManager($id = 'default')
 * @method \My\Application\Manager\DbManager        getDbManager($id = 'default')
 * @method \My\Application\Manager\EmailManager     getEmailManager($id = 'default')
 * @method \My\Application\Manager\EntityManager    getEntityManager($id = 'default')
 * @method \My\Application\Manager\EventManager     getEventManager($id = 'default')
 * @method \My\Application\Manager\FilterManager    getFilterManager($id = 'default')
 * @method \My\Application\Manager\IdentityManager  getIdentityManager($id = 'default')
 * @method \My\Application\Manager\LocaleManager    getLocaleManager($id = 'default')
 * @method \My\Application\Manager\LogManager       getLogManager($id = 'default')
 * @method \My\Application\Manager\QueueManager     getQueueManager($id = 'default')
 * @method \My\Application\Manager\ReleaseManager   getReleaseManager($id = 'default')
 * 
 */
class CliApplication extends CaymanCliApp
{
    
}
