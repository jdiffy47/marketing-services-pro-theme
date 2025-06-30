#!/bin/bash

# Marketing Services Pro Theme Setup Script
echo "🚀 Setting up Marketing Services Pro WordPress Theme..."

# Check if Node.js is installed
if ! command -v node &> /dev/null; then
    echo "❌ Node.js is not installed. Please install Node.js first."
    exit 1
fi

# Check if npm is installed
if ! command -v npm &> /dev/null; then
    echo "❌ npm is not installed. Please install npm first."
    exit 1
fi

echo "✅ Node.js and npm are installed"

# Install dependencies
echo "📦 Installing dependencies..."
npm install

if [ $? -eq 0 ]; then
    echo "✅ Dependencies installed successfully"
else
    echo "❌ Failed to install dependencies"
    exit 1
fi

# Create dist directory if it doesn't exist
if [ ! -d "dist" ]; then
    echo "📁 Creating dist directory..."
    mkdir -p dist
fi

# Build Tailwind CSS
echo "🎨 Building Tailwind CSS..."
npm run build:prod

if [ $? -eq 0 ]; then
    echo "✅ Tailwind CSS built successfully"
else
    echo "❌ Failed to build Tailwind CSS"
    exit 1
fi

# Check if all required files exist
echo "🔍 Checking required files..."

required_files=(
    "style.css"
    "index.php"
    "header.php"
    "footer.php"
    "functions.php"
    "dist/tailwind.css"
    "js/main.js"
    "package.json"
    "tailwind.config.js"
    "src/input.css"
)

missing_files=()

for file in "${required_files[@]}"; do
    if [ ! -f "$file" ]; then
        missing_files+=("$file")
    fi
done

if [ ${#missing_files[@]} -eq 0 ]; then
    echo "✅ All required files are present"
else
    echo "❌ Missing files:"
    for file in "${missing_files[@]}"; do
        echo "   - $file"
    done
    exit 1
fi

# Set proper permissions
echo "🔐 Setting file permissions..."
chmod 644 *.php *.css *.js
chmod 644 dist/*.css
chmod 644 js/*.js
chmod 755 dist js

echo "✅ File permissions set"

# Display theme information
echo ""
echo "🎉 Marketing Services Pro Theme is ready!"
echo ""
echo "📋 Next steps:"
echo "1. Upload all files to your WordPress themes directory"
echo "2. Activate the theme in WordPress Admin"
echo "3. Configure the theme in Appearance → Customize"
echo "4. Install Contact Form 7 plugin"
echo "5. Set up your navigation menu"
echo ""
echo "📚 Documentation:"
echo "- README.md - General theme information"
echo "- DEPLOYMENT.md - Bluehost deployment guide"
echo "- contact-form-template.html - Contact Form 7 template"
echo ""
echo "🛠️ Development commands:"
echo "- npm run dev     - Build CSS with watch mode"
echo "- npm run build:prod - Build minified CSS for production"
echo ""
echo "Happy coding! 🚀" 