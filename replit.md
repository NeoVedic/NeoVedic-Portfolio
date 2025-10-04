# IT Company Website

## Overview
This is a responsive IT company website built with HTML, CSS, Bootstrap, JavaScript, and PHP. The website showcases NeoVedic Software company services, portfolio, team, and includes contact and career application forms with email functionality using PHPMailer.

**Website Architecture**: Multi-page structure with dedicated pages for each section (About, Services, Portfolio, Team, Contact, FAQ) plus a home page and careers page.

## Project Structure
- **Frontend**: HTML, CSS, JavaScript with Bootstrap framework
- **Backend**: PHP with PHPMailer for email functionality
- **Libraries**: Bootstrap, jQuery, Owl Carousel, Lightbox, Ionicons
- **Forms**: Contact form and Career application form with file upload
- **Pages**:
  - `index.html` - Home page with hero section
  - `about.html` - About Us section
  - `services.html` - Our Services section
  - `portfolio.html` - Portfolio/Projects section
  - `team.html` - Team members section
  - `contact.html` - Contact form and map
  - `faq.html` - Frequently Asked Questions
  - `careers.html` - Career application form

## Key Features
- Multi-page responsive design that works on all devices
- Dedicated pages for each navigation menu item
- Consistent header with NeoVedic logo and company name
- Consistent footer across all pages with About Us, Useful Links, Contact Us, and Subscription sections
- Contact form with email notification
- Career application form with resume upload
- FAQ section with accordion
- Testimonials carousel
- Client logos showcase
- Newsletter subscription with SQLite database storage

## Setup & Configuration

### Environment
- PHP 8.2 with built-in development server
- Port 5000 for web server
- Composer dependencies (PHPMailer)

### Email Configuration
Email functionality uses environment variables for secure credential management:
- Set these in Replit Secrets for production use:
  - `SMTP_HOST`: SMTP server (default: smtp.gmail.com)
  - `SMTP_PORT`: SMTP port (default: 587)
  - `SMTP_EMAIL`: Sender email address
  - `SMTP_PASSWORD`: Email password or app-specific password
  - `SMTP_SENDER_NAME`: Sender name (default: Website Form)

**Security**: Credentials are now stored using environment variables instead of being hardcoded. See `.env.example` for reference configuration.

**Note**: The email feature will only work when valid SMTP credentials are provided via Replit Secrets.

### File Uploads
- Career form allows resume uploads (PDF, DOC, DOCX)
- Uploaded files are stored in `tmp-uploads/` directory
- Files are saved as `{applicant-name}.pdf`

### Newsletter Subscription
- Newsletter subscription form available in the footer of all pages
- Email addresses are stored in SQLite database (`mailing/subscribers.db`)
- Duplicate email addresses are automatically prevented with UNIQUE constraint
- AJAX-based submission provides instant feedback without page reload
- Success and error messages displayed inline below the subscription form

## Recent Changes
- **2025-10-04**: Security Enhancement - Email Configuration
  - Migrated email credentials from hardcoded values to environment variables
  - Updated `mailing/mailingvariables.php` to use getenv() for SMTP credentials
  - Created `.env.example` file with configuration template
  - Added `.env` to .gitignore for security
  - Credentials should now be stored in Replit Secrets for production

- **2025-10-03**: Newsletter Subscription Feature
  - Created newsletter subscription backend (`mailing/subscription.php`)
  - Implemented SQLite database for storing subscriber emails with duplicate prevention
  - Added JavaScript handler (`js/subscription.js`) for AJAX form submission
  - Added CSS styling for success/error feedback messages
  - Updated all HTML pages to include subscription functionality
  - Added `mailing/subscribers.db` to .gitignore for privacy

- **2025-10-02**: Multi-page architecture conversion
  - Converted single-page website to multi-page structure
  - Created 6 new dedicated pages: about.html, services.html, portfolio.html, team.html, contact.html, faq.html
  - Updated all navigation links across index.html, careers.html, and new pages to point to dedicated pages
  - Updated footer links to reflect new page structure
  - Changed contact email to info@neovedic.com
  - Each page now has consistent header (NeoVedic logo + company name + navigation) and footer

- **2025-10-02**: Initial Replit setup
  - Installed PHP 8.2
  - Created tmp-uploads directory for file storage
  - Updated careers.php with correct upload path
  - Configured PHP built-in server on port 5000
  - Created .gitignore for PHP project
  - Set up workflow for automatic server start
  - Added NEOVEDIC company logo to website header and favicon
  - Logo size increased to 7rem for better visibility

## Running the Project
The PHP development server automatically starts on port 5000 when the Replit environment loads. The website is accessible through the Replit webview.

## Deployment Configuration
- **Deployment Target**: Autoscale (stateless, runs on-demand)
- **Run Command**: `php -S 0.0.0.0:5000`
- **Port**: 5000 (frontend accessible via Replit webview)
- The project is configured for automatic deployment via Replit's publishing feature

## Import Completion Notes (2025-10-04)
- ✅ PHP 8.2 module installed and configured
- ✅ Composer dependencies installed (PHPMailer)
- ✅ Created tmp-uploads directory for file uploads with secure permissions (755)
- ✅ Workflow configured: Server running on 0.0.0.0:5000
- ✅ Deployment configured for autoscale deployment
- ✅ .gitignore properly configured for PHP project (includes .env for security)
- ✅ All HTML pages verified and working
- ✅ Website successfully loads and displays correctly in Replit environment
- ✅ Contact form and careers form pages tested and accessible
- ✅ All navigation links working correctly across pages
- ✅ Security enhancement: Email credentials migrated to environment variables
- ✅ Created .env.example template for email configuration
- ✅ Created SETUP.md with comprehensive setup instructions
- ✅ All PHP extensions verified (SQLite, PDO, cURL, OpenSSL, FileInfo)
- ✅ Newsletter subscription feature verified and functional
