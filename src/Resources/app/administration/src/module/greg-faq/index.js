import './page/faqlist'
import './page/faqcreate'
import './page/faqdetail'
Shopware.Module.register('greg-faq', {
    type: 'plugin',
    name: 'Faq',
    title: 'FAQS',
    description: 'sw-property.general.descriptionTextModule',
    color: 'ff6ee0',
    icon: 'default-badge-help',
    routes: {
        faqlist: {
            component: 'faqlist',
            path: 'faqlist'
        },
        faqdetail: {
            component: 'faqdetail',
            path: 'detail/:id',
            meta: {
                parentPath: 'greg.faq.faglist'
            }
        },
        faqcreate: {
            component: 'faqcreate',
            path: 'create',
            meta: {
                parentPath: 'greg.faq.faqlist'
            }
        }
    },
    navigation: [{
        label: 'Faqs',
        color: 'ff6ee0',
        path: 'greg.faq.faqlist',
        icon: 'default-badge-help',
        position: 100,
        parent: 'sw-extension'
    }],
})
//TODO finish navigation configuration
