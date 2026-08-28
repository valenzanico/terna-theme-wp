import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin';

const themeSlug = 'terna-theme-wp'

// Set APP_URL if it doesn't exist for Laravel Vite plugin
if (! process.env.APP_URL) {
  process.env.APP_URL = 'http://127.0.0.1:5173';
}

export default defineConfig({
   server: {
    host: '0.0.0.0', // Permette a Docker di esporre la porta all'esterno
    port: 5173,
    strictPort: true,
    cors: true,      // Abilita esplicitamente le intestazioni CORS su Vite
    origin: 'http://localhost:5173', // Forza l'URL corretto per evitare il mix con 127.0.0.1
    hmr: {
      host: 'localhost',
    },
  },
  base: `/wp-content/themes/${themeSlug}/public/build/`,
  plugins: [
    tailwindcss(),
      laravel({
        input: [
          'resources/css/app.css',
          'resources/css/editor.css',
          'resources/js/app.js',
          'resources/js/editor.js'
        ],
      refresh: true,
      assets: ['resources/images/**', 'resources/fonts/**'],
    }),

    wordpressPlugin(),

    // Generate the theme.json file in the public/build/assets directory
    // based on the Tailwind config and the theme.json file from base theme folder
    wordpressThemeJson({
      disableTailwindColors: false,
      disableTailwindFonts: false,
      disableTailwindFontSizes: false,
      disableTailwindBorderRadius: false,
    }),
  ],
  resolve: {
    alias: {
        '@scripts': '/resources/js',
        '@styles': '/resources/css',
        '@fonts': '/resources/fonts',
        '@images': '/resources/images',
    },
  },
})
