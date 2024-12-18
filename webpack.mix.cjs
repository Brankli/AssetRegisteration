const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")  // Ensure it compiles to 'public/js'
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .vue()
    .version();
