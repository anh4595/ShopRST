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
Route::get('/',function(){
    return view('client.index');
});

//Route::get('index',['as'=>'client.index','uses'=>'ProductController@index']);

Route::group(['prefix'=>'admin'],function(){
    Route::get('login',function(){
        return view('login.login');
    });

    Route::get('/',function(){
        return view('admin.index');
    });

    //Cấu hình route cho customer
    route::group(['prefix'=>'khach-hang'],function(){
        route::get('/',['as'=>'admin.customer.customer','uses'=>'CustomerController@Home']);
        route::get('hom-thu-gop-y',['as'=>'admin.customer.feedback','uses'=>'CustomerController@HomeFeedback']);
    });

    //Cấu hình route cho post
    route::group(['prefix'=>'bai-viet'],function(){
        route::get('/',function(){
            return view('admin.post.post');
        });
        route::get('bai-viet',['as'=>'admin.product.product','uses'=>'PostController@Home']);
        route::get('them-bai-viet',['as'=>'admin.product.addpost','uses'=>'PostController@getPost']);
        route::post('them-bai-viet',['as'=>'admin.product.addpost','uses'=>'PostController@postPost']);

        //Cấu hình route cho nhóm bài viết thuộc quản lý nhóm danh mục bài viết
        route::get('danh-muc-bai-viet',['as'=>'admin.post.postcategory','uses'=>'PostCategoryController@Home']);
        route::get('them-danh-muc-bai-viet',['as'=>'admin.post.postcategory','uses'=>'PostCategoryController@getPostCategory']);
        route::post('them-danh-muc-bai-viet',['as'=>'admin.post.postcategory','uses'=>'PostCategoryController@postPostCategory']);
        Route::get('sua-danh-muc-bai-viet',function(){
            return view('admin.post.editpostcategory');
        });
    });

    //Cấu hình route cho product
    route::group(['prefix'=>'san-pham'],function(){
        route::get('/',function(){
                return view('admin.product.product');
            });
        route::get('san-pham',['as'=>'admin.product.product','uses'=>'ProductController@Home']);
        route::get('them-san-pham',['as'=>'admin.product.addproduct','uses'=>'ProductController@getProduct']);
        route::post('them-san-pham',['as'=>'admin.product.addproduct','uses'=>'ProductController@postProduct']);


        //Cấu hình route cho nhóm sản phẩm thuộc quản lý nhóm danh mục sản phẩm
        route::get('danh-muc-san-pham',['as'=>'admin.product.productcategory','uses'=>'ProductCategoryController@Home']);
        route::get('them-danh-muc-san-pham',['as'=>'admin.product.productcategory','uses'=>'ProductCategoryController@getProductCategory']);
        route::post('them-danh-muc-san-pham',['as'=>'admin.product.productcategory','uses'=>'ProductCategoryController@postProductCategory']);

        Route::get('sua-danh-muc-san-pham',function(){
            return view('admin.product.editproductcategory');
        });
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
        });

        route::group(['prefix'=>'lien-he'],function(){
            route::get('/',['as'=>'admin.extend.contact','uses'=>'ContactController@Home']);
            route::get('them-lien-he',['as'=>'admin.extend.addcontact','uses'=>'ContactController@getContact']);
            route::post('them-lien-he',['as'=>'admin.extend.addcontact','uses'=>'ContactController@postContact']);
        });

        route::group(['prefix'=>'chan-trang'],function(){
            route::get('/',['as'=>'admin.extend.footer','uses'=>'FooterController@Home']);
            route::get('them-chan-trang',['as'=>'admin.extend.addfooter','uses'=>'FooterController@getFooter']);
            route::post('them-chan-trang',['as'=>'admin.extend.addfooter','uses'=>'FooterController@postFooter']);
        });

        route::group(['prefix'=>'slide-anh'],function(){
            route::get('/',['as'=>'admin.extend.slide','uses'=>'SlideController@Home']);
            route::get('them-slide-anh',['as'=>'admin.extend.addslide','uses'=>'SlideController@getSlide']);
            route::post('them-slide-anh',['as'=>'admin.extend.addslide','uses'=>'SlideController@postSlide']);
        });

            //Cấu hình route cho extend
        route::group(['prefix'=>'the-tag'],function(){
            route::get('/',['as'=>'admin.tag.tag','uses'=>'TagController@Home']);
            route::get('them-the-tag',['as'=>'admin.tag.tag','uses'=>'TagController@getTag']);
            route::post('them-the-tag',['as'=>'admin.tag.tag','uses'=>'TagController@postTag']);
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
  
