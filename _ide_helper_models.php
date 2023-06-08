<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\LanguageRank
 *
 * @property int $id
 * @property string|null $language_name
 * @property string|null $rank_name
 * @property int|null $rank
 * @property int|null $score
 * @property string|null $years_of_experience
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank query()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereLanguageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereRankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageRank whereYearsOfExperience($value)
 */
	class LanguageRank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int $reputation
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $codewars_username
 * @property int|null $codewars_score
 * @property int $initiated
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LanguageRank> $languagesRanks
 * @property-read int|null $languages_ranks_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodewarsScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodewarsUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInitiated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReputation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

