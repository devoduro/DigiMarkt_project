# Two-Factor Authentication Implementation Guide

This document provides an overview of the two-factor authentication (2FA) implementation in the Digital Marketing Platform.

## Overview

The platform uses Google Authenticator-compatible 2FA to enhance security. This implementation:

- Allows users to enable/disable 2FA from their profile
- Provides QR codes for easy setup with authenticator apps
- Generates recovery codes for emergency access
- Enforces 2FA on protected routes
- Supports both time-based one-time passwords (TOTP) and recovery codes

## Technical Implementation

### Components

1. **Frontend Components**:
   - `resources/views/components/two-factor-auth/settings.blade.php`: Reusable 2FA settings component
   - `resources/views/auth/two-factor-challenge/index.blade.php`: 2FA challenge during login
   - `public/js/two-factor-auth.js`: Alpine.js component for 2FA interactivity

2. **Backend Components**:
   - `app/Http/Controllers/Auth/TwoFactorAuthController.php`: Manages 2FA settings
   - `app/Http/Controllers/Auth/TwoFactorChallengeController.php`: Handles 2FA verification
   - `app/Http/Middleware/EnsureTwoFactorAuthenticated.php`: Enforces 2FA on protected routes
   - `app/Models/User.php`: Contains 2FA helper methods

3. **Database Fields**:
   - `two_factor_secret`: Encrypted secret key for generating codes
   - `two_factor_secret_temp`: Temporary storage during setup
   - `two_factor_recovery_codes`: Encrypted backup codes
   - `two_factor_confirmed_at`: Timestamp when 2FA was confirmed

### Dependencies

- `pragmarx/google2fa`: Core 2FA functionality
- `pragmarx/google2fa-qrcode`: QR code generation

## User Flow

### Enabling 2FA

1. User navigates to their profile page
2. User clicks "Enable Two-Factor Authentication"
3. System generates a secret key and displays QR code
4. User scans QR code with authenticator app
5. User enters verification code to confirm setup
6. System stores the secret key and generates recovery codes
7. User is shown recovery codes to save for emergency use

### Login with 2FA

1. User enters email and password
2. If 2FA is enabled, user is redirected to 2FA challenge page
3. User enters code from authenticator app or uses recovery code
4. If valid, user is authenticated and redirected to intended page

### Disabling 2FA

1. User navigates to their profile page
2. User clicks "Disable Two-Factor Authentication"
3. System removes the secret key and recovery codes

## API Endpoints

- `GET /user/two-factor-authentication-status`: Check if 2FA is enabled
- `POST /user/two-factor-authentication`: Enable 2FA
- `GET /user/two-factor-qr-code`: Get QR code and recovery codes
- `POST /user/confirmed-two-factor-authentication`: Confirm 2FA setup
- `DELETE /user/two-factor-authentication`: Disable 2FA
- `GET /two-factor-challenge`: Show 2FA challenge page
- `POST /two-factor-challenge`: Verify 2FA code

## Security Considerations

- Secret keys are encrypted in the database
- Recovery codes are encrypted and one-time use
- 2FA is enforced on all protected routes
- Failed verification attempts are logged
- Session is marked as 2FA-verified after successful verification

## Testing

To test the 2FA implementation:

1. Create a test user account
2. Enable 2FA from the profile page
3. Log out and log back in to verify the 2FA challenge
4. Test both valid and invalid codes
5. Test recovery code functionality
6. Test disabling 2FA

## Troubleshooting

- If QR code doesn't display, check that the Google2FA service provider is registered
- If verification fails, ensure time synchronization between server and device
- If recovery codes don't work, verify they haven't been used already
