<?php namespace Twitnic\FileAuth;

use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Auth\UserProvider as UserProviderInterface;
use Illuminate\Contracts\Auth\Authenticatable as UserInterface;

class FileUserProvider implements UserProviderInterface {

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $id
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveById($id)
    {
        $admin = $this->adminUser();

        if ($id == $admin->id) {
            return $this->adminUser();
        } else {
            return null;
        }
    }

    /**
     * Needed by Laravel 4.1.26 and above
     */
    public function retrieveByToken($identifier, $token)
    {
        return new \Exception('not implemented');
    }

    /**
     * Needed by Laravel 4.1.26 and above
     */
    public function updateRememberToken(UserInterface $user, $token)
    {
        return new \Exception('not implemented');
    }

    /**
     * Retrieve a user by the given credentials.
     * DO NOT TEST PASSWORD HERE!
     *
     * @param  array  $credentials
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $admin = $this->adminUser();

        if ($credentials['username'] == $admin->username) {
            return $this->adminUser();
        } else {
            return null;
        }
    }

    /**
     * Return a generic fake user
     */
    protected function adminUser()
    {

        //Eventuell fuer spaeter: Username und Password in der config/app.php auslesen: Config::get('username')

        $attributes = array(
            'id' => 1,
            'username' => getenv('username'),
            'password' => getenv('password'),
        );
        return new GenericUser($attributes);
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Auth\UserInterface  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserInterface $user, array $credentials)
    {
        $admin = $this->adminUser();

        if ($credentials['password'] == $admin->password) {
            return $this->adminUser();
        } else {
            return null;
        }
    }

}
