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
    lib: {
      // Entry point of your application
      entry: path.resolve(__dirname, 'src/main.tsx'),

      // Name of the global variable exposed for builded app vite (e.g., window.__kb_global_object)
      // This helps avoid conflicts with WordPress, which uses window.wp
      name: '__kb_global_object',

      // Optional: custom output filename
      // fileName: () => 'src/main.js',   
    },
    outDir: '../build',
    emptyOutDir: true,
    rollupOptions: {
      input: path.resolve(__dirname, 'src/main.tsx'), 
      output: {
        entryFileNames: 'src/main.js',
        chunkFileNames: 'src/main.js',
        assetFileNames: 'src/main.css',
        // assetFileNames: 'src/[name][extname]',
      }
    }
  },
  define: {
  'process.env': {}
  }
});
