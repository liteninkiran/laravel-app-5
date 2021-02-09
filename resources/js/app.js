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


    var filter = document.getElementById('filter');

    if(filter)
    {
        filter.addEventListener("click", function()
        {
    
            var filterContent = document.getElementById('filter-content');
            filterContent.classList.toggle("hidden");
            filter.classList.toggle("active");
        });
    }

    var table = document.getElementById("data-table");

    if(table)
    {
        // Loop through table rows
        for(var i = 0; i < table.rows.length; i++)
        {
            // Store row
            var row = table.rows[i];

            // Loop through table columns
            for (var j = 0; j < row.cells.length; j++)
            {
                // Store the cell
                var cell = table.rows[i].cells[j];

                // Check we don't have a cell with an "action" class (i.e. show/edit/delete)
                if(!cell.classList.contains('action'))
                {
                    // Add an "On Click" event to the cell
                    cell.onclick = function ()
                    {
                        // Store the parent row
                        var rowEl = this.parentElement;

                        // Find the URL
                        var url = rowEl.getAttribute('data-url');

                        // If we have one, open it
                        if(url != '' && url != null)
                        {
                            window.open(url);
                        }
                    }
                }
            };
        }
    }

    $('#deleteModal').on('hidden.bs.modal', function (event)
    {
        var modal = $(this);
        var div = modal.find('.modal-body')[0];
        div.innerText = '';
    });

    $('#deleteModal').on('shown.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var company_id = button.data('companyid');
        var company_desc = button.data('companydesc');

        var modal = $(this);
        var div = modal.find('.modal-body')[0];

        div.innerHTML = 'Select DELETE If you really want to delete <strong>' + company_desc + '</strong>';

        modal.find('.modal-footer #company_id').val(company_id);
        modal.find('form').attr('action', '/company/' + company_id);
    });


    // Store input fields
    var inputEls = document.querySelectorAll('input, select, textarea');
    
    // Check if one of them has the autofocus property
    for(i = 0; i < inputEls.length; i++)
    {
        if(inputEls[i].autofocus && !inputEls[i].disabled)
        {
            inputEls[i].focus();
            break;
        }
    }
