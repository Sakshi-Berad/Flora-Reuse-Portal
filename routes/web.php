<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DiscountCodeController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\admin\ProductSubCatrgoryController;
use App\Http\Controllers\Manufacturer\ManufacturerBrandController;
use App\Http\Controllers\Manufacturer\ManufacturerCategoryController;
use App\Http\Controllers\Manufacturer\ManufacturerController;
use App\Http\Controllers\Manufacturer\ManufacturerDiscountCodeController;
use App\Http\Controllers\Manufacturer\ManufacturerHomeController;
use App\Http\Controllers\Manufacturer\ManufacturerLoginController;
use App\Http\Controllers\Manufacturer\ManufacturerOrderController;
use App\Http\Controllers\Manufacturer\ManufacturerShippingController;
use App\Http\Controllers\Manufacturer\ManufacturerSubCategoryController;
use App\Http\Controllers\seller\SellerBrandController;
use App\Http\Controllers\seller\SellerCategoryController;
use App\Http\Controllers\seller\SellerDiscountCodeController;
use App\Http\Controllers\seller\SellerLoginController;
use App\Http\Controllers\seller\SellerHomeController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\seller\SellerOrderController;
use App\Http\Controllers\seller\SellerShippingController;
use App\Http\Controllers\seller\SellerSubCategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Seller\RawMaterialController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// mail test 

// Route::get('/test', function () {
//     orderEmail(20);
// });


// Fornt Routes Start **************

Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/shop/{categorySlug?}/{subCategorySlug?}', [ShopController::class, 'index'])->name('front.shop');
Route::get('/raw-material/{categorySlug?}/{subCategorySlug?}', [ShopController::class, 'rawmaterial'])->name('front.raw-material.shop');
Route::get('/product/{slug}', [ShopController::class, 'product'])->name('front.product');
Route::get('/cart', [CartController::class, 'cart'])->name('front.cart');
Route::POST('/add-to-cart', [CartController::class, 'addToCart'])->name('front.addToCart');
Route::POST('/update-cart', [CartController::class, 'updateCart'])->name('front.updateCart');
Route::POST('/delete-item', [CartController::class, 'deleteItem'])->name('front.deleteItem.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('front.checkout');
Route::post('/process-checkout', [CartController::class, 'processCheckout'])->name('front.processCheckout');
Route::get('/thanks/{orderId}', [CartController::class, 'thankyou'])->name('front.thankyou');
Route::post('/get-ordersummery', [CartController::class, 'getOrderSummery'])->name('front.getOrderSummery');
// applyDiscount
Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('front.applyDiscount');
// remove discount coupon 
Route::post('/remove-discount', [CartController::class, 'removeCoupon'])->name('front.removeCoupon');
// addToWhishlist
Route::post('/add-to-whishlist', [FrontController::class, 'addToWhishlist'])->name('front.addToWhishlist');

// static pages 
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('front.aboutUs');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('front.contact');
Route::post('/contact-us-store', [FrontController::class, 'contactStore'])->name('front.contact.store');

// Fornt Routes End   ****** ********


// User Routes 
Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('account.login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('account.authenticate');

        Route::get('/register', [AuthController::class, 'register'])->name('account.register');
        Route::post('/process-register', [AuthController::class, 'processRegister'])->name('account.processRegister');


    });

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/profile', [AuthController::class, 'profile'])->name('account.profile');
        Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('account.updateProfile');
        Route::post('/update-address', [AuthController::class, 'updateAddress'])->name('account.updateAddress');

        Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('account.changePasswordForm');
        Route::post('/process-change-password', [AuthController::class, 'changePassword'])->name('account.ProcessChangePassword');

        Route::get('/my-orders', [AuthController::class, 'orders'])->name('account.orders');
        Route::get('/my-wishlist', [AuthController::class, 'wishlist'])->name('account.wishlist');
        Route::post('/remove-product-from-wishlist', [AuthController::class, 'removeProductFromWishlist'])->name('account.removeProductFromWishlist');
        Route::get('/orders-detail/{orderId}', [AuthController::class, 'orderDetail'])->name('account.orderDetail');
        Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');

    });
});
// *******************


