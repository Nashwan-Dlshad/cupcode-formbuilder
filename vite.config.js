// vite.config.js
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  build: {
    outDir: 'dist', // or wherever you want your build to be
  },
  css: {
    postcss: './postcss.config.js', // Use PostCSS config from the package
  },
});
