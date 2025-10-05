/**
 * Performance Budget Script
 *
 * @package Aetheria
 * @since 1.0.0
 */

const fs = require('fs');
const path = require('path');

// Define budgets (in bytes)
const budgets = {
  criticalCSS: 9 * 1024,
  totalCSS: 55 * 1024,
  initialJS: 65 * 1024,
  lazyJS: 80 * 1024
};

function getFileSize(filePath) {
  try {
    const stats = fs.statSync(filePath);
    return stats.size;
  } catch (error) {
    return 0;
  }
}

function checkBudgets() {
  let failed = false;
  
  // Check critical CSS
  const criticalSize = getFileSize(path.join(__dirname, '../assets/css/critical.css'));
  if (criticalSize > budgets.criticalCSS) {
    console.error(`❌ Critical CSS exceeds budget: ${criticalSize} > ${budgets.criticalCSS}`);
    failed = true;
  } else {
    console.log(`✅ Critical CSS within budget: ${criticalSize} / ${budgets.criticalCSS}`);
  }
  
  // Check total CSS
  const cssDir = path.join(__dirname, '../assets/css');
  let totalCSS = 0;
  if (fs.existsSync(cssDir)) {
    fs.readdirSync(cssDir).forEach(file => {
      if (file.endsWith('.css')) {
        totalCSS += getFileSize(path.join(cssDir, file));
      }
    });
  }
  if (totalCSS > budgets.totalCSS) {
    console.error(`❌ Total CSS exceeds budget: ${totalCSS} > ${budgets.totalCSS}`);
    failed = true;
  } else {
    console.log(`✅ Total CSS within budget: ${totalCSS} / ${budgets.totalCSS}`);
  }
  
  if (failed) {
    process.exit(1);
  } else {
    console.log('\n✅ All performance budgets met!');
  }
}

checkBudgets();
