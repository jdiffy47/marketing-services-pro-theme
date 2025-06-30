#!/bin/bash

# Marketing Services Pro Theme - Automated Deployment Script
# This script syncs your local theme files to Bluehost via SFTP

# Configuration - UPDATE THESE VALUES
BLUEHOST_USERNAME="your_bluehost_username"
BLUEHOST_HOST="your_domain.com"
REMOTE_PATH="/public_html/wp-content/themes/marketing-services-pro"
LOCAL_PATH="."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}🚀 Marketing Services Pro Theme - Automated Deployment${NC}"
echo "=================================================="

# Check if required tools are installed
if ! command -v rsync &> /dev/null; then
    echo -e "${RED}❌ rsync is not installed. Please install it first.${NC}"
    exit 1
fi

# Build Tailwind CSS
echo -e "${YELLOW}📦 Building Tailwind CSS...${NC}"
npm run build:prod

if [ $? -ne 0 ]; then
    echo -e "${RED}❌ Failed to build Tailwind CSS${NC}"
    exit 1
fi

echo -e "${GREEN}✅ Tailwind CSS built successfully${NC}"

# Check if configuration is set
if [ "$BLUEHOST_USERNAME" = "your_bluehost_username" ] || [ "$BLUEHOST_HOST" = "your_domain.com" ]; then
    echo -e "${RED}❌ Please update the configuration in deploy.sh:${NC}"
    echo "   - BLUEHOST_USERNAME"
    echo "   - BLUEHOST_HOST"
    echo "   - REMOTE_PATH (if different)"
    exit 1
fi

# Confirm deployment
echo -e "${YELLOW}⚠️  About to deploy to:${NC}"
echo "   Host: $BLUEHOST_HOST"
echo "   User: $BLUEHOST_USERNAME"
echo "   Path: $REMOTE_PATH"
echo ""
read -p "Continue with deployment? (y/N): " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo -e "${YELLOW}❌ Deployment cancelled${NC}"
    exit 1
fi

# Create temporary exclude file
cat > .rsync-exclude << EOF
node_modules/
.git/
.gitignore
README.md
DEPLOYMENT.md
NAVIGATION-SETUP.md
deploy.sh
setup.sh
package.json
package-lock.json
tailwind.config.js
src/
*.log
.DS_Store
EOF

# Deploy using rsync over SSH
echo -e "${YELLOW}📤 Deploying files to Bluehost...${NC}"
rsync -avz --delete \
    --exclude-from=.rsync-exclude \
    --chmod=644 \
    --chmod=D755 \
    "$LOCAL_PATH/" \
    "$BLUEHOST_USERNAME@$BLUEHOST_HOST:$REMOTE_PATH/"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Deployment successful!${NC}"
    echo ""
    echo -e "${GREEN}🎉 Your theme has been updated on Bluehost!${NC}"
    echo ""
    echo "Next steps:"
    echo "1. Clear any WordPress cache"
    echo "2. Test your site to ensure changes are live"
    echo "3. Check mobile responsiveness"
else
    echo -e "${RED}❌ Deployment failed${NC}"
    echo "Please check your SSH credentials and try again."
    exit 1
fi

# Clean up
rm -f .rsync-exclude

echo ""
echo -e "${GREEN}✨ Deployment complete!${NC}" 