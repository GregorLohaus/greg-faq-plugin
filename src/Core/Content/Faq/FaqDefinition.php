<?php
namespace Greg\FaqPlugin\Core\Content\Faq;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class FaqDefinition extends EntityDefinition {
    public function getEntityName(): string
    {
        return 'greg_faq';
    }
    public function getEntityClass(): string
    {
         return FaqEntity::class;
    }
    public function getCollectionClass(): string
    {
        return FaqCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new Required(), new PrimaryKey()),
            (new StringField('question','question'))->addFlags(new Required()),
            (new StringField('answer','answer'))->addFlags(new Required())
            //TODO add many to many association with products

        ]);
    }
}
