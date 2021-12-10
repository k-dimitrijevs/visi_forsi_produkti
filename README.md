# Visi forši produkti
This is basic product catalog built in Laravel.

### Functionality

- Create product
- See all created products
- Edit product
- Delete product
- See product attributes
- Add attributes to product
- Delete attributes from product

### Running project

1. Clone this project
2. Go to project folder
3. Run `composer install` in CMD or Terminal
4. Copy `.env.example` file and place in root folder as `.env`. 
   - For Windows: `copy .env.example .env`
   - For Linux: `cp .env.example .env`
5. Create new database.
6. Go to `.env` and change following lines:
   - `DB_DATABASE` - Change the database name to your database name
   - `DB_USERNAME` - Change to your username (default "root")
   - `DB_PASSWORD` - Insert your password for user
7. Run `php artisan key:generate` command
8. Run `npm instal && npm run dev` command
9. Run `php artisan migrate` command
10. To run local server - `php artisan serve`
