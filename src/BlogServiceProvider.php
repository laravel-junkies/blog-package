<?php

namespace LaraJunkie;

use Illuminate\Support\ServiceProvider;

/**
 * Class BlogServiceProvider
 * @package LaraJunkie
 * @author Tobias Maxham
 */
class BlogServiceProvider extends ServiceProvider
{

	public function boot()
	{
		// Include the package routes
		if (! $this->app->routesAreCached()) {
			require __DIR__.'/../../routes.php';
		}

		// register the package views
		$this->loadViewsFrom(__DIR__.'/../../views', 'blog');

		$this->publishes([
			__DIR__.'/../../views' => base_path('resources/views/vendor/blog'),
		]);

		$this->publishes([
			__DIR__.'/../lj-blog.php' => config_path('lj-blog.php'),
		]);
	}

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

} 