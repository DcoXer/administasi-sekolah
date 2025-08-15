import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        cors: true,
        host: 'website_sekolah.test',
        port: 3000,
        strictPort: true,
        hmr: {
            host: 'website_sekolah.test',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
