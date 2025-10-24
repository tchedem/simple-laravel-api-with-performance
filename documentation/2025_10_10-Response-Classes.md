# Laravel Response Classes

Laravel provides two main ways to generate and handle HTTP responses:

---

## `Illuminate\Support\Facades\Response`

**Type:** Facade  
**Purpose:** Provides a static interface to Laravel’s `response()` helper.  
**Use Case:** To quickly build different types of responses (JSON, file, view, etc.)  

**Examples:**

```php
use Illuminate\Support\Facades\Response;

// JSON response
return Response::json(['message' => 'Success'], 200);

// File download
return Response::download(storage_path('app/file.pdf'));
```

## `Illuminate\Http\Response`

**Type**: Concrete class (extends Symfony’s Response)
**Purpose**: Represents an actual HTTP response object.
**Use Case**: To return or inspect responses, or to use HTTP status code constants.

Examples:
```php
use Illuminate\Http\Response;

// Using HTTP status constants
return response()->json(['error' => 'Forbidden'], Response::HTTP_FORBIDDEN);
```


If you want to know all available contant in the `Illuminate\Http\Response` class

```bash
php artisan serve

> use Illuminate\Http\Response;
> print_r((new \ReflectionClass(Response::class))->getConstants());
```
