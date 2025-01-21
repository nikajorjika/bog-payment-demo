### Demo project for: [Laravel bog Payment Package](https://github.com/nikajorjika/laravel-bog-payment)

For implementing Bog Payments into your project refer to [Documentation](https://github.com/nikajorjika/laravel-bog-payment)

This repository is only for demonstration purposes, some features may not be implemented.

## How to install:
1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Run `php artisan key:generate`
5. Populate `.env` with your BOG credentials(see example below)
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Run `php artisan serve`
9. Open http://localhost:8000/initiate


example .env variables: 
```
BOG_SECRET=[your_secret] // Secret that you get from BOG
BOG_CLIENT_ID=[your_client_id] // Client ID that you get from BOG
BOG_PUBLIC_KEY="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAu4RUyAw3+CdkS3ZNILQh
zHI9Hemo+vKB9U2BSabppkKjzjjkf+0Sm76hSMiu/HFtYhqWOESryoCDJoqffY0Q
1VNt25aTxbj068QNUtnxQ7KQVLA+pG0smf+EBWlS1vBEAFbIas9d8c9b9sSEkTrr
TYQ90WIM8bGB6S/KLVoT1a7SnzabjoLc5Qf/SLDG5fu8dH8zckyeYKdRKSBJKvhx
tcBuHV4f7qsynQT+f2UYbESX/TLHwT5qFWZDHZ0YUOUIvb8n7JujVSGZO9/+ll/g
4ZIWhC1MlJgPObDwRkRd8NFOopgxMcMsDIZIoLbWKhHVq67hdbwpAq9K9WMmEhPn
PwIDAQAB
-----END PUBLIC KEY-----" // Public key that you get from BOG documentation https://api.bog.ge/docs/payments/standard-process/callback
```

## What's implemented:

- [x] [Initiate Payment](https://github.com/nikajorjika/bog-payment-demo/blob/main/app/Http/Controllers/InitiatePaymentController.php)
- [x] [Handle transaction status page](https://github.com/nikajorjika/bog-payment-demo/blob/main/app/Http/Controllers/TransactionStatusController.php)
- [x] [Handle Callback Event Listener](https://github.com/nikajorjika/bog-payment-demo/blob/main/app/Listeners/TransactionStatusUpdateListener.php)
