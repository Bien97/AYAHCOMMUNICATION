import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/client/core.css',
                'resources/css/client/app.css',
                'resources/js/client/core.js',
                'resources/js/client/app.js'
            ],
            refresh: true,
        }),
    ],
});
