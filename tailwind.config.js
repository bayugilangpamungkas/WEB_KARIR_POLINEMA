/** @type {import('tailwindcss').Config} */
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
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
        glass: 'rgba(255, 255, 255, 0.3)', // Glassmorphism effect
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        body: ['Roboto', 'sans-serif'],
        figtree: ['Figtree', ...defaultTheme.fontFamily.sans],
        display: ['Poppins', 'sans-serif'], // Adding a modern display font
      },
      boxShadow: {
        xl: '0 10px 20px rgba(0, 0, 0, 0.12)',
        '2xl': '0 15px 30px rgba(0, 0, 0, 0.15)',
        glass: '0 8px 32px rgba(31, 38, 135, 0.37)', // Glassmorphism shadow
      },
      borderRadius: {
        xl: '1.5rem',
        '2xl': '2rem',
        '3xl': '3rem', // Larger border radius for modern UI
      },
      transitionDuration: {
        0: '0ms',
        2000: '2000ms',
        3000: '3000ms', // Add longer transition durations for smoother animations
      },
      animation: {
        fadeIn: 'fadeIn 2s ease-in-out forwards',
        fadeOut: 'fadeOut 2s ease-in-out forwards',
        bounce: 'bounce 1s infinite', // Adding more animations
        rotate: 'rotate 3s linear infinite',
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
        rotate: {
          '0%': { transform: 'rotate(0deg)' },
          '100%': { transform: 'rotate(360deg)' },
        },
      },
      screens: {
        xs: '480px', // Custom small screen breakpoint
        '3xl': '1600px', // Larger breakpoint for very large screens
      },
      transitionTimingFunction: {
        'in-expo': 'cubic-bezier(0.71, 0.01, 0.83, 0)',
        'out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
      },
      backdropBlur: {
        xs: '2px',
        sm: '4px',
        md: '8px',
        lg: '12px',
        xl: '24px', // Glassmorphism blur effects
      },
      spacing: {
        '72': '18rem',
        '84': '21rem',
        '96': '24rem',
        '108': '27rem', // Additional spacing for larger UI elements
      },
    },
  },
  plugins: [forms, require('@tailwindcss/typography')],
};
