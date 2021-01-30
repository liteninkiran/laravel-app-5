/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});



var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++)
{
    coll[i].addEventListener("click", function()
    {
        this.classList.toggle("active");

        var active = this.classList.search(" active") > 0;
        var content = this.nextElementSibling;

        if(active)
        {
            content.style.display = "none";
        }
        else
        {
            content.style.display = "block";
        }


/*
        if(content.style.display === "block")
        {
            content.style.display = "none";
        }
        else
        {
            content.style.display = "block";
        }
*/
    });
}
