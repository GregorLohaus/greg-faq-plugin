import Plugin from 'src/plugin-system/plugin.class'
//TODO add integration section to config section (of main plugin)
//TODO pass client_id and client_secret to Productdetail page possibly through Subscriber
export default class FaqPlugin extends Plugin {
    init() {
        console.log('JsPlugin Registered');
        var checkbox = document.querySelectorAll('#faq-id');
        console.log(checkbox);
        checkbox.forEach(
            (currentValue, currentIndex, listObj) => {
                console.log(currentValue)
                //TODO get var value from element currentValue
                // create eventlisteners('change') for all elements in document.querySelectorAll('faq-js-checkbox-'+ value)
                // see Resources/views/storefron/page/product-detail/tabs.html.twig
            }
        )
    }

}

