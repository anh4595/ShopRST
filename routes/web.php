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

Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@postLogoutAdmin');

Route::get('/',function(){
    return view('client.index');
});

Route::get('chi-tiet-san-pham/{id}/{metatitle}',['as'=>'detailProduct','uses'=>'HomeController@detailProduct']);
Route::get('mua-hang/{id}/{metatitle}',['as'=>'cartProduct','uses'=>'HomeController@cartProduct']);
Route::get('gio-hang',['as'=>'checkoutProduct','uses'=>'HomeController@checkoutProduct']);
Route::get('xoa-san-pham/{id}',['as'=>'deleteProduct','uses'=>'HomeController@deleteProduct']);
Route::get('cap-nhat-gio-hang/{id}/{qty}',['as'=>'updateCart','uses'=>'HomeController@updateCart']);
Route::get('danh-sach-san-pham/{id}/{metatitle}',['as'=>'listProductCategory','uses'=>'HomeController@listProductCategory']);
Route::get('danh-sach-san-pham-sale',['as'=>'listProductSale','uses'=>'HomeController@listProductSale']);
Route::get('lien-he',['as'=>'contactCompany','uses'=>'HomeController@contactCompany']);
route::get('gui-lien-he',['as'=>'client.other.contact','uses'=>'HomeController@getFeedback']);
route::post('gui-lien-he',['as'=>'client.other.contact','uses'=>'HomeController@postFeedback']);
Route::get('gioi-thieu',['as'=>'aboutCompany','uses'=>'HomeController@aboutCompany']);
Route::get('tin-tuc',['as'=>'listPost','uses'=>'HomeController@listPost']);
Route::get('chi-tiet-tin-tuc/{id}/{metatitle}',['as'=>'detailPost','uses'=>'HomeController@detailPost']);
Route::get('danh-sach-tin-tuc/{id}/{metatitle}',['as'=>'listPostCategory','uses'=>'HomeController@listPostCategory']);

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){

    Route::get('/',function(){
        return view('admin.index');
    });

    //Cấu hình route cho customer
    route::group(['prefix'=>'khach-hang'],function(){
        route::get('/',['as'=>'admin.customer.customer','uses'=>'CustomerController@Home']);
        route::get('xoa-khach-hang/{id}',['as'=>'admin.customer.getDelete','uses'=>'CustomerController@getDelete']);
        route::get('thay-doi-status-customer/{id}',['as'=>'admin.customer.changeStatus','uses'=>'CustomerController@changeStatus']);

        route::get('hom-thu-gop-y',['as'=>'admin.customer.feedback','uses'=>'FeedbackController@HomeFeedback']);
        route::get('xoa-feedback/{id}',['as'=>'admin.feedback.getDelete','uses'=>'FeedbackController@getDelete']);
    });

    //Cấu hình route cho post
    route::group(['prefix'=>'bai-viet'],function(){
        route::get('/',function(){
            return view('admin.post.post');
        });
        route::get('bai-viet',['as'=>'admin.post.post','uses'=>'PostController@Home']);
        route::get('them-bai-viet',['as'=>'admin.post.addpost','uses'=>'PostController@getPost']);
        route::post('them-bai-viet',['as'=>'admin.post.addpost','uses'=>'PostController@postPost']);
        route::get('thay-doi-status-post/{id}',['as'=>'admin.post.changeStatus','uses'=>'PostController@changeStatus']);
        route::get('xoa-bai-viet/{id}',['as'=>'admin.post.getDelete','uses'=>'PostController@getDelete']);
        route::get('sua-bai-viet/{id}',['as'=>'admin.post.getEdit','uses'=>'PostController@getEdit']);
        route::post('sua-bai-viet/{id}',['as'=>'admin.post.postEdit','uses'=>'PostController@postEdit']);

        //Cấu hình route cho nhóm bài viết thuộc quản lý nhóm danh mục bài viết
        route::get('danh-muc-bai-viet',['as'=>'admin.post.postcategory','uses'=>'PostCategoryController@Home']);
        route::get('them-danh-muc-bai-viet',['as'=>'admin.post.postcategory','uses'=>'PostCategoryController@getPostCategory']);
        route::post('them-danh-muc-bai-viet',['as'=>'admin.post.postcategory','uses'=>'PostCategoryController@postPostCategory']);
        route::get('xoa-danh-muc-bai-viet/{id}',['as'=>'admin.postcategory.getDelete','uses'=>'PostCategoryController@getDelete']);
        route::get('thay-doi-status-postcate/{id}',['as'=>'admin.postcategory.changeStatus','uses'=>'PostCategoryController@changeStatus']);
        route::get('sua-danh-muc-bai-viet/{id}',['as'=>'admin.postcategory.getEdit','uses'=>'PostCategoryController@getEdit']);
        route::post('sua-danh-muc-bai-viet/{id}',['as'=>'admin.postcategory.postEdit','uses'=>'PostCategoryController@postEdit']);

    });
    //Cấu hình route cho product
    route::group(['prefix'=>'san-pham'],function(){
        route::get('/',function(){
                return view('admin.product.product');
            });

        route::get('san-pham',['as'=>'admin.product.product','uses'=>'ProductController@Home']);
        route::get('them-san-pham',['as'=>'admin.product.addproduct','uses'=>'ProductController@getProduct']);
        route::post('them-san-pham',['as'=>'admin.product.addproduct','uses'=>'ProductController@postProduct']);
        route::get('xoa-san-pham/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
        route::get('xoa-multi-san-pham',['as'=>'admin.product.multiDelete','uses'=>'ProductController@multiDelete']);
        route::get('thay-doi-status-sp/{id}',['as'=>'admin.product.changeStatus','uses'=>'ProductController@changeStatus']);
        route::get('thay-doi-hot/{id}',['as'=>'admin.product.changeHot','uses'=>'ProductController@changeHot']);
        route::get('thay-doi-sale/{id}',['as'=>'admin.product.changeSale','uses'=>'ProductController@changeSale']);
        route::get('thay-doi-home/{id}',['as'=>'admin.product.changeHome','uses'=>'ProductController@changeHome']);       
        route::get('sua-san-pham/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
        route::post('sua-san-pham/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);


        //Cấu hình route cho nhóm sản phẩm thuộc quản lý nhóm danh mục sản phẩm
        route::get('danh-muc-san-pham',['as'=>'admin.product.productcategory','uses'=>'ProductCategoryController@Home']);
        route::get('them-danh-muc-san-pham',['as'=>'admin.product.productcategory','uses'=>'ProductCategoryController@getProductCategory']);
        route::post('them-danh-muc-san-pham',['as'=>'admin.product.productcategory','uses'=>'ProductCategoryController@postProductCategory']);
        route::get('xoa-danh-muc-san-pham/{id}',['as'=>'admin.productcategory.getDelete','uses'=>'ProductCategoryController@getDelete']);
        route::get('thay-doi-status/{id}',['as'=>'admin.productcategory.changeStatus','uses'=>'ProductCategoryController@changeStatus']);
        route::get('xoa-multi',['as'=>'admin.productcategory.multiDelete','uses'=>'ProductCategoryController@multiDelete']);
        route::get('sua-danh-muc-san-pham/{id}',['as'=>'admin.productcategory.getEdit','uses'=>'ProductCategoryController@getEdit']);
        route::post('sua-danh-muc-san-pham/{id}',['as'=>'admin.productcategory.postEdit','uses'=>'ProductCategoryController@postEdit']);

        route::get('size',['as'=>'admin.product.size','uses'=>'SizeController@Home']);
        route::get('them-size',['as'=>'admin.product.size','uses'=>'SizeController@getSize']);
        route::post('them-size',['as'=>'admin.product.size','uses'=>'SizeController@postSize']);
        route::get('xoa-size/{id}',['as'=>'admin.size.getDelete','uses'=>'SizeController@getDelete']);
        route::get('sua-size/{id}',['as'=>'admin.size.getEdit','uses'=>'SizeController@getEdit']);
        route::post('sua-size/{id}',['as'=>'admin.size.postEdit','uses'=>'SizeController@postEdit']);
       
    });
        
    //Cấu hình route cho extend
    route::group(['prefix'=>'mo-rong'],function(){
        route::get('/',function(){
                return view('admin.extend.about');
            });

        route::group(['prefix'=>'gioi-thieu'],function(){
            route::get('/',['as'=>'admin.extend.about','uses'=>'AboutController@Home']);
            route::get('them-gioi-thieu',['as'=>'admin.extend.addabout','uses'=>'AboutController@getAbout']);
            route::post('them-gioi-thieu',['as'=>'admin.extend.addabout','uses'=>'AboutController@postAbout']);
            route::get('xoa-gioi-thieu/{id}',['as'=>'admin.about.getDelete','uses'=>'AboutController@getDelete']);
            route::get('thay-doi-status-about/{id}',['as'=>'admin.about.changeStatus','uses'=>'AboutController@changeStatus']);
            route::get('sua-gioi-thieu/{id}',['as'=>'admin.about.getEdit','uses'=>'AboutController@getEdit']);
            route::post('sua-gioi-thieu/{id}',['as'=>'admin.about.postEdit','uses'=>'AboutController@postEdit']);
        });

        route::group(['prefix'=>'lien-he'],function(){
            route::get('/',['as'=>'admin.extend.contact','uses'=>'ContactController@Home']);
            route::get('them-lien-he',['as'=>'admin.extend.addcontact','uses'=>'ContactController@getContact']);
            route::post('them-lien-he',['as'=>'admin.extend.addcontact','uses'=>'ContactController@postContact']);
            route::get('xoa-lien-he/{id}',['as'=>'admin.contact.getDelete','uses'=>'ContactController@getDelete']);
            route::get('thay-doi-status-contact/{id}',['as'=>'admin.contact.changeStatus','uses'=>'ContactController@changeStatus']);
            route::get('sua-lien-he/{id}',['as'=>'admin.contact.getEdit','uses'=>'ContactController@getEdit']);
            route::post('sua-lien-he/{id}',['as'=>'admin.contact.postEdit','uses'=>'ContactController@postEdit']);
        });

        route::group(['prefix'=>'chan-trang'],function(){
            route::get('/',['as'=>'admin.extend.footer','uses'=>'FooterController@Home']);
            route::get('them-chan-trang',['as'=>'admin.extend.addfooter','uses'=>'FooterController@getFooter']);
            route::post('them-chan-trang',['as'=>'admin.extend.addfooter','uses'=>'FooterController@postFooter']);
            route::get('xoa-chan-trang/{id}',['as'=>'admin.footer.getDelete','uses'=>'FooterController@getDelete']);
            route::get('thay-doi-status-footer/{id}',['as'=>'admin.footer.changeStatus','uses'=>'FooterController@changeStatus']);
            route::get('sua-chan-trang/{id}',['as'=>'admin.footer.getEdit','uses'=>'FooterController@getEdit']);
            route::post('sua-chan-trang/{id}',['as'=>'admin.footer.postEdit','uses'=>'FooterController@postEdit']);
        });

        route::group(['prefix'=>'slide-anh'],function(){
            route::get('/',['as'=>'admin.extend.slide','uses'=>'SlideController@Home']);
            route::get('them-slide-anh',['as'=>'admin.extend.addslide','uses'=>'SlideController@getSlide']);
            route::post('them-slide-anh',['as'=>'admin.extend.addslide','uses'=>'SlideController@postSlide']);
            route::get('xoa-slide-anh/{id}',['as'=>'admin.slide.getDelete','uses'=>'SlideController@getDelete']);
            route::get('thay-doi-status-slide/{id}',['as'=>'admin.slide.changeStatus','uses'=>'SlideController@changeStatus']);
            route::get('sua-slide-anh/{id}',['as'=>'admin.slide.getEdit','uses'=>'SlideController@getEdit']);
            route::post('sua-slide-anh/{id}',['as'=>'admin.slide.postEdit','uses'=>'SlideController@postEdit']);
        });

            //Cấu hình route cho extend
        route::group(['prefix'=>'the-tag'],function(){
            route::get('/',['as'=>'admin.tag.tag','uses'=>'TagController@Home']);
            route::get('them-the-tag',['as'=>'admin.tag.tag','uses'=>'TagController@getTag']);
            route::post('them-the-tag',['as'=>'admin.tag.tag','uses'=>'TagController@postTag']);
            route::get('xoa-the-tag/{id}',['as'=>'admin.tag.getDelete','uses'=>'TagController@getDelete']);
            route::get('sua-the-tag/{id}',['as'=>'admin.tag.getEdit','uses'=>'TagController@getEdit']);
            route::post('sua-the-tag/{id}',['as'=>'admin.tag.postEdit','uses'=>'TagController@postEdit']);
        });
        
    });

      //Cấu hình route cho extend
    route::group(['prefix'=>'nguoi-dung'],function(){
        route::get('/',['as'=>'admin.user.user','uses'=>'UserController@Home']);
        route::get('them-nguoi-dung',['as'=>'admin.user.adduser','uses'=>'UserController@getUser']);

        route::get('nhom-nguoi-dung',['as'=>'admin.user.usergroup','uses'=>'UserGroupController@Home']);
        route::get('them-nhom-nguoi-dung',['as'=>'admin.user.addusergroup','uses'=>'UserGroupController@getUserGroup']);

        route::group(['prefix'=>'phan-quyen'],function(){
            route::get('/',['as'=>'admin.role.role','uses'=>'RoleController@Home']);
            route::get('phan-quyen',['as'=>'admin.role.permission','uses'=>'PermissionController@Home']);
        });
    });

    

});
  
