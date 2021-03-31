// Lodash
window._ = require('lodash');

// Bootstrap and its dependencies
try
{
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
}
catch (e)
{
}

// Axios library
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
