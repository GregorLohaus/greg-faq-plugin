<?php declare(strict_types=1);
namespace Greg\FaqPlugin\Core\Content\Product;

use Greg\FaqPlugin\Core\Content\Faq\Aggregate\FaqProduct\FaqProductDefinition;
use Greg\FaqPlugin\Core\Content\Faq\FaqDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;


                                //EntityExtensionInterface used in Training doesnt seem to exist
class ProductExtension extends EntityExtension
{
    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new ManyToManyAssociationField('faqs',
                FaqDefinition::class,
                FaqProductDefinition::class,
                'product_id',
                'faq_id'))->addFlags(new Inherited())
        );
    }
}
