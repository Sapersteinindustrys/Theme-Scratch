/**
 * Bundle Report Script
 *
 * @package Aetheria
 * @since 1.0.0
 */

const fs = require('fs');
const path = require('path');

function generateReport() {
  console.log('=== Aetheria Bundle Report ===\n');
  
  const manifestPath = path.join(__dirname, '../assets/manifest.json');
  if (fs.existsSync(manifestPath)) {
    const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));
    console.log('Build Manifest:');
    console.log(JSON.stringify(manifest, null, 2));
  } else {
    console.log('No manifest file found. Run build first.');
  }
}

generateReport();
