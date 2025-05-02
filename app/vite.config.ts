import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  base: './',
  build: {
    outDir: '../build',
    emptyOutDir: true,
    rollupOptions: {
      output: {
        // Stałe nazwy plików
        entryFileNames: 'assets/index.js',
        chunkFileNames: 'assets/index.js',
        assetFileNames: 'assets/[name][extname]',
      }
    }
  }
});
