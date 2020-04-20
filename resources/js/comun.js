window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

if(document.getElementById('app')){
    const app = new Vue({
        el: '#app',
    });
}

if(document.getElementById('apicategory')){
    require('./admin/apicategory');
}

if(document.getElementById('apiproduct')){
    require('./admin/apiproduct');
}

if(document.getElementById('confirmarEliminar')){
    require('./confirmareliminar');
}
