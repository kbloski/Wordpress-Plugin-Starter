import path from 'path';
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  base: './',
  resolve: {
    alias: {
      '@shared': path.resolve(__dirname, './src/Shared'),
    },
  },
  build: {
    outDir: '../build',
    emptyOutDir: true,
    rollupOptions: {
      input: path.resolve(__dirname, 'src/main.tsx'), 
      output: {
        entryFileNames: 'src/main.js',
        chunkFileNames: 'src/main.js',
        // assetFileNames: 'src/[name][extname]',
        assetFileNames: 'src/[name][extname]',
      }
    }
  }
});
