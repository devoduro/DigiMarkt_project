<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The user roles
     */
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'last_login_at',
        'is_active',
        'two_factor_secret',
        'two_factor_secret_temp',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime',
            'is_active' => 'boolean',
            'two_factor_secret' => 'encrypted',
            'two_factor_secret_temp' => 'encrypted',
            'two_factor_recovery_codes' => 'encrypted',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    /**
     * Check if user is an admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Get the documents that belong to the user.
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    
    /**
     * Get the downloads that belong to the user.
     */
    public function downloads()
    {
        return $this->hasMany(Download::class);
    }
    
    /**
     * Determine if two-factor authentication is enabled.
     *
     * @return bool
     */
    public function hasTwoFactorEnabled(): bool
    {
        return !is_null($this->two_factor_secret) && !is_null($this->two_factor_confirmed_at);
    }
    
    /**
     * Validate a two-factor authentication code.
     *
     * @param  string  $code
     * @return bool
     */
    public function validateTwoFactorAuthenticationCode(string $code): bool
    {
        if (!$this->hasTwoFactorEnabled()) {
            return false;
        }
        
        $google2fa = app('pragmarx.google2fa');
        
        try {
            return $google2fa->verifyKey(
                decrypt($this->two_factor_secret),
                $code
            );
        } catch (\Exception $e) {
            return false;
        }
    }
    
    /**
     * Verify a recovery code.
     *
     * @param  string  $code
     * @return bool
     */
    public function verifyTwoFactorRecoveryCode(string $code): bool
    {
        if (!$this->hasTwoFactorEnabled() || is_null($this->two_factor_recovery_codes)) {
            return false;
        }
        
        try {
            $recoveryCodes = json_decode(decrypt($this->two_factor_recovery_codes), true) ?? [];
            
            if (in_array($code, $recoveryCodes)) {
                // Remove the used recovery code
                $recoveryCodes = array_values(array_filter(
                    $recoveryCodes,
                    fn ($c) => $c !== $code
                ));
                
                // Update the user's recovery codes
                $this->two_factor_recovery_codes = encrypt(json_encode($recoveryCodes));
                $this->save();
                
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
        
        return false;
    }
}