//////////////////////////************************************////////////////////////
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        // admin login page 
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

        // admin register page 
        // Route::get('/FatTechShopSurajJagtap', [AdminLoginController::class, 'register'])->name('admin.register');
        Route::post('/process-register', [AdminLoginController::class, 'AdminProcessRegister'])->name('account.AdminProcessRegister');

    });

    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        // Categories Routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

        // temp-images.create
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');


        // Sub Category Routes 
        Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');
        Route::get('/sub-categories/create', [SubCategoryController::class, 'create'])->name('sub-categories.create');
        Route::post('/sub-categories/store', [SubCategoryController::class, 'store'])->name('sub-categories.store');
        Route::get('/sub-categories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');
        Route::put('/sub-categories/{subcategory}', [SubCategoryController::class, 'update'])->name('sub-categories.update');
        Route::delete('/sub-categories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('sub-categories.delete');

        // Brands Routes
        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.delete');

        // Product routes 
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.delete');
        Route::get('/get-products', [ProductController::class, 'getProducts'])->name('products.getProducts');

        Route::get('/product-subcategories', [ProductSubCatrgoryController::class, 'index'])->name('product-subcategories.index');


        // Shipping routes 
        Route::get('/shipping/create', [ShippingController::class, 'create'])->name('shipping.create');
        Route::post('/shipping/store', [ShippingController::class, 'store'])->name('shipping.store');
        Route::get('/shipping/{id}', [ShippingController::class, 'edit'])->name('shipping.edit');
        Route::put('/shipping/{id}', [ShippingController::class, 'update'])->name('shipping.update');
        Route::delete('/shipping/{id}', [ShippingController::class, 'destroy'])->name('shipping.delete');



        // product images update / destroy using ajax
        Route::post('/products-image/update', [ProductImageController::class, 'update'])->name('products-image.update');
        Route::delete('/products-image', [ProductImageController::class, 'destroy'])->name('products-image.destroy');


        // coupon code routes
        Route::get('/coupons', [DiscountCodeController::class, 'index'])->name('coupons.index');
        Route::get('/coupons/create', [DiscountCodeController::class, 'create'])->name('coupons.create');
        Route::post('/coupons/store', [DiscountCodeController::class, 'store'])->name('coupons.store');
        Route::get('/coupons/{coupon}/edit', [DiscountCodeController::class, 'edit'])->name('coupons.edit');
        Route::put('/coupons/{coupon}', [DiscountCodeController::class, 'update'])->name('coupons.update');
        Route::delete('/coupons/{coupon}', [DiscountCodeController::class, 'destroy'])->name('coupons.delete');


        // Orders routes 
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');
        Route::post('/order/change-status/{id}', [OrderController::class, 'changeOrderStatus'])->name('orders.changeOrderStatus');

        Route::post('/order/send-email/{id}', [OrderController::class, 'sendInvoiceEmail'])->name('orders.sendInvoiceEmail');

        // contact us route start
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.delete');
        // contact us route end

        // Users create update delete 
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');
    });
});
// peuqcffzgtnqfxfw

//Seller
Route::get('seller/login', [SellerLoginController::class, 'index'])->name('seller.login');
Route::post('seller/authenticate', [SellerLoginController::class, 'authenticate'])->name('seller.authenticate');

