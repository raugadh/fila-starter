## FilaStarter Kit

A Starter Kit For Filament with most basic necessities pre-configured.

### Packages

[Laravel](https://github.com/laravel/laravel)  
[Livewire](https://github.com/livewire/livewire)  
[Filament](https://github.com/filamentphp/filament)

#### Packages Installed/Pre-configured

- Filament Packages

   - Filament Shield by bezhansalleh
   - Filament Breezy by jeffgreco13
   - Filament Logger by z3d0x
   - Filament Components by ralphjsmit
   - Filament Light Switch by awcodes
   - Filament Overlook by awcodes
   - Filament Progressbar by njxqlus

- Other Packages

   - Laravel IDE Helper by barryvdh

- Notes:

   - Shield configured to create only these permissions
      `'view','view_any','create','update','delete','delete_any',`

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

    - Runs Following in sequence

        ```yaml
        migrate:fresh --force
        shield:generate -all
        db:seed --force
        optimize:clear
        ```

    ```fish
      php artisan project:init
    ```

- Update Permissions and Migrations

    - Whenever new Resource , Page or migration is Added Run update command to migrate and create permissions.

    - Runs Following in sequence

        ```yaml
        migrate
        shield:generate -all
        optimize:clear
        ```

    ```fish
    php artisan project:update
    ```

- build vite assets

    ```fish
    npm install && npm run build
    ```

### Thanks
