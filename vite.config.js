import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';
import 'resources/css/portfolio.css';
import 'resources/css/helpdesk-1.css';
import 'resources/css/idade.css';
import 'resources/css/jogos.css';
import 'resources/css/login.css';
import 'resources/css/helpdesk.css';
import 'resources/css/layout.css';





export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
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