Route::middleware(['role:Raw Material Seller'])->group(function () {

    Route::get('seller/logout', [SellerHomeController::class, 'logout'])->name('seller.logout');

    //Categories Routes
    Route::get('seller/categories', [SellerCategoryController::class, 'index'])->name('seller-categories.index');
    Route::get('seller/categories/create', [SellerCategoryController::class, 'create'])->name('seller-categories.create');
    Route::post('seller/categories/store', [SellerCategoryController::class, 'store'])->name('seller-categories.store');
    Route::get('seller/categories/{category}/edit', [SellerCategoryController::class, 'edit'])->name('seller-categories.edit');
    Route::post('seller/categories/{category}', [SellerCategoryController::class, 'update'])->name('seller-categories.update');
    Route::delete('seller/categories/{category}', [SellerCategoryController::class, 'destroy'])->name('seller-categories.delete');

    //Sub Category Routes 
    Route::get('seller/sub-categories', [SellerSubCategoryController::class, 'index'])->name('seller-sub-categories.index');
    Route::get('seller/sub-categories/create', [SellerSubCategoryController::class, 'create'])->name('seller-sub-categories.create');
    Route::post('seller/sub-categories/store', [SellerSubCategoryController::class, 'store'])->name('seller-sub-categories.store');
    Route::get('seller/sub-categories/{subcategory}/edit', [SellerSubCategoryController::class, 'edit'])->name('seller-sub-categories.edit');
    Route::put('seller/sub-categories/{subcategory}', [SellerSubCategoryController::class, 'update'])->name('seller-sub-categories.update');
    Route::delete('seller/sub-categories/{subcategory}', [SellerSubCategoryController::class, 'destroy'])->name('seller-sub-categories.delete');

    // Brands Routes
    Route::get('seller/brands', [SellerBrandController::class, 'index'])->name('seller-brands.index');
    Route::get('seller/brands/create', [SellerBrandController::class, 'create'])->name('seller-brands.create');
    Route::post('seller/brands/store', [SellerBrandController::class, 'store'])->name('seller-brands.store');
    Route::get('seller/brands/{brand}/edit', [SellerBrandController::class, 'edit'])->name('seller-brands.edit');
    Route::put('seller/brands/{brand}', [SellerBrandController::class, 'update'])->name('seller-brands.update');
    Route::delete('seller/brands/{brand}', [SellerBrandController::class, 'destroy'])->name('seller-brands.delete');
    Route::delete('seller/products-image', [ProductImageController::class, 'destroy'])->name('seller-products-image.destroy');
});

Route::middleware(['role:Raw Material Seller'])->group(function () {

    Route::get('seller/dashboard', [SellerHomeController::class, 'index'])->name('seller.dashboard');

    Route::get('/seller/raw-materials', [RawMaterialController::class, 'index'])->name('seller.raw-materials.index');
    Route::get('/seller/raw-materials/create', [RawMaterialController::class, 'create'])->name('seller.raw-materials.create');
    Route::post('/seller/raw-materials', [RawMaterialController::class, 'store'])->name('seller.raw-materials.store');
    Route::get('/seller/raw-materials/{id}/edit', [RawMaterialController::class, 'edit'])->name('seller.raw-materials.edit');
    Route::post('/seller/raw-materials/{id}', [RawMaterialController::class, 'update'])->name('seller.raw-materials.update');
    Route::delete('/seller/raw-materials/{id}', [RawMaterialController::class, 'destroy'])->name('seller.raw-materials.destroy');
    Route::get('seller/get-products', [RawMaterialController::class, 'getProducts'])->name('seller.raw-materials.getProducts');
    Route::get('seller/product-subcategories', [ProductSubCatrgoryController::class, 'index'])->name('seller-subcategories.index');

    //Shipping routes
    Route::get('seller/shipping/create', [SellerShippingController::class, 'create'])->name('seller.shipping.create');
    Route::post('seller/shipping/store', [SellerShippingController::class, 'store'])->name('seller.shipping.store');
    Route::get('seller/shipping/{id}', [SellerShippingController::class, 'edit'])->name('seller.shipping.edit');
    Route::put('seller/shipping/{id}', [SellerShippingController::class, 'update'])->name('seller.shipping.update');
    Route::delete('seller/shipping/{id}', [SellerShippingController::class, 'destroy'])->name('seller.shipping.delete');

    //Orders routes 
    Route::get('seller/orders', [SellerOrderController::class, 'index'])->name('seller.orders.index');
    Route::get('seller/orders/{id}', [SellerOrderController::class, 'detail'])->name('seller.orders.detail');
    Route::post('seller/order/change-status/{id}', [SellerOrderController::class, 'changeOrderStatus'])->name('seller.orders.changeOrderStatus');
    Route::post('seller/order/send-email/{id}', [SellerOrderController::class, 'sendInvoiceEmail'])->name('seller.orders.sendInvoiceEmail');


    // coupon code routes
    Route::get('seller/coupons', [SellerDiscountCodeController::class, 'index'])->name('seller.coupons.index');
    Route::get('seller/coupons/create', [SellerDiscountCodeController::class, 'create'])->name('seller.coupons.create');
    Route::post('seller/coupons/store', [SellerDiscountCodeController::class, 'store'])->name('seller.coupons.store');
    Route::get('seller/coupons/{coupon}/edit', [SellerDiscountCodeController::class, 'edit'])->name('seller.coupons.edit');
    Route::put('seller/coupons/{coupon}', [SellerDiscountCodeController::class, 'update'])->name('seller.coupons.update');
    Route::delete('seller/coupons/{coupon}', [SellerDiscountCodeController::class, 'destroy'])->name('seller.coupons.delete');

});


