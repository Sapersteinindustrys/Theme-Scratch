/**
 * Vite Configuration
 *
 * @package Aetheria
 * @since 1.0.0
 */

import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'dist',
    rollupOptions: {
      input: {
        front: './assets/js/front.js',
        editor: './assets/js/editor.js'
      },
      output: {
        entryFileNames: 'assets/js/[name].[hash].js',
        chunkFileNames: 'assets/js/[name].[hash].js',
        assetFileNames: 'assets/[ext]/[name].[hash].[ext]'
      }
    },
    manifest: true
  }
});
