import template from './../faqdetail/faqdetail.html.twig'
//import './../faqdetail';
//const { Mixin } = Shopware;

/*
Shopware.Component.register('faqcreate', {
    //template: "./../faqdetail/faqdetail.html.twig"
    //template: "<h1> no template </h1>"
    template: template,
    inject: [
        'repositoryFactory'
    ],
    mixins: [
        Mixin.getByName('notification')
    ],
    metaInfo() {
        return {
            title: this.$createTitle()
        }
    },
    data() {
        return {
            myDebugVar: null,
            faq: null,
            isLoading: false,
            processSuccess: false,
            repository: null
        }
    },
    created() {
        this.repository = this.repositoryFactory.create('greg_faq');
        this.getFaq();
        this.myDebugVar = this.setDebugVar();
    },
    methods: {
        setDebugVar() {
            return 2;
        },
        getFaq() {
            this.faq = this.repository.create(Shopware.Context.api)
        },
        onClickSave() {
            this.repository.save(this.faq, Shopware.Context.api).then(() => {
                    this.isLoading = false;
                    this.$router.push({ name: "greg.faq.detail", params: { id: this.faq.id } });
                }).catch((exception) => {
                    this.createNotificationError({
                        title: "error",
                        message: exception
                    });
                });
        },
        saveFinish() {
            this.processSuccess = false;
        }

    }
})

 */

// TODO 0 fix this
Shopware.Component.extend('faqcreate', 'faqdetail', {
    template: template,
    methods: {
        setDebugVar() {
            return 2;
        },
        getFaq() {
            this.faq = this.repository.create(Shopware.Context.api)
        },
        onClickSaveckSave() {
            this.repository.save(this.faq, Shopware.Context.api).then(() => {
                this.isLoading = false;
                this.$router.push({name:'greg.faq.faqdetail', params: {id: this.faq.id}});
            }).catch((exception)=> {
                this.isLoading = false;
                this.createNotificationError({
                    title: "ERROR:",
                    message: exception
                });
            });
        }
    }
});