//manufacturer
Route::get('manufacturer/login', [ManufacturerLoginController::class, 'index'])->name('manufacturer.login');
Route::post('manufacturer/authenticate', [ManufacturerLoginController::class, 'authenticate'])->name('manufacturer.authenticate');

Route::middleware(['role:Manufacturer'])->group(function () {

    Route::get('manufacturer/logout', [ManufacturerHomeController::class, 'logout'])->name('manufacturer.logout');

    //Categories Routes
    Route::get('manufacturer/categories', [ManufacturerCategoryController::class, 'index'])->name('manufacturer-categories.index');
    Route::get('manufacturer/categories/create', [ManufacturerCategoryController::class, 'create'])->name('manufacturer-categories.create');
    Route::post('manufacturer/categories/store', [ManufacturerCategoryController::class, 'store'])->name('manufacturer-categories.store');
    Route::get('manufacturer/categories/{category}/edit', [ManufacturerCategoryController::class, 'edit'])->name('manufacturer-categories.edit');
    Route::post('manufacturer/categories/{category}', [ManufacturerCategoryController::class, 'update'])->name('manufacturer-categories.update');
    Route::delete('manufacturer/categories/{category}', [ManufacturerCategoryController::class, 'destroy'])->name('manufacturer-categories.delete');

    //Sub Category Routes 
    Route::get('manufacturer/sub-categories', [ManufacturerSubCategoryController::class, 'index'])->name('manufacturer-sub-categories.index');
    Route::get('manufacturer/sub-categories/create', [ManufacturerSubCategoryController::class, 'create'])->name('manufacturer-sub-categories.create');
    Route::post('manufacturer/sub-categories/store', [ManufacturerSubCategoryController::class, 'store'])->name('manufacturer-sub-categories.store');
    Route::get('manufacturer/sub-categories/{subcategory}/edit', [ManufacturerSubCategoryController::class, 'edit'])->name('manufacturer-sub-categories.edit');
    Route::put('manufacturer/sub-categories/{subcategory}', [ManufacturerSubCategoryController::class, 'update'])->name('manufacturer-sub-categories.update');
    Route::delete('manufacturer/sub-categories/{subcategory}', [ManufacturerSubCategoryController::class, 'destroy'])->name('manufacturer-sub-categories.delete');

    // Brands Routes
    Route::get('manufacturer/brands', [ManufacturerBrandController::class, 'index'])->name('manufacturer-brands.index');
    Route::get('manufacturer/brands/create', [ManufacturerBrandController::class, 'create'])->name('manufacturer-brands.create');
    Route::post('manufacturer/brands/store', [ManufacturerBrandController::class, 'store'])->name('manufacturer-brands.store');
    Route::get('manufacturer/brands/{brand}/edit', [ManufacturerBrandController::class, 'edit'])->name('manufacturer-brands.edit');
    Route::put('manufacturer/brands/{brand}', [ManufacturerBrandController::class, 'update'])->name('manufacturer-brands.update');
    Route::delete('manufacturer/brands/{brand}', [ManufacturerBrandController::class, 'destroy'])->name('manufacturer-brands.delete');
    Route::delete('manufacturer/products-image', [ProductImageController::class, 'destroy'])->name('manufacturer-products-image.destroy');
});

