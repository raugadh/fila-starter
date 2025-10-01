## FilaStarter Kit

A Starter Kit For Filament with most necessities
pre-configured based on personal preferences/requirements.

Preview Login:

| Dark                                   | Light                                   |
|----------------------------------------|-----------------------------------------|
| ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-login-dark.webp) | ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-login-light.webp) 


Preview DashBoard:

| Dark                                       | Light                                       |
|--------------------------------------------|---------------------------------------------|
| ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-dashboard-dark.webp) | ![](https://raw.githubusercontent.com/raugadh/fila-starter/refs/heads/master/.github/preview-dashboard-light.webp) |


### Packages

[Laravel](https://github.com/laravel/laravel)  
[Livewire](https://github.com/livewire/livewire)  
[Filament](https://github.com/filamentphp/filament)

#### Packages Installed/Pre-configured

- Filament Packages
    - awcodes/light-switch
    - awcodes/overlook
    - bezhansalleh/filament-shield
    - diogogpinto/filament-auth-ui-enhancer
    - dutchcodingcompany/filament-developer-logins
    - filafly/brisk (Theme)
    - filafly/filament-phosphor-icons
    - gboquizosanchez/filament-log-viewer
    - jeffgreco13/filament-breezy
    - marcelweidum/filament-expiration-notice
    - unknow-sk/filament-logger

- Other Packages
    - barryvdh/laravel-ide-helper
    - barryvdh/laravel-debugbar
    - laravel/boost

### Compatibility

| Starter Kit | Filament Version |
| ----------- | ---------------- |
| **2.x**     | **_3.x_**        |
| **3.x**     | **4.x**          |

### Installation

#### Create New Project

```fish
composer create-project --prefer-dist raugadh/fila-starter example-app
```

#### Deployment

- Configure Project.
    - Update Composer Packages
    - Add Database Credentials
    - Add ASSET_PREFIX if deployed application in sub-folder
    - Link Storage

        ```fish
        php artisan storage:link
        ```

- Initialize Project

    ```fish
    php artisan project:init
    ```

- Update Permissions and Migrations
    - Whenever new Resource , Page or migration is Added Run update command to migrate and create permissions.
        ```fish
        php artisan project:update
        ```

- build vite assets

    ```fish
    bun install && bun run build
    ```

- Clear/Generate Cache

    ```fish
    php artisan project:cache
    ```

- Generate IDE Helpers

    ```fish
    php artisan dev:init
    ```

- Configure [Laravel Boost](https://github.com/laravel/boost)

    ```fish
    php artisan boost:install
    ```

##### Make sure to check custom console commands yourself and change them based on your requirements.

#### Enjoy

    Thanks for using this kit, leave a star if you found this useful.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
