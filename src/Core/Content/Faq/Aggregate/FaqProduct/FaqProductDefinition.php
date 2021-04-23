<?php declare(strict_types=1);
namespace Greg\FaqPlugin\Core\Content\Faq\Aggregate\FaqProduct;


use Greg\FaqPlugin\Core\Content\Faq\FaqDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;

class FaqProductDefinition extends MappingEntityDefinition
{
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('faq_id','faq_id', FaqDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id','product_id', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            //TODO look up Entity Versioning
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            new ManyToOneAssociationField('faq','faq_id', FaqDefinition::class),
            new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class),
            new CreatedAtField()
        ]);
    }

    public function getEntityName(): string
    {
        return 'greg_faq_product';
    }
}
