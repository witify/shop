<?php

namespace App\Console\Commands\Shop;

use App\Page;
use App\User;
use App\GlobalModel;
use App\ProductCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add administrators and install basics pages';

    /**
     * Locales
     *
     * @var array
     */
    private $locales = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        $this->createDefaultCategory();
        $this->createDevUser();
        $this->createAdminUser();
        
        $this->createAboutText();

        $this->createHomePage();
        $this->createContactPage();
        $this->createCartPage();
        $this->createCheckoutPage();
        $this->createLoginPage();
        $this->createRegisterPage();
    }

    private function createDefaultCategory()
    {
        $this->info('Creating global product category');
        ProductCategory::create(['name' => ['fr' => 'Produits', 'en' => 'Products']]);
    }

    private function createDevUser()
    {
        User::create([
            'email' => 'francois@witify.io',
            'name' => 'God',
            'password' => bcrypt('secret'),
            'role' => 'dev',
            'api_token' => str_random(60)
        ]);

        $this->info('Dev account created (francois@witify.io)');
    }

    private function createAdminUser()
    {
        $adminName = $this->anticipate("Enter the administrator's name:", ['Shop Master']);
        $adminEmail = $this->anticipate("Enter the administrator's email:", ['admin@witify.io']);

        User::create([
            'email' => $adminEmail,
            'name' => $adminName,
            'password' => bcrypt('secret'),
            'role' => 'admin',
            'api_token' => str_random(60)
        ]);

        $this->info('Admin account created (' . $adminEmail . ')');
    }

    private function createAboutText()
    {
        $text = $this->ask("Application description");

        GlobalModel::create([
            'content' => [
                '0' => [
                    'id' => 'about',
                    'name' => [
                        'en' => 'About',
                        'fr' => 'À propos'
                    ],
                    'value' => [
                        'en' => $text,
                        'fr' => $text
                    ]
                ]
            ],
        ]);
    }

    private function createHomePage()
    {
        $title = [
            'en' => 'Home',
            'fr' => 'Accueil'
        ];

        Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'home',
                'fr' => 'home'
            ],
            'view' => 'home',
            'sections' => [
                '0' => [
                    'id' => 'title',
                    'name' => $title,
                    'content' => $title,
                    'type' => 'text'
                ]
            ],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Home page created');
    }

    private function createContactPage()
    {
        $title = [
            'en' => 'Contact',
            'fr' => 'Nous joindre'
        ];

        Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'contact',
                'fr' => 'nous-joindre'
            ],
            'view' => 'contact',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Contact page created');
    }

    private function createCartPage()
    {
        $title = [
            'en' => 'Cart',
            'fr' => 'Panier'
        ];

        Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'cart',
                'fr' => 'panier'
            ],
            'view' => 'cart',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Cart page created');
    }

    private function createCheckoutPage()
    {
        $title = [
            'en' => 'Checkout',
            'fr' => 'Paiement'
        ];

        Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'checkout',
                'fr' => 'paiement'
            ],
            'view' => 'checkout',
            'sections' => [

            ],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Checkout page created');
    }

    private function createLoginPage()
    {
        $title = [
            'en' => 'Login',
            'fr' => 'Se connecter'
        ];

        Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'login',
                'fr' => 'se-connecter'
            ],
            'view' => 'login',
            'sections' => [
                '0' => [
                    'id' => 'title',
                    'name' => [
                        'en' => 'Title',
                        'fr' => 'Titre'
                    ],
                    'content' => $title,
                    'type' => 'text'
                ],
                '1' => [
                    'id' => 'subtitle',
                    'name' => [
                        'en' => 'Subtitle',
                        'fr' => 'Sous-titre'
                    ],
                    'content' => [
                        'en' => 'Please login to proceed',
                        'fr' => 'Veuillez vous connecter'
                    ],
                    'type' => 'text'
                ]
            ],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Login page created');
    }

    private function createRegisterPage()
    {
        $title = [
            'en' => 'Register',
            'fr' => 'Créer un compte'
        ];

        Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'register',
                'fr' => 'creer-un-compte'
            ],
            'view' => 'register',
            'sections' => [
                '0' => [
                    'id' => 'title',
                    'name' => [
                        'en' => 'Title',
                        'fr' => 'Titre'
                    ],
                    'content' => $title,
                    'type' => 'text'
                ],
                '1' => [
                    'id' => 'subtitle',
                    'name' => [
                        'en' => 'Subtitle',
                        'fr' => 'Sous-titre'
                    ],
                    'content' => [
                        'en' => 'Create a free account now',
                        'fr' => 'Créez un compte gratuitement'
                    ],
                    'type' => 'text'
                ]
            ],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Register page created');
    }
}
