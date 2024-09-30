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
});

