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
        entryFileNames: 'src/index.js',
        chunkFileNames: 'src/index.js',
        assetFileNames: 'src/[name][extname]',
      }
    }
  }
});
