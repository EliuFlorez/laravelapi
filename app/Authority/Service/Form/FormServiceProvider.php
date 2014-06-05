<?php namespace Authority\Service\Form;

use Illuminate\Support\ServiceProvider;
use Authority\Service\Form\User\UserForm;
use Authority\Service\Form\User\UserFormValidator;

class FormServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
		// App Service
        $app = $this->app;

        // Bind the User Form
        $app->bind('Authority\Service\Form\User\UserForm', function($app)
        {
            return new UserForm(
                new UserFormValidator($app['validator']), 
				$app->make('Authority\Repository\User\UserInterface')
			);
        });

    }

}