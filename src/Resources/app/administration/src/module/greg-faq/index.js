Shopware.Module.register('greg-faq', {
    type: 'plugin',
    name: 'Faq',
    title: 'FAQ',
    description: 'sw-property.general.descriptionTextModule',
    color: 'ff6ee0',
    icon: 'default-badge-help',
    routes: {
        faqlist: {
            component: 'faqlist',
            path: 'faqlist'
        }
    },
    navigation: [{
        label: 'Faq',
        color: 'ff6ee0',
        path: 'greg.faq.faqlist',
        icon: 'default-badge-help',
        position: 100,
        parent: 'sw-catalogue'
    }],
})
//TODO finish navigation configuration
