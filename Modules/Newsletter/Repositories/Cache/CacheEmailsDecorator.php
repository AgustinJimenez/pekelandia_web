<?php namespace Modules\Newsletter\Repositories\Cache;

use Modules\Newsletter\Repositories\EmailsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEmailsDecorator extends BaseCacheDecorator implements EmailsRepository
{
    public function __construct(EmailsRepository $emails)
    {
        parent::__construct();
        $this->entityName = 'newsletter.emails';
        $this->repository = $emails;
    }
}
