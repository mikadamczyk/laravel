php artisan generate:scaffold objects --fields="deleted:integer, hidden:integer, name:string"
php artisan generate:scaffold programs --fields="deleted:integer, hidden:integer, name:string"
php artisan generate:scaffold telescopes --fields="deleted:integer, hidden:integer, name:string"
php artisan generate:scaffold detectors --fields="deleted:integer, hidden:integer, name:string"
php artisan generate:scaffold filters --fields="deleted:integer, hidden:integer, name:string"

php artisan generate:scaffold devices --fields="deleted:integer, hidden:integer, name:string"
php artisan generate:scaffold types --fields="deleted:integer, hidden:integer, name:string"

ECHO Hello World!