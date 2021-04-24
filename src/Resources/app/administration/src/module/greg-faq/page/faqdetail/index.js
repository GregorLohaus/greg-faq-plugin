import template from './faqdetail.html.twig';
const { Mixin } = Shopware;
Shopware.Component.register('faqdetail', {
    template,
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
          return 1;
      },
      getFaq() {
          this.repository.get(this.$route.params.id, Shopware.Context.api).then((entity) => {
              this.faq = entity;
          });
      },

        //gets called from template faqdetail.html.twig sw-button process @click
      onClickSave() {
          this.isLoading = true;
          this.repository.save(this.faq, Shopware.Context.api).then(()=>{
              this.getFaq();
              this.isLoading =false;
              this.processSuccess = true;
          }).catch((exception)=>{
              this.isLoading = false;
              this.createNotificationError({
                  title: 'Error',
                  message: exception
              });
          });
      },

        //gets called from template faqdetail.html.twig sw-button process @process-finish TODO look up when process-finish event gets triggered
      saveFinish() {
          this.processSuccess = false;
      }

    }

})
