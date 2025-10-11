### Laravel Model Relationships

First, we need to address what a Model is.

A Model in Laravel is a convenient way to represent a database table.
Technically, it’s a PHP class with a name, attributes, and methods.

It helps us interact with the database tables through Eloquent, Laravel’s built-in ORM (Object Relational Mapper).

Relationships allow us to link related models based on foreign keys — so we can easily retrieve connected data without writing complex SQL.


## One To One

Example: A `User` has one `Profile`.

```php
// App\Models\User.php
public function profile()
{
    return $this->hasOne(Profile::class);
}

// App\Models\Profile.php
public function user()
{
    return $this->belongsTo(User::class);
}

// App\Http\Controllers\UserController.php

use App\Models\User;
use Illuminate\Http\Response;

public function show($uuid) {
    $user = User::where('id', $uuid);

    if(!$user) {
        return response()->json(['message' => 'User not found'], Response)
    }
    return
}

```


## Polymorphic


