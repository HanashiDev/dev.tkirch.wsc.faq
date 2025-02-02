<?php

namespace wcf\system\category;

use Override;

final class FaqCategoryType extends AbstractCategoryType
{
    /**
     * @inheritDoc
     */
    protected $forceDescription = false;

    /**
     * @inheritDoc
     */
    protected $hasDescription = true;

    /**
     * @inheritDoc
     */
    protected $maximumNestingLevel = 1;

    /**
     * @inheritDoc
     */
    protected $langVarPrefix = 'wcf.faq.category';

    /**
     * @inheritDoc
     */
    protected $permissionPrefix = 'admin.faq';

    /**
     * @inheritDoc
     */
    protected $objectTypes = [
        'com.woltlab.wcf.acl' => 'dev.tkirch.wsc.faq.category',
    ];

    #[Override]
    protected function init()
    {
        $this->maximumNestingLevel = SIMPLE_FAQ_VIEW === 'gallery' ? 0 : 1;
        $this->hasDescription = SIMPLE_FAQ_VIEW === 'gallery' ? false : true;

        parent::init();
    }

    #[Override]
    public function supportsHtmlDescription()
    {
        return SIMPLE_FAQ_VIEW === 'gallery' ? false : true;
    }
}
