const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('./public/dist').mergeManifest();

mix.js('resources/assets/js/app.js', 'app.js')
    .postCss('resources/assets/css/app.css', 'public/dist', [
        require("tailwindcss"),
    ])

if (mix.inProduction()) {
    mix.version();
}
