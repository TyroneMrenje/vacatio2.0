<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Models\EventSpaceBooking;
use App\Policies\EventSpaceBookingPolicy;
use App\Models\RoomAddOnsBookings;
use App\Policies\RoomAddOnsBookingsPolicy;
use App\Models\RoomBookings;
use App\Models\Service;
use App\Policies\ServicePolicy;
use App\Policies\RoomBookingsPolicy;
use App\Models\ServiceBooking;
use App\Policies\ServiceBookingPolicy;
use App\Models\UserReview;
use App\Policies\UserReviewPolicy;
use App\Models\ServiceMenu;
use App\Policies\ServiceMenuPolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class); 
        Gate::policy(UserReview::class, UserReviewPolicy::class);
        Gate::policy(EventSpaceBooking::class, EventSpaceBookingPolicy::class);
        Gate::policy(RoomAddOnsBookings::class, RoomAddOnsBookingsPolicy::class);
        Gate::policy(RoomBookings::class, RoomBookingsPolicy::class);
        Gate::policy(ServiceBooking::class, ServiceBookingPolicy::class);
        Gate::policy(ServiceMenu::class, ServiceMenuPolicy::class);
        Gate::policy(Service::class, ServicePolicy::class);
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
