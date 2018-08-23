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
        if ($this->confirm('This will destroy the database! Continue?')) {
            Artisan::call('migrate:fresh');
        
            // Product categories
            $this->createDefaultCategory();
            
            // Users
            $this->createDevUser();
            
            // Globals
            $this->createAboutText();

            // Front pages
            $this->createHomePage();
            $this->createContactPage();

            // Shop pages
            $this->createCartPages();
            $this->createCheckoutPages();
            $this->createLoginPage();
            $this->createRegisterPage();
        }
    }

    private function createDefaultCategory()
    {
        $this->info('Creating global product category');
        ProductCategory::create(['name' => ['fr' => 'Produits', 'en' => 'Products']]);
    }

    private function createDevUser()
    {
        User::create([
            'email' => 'dev@witify.io',
            'name' => 'God',
            'password' => bcrypt('secret'),
            'role' => 'dev',
            'api_token' => str_random(60)
        ]);

        $this->info('Dev account created (francois@witify.io)');
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
            'name' => 'home',
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
            'name' => 'contact',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Contact page created');
    }

    private function createCartPages()
    {
        $title = [
            'en' => 'Cart',
            'fr' => 'Panier'
        ];

        $cart = Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'cart',
                'fr' => 'panier'
            ],
            'name' => 'cart',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Cart page created');

        $title = [
            'en' => 'Add to cart',
            'fr' => 'Ajout au panier'
        ];

        Page::create([
            'title' => $title,
            'parent_id' => $cart->id,
            'slug' => [
                'en' => 'success',
                'fr' => 'succes'
            ],
            'name' => 'cart.success',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Cart Success page created');
    }

    private function createCheckoutPages()
    {
        $title = [
            'en' => 'Checkout',
            'fr' => 'Paiement'
        ];

        $checkout = Page::create([
            'title' => $title,
            'slug' => [
                'en' => 'checkout',
                'fr' => 'paiement'
            ],
            'name' => 'checkout',
            'sections' => [

            ],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Checkout page created');

        $title = [
            'en' => 'Checkout address',
            'fr' => 'Addresse du paiement'
        ];

        Page::create([
            'title' => $title,
            'parent_id' => $checkout->id,
            'slug' => [
                'en' => 'address',
                'fr' => 'address'
            ],
            'name' => 'checkout.address',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Checkout Address page created');

        $title = [
            'en' => 'Checkout shipping',
            'fr' => 'Choix de la livraison'
        ];

        Page::create([
            'title' => $title,
            'parent_id' => $checkout->id,
            'slug' => [
                'en' => 'shipping',
                'fr' => 'shipping'
            ],
            'name' => 'checkout.shipping',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Checkout Shipping page created');

        $title = [
            'en' => 'Checkout payment',
            'fr' => 'Mode de paiement'
        ];

        Page::create([
            'title' => $title,
            'parent_id' => $checkout->id,
            'slug' => [
                'en' => 'payment',
                'fr' => 'payment'
            ],
            'name' => 'checkout.payment',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Checkout Payment page created');

        $title = [
            'en' => 'Checkout review',
            'fr' => 'Revue de la commande'
        ];

        Page::create([
            'title' => $title,
            'parent_id' => $checkout->id,
            'slug' => [
                'en' => 'review',
                'fr' => 'review'
            ],
            'name' => 'checkout.review',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Checkout Review page created');

        $title = [
            'en' => 'Checkout success',
            'fr' => 'Succès de la commande'
        ];

        Page::create([
            'title' => $title,
            'parent_id' => $checkout->id,
            'slug' => [
                'en' => 'success',
                'fr' => 'success'
            ],
            'name' => 'checkout.success',
            'sections' => [],
            'seo' => [
                'title' => $title,
                'description' => $title
            ]
        ]);

        $this->info('Checkout Success page created');
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
            'name' => 'login',
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
            'name' => 'register',
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
