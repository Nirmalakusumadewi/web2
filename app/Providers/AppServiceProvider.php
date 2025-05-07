namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Di sini Anda bisa mendaftarkan layanan atau binding
        // Contoh: $this->app->bind('SomeService', 'SomeImplementation');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Anda bisa menambahkan pengaturan lainnya di sini
        // Misalnya, kita buat route API secara manual
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));  // pastikan api.php ada

        // Misalnya, untuk global settings atau binding lainnya
        // Anda bisa menetapkan pengaturan default atau validasi global
    }
}