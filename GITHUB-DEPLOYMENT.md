# GitHub + Bluehost Git Integration - Seamless Deployment

This is the **easiest and most professional** approach for deploying your WordPress theme updates.

## 🚀 **Option 1: GitHub + Bluehost Git Integration (Recommended)**

### Step 1: Create GitHub Repository

1. **Go to GitHub.com** and create a new repository
2. **Name it**: `marketing-services-pro-theme`
3. **Make it private** (recommended for client work)

### Step 2: Push Your Code to GitHub

```bash
# Add GitHub as remote (replace YOUR_USERNAME with your GitHub username)
git remote add origin https://github.com/YOUR_USERNAME/marketing-services-pro-theme.git

# Push to GitHub
git push -u origin main
```

### Step 3: Set Up Bluehost Git Integration

1. **Login to Bluehost cPanel**
2. **Find "Git Version Control"** in the Advanced section
3. **Click "Create"**
4. **Configure:**
   - **Repository Name**: `marketing-services-pro`
   - **Repository URL**: `https://github.com/YOUR_USERNAME/marketing-services-pro-theme.git`
   - **Branch**: `main`
   - **Directory**: `/public_html/wp-content/themes/marketing-services-pro`
   - **Auto Deploy**: ✅ Enable

### Step 4: One-Click Deployment

Now whenever you make changes:

1. **Make your changes locally**
2. **Commit and push to GitHub:**
   ```bash
   git add .
   git commit -m "Updated pricing packages"
   git push
   ```
3. **Bluehost automatically deploys** your changes!

## 🔄 **Option 2: Automated Script (Alternative)**

If you prefer more control, use the `deploy.sh` script:

### Step 1: Configure SSH Access

1. **In Bluehost cPanel**, go to "SSH Access"
2. **Enable SSH** if not already enabled
3. **Generate SSH key** or use existing one

### Step 2: Update deploy.sh Configuration

Edit `deploy.sh` and update these values:

```bash
BLUEHOST_USERNAME="your_bluehost_username"
BLUEHOST_HOST="yourdomain.com"
REMOTE_PATH="/public_html/wp-content/themes/marketing-services-pro"
```

### Step 3: Deploy with One Command

```bash
./deploy.sh
```

## 🎯 **Option 3: VS Code Extension (Easiest)**

### Step 1: Install SFTP Extension

1. **Open VS Code**
2. **Install "SFTP" extension** by Natizyskunk
3. **Reload VS Code**

### Step 2: Configure SFTP

Create `.vscode/sftp.json`:

```json
{
    "name": "Bluehost Theme",
    "host": "yourdomain.com",
    "protocol": "sftp",
    "port": 22,
    "username": "your_bluehost_username",
    "remotePath": "/public_html/wp-content/themes/marketing-services-pro",
    "uploadOnSave": true,
    "ignore": [
        ".vscode",
        ".git",
        ".DS_Store",
        "node_modules",
        "src",
        "*.log"
    ]
}
```

### Step 3: Auto-Upload on Save

Now every time you save a file, it automatically uploads to Bluehost!

## 📋 **Recommended Workflow**

### For Daily Development:

1. **Use GitHub + Bluehost Git Integration** (Option 1)
   - Most professional
   - Version control
   - Automatic deployment
   - Backup of all changes

### For Quick Fixes:

1. **Use VS Code SFTP Extension** (Option 3)
   - Instant uploads
   - No git commits needed
   - Perfect for small changes

### For Major Updates:

1. **Use deploy.sh script** (Option 2)
   - Full control
   - Builds CSS automatically
   - Confirms before deployment

## 🔧 **Setup Commands**

```bash
# Initial setup
git remote add origin https://github.com/YOUR_USERNAME/marketing-services-pro-theme.git
git push -u origin main

# Daily workflow
git add .
git commit -m "Description of changes"
git push  # Auto-deploys to Bluehost!
```

## 🎉 **Benefits of This Approach**

- ✅ **No manual file uploads**
- ✅ **Version control for all changes**
- ✅ **Automatic CSS building**
- ✅ **Professional development workflow**
- ✅ **Easy rollback if needed**
- ✅ **Backup of all code**
- ✅ **Team collaboration ready**

## 🚨 **Important Notes**

1. **Keep your GitHub repo private** for client work
2. **Don't commit sensitive data** (passwords, API keys)
3. **Test changes locally** before pushing
4. **Clear WordPress cache** after deployment

This approach transforms your workflow from "upload files manually" to "git push and done!" 🚀 