<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Domain\Contracting\Models{
/**
 * Domain\Contracting\Models\Client
 *
 * @property int $id
 * @property string $uuid
 * @property string $first_name
 * @property string $last_name
 * @property string|null $phone
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Domain\Contracting\Models\Contract|null $contract
 * @method static \Database\Factories\ClientFactory factory(...$parameters)
 * @method static \Domain\Contracting\QueryBuilders\ClientBuilder|Client filter($filterClass = null)
 * @method static \Domain\Contracting\QueryBuilders\ClientBuilder|Client newModelQuery()
 * @method static \Domain\Contracting\QueryBuilders\ClientBuilder|Client newQuery()
 * @method static \Illuminate\Database\Query\Builder|Client onlyTrashed()
 * @method static \Domain\Contracting\QueryBuilders\ClientBuilder|Client query()
 * @method static \Illuminate\Database\Query\Builder|Client withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Client withoutTrashed()
 */
	class Client extends \Eloquent {}
}

namespace Domain\Contracting\Models{
/**
 * Domain\Contracting\Models\Contract
 *
 * @property int $id
 * @property string $uuid
 * @property int $client_id
 * @property \Illuminate\Support\Carbon $payed_at
 * @property float $price
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon $expired_at
 * @property string|null $comment
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Domain\Contracting\Models\Client $client
 * @method static \Database\Factories\ContractFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract query()
 */
	class Contract extends \Eloquent {}
}

namespace Domain\Contracting\Models{
/**
 * Domain\Contracting\Models\Payment
 *
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 */
	class Payment extends \Eloquent {}
}

namespace Domain\Shared\Models{
/**
 * Domain\Shared\Models\User
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Domain\Shared\Models\Builders\UserBuilder|User newModelQuery()
 * @method static \Domain\Shared\Models\Builders\UserBuilder|User newQuery()
 * @method static \Domain\Shared\Models\Builders\UserBuilder|User permission($permissions)
 * @method static \Domain\Shared\Models\Builders\UserBuilder|User query()
 * @method static \Domain\Shared\Models\Builders\UserBuilder|User role($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

