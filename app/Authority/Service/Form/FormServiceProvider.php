<?php namespace Authority\Service\Form;

use Illuminate\Support\ServiceProvider;
use Authority\Service\Form\Login\LoginForm;
use Authority\Service\Form\Login\LoginFormValidator;
use Authority\Service\Form\Register\RegisterForm;
use Authority\Service\Form\Register\RegisterFormValidator;
use Authority\Service\Form\Group\GroupForm;
use Authority\Service\Form\Group\GroupFormValidator;
use Authority\Service\Form\User\UserForm;
use Authority\Service\Form\User\UserFormValidator;
use Authority\Service\Form\ResendActivation\ResendActivationForm;
use Authority\Service\Form\ResendActivation\ResendActivationFormValidator;
use Authority\Service\Form\ForgotPassword\ForgotPasswordForm;
use Authority\Service\Form\ForgotPassword\ForgotPasswordFormValidator;
use Authority\Service\Form\ChangePassword\ChangePasswordForm;
use Authority\Service\Form\ChangePassword\ChangePasswordFormValidator;
use Authority\Service\Form\SuspendUser\SuspendUserForm;
use Authority\Service\Form\SuspendUser\SuspendUserFormValidator;

class FormServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // Bind the Login Form
        $app->bind('Authority\Service\Form\Login\LoginForm', function($app)
        {
            return new LoginForm(
                new LoginFormValidator($app['validator']),
                $app->make('Authority\Repository\Session\SessionInterface')
           );
        });

        // Bind the Register Form
        $app->bind('Authority\Service\Form\Register\RegisterForm', function($app)
        {
            return new RegisterForm(
                new RegisterFormValidator($app['validator']),
                $app->make('Authority\Repository\User\UserInterface')
           );
        });

        // Bind the Group Form
        $app->bind('Authority\Service\Form\Group\GroupForm', function($app)
        {
            return new GroupForm(
                new GroupFormValidator($app['validator']),
                $app->make('Authority\Repository\Group\GroupInterface')
           );
        });

        // Bind the User Form
        $app->bind('Authority\Service\Form\User\UserForm', function($app)
        {
            return new UserForm(
                new UserFormValidator($app['validator']),
                $app->make('Authority\Repository\User\UserInterface')
           );
        });

        // Bind the Resend Activation Form
        $app->bind('Authority\Service\Form\ResendActivation\ResendActivationForm', function($app)
        {
            return new ResendActivationForm(
                new ResendActivationFormValidator($app['validator']),
                $app->make('Authority\Repository\User\UserInterface')
           );
        });

        // Bind the Forgot Password Form
        $app->bind('Authority\Service\Form\ForgotPassword\ForgotPasswordForm', function($app)
        {
            return new ForgotPasswordForm(
                new ForgotPasswordFormValidator($app['validator']),
                $app->make('Authority\Repository\User\UserInterface')
           );
        });

        // Bind the Change Password Form
        $app->bind('Authority\Service\Form\ChangePassword\ChangePasswordForm', function($app)
        {
            return new ChangePasswordForm(
                new ChangePasswordFormValidator($app['validator']),
                $app->make('Authority\Repository\User\UserInterface')
           );
        });

        // Bind the Suspend User Form
        $app->bind('Authority\Service\Form\SuspendUser\SuspendUserForm', function($app)
        {
            return new SuspendUserForm(
                new SuspendUserFormValidator($app['validator']),
                $app->make('Authority\Repository\User\UserInterface')
           );
        });

    }

}