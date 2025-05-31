// Alpine.js components for Digital Marketing Platform

// Mobile menu component
document.addEventListener('alpine:init', () => {
    Alpine.data('mobileMenu', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        }
    }));

    // Dropdown component
    Alpine.data('dropdown', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        }
    }));

    // Notification component
    Alpine.data('notifications', () => ({
        notifications: [],
        unreadCount: 0,
        open: false,
        init() {
            // Fetch notifications from API
            this.fetchNotifications();
            
            // Listen for new notifications
            window.Echo && window.Echo.private(`App.Models.User.${userId}`)
                .notification((notification) => {
                    this.notifications.unshift(notification);
                    this.unreadCount++;
                });
        },
        async fetchNotifications() {
            try {
                const response = await fetch('/api/notifications');
                const data = await response.json();
                this.notifications = data.notifications;
                this.unreadCount = data.unread_count;
            } catch (error) {
                console.error('Failed to fetch notifications:', error);
            }
        },
        async markAsRead(id) {
            try {
                await fetch(`/api/notifications/${id}/read`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                this.notifications = this.notifications.map(notification => {
                    if (notification.id === id) {
                        notification.read_at = new Date();
                        this.unreadCount = Math.max(0, this.unreadCount - 1);
                    }
                    return notification;
                });
            } catch (error) {
                console.error('Failed to mark notification as read:', error);
            }
        },
        toggle() {
            this.open = !this.open;
        }
    }));

    // Two-factor authentication component
    Alpine.data('twoFactorAuth', () => ({
        step: 1,
        code: '',
        recoveryCode: '',
        error: '',
        success: '',
        loading: false,
        async verifyCode() {
            this.loading = true;
            this.error = '';
            
            try {
                const response = await fetch('/two-factor/verify', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ code: this.code })
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    this.success = 'Verification successful. Redirecting...';
                    window.location.href = data.redirect || '/dashboard';
                } else {
                    this.error = data.message || 'Invalid verification code. Please try again.';
                }
            } catch (error) {
                this.error = 'An error occurred. Please try again.';
                console.error('Two-factor verification error:', error);
            } finally {
                this.loading = false;
            }
        },
        async useRecoveryCode() {
            this.loading = true;
            this.error = '';
            
            try {
                const response = await fetch('/two-factor/recovery-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ recovery_code: this.recoveryCode })
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    this.success = 'Recovery code accepted. Redirecting...';
                    window.location.href = data.redirect || '/dashboard';
                } else {
                    this.error = data.message || 'Invalid recovery code. Please try again.';
                }
            } catch (error) {
                this.error = 'An error occurred. Please try again.';
                console.error('Recovery code verification error:', error);
            } finally {
                this.loading = false;
            }
        },
        showRecoveryForm() {
            this.step = 2;
            this.error = '';
        },
        showCodeForm() {
            this.step = 1;
            this.error = '';
        }
    }));

    // Admin dashboard component
    Alpine.data('adminDashboard', () => ({
        stats: {
            users: 0,
            documents: 0,
            downloads: 0,
            views: 0
        },
        recentActivities: [],
        popularDocuments: [],
        loading: true,
        init() {
            this.fetchDashboardData();
        },
        async fetchDashboardData() {
            try {
                const response = await fetch('/admin/api/dashboard');
                const data = await response.json();
                
                this.stats = data.stats;
                this.recentActivities = data.recent_activities;
                this.popularDocuments = data.popular_documents;
                this.loading = false;
            } catch (error) {
                console.error('Failed to fetch dashboard data:', error);
                this.loading = false;
            }
        }
    }));

    // Document filter component
    Alpine.data('documentFilter', () => ({
        search: '',
        category: '',
        status: '',
        sortBy: 'created_at',
        sortOrder: 'desc',
        loading: false,
        documents: [],
        pagination: {},
        init() {
            this.fetchDocuments();
            
            // Watch for changes in filter values
            this.$watch('search', () => this.debouncedFetch());
            this.$watch('category', () => this.fetchDocuments());
            this.$watch('status', () => this.fetchDocuments());
            this.$watch('sortBy', () => this.fetchDocuments());
            this.$watch('sortOrder', () => this.fetchDocuments());
        },
        debouncedFetch: Alpine.debounce(function() {
            this.fetchDocuments();
        }, 300),
        async fetchDocuments(page = 1) {
            this.loading = true;
            
            const params = new URLSearchParams({
                page,
                search: this.search,
                category: this.category,
                status: this.status,
                sort_by: this.sortBy,
                sort_order: this.sortOrder
            });
            
            try {
                const response = await fetch(`/admin/api/documents?${params.toString()}`);
                const data = await response.json();
                
                this.documents = data.data;
                this.pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    from: data.from,
                    to: data.to,
                    total: data.total
                };
                
                this.loading = false;
            } catch (error) {
                console.error('Failed to fetch documents:', error);
                this.loading = false;
            }
        },
        goToPage(page) {
            this.fetchDocuments(page);
        },
        toggleSortOrder() {
            this.sortOrder = this.sortOrder === 'asc' ? 'desc' : 'asc';
        }
    }));
});

// Flash message auto-dismiss
document.addEventListener('DOMContentLoaded', () => {
    const flashMessages = document.querySelectorAll('.flash-message');
    
    flashMessages.forEach(message => {
        setTimeout(() => {
            message.classList.add('opacity-0');
            setTimeout(() => {
                message.remove();
            }, 300);
        }, 5000);
    });
});

// Confirm dialog for dangerous actions
window.confirmAction = function(message, callback) {
    if (confirm(message)) {
        callback();
    }
};

// Copy to clipboard functionality
window.copyToClipboard = function(text, elementId) {
    navigator.clipboard.writeText(text).then(() => {
        const element = document.getElementById(elementId);
        const originalText = element.textContent;
        
        element.textContent = 'Copied!';
        
        setTimeout(() => {
            element.textContent = originalText;
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy text: ', err);
    });
};

// File upload preview
window.previewFile = function(input, previewElement) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById(previewElement).src = e.target.result;
        };
        
        reader.readAsDataURL(input.files[0]);
    }
};
