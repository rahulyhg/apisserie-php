<?php namespace App\Providers;

use App\Product;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		Product::creating( function( $product )
	    {
	        $product->slug = \App\Helpers\String::slugify( $product->name );
	    });

	    Product::updating( function( $product )
	    {
	        $product->slug = \App\Helpers\String::slugify( $product->name );
	    });
	}

}
