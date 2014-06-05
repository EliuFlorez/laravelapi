<?php namespace Authority\Repository;

use Illuminate\Support\ServiceProvider;
use Authority\Repository\Session\SentrySession;
use Authority\Repository\User\SentryUser;
use Authority\Repository\Group\SentryGroup;
use Cartalyst\Sentry\Sentry;

class RepoServiceProvider extends ServiceProvider {

	/**
	 * Register the binding
	 */
	public function register()
	{
		$app = $this->app;

		 // Bind the Session Repository
        $app->bind('Authority\Repository\Session\SessionInterface', function($app)
        {
            return new SentrySession(
            	$app['sentry']
            );
        });

        // Bind the User Repository
        $app->bind('Authority\Repository\User\UserInterface', function($app)
        {
            return new SentryUser(
            	$app['sentry']
            );
        });

        // Bind the Group Repository
        $app->bind('Authority\Repository\Group\GroupInterface', function($app)
        {
            return new SentryGroup(
                $app['sentry']
            );
        });
	}

}