<p align="center">
    <img src="thedigitalmedium.png">
    <a rel="dofollow" href="https://thedigitalmedium.com">The Digital Medium</a>
</p>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/thedigitalmedium/api-helper-command.svg?style=flat-square)](https://packagist.org/packages/thedigitalmedium/api-helper-command)
[![Total Downloads](https://img.shields.io/packagist/dt/thedigitalmedium/api-helper-command.svg?style=flat-square)](https://packagist.org/packages/thedigitalmedium/api-helper-command)

## Installation
to install the package using composer:
```
composer require thedigitalmedium/api-helper-command
```

**Effortlessly Generate Essential API Files**

Building APIs often involves juggling multiple files and configurations. The API Helper Command simplifies this process, automating the generation of key files for seamless API development.

## Key Features and Usage:

- **Comprehensive File Generation:**
- **Generate all essential files with a single command:**
  ```bash
  php artisan api:generate ModelName --all
  ```
- This command creates migrations, models, controllers, factories, and resources for the specified model, saving you time and effort.

## Schema Support for Custom Database Tables:
- **Define database table structures directly in the command line:**
  ```bash
  php artisan api:generate ModelName "column1:string|column2:integer|column3:datetime"
  ```
- This feature automatically generates model migrations, requests, and data based on your defined schema, ensuring a consistent and accurate setup.

## Benefits:

- **Accelerated Development:** Focus on building API logic rather than repetitive file creation.
- **Reduced Errors:** Eliminate manual file setup errors and inconsistencies.
- **Streamlined Workflow:** Maintain a clean and organized file structure.
- **Flexibility:** Adapt to evolving API requirements with ease.


The API Helper Command empowers developers to create APIs efficiently and effectively. Its comprehensive file generation and schema support features reduce development time, ensure consistency, and promote a more streamlined development experience. Embrace this powerful tool to accelerate your API development process and create robust, scalable APIs with ease.

## License

By contributing to the Laravel API Helper Command, you agree that your contributions will be licensed under the project's [MIT License](LICENSE.md).
