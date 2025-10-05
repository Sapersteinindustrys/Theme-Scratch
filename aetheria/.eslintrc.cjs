/**
 * ESLint Configuration
 *
 * @package Aetheria
 * @since 1.0.0
 */

module.exports = {
  env: {
    browser: true,
    es2021: true
  },
  extends: ['eslint:recommended'],
  parserOptions: {
    ecmaVersion: 'latest',
    sourceType: 'module'
  },
  rules: {
    'no-unused-vars': 'warn',
    'no-console': 'off'
  }
};
