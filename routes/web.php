<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::middleware('App\Http\Middleware\Localization')->group(function() {
  // Homepage
  Route::get('/', 'PagesController@home')->name('pages.home');
  Route::get('terms', 'PagesController@terms')->name('pages.terms');
  Route::get('contact', 'PagesController@contact')->name('pages.contact');
  Route::post('contact', 'PagesController@contactPost')->name('pages.contact.post');
  Route::get('contactagent', 'PagesController@contactAgent')->name('pages.contactagent');
  Route::post('contactagent', 'PagesController@contactAgentPost')->name('pages.contactagent.post');
  Route::get('privacy', 'PagesController@privacy')->name('pages.privacy');
  Route::get('guides', 'PagesController@guides')->name('pages.guides');
  Route::get('about-us', 'PagesController@aboutUs')->name('pages.about-us');

  // Posts
  Route::get('posts', 'PostController@list')->name('posts');
  Route::get('posts/search', 'PostController@search')->name('posts.search');
  
  // Profiles
  Route::get('profiles', 'ProfileController@list')->name('profiles');
  Route::get('profiles/search', 'ProfileController@search')->name('profiles.search');

  // Specific Profile
  Route::get('profile/{id}', 'ProfileController@index')->name('profile');

  // Singular Post
  Route::get('post/{id}', 'PostController@index')->name('post');
  Route::get('post/{id}/data', 'PostController@data')->name('post.data');

  // User has to be logged in to access these
  Route::group(['middleware' => ['auth']], function () {
    // Overview
    Route::get('overview', 'PagesController@overview')->name('overview');

    // Profile Settings
    Route::get('user/settings', 'ProfileController@settings')->name('user.settings');
    Route::post('user/settings/update', 'ProfileController@update')->name('user.settings.update');
    Route::get('user/settings/gallery/delete/{id}', 'ProfileController@deleteImage')->name('user.gallery.delete');

    // Subscription
    Route::get('user/subscription', 'SubscriptionController@index')->name('user.subscription');
    Route::post('user/subscription/create', 'SubscriptionController@create')->name('user.subscription.create');
    Route::post('user/subscription/swap', 'SubscriptionController@swap')->name('user.subscription.swap');

    // Invoice
    Route::get('user/subscription/invoice/{id}', 'SubscriptionController@invoice')->name('user.subscription.invoice');

    // START MEMBER
    // Conversation (Singular)
    Route::get('conversation/{id}', 'ConversationController@index')->name('conversation');
    Route::post('conversation/send/{id}', 'ConversationController@send')->name('conversation.send');
    Route::post('conversation/new', 'ConversationController@new')->name('conversation.new');

    // Conversations (List)
    Route::get('conversations', 'ConversationController@list')->name('conversations');

    // Post Comment
    Route::post('post/comment/new', 'CommentController@new')->name('comment.new');
    // END MEMBER

    // START SCOUT
    // Get own posts
    Route::get('posts/own', 'PostController@listOwn')->name('posts.own');

    // Create Post
    Route::get('post/new', 'PostController@new')->name('post.new');
    Route::post('post/add', 'PostController@add')->name('post.add');

    // Edit Post
    Route::get('post/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::get('post/{id}/edit/data', 'PostController@data');
    Route::get('post/{id}/toggle', 'PostController@toggle')->name('post.toggle');
    Route::post('post/{id}/update', 'PostController@update')->name('post.update');
    // END SCOUT
    
    // START ADMIN
    // Create user
    Route::get('user/create', 'ManageUserController@new')->name('admin.users.new');
    Route::post('user/create', 'ManageUserController@create')->name('admin.users.create');
    // Toggle user disabled
    Route::get('user/{id}/toggle', 'ManageUserController@toggle')->name('admin.user.toggle');
    // END ADMIN
  });

  Route::post('locale/set', 'LocaleController@set')->name('locale.set');
});

Route::get('logout', function () {
  if (Auth::check()) {
    Auth::logout();
  }

  return redirect()->intended('/login');
});

Auth::routes();
