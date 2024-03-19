<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Set Fortify settings for guards, passwords, and prefix based on the request
        $request = request();
        if($request->is("admin/*")){
            Config::set('fortify.guard','admin');
            Config::set('fortify.passwords','admins');
            Config::set('fortify.prefix','admin');
        }
    }

    public function boot(): void
    {
        // Set Fortify processors for user creation, profile update, password update, and password reset
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // If the guard is set to admin, configure view prefix and login/register responses for admin
        if(config::get('fortify.guard') == 'admin'){
            Fortify::viewPrefix('AdminAuth.');

            $this->app->instance(LoginResponse::class,new class implements LoginResponse{
                public function toResponse($request){
                    return redirect()->intended('admin/admin');
                }
            });

            $this->app->instance(RegisterResponse::class,new class implements RegisterResponse{
                public function toResponse($request){
                    return redirect()->intended('admin/admin');
                }
            });

        }else{ // If the guard is not admin, configure view prefix and login/register responses for user
            Fortify::viewPrefix('UserAuth.');
            
            $this->app->instance(LoginResponse::class,new class implements LoginResponse{
                public function toResponse($request){
                    return redirect()->intended('user');
                }
            });

            $this->app->instance(RegisterResponse::class,new class implements RegisterResponse{
                public function toResponse($request){
                    return redirect()->intended('user');
                }
            });

        }

        // Set rate limits for login and two-factor authentication
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
