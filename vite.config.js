import {defineConfig} from 'vite';
import {viteStaticCopy} from 'vite-plugin-static-copy'
import laravel from 'laravel-vite-plugin';
import commonjs from 'vite-plugin-commonjs';
import path from "path";

export default defineConfig({
    plugins: [
        commonjs(),
        laravel({
            input: [
                'resources/css/library/bootstrap/bootstrap.css',
                'resources/css/library/lightbox/lightbox.css',
                'resources/css/library/owlcarousel/owl.carousel.css',
                'resources/css/main/main-style.css',
                'resources/js/library/jquery.js',
                'resources/js/library/bootstrap.js',
                'resources/js/library/easing.js',
                'resources/js/library/isotope-layout.js',
                'resources/js/library/owl.carousel.js',
                'resources/js/library/lightbox.js',
                'resources/js/main/main-script.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/images/*',
                    dest: 'images/'
                },
            ]
        }),
    ],
    resolve: {
        alias: {
            "@": path.resolve("./resources/js"),
            '$': path.resolve(__dirname, 'node_modules/jquery'),
            'jquery': 'jquery/dist/jquery.min.js',
            'popper.js': 'popper.js/dist/umd/popper.js',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
    optimizeDeps: {
        include: [
            'jquery',
            'popper.js',
        ],
    },
    server: {
        port: 8080,
        hot: true
    }
});
