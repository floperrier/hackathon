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
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereZip($value)
 */
	class Client extends \Eloquent {}
}

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
 * App\Models\Project
 *
 * @property-read \App\Models\Client|null $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $developers
 * @property-read int|null $developers_count
 * @method static \Database\Factories\ProjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Reward
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property int $is_new
 * @property int $required_score
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RewardFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Reward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereRequiredScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereUpdatedAt($value)
 */
	class Reward extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RewardUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RewardUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RewardUser query()
 */
	class RewardUser extends \Eloquent {}
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
 * @property int|null $client_id
 * @property string|null $job_title
 * @property int|null $salary
 * @property string|null $available
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \QCod\Gamify\Badge> $badges
 * @property-read int|null $badges_count
 * @property-read \App\Models\Client|null $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LanguageRank> $languagesRanks
 * @property-read int|null $languages_ranks_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \QCod\Gamify\Reputation> $reputations
 * @property-read int|null $reputations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reward> $rewards
 * @property-read int|null $rewards_count
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodewarsScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodewarsUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInitiated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReputation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

