import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path'; // Correctly import resolve from the 'path' module

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources'), // Correct path alias setup
        },
    },
    assetsInclude: ['**/*.svg', '**/*.png', '**/*.ico', '**/*.webmanifest'], // Assets to include in build process
    server: {
        host: "nio.com", // Allows using custom domain like nio.com
        // Enable CORS for development to prevent security errors
        cors: {
            origin: 'http://nio.com', // Allow requests from your domain
            credentials: true, // Allow credentials (cookies, headers) to be sent
        },
        hmr: {
            host: 'nio.com', // Ensure Hot Module Replacement works with your custom domain
        },
        port: 5714,

    },
    build: {
        rollupOptions: {
            input: {
                app: resolve(__dirname, 'resources/js/app.js'),
                sprite: resolve(__dirname, 'resources/icons/sprite.svg'),
            },
            output: {
                assetFileNames: 'assets/[name].[ext]',
            },
        },
    },
});
