import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources',
        },
    },
    assetsInclude: ['**/*.svg', '**/*.png', '**/*.ico', '**/*.webmanifest'],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources'),
        },
    },
    server: {
        host: true,
        hmr: {
            host: 'nio.com',
        },
    },

    //     The host: true option allows Vite to accept connections from custom domains, not just localhost.
    // The hmr.host setting ensures that Hot Module Replacement(HMR) is served from nio.com, not localhost, which could otherwise cause CORS or routing issues.
});

