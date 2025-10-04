# NeoVedic Software Website - Setup Guide

## Quick Start

This IT company website is ready to run in the Replit environment! The PHP server is configured to start automatically on port 5000.

## Features

- **Multi-page responsive design** - Works on all devices
- **Contact Form** - Email notifications via PHPMailer
- **Career Application Form** - Resume upload and email notifications
- **Newsletter Subscription** - SQLite database storage with duplicate prevention
- **Portfolio, Team, Services, FAQ pages** - Complete company website

## Email Configuration (Optional)

The contact and career forms use email notifications. To enable this feature:

### Option 1: Using Replit Secrets (Recommended for Production)

1. Open the Secrets tab in Replit (🔒 icon in left sidebar)
2. Add the following secrets:
   - `SMTP_HOST` - Your SMTP server (e.g., smtp.gmail.com)
   - `SMTP_PORT` - SMTP port (e.g., 587)
   - `SMTP_EMAIL` - Your sender email address
   - `SMTP_PASSWORD` - Your email password or app-specific password
   - `SMTP_SENDER_NAME` - Display name (e.g., "Website Form")

### Option 2: Using Environment Variables (For Development)

1. Create a `.env` file in the project root (see `.env.example` for template)
2. Add your SMTP credentials to the `.env` file
3. **Important:** The `.env` file is already in `.gitignore` for security

### Gmail Users

If using Gmail, you'll need to:
1. Enable 2-factor authentication on your Google account
2. Generate an app-specific password
3. Use the app-specific password (not your regular password)

## File Uploads

- Resume uploads from the career form are stored in `tmp-uploads/` directory
- Supported formats: PDF, DOC, DOCX
- Files are automatically saved with applicant's name

## Newsletter Subscription

- Subscriber emails are stored in `mailing/subscribers.db` (SQLite database)
- Duplicate emails are automatically prevented
- AJAX-based submission with instant feedback

## Project Structure

```
├── index.html          # Home page
├── about.html          # About Us
├── services.html       # Our Services
├── portfolio.html      # Portfolio
├── team.html           # Team
├── contact.html        # Contact form
├── careers.html        # Career application
├── faq.html            # FAQ
├── contactme.php       # Contact form handler
├── careers.php         # Career form handler
├── css/                # Stylesheets
├── js/                 # JavaScript files
├── images/             # Images and assets
├── lib/                # Third-party libraries
├── mailing/            # Email functionality
│   ├── mailfunction.php        # PHPMailer wrapper
│   ├── mailingvariables.php    # Email configuration
│   ├── subscription.php        # Newsletter handler
│   └── subscribers.db          # Newsletter database
└── tmp-uploads/        # Resume uploads directory
```

## Development

The website runs on PHP's built-in development server:
- **Host:** 0.0.0.0
- **Port:** 5000
- **Auto-start:** Configured via Replit workflow

## Deployment

The project is configured for Replit's autoscale deployment:
- Deployment target: Autoscale (stateless, runs on-demand)
- Run command: `php -S 0.0.0.0:5000`
- Port: 5000

To publish:
1. Click the "Publish" button in Replit
2. Follow the deployment wizard
3. Your site will be live with a custom URL

## Security Notes

- Email credentials are stored securely using environment variables
- `.env` file is excluded from git via `.gitignore`
- Uploaded files are stored outside the web root for security
- Newsletter database is excluded from git for privacy

## Testing the Forms

Without SMTP credentials configured:
- Forms will display error messages
- This is expected behavior
- Add credentials to enable email functionality

With SMTP credentials configured:
- Contact form sends email to configured recipient
- Career form sends email with resume attachment
- Newsletter subscription stores emails in database

## Support

For issues or questions about the Replit setup, check:
- `replit.md` - Project documentation
- `.replit` - Replit configuration
- Server logs in the Console tab

---

**Note:** This setup guide is specifically for running the project in Replit. For local development with XAMPP/WAMP, refer to the original README.md.
