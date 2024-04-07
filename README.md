## FilaStarter Kit

A Starter Kit For Filament with most basic necessities
pre-configured based on personal preference/requirements.

### Packages

[Laravel](https://github.com/laravel/laravel)  
[Livewire](https://github.com/livewire/livewire)  
[Filament](https://github.com/filamentphp/filament)

#### Packages Installed/Pre-configured

-   Filament Packages

    -   bezhansalleh/filament-shield
    -   jeffgreco13/filament-breezy
    -   z3d0x/filament-logger
    -
    -   awcodes/overlook
    -   awcodes/light-switch
    -   hasnayeen/themes (Default set to Sunset)
    -   joshembling/image-optimizer
    -   njxqlus/filament-progressbar
    -   swisnl/filament-backgrounds
    -   aymanalhattami/filament-slim-scrollbar

-   Other Packages

    -   barryvdh/laravel-ide-helper
    -   barryvdh/laravel-debugbar

-   Notes:

    -   Shield configured to create only these permissions
        `'view','view_any','create','update','delete','delete_any',`

### Installation

#### Create New Project

```fish
composer create-project --prefer-dist raugadh/fila-starter example-app
```

#### Deployment

-   Configure Project.

    -   Update Composer Packages
    -   Add Database Credentials
    -   Add ASSET_PREFIX if deployed application in sub-folder
    -   Link Storage

        ```fish
        php artisan storage:link
        ```

-   Initialize Project

    -   Runs Following in sequence

        ```yaml
        migrate:fresh --force
        shield:generate -all
        db:seed --force
        optimize:clear
        ```

    -   or

        ```fish
          php artisan project:init
        ```

-   Update Permissions and Migrations

    -   Whenever new Resource , Page or migration is Added Run update command to migrate and create permissions.

    -   Runs Following in sequence

        ```yaml
        migrate
        shield:generate -all
        optimize:clear
        ```

    -   or

        ```fish
        php artisan project:update
        ```

-   build vite assets

    ```fish
    npm install && npm run build
    ```

-   Generate IDE:Helper files

    ```yaml
    ide-helper:generate
    ide-helper:models --nowrite
    ide-helper:meta
    ```

    or

    ```fish
    php artisan dev:init
    ``
    ```

#### Enjoy

    Thanks for using this kit, leave a star if you found this useful.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
