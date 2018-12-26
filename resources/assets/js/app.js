
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import vSelect from 'vue-select';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('v-select', vSelect)
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
Vue.component(
    'sms-notification-list',    
    require('./components/notification/NotificationListComponent.vue')
);
Vue.component(
    'password-reset',    
    require('./components/notification/PasswordResetNotificationComponent.vue')
);

const app = new Vue({
    el: '#app'
});
