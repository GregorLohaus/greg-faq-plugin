import template from './faqlist.html.twig';
const { Criteria } = Shopware.Data;
Shopware.Component.register('faqlist', {
    template,

    inject: [
        'repositoryFactory'
    ],
    data() {
        return {
            repository: null,
            faqs: null
        };
    },
    metaInfo() {
      return {
          title: this.$createTitle()
      };
    },
    computed: {
        columns() {
           return this.getColumns()
        }
    },
    created() {
        this.repository = this.repositoryFactory.create('greg_faq');
        this.repository.search(new Criteria(), Shopware.Context.api).then((result) => {
            this.faqs = result;
        });
    },
    methods: {
        getColumns(){
            return [{
                property: 'question',
                label: 'Question',
                routerLink: 'greg.faq.faqdetail',
                inlineEdit: 'string',
                allowResize: true,
            }, {
                property: 'answer',
                label: 'Answer',
                inlineEdit: 'string',
                allowResize: true,
            }];
        }
    }
    //TODO add create component


});
