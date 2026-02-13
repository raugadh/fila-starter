## FilaStarter Kit

A Starter Kit For Filament with most necessities
pre-configured based on personal preferences/requirements.

Preview Login:

| Dark                                                                                                          | Light                                                                                                          |
| ------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- |
| ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-login-dark.webp) | ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-login-light.webp) |

Preview DashBoard:

| Dark                                                                                                              | Light                                                                                                              |
| ----------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------ |
| ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-dashboard-dark.webp) | ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-dashboard-light.webp) |

### Packages

[Laravel v12](https://github.com/laravel/laravel)  
[Livewire v4](https://github.com/livewire/livewire)  
[Filament v5](https://github.com/filamentphp/filament)

#### Packages Installed/Pre-configured

- Filament Packages
    - awcodes/overlook
    - bezhansalleh/filament-shield
    - caresome/filament-auth-designer
    - charrafimed/global-search-modal
    - dutchcodingcompany/filament-developer-logins
    - jacobtims/filament-logger
    - jeffgreco13/filament-breezy
    - marcelweidum/filament-expiration-notice
    - openplain/filament-shadcn-theme (Theme)

- Other Packages
    - barryvdh/laravel-debugbar
    - laravel/boost

### Compatibility

| Starter Kit | Filament Version |
| ----------- | ---------------- |
| **2.x**     | **_3.x_**        |
| **3.x**     | **4.x**          |
| **4.x**     | **5.x**          |

### Installation

#### Create New Project

```properties
composer create-project --prefer-dist raugadh/fila-starter example-app
```

#### Deployment

- Configure Project.
    - Update Composer Packages
    - Add Database Credentials
    - Add ASSET_PREFIX if deployed application in sub-folder
    - Link Storage

        ```properties
        php artisan storage:link
        ```

- Initialize Project

    ```properties
    php artisan project:init
    ```

- Update Permissions and Migrations
    - Whenever new Resource , Page or migration is Added Run update command to migrate and create permissions.
        ```properties
        php artisan project:update
        ```

- build vite assets

    ```properties
    npm install
    ```

    ```properties
    npm run build
    ```

- Clear/Generate New Cache

    ```properties
    php artisan project:cache
    ```

- Configure [Laravel Boost](https://github.com/laravel/boost)

    ```properties
    php artisan boost:install
    ```

##### Make sure to check custom console commands yourself and change them based on your requirements.

### Lint & Fix

- Pint ('test') & Prettier('check')

    ```properties
    composer lint
    ```

- Pint & Prettier('write')

    ```properties
    composer fix
    ```

#### Enjoy

    Thanks for using this kit, leave a star if you found this useful.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
