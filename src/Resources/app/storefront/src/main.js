import FaqPlugin from "./faq-plugin/faq-plugin.plugin";
const PluginManager = window.PluginManager;
PluginManager.register('FaqPlugin', FaqPlugin, '#faq-js')
