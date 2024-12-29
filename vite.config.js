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
                // Main resources
                'resources/css/main/main-style.css',
                'resources/js/main/main-script.js',

                // Library resource
                'resources/css/library/bootstrap.css',
                'resources/css/library/lightbox.css',
                'resources/css/library/owl.carousel.css',
                'resources/css/library/image-uploader.css',
                'resources/css/library/query.toast.css',
                'resources/css/library/jquery.multiselect.css',
                'resources/css/library/select2.css',

                'resources/js/library/jquery.js',
                'resources/js/library/bootstrap.js',
                'resources/js/library/bootstrap.bundle.js',
                'resources/js/library/lightbox.js',
                'resources/js/library/owl.carousel.js',
                'resources/js/library/popper.js',
                'resources/js/library/image-uploader.js',
                'resources/js/library/chart.js',
                'resources/js/library/jquery.toast.js',
                'resources/js/library/jquery.mask.js',
                'resources/js/library/tinymce.js',
                'resources/js/library/jquery.multiselect.js',
                'resources/js/library/select2.js',

                // Admin resources
                'resources/css/admin/portal.css',
                'resources/js/admin/main-script.js',
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
