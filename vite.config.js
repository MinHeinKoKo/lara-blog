import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve : {
        alias : {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~bootstrap-icons' : path.resolve(__dirname, 'node_modules/bootstrap-icons'),
            'sweetalert2' : path.resolve(__dirname, 'node_modules/sweetalert2')
        }
    }
});
