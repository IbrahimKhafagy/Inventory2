<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">

                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="Company_Logo/{{ Auth::user(0)->Compan->Company_Logo }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <br>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user(0)->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user(0)->email }}</span><br>
                    <span class="mb-0 text-muted">
                        {{ Auth::user(0)->getRoleNames()[0] }}


                    </span>
                </div>
            </div>
        </div>

<!---------------------------------------------------------->

<!------------------------------------------------------------>





        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'home')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">Index</span>

                    <!---<span
                        class="badge badge-success side-badge">1</span>--></a>
            </li>
            <li class="side-item side-item-category">General</li>
{{----
            @can('inventory-list')
                <li class="slide">

                    <a class="side-menu__item" href="{{ url('/' . ($page = 'inventory')) }}">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                                opacity=".3" />
                            <circle cx="15.5" cy="9.5" r="1.5" />
                            <circle cx="8.5" cy="9.5" r="1.5" />
                            <path
                                d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
                        </svg><span class="side-menu__label">Inventory</span><span class="badge badge-danger side-badge">
                            {{ auth()->user()->unreadNotifications()->where('type', 'App\Notifications\Addproduct')->where('data->user_company', Auth::user()->companies_id)->count() }}
                            New</span></a>


                </li>
            @endcan
            <li><a class="slide-item" href="{{ url('/' . ($page = 'add-product')) }}">Add products</a></li>
            <li><a class="slide-item" href="{{ url('/' . ($page = 'Consumption')) }}">Consumption</a></li>----}}




<!------------------------------------------------------------------------------------->
<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0z" fill="none" />
            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
            <path
                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
        </svg><span class="side-menu__label"> Inventory</span><i class="angle fe fe-chevron-down">
        </i></a>
    <ul class="slide-menu">
        <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory')) }}">Main Inventory<span class="badge badge-danger side-badge">
            {{ auth()->user()->unreadNotifications()->where('type', 'App\Notifications\Addproduct')->where('data->user_company', Auth::user()->companies_id)->count() }}
            New</span></a></li>

        <li><a class="slide-item" href="{{ url('/' . ($page = 'Sec_Invntories')) }}">All Sub-Inventories</a></li>

        <li><a class="slide-item" href="{{ url('/' . ($page = 'Add_inv')) }}">Add Sub Inventory</a></li>
        <li><a class="slide-item" href="{{ url('/' . ($page = 'show_allinvs')) }}">All Inventories</a></li>
        {{--<li><a class="slide-item" href="{{ url('/' . ($page = 'show_inv')) }}">Show(view)</a></li>

        <li><a class="slide-item" href="{{ url('/' . ($page = 'invedit')) }}">Edit Inventory</a></li>
        <li><a class="slide-item" href="{{ url('/' . ($page = 'inv-Summary')) }}">View Inventory summary</a></li>
        <li><a class="slide-item" href="{{ url('/' . ($page = 'inv-transactions')) }}">Transaction </a></li>

        <li><a class="slide-item" href="{{ url('/' . ($page = 'transfer_detailes')) }}">Transaction detailes</a></li>--}}






    </ul>
</li>
<!-------------------------------------------------------------------------------------->




<!--------------------------------------------------------------------------------------------------------->
@can('inventory-list')
<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0z" fill="none" />
            <path
                d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                opacity=".3" />
            <circle cx="15.5" cy="9.5" r="1.5" />
            <circle cx="8.5" cy="9.5" r="1.5" />
            <path
                d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
        </svg><span class="side-menu__label">Products</span><i class="angle fe fe-chevron-down">
        </i></a>



<ul class="slide-menu">




       {{-- <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory')) }}">Products<span class="badge badge-danger side-badge">
            {{ auth()->user()->unreadNotifications()->where('type', 'App\Notifications\Addproduct')->where('data->user_company', Auth::user()->companies_id)->count() }}
            New</span></a></li>--}}


        <li><a class="slide-item" href="{{ url('/' . ($page = 'add-product')) }}">Add products</a></li>


        <li><a class="slide-item" href="{{ url('/' . ($page = 'Consumption')) }}">Consumption</a></li>
        @can('Categories-list')
        <li><a class="slide-item" href="{{ url('/' . ($page = 'Categories')) }}">Categories</a></li>
    @endcan
    @can('Subcategories-list')
        <li><a class="slide-item" href="{{ url('/' . ($page = 'Subcategories')) }}">Subcategories</a>
        </li>
    @endcan





</ul>

<!---<ul>

    <li><a class="slide-item" href="{{ url('/' . ($page = 'notifications')) }}">All Notifications</a></li>

</ul>---->
@endcan
<!----------------------------------------- transfer----------------------------------------------------------->
<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0z" fill="none" />
            <path
                d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                opacity=".3" />
            <circle cx="15.5" cy="9.5" r="1.5" />
            <circle cx="8.5" cy="9.5" r="1.5" />
            <path
                d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
        </svg><span class="side-menu__label">Transfer Products</span><i class="angle fe fe-chevron-down">
        </i></a>
        <ul class="slide-menu">
        <li><a class="slide-item" href="{{ url('/' . ($page = 'Transfer')) }}">Transfer</a></li>
        </ul>
