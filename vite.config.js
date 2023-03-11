import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { splitVendorChunkPlugin } from "vite";
import viteCompression from "vite-plugin-compression";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/filament.css",
            ],
            refresh: true,
        }),
        splitVendorChunkPlugin(),
        viteCompression(),
    ],
});
