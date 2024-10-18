/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class', // Enable dark mode
  theme: {
    extend: {
      colors: {
        primary: '#0a527b',
        secondary: '#1c8adb',
        accent: '#ff6b6b',
        background: '#f4f4f4',
        dark: '#222',
        info: '#3b82f6',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        muted: '#6b7280',
        light: '#e5e7eb',
        hoverPrimary: '#084f6a',
        hoverSecondary: '#18699d',
        lightBackground: '#f9fafb',
        lightHover: '#e5e7eb',
        darkText: '#1f2937',
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        body: ['Roboto', 'sans-serif'],
      },
      boxShadow: {
        xl: '0 10px 20px rgba(0, 0, 0, 0.12)',
        '2xl': '0 15px 30px rgba(0, 0, 0, 0.15)',
      },
      borderRadius: {
        xl: '1.5rem',
      },
      transitionDuration: {
        0: '0ms',
        2000: '2000ms',
      },
      animation: {
        fadeIn: 'fadeIn 2s ease-in-out forwards',
        fadeOut: 'fadeOut 2s ease-in-out forwards',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: 0 },
          '100%': { opacity: 1 },
        },
        fadeOut: {
          '0%': { opacity: 1 },
          '100%': { opacity: 0 },
        },
      },
      screens: {
        xs: '480px', // Custom small screen breakpoint
      },
      transitionTimingFunction: {
        'in-expo': 'cubic-bezier(0.71, 0.01, 0.83, 0)',
        'out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
      },
      spacing: {
        '72': '18rem',
        '84': '21rem',
        '96': '24rem',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
