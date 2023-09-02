import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import viteCompression from "vite-plugin-compression2";
export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                `resources/css/filament/admin/theme.css`,
            ],
            refresh: true,
        }),
        viteCompression(),
    ],

    build: {
        chunkSizeWarningLimit: 500,
        cssCodeSplit: true,
        reportCompressedSize: false,
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes("node_modules")) {
                        return id
                            .toString()
                            .split("node_modules/")[1]
                            .split("/")[0]
                            .toString();
                    }
                },
            },
        },
    },
});
