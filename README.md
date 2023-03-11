# FilaStarter Kit

A Starter Kit For Filament with most basic necessities pre-configured.

## Packages

[Laravel](https://github.com/laravel/laravel)  
[Livewire](https://github.com/livewire/livewire)  
[Filament](https://github.com/filamentphp/filament)

### Filament Plugins Installed/Pre-configured

- Filament Shield
- Filament Breezy Auth
- Logger
- Filament Export
- Static Asset Handler
- Tall Interactive
- Components

Other dev dependencies

- Laravel debugbar
- Laravel ide helper

Notes: Sheild configured to create only these permisions

`'view','view_any','create','update','delete','delete_any',`

### Installtion

Create New Project

```bash
  composer create-project --prefer-dist raugadh/fila-starter example-app
```

Add to existing project

```bash
  composer require raugadh/fila-starter
```

Deployment

- configure env for database.

```bash
  php artisan project:init

```

### Note: Whenever new Resource or Page is Added Run `project:init` to migrate and create permissions.

command runs following in succession

- Migrate
- Shield Generate -all
- Seed database
- clear cache

must be followed in this sequence to generate roles.

command can also be run through route

```sh
APP_URL/data
```

Generate Static Assets

```bash
php artisan filament:cache-assets

```

build vite assets

```bash
npm install && npm run build

```

#### Thanks
