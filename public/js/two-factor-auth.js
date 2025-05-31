/**
 * Two-Factor Authentication JavaScript
 * Handles the UI interactions for enabling, disabling, and verifying 2FA
 */

document.addEventListener('alpine:init', () => {
    Alpine.data('twoFactorAuth', () => ({
        enabled: false,
        showingQrCode: false,
        showingRecoveryCodes: false,
        showingConfirmationForm: false,
        confirmationCode: '',
        recoveryCodes: [],
        error: null,
        success: null,
        loading: false,
        
        /**
         * Initialize the component
         */
        init() {
            // Check if 2FA is already enabled
            this.checkStatus();
        },
        
        /**
         * Check the current 2FA status
         */
        async checkStatus() {
            this.loading = true;
            try {
                const response = await fetch('/user/two-factor-authentication-status', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                const data = await response.json();
                this.enabled = data.enabled;
                this.loading = false;
            } catch (error) {
                console.error('Failed to check 2FA status:', error);
                this.loading = false;
            }
        },
        
        /**
         * Enable two-factor authentication
         */
        async enable() {
            this.loading = true;
            this.error = null;
            
            try {
                const response = await fetch('/user/two-factor-authentication', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                if (response.ok) {
                    this.showingQrCode = true;
                    this.success = 'Two-factor authentication has been enabled. Scan the QR code with your authenticator app.';
                    
                    // Fetch QR code and recovery codes
                    await this.fetchQrCodeAndRecoveryCodes();
                } else {
                    const data = await response.json();
                    this.error = data.message || 'Failed to enable two-factor authentication.';
                }
            } catch (error) {
                this.error = 'An error occurred while enabling two-factor authentication.';
                console.error('2FA enable error:', error);
            } finally {
                this.loading = false;
            }
        },
        
        /**
         * Fetch QR code and recovery codes
         */
        async fetchQrCodeAndRecoveryCodes() {
            try {
                const response = await fetch('/user/two-factor-qr-code', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                const data = await response.json();
                
                // Update QR code in the DOM
                document.getElementById('qrcode').innerHTML = data.svg;
                
                // Store recovery codes
                this.recoveryCodes = data.recovery_codes;
                
                // Update status
                this.enabled = true;
            } catch (error) {
                console.error('Failed to fetch QR code and recovery codes:', error);
                this.error = 'Failed to fetch QR code. Please refresh and try again.';
            }
        },
        
        /**
         * Show recovery codes
         */
        showRecoveryCodes() {
            this.showingQrCode = false;
            this.showingRecoveryCodes = true;
        },
        
        /**
         * Confirm with authentication code
         */
        async confirmEnable() {
            this.loading = true;
            this.error = null;
            
            try {
                const response = await fetch('/user/confirmed-two-factor-authentication', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        code: this.confirmationCode
                    })
                });
                
                if (response.ok) {
                    this.success = 'Two-factor authentication has been confirmed and is now enabled.';
                    this.enabled = true;
                    this.showingConfirmationForm = false;
                    this.showingQrCode = false;
                    
                    // Show recovery codes after successful confirmation
                    this.showRecoveryCodes();
                } else {
                    const data = await response.json();
                    this.error = data.message || 'Invalid authentication code. Please try again.';
                }
            } catch (error) {
                this.error = 'An error occurred while confirming two-factor authentication.';
                console.error('2FA confirmation error:', error);
            } finally {
                this.loading = false;
            }
        },
        
        /**
         * Disable two-factor authentication
         */
        async disable() {
            if (!confirm('Are you sure you want to disable two-factor authentication? This will make your account less secure.')) {
                return;
            }
            
            this.loading = true;
            this.error = null;
            
            try {
                const response = await fetch('/user/two-factor-authentication', {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                if (response.ok) {
                    this.success = 'Two-factor authentication has been disabled.';
                    this.enabled = false;
                    this.showingQrCode = false;
                    this.showingRecoveryCodes = false;
                    this.showingConfirmationForm = false;
                } else {
                    const data = await response.json();
                    this.error = data.message || 'Failed to disable two-factor authentication.';
                }
            } catch (error) {
                this.error = 'An error occurred while disabling two-factor authentication.';
                console.error('2FA disable error:', error);
            } finally {
                this.loading = false;
            }
        },
        
        /**
         * Copy recovery codes to clipboard
         */
        copyRecoveryCodes() {
            const text = this.recoveryCodes.join('\n');
            navigator.clipboard.writeText(text).then(() => {
                this.success = 'Recovery codes copied to clipboard.';
                
                setTimeout(() => {
                    this.success = null;
                }, 3000);
            }).catch(err => {
                console.error('Failed to copy recovery codes: ', err);
                this.error = 'Failed to copy recovery codes. Please select and copy them manually.';
            });
        },
        
        /**
         * Reset the component state
         */
        reset() {
            this.showingQrCode = false;
            this.showingRecoveryCodes = false;
            this.showingConfirmationForm = false;
            this.confirmationCode = '';
            this.error = null;
            this.success = null;
        }
    }));
});

/**
 * Handle two-factor challenge during login
 */
document.addEventListener('alpine:init', () => {
    Alpine.data('twoFactorChallenge', () => ({
        code: '',
        recovery: '',
        usingRecoveryCode: false,
        error: null,
        loading: false,
        
        /**
         * Verify the authentication code
         */
        async verifyCode() {
            this.loading = true;
            this.error = null;
            
            try {
                const response = await fetch('/two-factor-challenge', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        code: this.code
                    })
                });
                
                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    const data = await response.json();
                    this.error = data.message || 'Invalid authentication code. Please try again.';
                    this.loading = false;
                }
            } catch (error) {
                this.error = 'An error occurred. Please try again.';
                console.error('Two-factor challenge error:', error);
                this.loading = false;
            }
        },
        
        /**
         * Use recovery code
         */
        async useRecoveryCode() {
            this.loading = true;
            this.error = null;
            
            try {
                const response = await fetch('/two-factor-challenge', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        recovery_code: this.recovery
                    })
                });
                
                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    const data = await response.json();
                    this.error = data.message || 'Invalid recovery code. Please try again.';
                    this.loading = false;
                }
            } catch (error) {
                this.error = 'An error occurred. Please try again.';
                console.error('Recovery code challenge error:', error);
                this.loading = false;
            }
        },
        
        /**
         * Toggle between code and recovery code forms
         */
        toggleRecoveryCode() {
            this.usingRecoveryCode = !this.usingRecoveryCode;
            this.error = null;
        }
    }));
});
