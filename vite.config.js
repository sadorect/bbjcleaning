import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/css/booking-wizard.css', 
                'resources/js/app.js', 
                'resources/js/booking-wizard.js'],
            refresh: true,
        }),
    ],
});
