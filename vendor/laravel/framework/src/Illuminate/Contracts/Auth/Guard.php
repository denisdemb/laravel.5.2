<?php

namespace Illuminate\Contracts\Auth;

interface Guard
{
    /**
     * Determine if the current users is authenticated.
     *
     * @return bool
     */
    public function check();

    /**
     * Determine if the current users is a guest.
     *
     * @return bool
     */
    public function guest();

    /**
     * Get the currently authenticated users.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user();

    /**
     * Get the ID for the currently authenticated users.
     *
     * @return int|null
     */
    public function id();

    /**
     * Validate a users's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = []);

    /**
     * Set the current users.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function setUser(Authenticatable $user);
}
