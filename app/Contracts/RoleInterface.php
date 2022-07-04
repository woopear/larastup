<?php

namespace App\Contracts;

interface RoleInterface
{
    const admin = 'admin';
    const authenticated = 'authenticated';
    const public = 'public';
    const root = 'root';
}