Route::middleware(['role:Manufacturer'])->group(function () {

    Route::get('manufacturer/dashboard', [ManufacturerHomeController::class, 'index'])->name('manufacturer.dashboard');

    Route::get('/manufacturer/raw-materials', [ManufacturerController::class, 'index'])->name('manufacturer.raw-materials.index');
    Route::get('/manufacturer/raw-materials/create', [ManufacturerController::class, 'create'])->name('manufacturer.raw-materials.create');
    Route::post('/manufacturer/raw-materials', [ManufacturerController::class, 'store'])->name('manufacturer.raw-materials.store');
    Route::get('/manufacturer/raw-materials/{id}/edit', [ManufacturerController::class, 'edit'])->name('manufacturer.raw-materials.edit');
    Route::post('/manufacturer/raw-materials/{id}', [ManufacturerController::class, 'update'])->name('manufacturer.raw-materials.update');
    Route::delete('/manufacturer/raw-materials/{id}', [ManufacturerController::class, 'destroy'])->name('manufacturer.raw-materials.destroy');
    Route::get('manufacturer/get-products', [ManufacturerController::class, 'getProducts'])->name('manufacturer.raw-materials.getProducts');
    Route::get('manufacturer/product-subcategories', [ProductSubCatrgoryController::class, 'index'])->name('manufacturer-subcategories.index');

    //Shipping routes
    Route::get('manufacturer/shipping/create', [ManufacturerShippingController::class, 'create'])->name('manufacturer.shipping.create');
    Route::post('manufacturer/shipping/store', [ManufacturerShippingController::class, 'store'])->name('manufacturer.shipping.store');
    Route::get('manufacturer/shipping/{id}', [ManufacturerShippingController::class, 'edit'])->name('manufacturer.shipping.edit');
    Route::put('manufacturer/shipping/{id}', [ManufacturerShippingController::class, 'update'])->name('manufacturer.shipping.update');
    Route::delete('manufacturer/shipping/{id}', [ManufacturerShippingController::class, 'destroy'])->name('manufacturer.shipping.delete');

    //Orders routes 
    Route::get('manufacturer/orders', [ManufacturerOrderController::class, 'index'])->name('manufacturer.orders.index');
    Route::get('manufacturer/orders/{id}', [ManufacturerOrderController::class, 'detail'])->name('manufacturer.orders.detail');
    Route::post('manufacturer/order/change-status/{id}', [ManufacturerOrderController::class, 'changeOrderStatus'])->name('manufacturer.orders.changeOrderStatus');
    Route::post('manufacturer/order/send-email/{id}', [ManufacturerOrderController::class, 'sendInvoiceEmail'])->name('manufacturer.orders.sendInvoiceEmail');


    // coupon code routes
    Route::get('manufacturer/coupons', [ManufacturerDiscountCodeController::class, 'index'])->name('manufacturer.coupons.index');
    Route::get('manufacturer/coupons/create', [ManufacturerDiscountCodeController::class, 'create'])->name('manufacturer.coupons.create');
    Route::post('manufacturer/coupons/store', [ManufacturerDiscountCodeController::class, 'store'])->name('manufacturer.coupons.store');
    Route::get('manufacturer/coupons/{coupon}/edit', [ManufacturerDiscountCodeController::class, 'edit'])->name('manufacturer.coupons.edit');
    Route::put('manufacturer/coupons/{coupon}', [ManufacturerDiscountCodeController::class, 'update'])->name('manufacturer.coupons.update');
    Route::delete('manufacturer/coupons/{coupon}', [ManufacturerDiscountCodeController::class, 'destroy'])->name('manufacturer.coupons.delete');

});

