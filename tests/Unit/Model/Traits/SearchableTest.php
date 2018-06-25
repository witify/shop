<?php

namespace Tests\Unit\Model\Traits;

use Image;
use Storage;
use App\Page;
use Tests\TestCase;
use App\Model\Searchable;
use Tests\Unit\Model\TestModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchableTest extends TestCase
{
    private $object;

    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        Schema::create('test_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table->string('picture')->nullable();
            $table->timestamps();
        });

        TestModelSearchable::create([
            'title' => 'Test1',
            'body' => 'Lorem ipsum 1',
            'picture' => null
        ]);

        TestModelSearchable::create([
            'title' => 'Test2',
            'body' => 'Lorem ipsum 31',
            'picture' => null
        ]);

        TestModelSearchable::create([
            'title' => 'Test3',
            'body' => 'Lorem ipsum 3',
            'picture' => null
        ]);
    }

    public function tearDown()
    {
        Schema::dropIfExists('test_models');
    }

    public function test_no_search_attribute()
    {
        $models = TestModelSearchable::query()->search()->get();
        $this->assertEquals(count($models), 3);
    }

    public function test_search_scope_single_match()
    {
        $this->get('/?search=Lorem ipsum 1');
        $models = TestModelSearchable::query()->search()->get();
        $this->assertEquals(count($models), 1);

        $this->get('/?search=Test3');
        $models = TestModelSearchable::query()->search()->get();
        $this->assertEquals(count($models), 1);
    }

    public function test_search_multiple_match()
    {
        $this->get('/?search=Lorem ipsum 3');
        $models = TestModelSearchable::query()->search()->get();
        $this->assertEquals(count($models), 2);
    }

    public function test_has_no_searchable_fields()
    {
        try {
            $this->createModelFromClassAndSearch(TestModelSearchableInvalid::class);
            $this->fail("Expected exception not thrown");
        } catch(\Exception $e) {
            $this->assertEquals("A searchable model must have a searchableFields attribute.", $e->getMessage());
        }
    }

    public function test_has_invalid_searchable_fields()
    {
        try {
            $this->createModelFromClassAndSearch(TestModelSearchableInvalid2::class);
            $this->fail("Expected exception not thrown");
        } catch(\Exception $e) {
            $this->assertEquals("searchableFields attribute must be an array.", $e->getMessage());
        }
    }

    private function createModelFromClassAndSearch(string $className)
    {
        call_user_func([$className, 'create'], [
            'title' => 'Test',
            'body' => 'Lorem ipsum',
            'picture' => null
        ]);
        $this->get('/?search=Lorem ipsum 3');
        call_user_func([$className, 'query'])->search()->get();
    }
}

class TestModelSearchable extends TestModel
{
    use Searchable;

    protected $table = 'test_models';

    protected $searchableFields = [
        'title',
        'body'
    ];
}

class TestModelSearchableInvalid extends TestModel
{
    use Searchable;
    protected $table = 'test_models';
}

class TestModelSearchableInvalid2 extends TestModel
{
    use Searchable;
    protected $table = 'test_models';
    protected $searchableFields = 'title';
}
