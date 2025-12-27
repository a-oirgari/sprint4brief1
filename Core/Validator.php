<?php 
namespace App\Core; 

class Validator
{
    public static function isNotEmpty(string $input): bool
    {
        return trim($input) !== '';
    }

    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidPhone(string $phone): bool
    {
        return preg_match('/^(06|07)[0-9]{8}$/', $phone);
    }

    public static function isValidDate(string $date): bool
    {
        return (bool)strtotime($date);
    }

    public static function sanitize(string $input): string
    {
        return htmlspecialchars(trim($input));
    }
}
