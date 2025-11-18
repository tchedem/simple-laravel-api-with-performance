<?php

namespace App\Services;

use App\Mail\DemoWelcomeNewUserMailable;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendWelcomeMail(string $email, string $name, string $plan, ?string $policyPath = null): bool
    {
        try {
            Mail::to($email)->send(
                new DemoWelcomeNewUserMailable(
                    name: $name,
                    plan: $plan,
                    policyPath: $policyPath
                )
            );

            return true;
        } catch (\Exception $e) {
            // Optionally log error:
            // logger()->error("Mail error: " . $e->getMessage());
            return false;
        }
    }
}
