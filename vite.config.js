import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/portfolio.css',
                'resources/css/helpdesk-1.css',
                'resources/css/idade.css',
                'resources/css/jogos.css',
                'resources/css/login.css',
                'resources/css/helpdesk.css',
                'resources/css/layout.css',
                'resources/css/layout.css'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