</li>



            <!------------------------------------------------------------------>


            @can('management')
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                        </svg><span class="side-menu__label">Management</span><i class="angle fe fe-chevron-down">
                        </i></a>
                @endcan


                <ul class="slide-menu">

                    @can('sku-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'AllSKU')) }}">All product</a></li>
                        {{-- -  <li><a class="slide-item" href="{{ url('/' . ($page = 'NullSKU')) }}">SKU NUll</a></li>
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'ManageSKU')) }}">Manage SKU</a></li> --}}
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'AllSKU1')) }}">All SKUs</a></li>
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'price_with_curr')) }}">price with
                                currency</a></li>
                    @endcan

                    @can('users-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">users</a></li>
                    @endcan

                    @can('users-create')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'users.create')) }}">users.create</a></li>
                    @endcan
                    @can('outedit-user')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'users.edit1')) }}">Edit your profile</a></li>
                    @endcan

                    @can('role-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}">roles</a></li>
                    @endcan
                    @can('role-create')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'roles.create')) }}">roles.create</a></li>
                    @endcan
                    @can('Edit-companylogo')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'companyEditlogo')) }}">Edit company</a></li>
                    @endcan




                    @can('permission_list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'permissions')) }}">Permissions</a></li>
                    @endcan
                    @can('permission_create')
                        <li><a class="slide-item"
                                href="{{ url('/' . ($page = 'permissions.create')) }}">permissions.create</a></li>
                    @endcan
                </ul>




                <!------------------------------------------------------------------>

                @can('Companiesreq-list')
                <li class="slide">
                    <a class="side-menu__item" href="{{ url('/' . ($page = 'AllReq')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <circle cx="15.5" cy="9.5" r="1.5" />
                            <circle cx="8.5" cy="9.5" r="1.5" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">Requeste to join</span><span
                            class="badge badge-danger side-badge">New</span></a>


                </li>
            @endcan
            @can('status')
                <li class="slide">
                    <a class="side-menu__item" href="{{ url('/' . ($page = 'Status')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <circle cx="15.5" cy="9.5" r="1.5" />
                            <circle cx="8.5" cy="9.5" r="1.5" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">Status</span></a>


                </li>
            @endcan
            {{--  <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg><span class="side-menu__label">Requeste to join</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/' . ($page = 'AllReq')) }}">AllReq</a></li>
                    {{-- <li><a class="slide-item" href="{{ url('/' . ($page = 'add-Req')) }}">Application</a></li>
                </ul>
            </li> --}}
            @can('lists')


                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                        </svg><span class="side-menu__label">lists</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('product-list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'ListsProduct')) }}">Selling Items</a></li>
                        @endcan
                        @can('material-list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'ListsMaterial')) }}">Purchase Items</a>
                            </li>
                        @endcan
                        @can('customer-list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'Customrslist')) }}">Customers</a></li>
                        @endcan

                        @can('supplier-list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'SuppliersList')) }}">Suppliers</a></li>
                        @endcan

                    </ul>


                </li>
            @endcan
            @can('orders-list')
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">Orders</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'Orders')) }}">orders</a></li>

                    </ul>
                </li>
            @endcan
            @can('team')
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">Your Team</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('team-list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'All_Team')) }}">All members</a></li>
                        @endcan
                        @can('team-create')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'CreateNew')) }}">Add New Member</a></li>
                        @endcan

                        <li><a class="slide-item" href="{{ url('/' . ($page = 'Permission')) }}">Permisions</a></li>

                    </ul>
                </li>
            @endcan

            @can('contactlist-list')


                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">Contacts</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('contactlist-list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'ContactList')) }}">All Contacts</a></li>
                        @endcan
                        @can('contactlist-create')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'AddnewContact')) }}">Add New Contact</a>
                            </li>
                        @endcan
                    </ul>
                </li>

            @endcan
            @can('COMPONENTS')
                <li class="side-item side-item-category">COMPONENTS</li>
            @endcan

            <li class="slide">

                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />

                        <path
                            d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                    </svg><span class="side-menu__label">Sections</span><i class="angle fe fe-chevron-down"></i></a>

                <ul class="slide-menu">


                    @can('productype-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'ProType')) }}">Product Type</a></li>
                    @endcan

                    @can('currancy-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'currancy')) }}">currancy</a></li>
                    @endcan

                    @can('unit-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'Unit')) }}">Unit</a></li>
                    @endcan

                    @can('Companies-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'companies')) }}">Campanies</a></li>
                    @endcan

                    @can('companytype-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'ComType')) }}">Company Type</a></li>
                    @endcan

                    @can('pendingitem-list')
                        <li><a class="slide-item" href="{{ url('/' . ($page = 'mail-settings')) }}">pending items</a>
                        </li>
                    @endcan


                </ul>
            </li>

            <!-------------------------------------------------------------------------->
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'SalesMo')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                            opacity=".3" />
                        <circle cx="15.5" cy="9.5" r="1.5" />
                        <circle cx="8.5" cy="9.5" r="1.5" />
                        <path
                            d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
                    </svg><span class="side-menu__label">Sales</span><span
                        class="badge badge-warning side-badge">Soon</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'PurchaseMp')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                            opacity=".3" />
                        <circle cx="15.5" cy="9.5" r="1.5" />
                        <circle cx="8.5" cy="9.5" r="1.5" />
                        <path
                            d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
                    </svg><span class="side-menu__label">purchase</span><span
                        class="badge badge-warning side-badge">Soon</span></a>
            </li>
            <!-------------------------------------------------------------------------------------------------------->

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                        <path
                            d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                    </svg><span class="side-menu__label">Stores</span><i class="angle fe fe-chevron-down">
                    </i></a>
                <ul class="slide-menu">


                    <li><a class="slide-item" href="{{ url('/' . ($page = 'Stores')) }}">All Stores</a></li>

                    <li><a class="slide-item" href="{{ url('/' . ($page = 'Add_store')) }}">Add Store</a></li>
                    <li><a class="slide-item" href="{{ url('/' . ($page = 'storeindex')) }}">index</a></li>




                </ul>
            </li>

            <li class="slide">

                <a class="side-menu__item" href="{{ url('/' . ($page = 'help')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">help</span></a>

            </li>

        </ul>



    </div>
</aside>
<!-- main-sidebar -->
