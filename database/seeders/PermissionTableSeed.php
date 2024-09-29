<?php

namespace Database\Seeders;

use App\Models\AccessControl\Permission;
use App\Models\AccessControl\PermissionMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Permission for every menus where need to inserting
         * Here is permissions structure
         * name: it permission name that show in access control as title
         * slug: a unique string that identify every permission separately it also should match with route name
         * description: A sort description about permission
         * key: every permission part of permission master. key is the master key that holding all permission
         */
        $permissions = [
            // Users Crud
            [
                'name' => 'Create User',
                'slug' => 'users.create',
                'description' => 'User create permission',
                'key' => 'users'
            ],
            [
                'name' => 'Users List',
                'slug' => 'users.index',
                'description' => 'User list permission',
                'key' => 'users'
            ],
            [
                'name' => 'Users Update',
                'slug' => 'users.update',
                'description' => 'User update permission',
                'key' => 'users'
            ],
            [
                'name' => 'Users View',
                'slug' => 'users.show',
                'description' => 'User show permission',
                'key' => 'users'
            ],
            [
                'name' => 'User Delete',
                'slug' => 'users.destroy',
                'description' => 'User delete permission',
                'key' => 'users'
            ],

            //employees
            [
                'name'=> 'Create Employee',
                'slug'=> 'hrm.employees.create',
                'description'=> 'Employee create permission',
                'key'=> 'hrm.employees'
            ],

            [
                'name'=> 'Employee List',
                'slug'=> 'hrm.employees.index',
                'description'=> 'Employee list permission',
                'key'=> 'hrm.employees'
            ],

            [
                'name'=> 'Employee Update',
                'slug'=> 'hrm.employees.update',
                'description'=> 'Employee update permission',
                'key'=> 'hrm.employees'
            ],

            [
                'name'=> 'Employee View',
                'slug'=> 'hrm.employees.show',
                'description'=> 'Employee show permission',
                'key'=> 'hrm.employees'
            ],

            [
                'name'=> 'Employee Delete',
                'slug'=> 'hrm.employees.destroy',
                'description'=> 'Employee delete permission',
                'key'=> 'hrm.employees'
            ],

            
            //attendance
            [
                'name'=> 'Attendance List',
                'slug'=> 'hrm.attendances.index',
                'description'=> 'Attendance list permission',
                'key'=> 'hrm.attendances'
            ],

            [
                'name'=> 'Create Attendance',
                'slug'=> 'hrm.attendances.create',
                'description'=> 'Attendance create permission',
                'key'=> 'hrm.attendances'
            ],

            [
                'name'=> 'Attendance Update',
                'slug'=> 'hrm.attendances.update',
                'description'=> 'Attendance update permission',
                'key'=> 'hrm.attendances'
            ],

            [
                'name'=> 'Attendance View',
                'slug'=> 'hrm.attendances.show',
                'description'=> 'Attendance show permission',
                'key'=> 'hrm.attendances'
            ],

            [
                'name'=> 'Attendance Delete',
                'slug'=> 'hrm.attendances.destroy',
                'description'=> 'Attendance delete permission',
                'key'=> 'hrm.attendances'
            ],

            
            //leave application
            [
                'name'=> 'Leave Application List',
                'slug'=> 'hrm.leaves.index',
                'description'=> 'Leave application list permission',
                'key'=> 'hrm.leaves'
            ],

            [
                'name'=> 'Create Leave Application',
                'slug'=> 'hrm.leaves.create',
                'description'=> 'Leave application create permission',
                'key'=> 'hrm.leaves'
            ],

            [
                'name'=> 'Leave Application Update',
                'slug'=> 'hrm.leaves.update',
                'description'=> 'Leave application update permission',
                'key'=> 'hrm.leaves'
            ],

            [
                'name'=> 'Leave Application View',
                'slug'=> 'hrm.leaves.show',
                'description'=> 'Leave application show permission',
                'key'=> 'hrm.leaves'
            ],

            [
                'name'=> 'Leave Application Delete',
                'slug'=> 'hrm.leaves.destroy',
                'description'=> 'Leave application delete permission',
                'key'=> 'hrm.leaves'
            ],

            //notice board
            [
                'name'=> 'Notice Board List',
                'slug'=> 'hrm.noticeboards.index',
                'description'=> 'Notice board list permission',
                'key'=> 'hrm.noticeboards'
            ],

            [
                'name'=> 'Create Notice Board',
                'slug'=> 'hrm.noticeboards.create',
                'description'=> 'Notice board create permission',
                'key'=> 'hrm.noticeboards'
            ],

            [
                'name'=> 'Notice Board Update',
                'slug'=> 'hrm.noticeboards.update',
                'description'=> 'Notice board update permission',
                'key'=> 'hrm.noticeboards'
            ],

            [
                'name'=> 'Notice Board View',
                'slug'=> 'hrm.noticeboards.show',
                'description'=> 'Notice board show permission',
                'key'=> 'hrm.noticeboards'
            ],

            [
                'name'=> 'Notice Board Delete',
                'slug'=> 'hrm.noticeboards.destroy',
                'description'=> 'Notice board delete permission',
                'key'=> 'hrm.noticeboards'
            ],

            //bills & allowances
            [
                'name'=> 'Bills & Allowances List',
                'slug'=> 'hrm.bills.index',
                'description'=> 'Bills & allowances list permission',
                'key'=> 'hrm.bills'
            ],

            [
                'name'=> 'Create Bills & Allowances',
                'slug'=> 'hrm.bills.create',
                'description'=> 'Bills & allowances create permission',
                'key'=> 'hrm.bills'
            ],

            [
                'name'=> 'Bills & Allowances Update',
                'slug'=> 'hrm.bills.update',
                'description'=> 'Bills & allowances update permission',
                'key'=> 'hrm.bills'
            ],

            [
                'name'=> 'Bills & Allowances View',
                'slug'=> 'hrm.bills.show',
                'description'=> 'Bills & allowances show permission',
                'key'=> 'hrm.bills'
            ],

            [
                'name'=> 'Bills & Allowances Delete',
                'slug'=> 'hrm.bills.destroy',
                'description'=> 'Bills & allowances delete permission',
                'key'=> 'hrm.bills'
            ],

            //customers
            [
                'name'=> 'Create Customer',
                'slug'=> 'crm.customers.create',
                'description'=> 'Customer create permission',
                'key'=> 'crm.customers'
            ],

            [
                'name'=> 'Customer List',
                'slug'=> 'crm.customers.index',
                'description'=> 'Customer list permission',
                'key'=> 'crm.customers'
            ],

            [
                'name'=> 'Customer Update',
                'slug'=> 'crm.customers.update',
                'description'=> 'Customer update permission',
                'key'=> 'crm.customers'
            ],

            [
                'name'=> 'Customer View',
                'slug'=> 'crm.customers.show',
                'description'=> 'Customer show permission',
                'key'=> 'crm.customers'
            ],

            [
                'name'=> 'Customer Delete',
                'slug'=> 'crm.customers.destroy',
                'description'=> 'Customer delete permission',
                'key'=> 'crm.customers'
            ],
            
            // Brokers
            [
                'name' => 'Create Broker',
                'slug' => 'crm.brokers.create',
                'description' => 'Broker create permission',
                'key' => 'crm.brokers'
            ],

            [
                'name' => 'Broker List',
                'slug' => 'crm.brokers.index',
                'description' => 'Broker list permission',
                'key' => 'crm.brokers'
            ],

            [
                'name' => 'Broker Update',
                'slug' => 'crm.brokers.update',
                'description' => 'Broker update permission',
                'key' => 'crm.brokers'
            ],

            [
                'name' => 'Broker View',
                'slug' => 'crm.brokers.show',
                'description' => 'Broker show permission',
                'key' => 'crm.brokers'
            ],

            [
                'name' => 'Broker Delete',
                'slug' => 'crm.brokers.destroy',
                'description' => 'Broker delete permission',
                'key' => 'crm.brokers'
            ],

            //Customer Ratings
            [
                'name' => 'Create Rating',
                'slug' => 'crm.customer-ratings.create',
                'description' => 'Customer Rating create permission',
                'key' => 'crm.customer-ratings'
            ],

            [
                'name' => 'Rating List',
                'slug' => 'crm.customer-ratings.index',
                'description' => 'Customer Rating list permission',
                'key' => 'crm.customer-ratings'
            ],

            [
                'name' => 'Rating Update',
                'slug' => 'crm.customer-ratings.update',
                'description'=> 'Customer Rating update permission',
                'key' => 'crm.customer-ratings'
            ],

            [
                'name' => 'Rating View',
                'slug'=> 'crm.customer-ratings.show',
                'description'=> 'Customer Rating show permission',
                'key' => 'crm.customer-ratings'
            ],

            [
                'name'=> 'Rating Delete',
                'slug'=> 'crm.customer-ratings.destroy',
                'description'=> 'Customer Rating delete permission',
                'key'=> 'crm.customer-ratings'
            ],

            //customer-shippings
            [
                'name'=> 'Create Shipping',
                'slug'=> 'crm.customer-shippings.create',
                'description'=> 'Customer Shipping create permission',
                'key'=> 'crm.customer-shippings'
            ],

            [
                'name'=> 'Shipping List',
                'slug'=> 'crm.customer-shippings.index',
                'description'=> 'Customer Shipping list permission',
                'key'=> 'crm.customer-shippings'
            ],

            [
                'name'=> 'Shipping Update',
                'slug'=> 'crm.customer-shippings.update',
                'description'=> 'Customer Shipping update permission',
                'key'=> 'crm.customer-shippings'
            ],

            [
                'name'=> 'Shipping View',
                'slug'=> 'crm.customer-shippings.show',
                'description'=> 'Customer Shipping show permission',
                'key'=> 'crm.customer-shippings'
            ],

            [
                'name'=> 'Shipping Delete',
                'slug'=> 'crm.customer-shippings.destroy',
                'description'=> 'Customer Shipping delete permission',
                'key'=> 'crm.customer-shippings'
            ],

            //customer-types
            [
                'name'=> 'Create Customer Type',
                'slug'=> 'crm.customer-types.create',
                'description'=> 'Customer Type create permission',
                'key'=> 'crm.customer-types'
            ],

            [
                'name'=> 'Customer Type List',
                'slug'=> 'crm.customer-types.index',
                'description'=> 'Customer Type list permission',
                'key'=> 'crm.customer-types'
            ],

            [
                'name'=> 'Customer Type Update',
                'slug'=> 'crm.customer-types.update',
                'description'=> 'Customer Type update permission',
                'key'=> 'crm.customer-types'
            ],

            [
                'name'=> 'Customer Type View',
                'slug'=> 'crm.customer-types.show',
                'description'=> 'Customer Type show permission',
                'key'=> 'crm.customer-types'
            ],

            [
                'name'=> 'Customer Type Delete',
                'slug'=> 'crm.customer-types.destroy',
                'description'=> 'Customer Type delete permission',
                'key'=> 'crm.customer-types'
            ],

            //daily-calls
            [
                'name'=> 'Create Daily Call',
                'slug'=> 'crm.daily-calls.create',
                'description'=> 'Daily Call create permission',
                'key'=> 'crm.daily-calls'
            ],

            [
                'name'=> 'Daily Call List',
                'slug'=> 'crm.daily-calls.index',
                'description'=> 'Daily Call list permission',
                'key'=> 'crm.daily-calls'
            ],

            [
                'name'=> 'Daily Call Update',
                'slug'=> 'crm.daily-calls.update',
                'description'=> 'Daily Call update permission',
                'key'=> 'crm.daily-calls'
            ],

            [
                'name'=> 'Daily Call View',
                'slug'=> 'crm.daily-calls.show',
                'description'=> 'Daily Call show permission',
                'key'=> 'crm.daily-calls'
            ],

            [
                'name'=> 'Daily Call Delete',
                'slug'=> 'crm.daily-calls.destroy',
                'description'=> 'Daily Call delete permission',
                'key'=> 'crm.daily-calls'
            ],

            //brands
            [
                'name'=> 'Create Brand',
                'slug'=> 'inv.brands.create',
                'description'=> 'Brand create permission',
                'key'=> 'inv.brands'
            ],

            [
                'name'=> 'Brand List',
                'slug'=> 'inv.brands.index',
                'description'=> 'Brand list permission',
                'key'=> 'inv.brands'
            ],

            [
                'name'=> 'Brand Update',
                'slug'=> 'inv.brands.update',
                'description'=> 'Brand update permission',
                'key'=> 'inv.brands'
            ],

            [
                'name'=> 'Brand View',
                'slug'=> 'inv.brands.show',
                'description'=> 'Brand show permission',
                'key'=> 'inv.brands'
            ],

            [
                'name'=> 'Brand Delete',
                'slug'=> 'inv.brands.destroy',
                'description'=> 'Brand delete permission',
                'key'=> 'inv.brands'
            ],

            //issue-products
            [
                'name'=> 'Create Issue Product',
                'slug'=> 'inv.issue-products.create',
                'description'=> 'Issue Product create permission',
                'key'=> 'inv.issue-products'
            ],

            [
                'name'=> 'Issue Product List',
                'slug'=> 'inv.issue-products.index',
                'description'=> 'Issue Product list permission',
                'key'=> 'inv.issue-products'
            ],

            [
                'name'=> 'Issue Product Update',
                'slug'=> 'inv.issue-products.update',
                'description'=> 'Issue Product update permission',
                'key'=> 'inv.issue-products'
            ],

            [
                'name'=> 'Issue Product View',
                'slug'=> 'inv.issue-products.show',
                'description'=> 'Issue Product show permission',
                'key'=> 'inv.issue-products'
            ],

            [
                'name'=> 'Issue Product Delete',
                'slug'=> 'inv.issue-products.destroy',
                'description'=> 'Issue Product delete permission',
                'key'=> 'inv.issue-products'
            ],

            //product-catalogs
            [
                'name'=> 'Create Product Catalog',
                'slug'=> 'inv.product-catalogs.create',
                'description'=> 'Product Catalog create permission',
                'key'=> 'inv.product-catalogs'
            ],

            [
                'name'=> 'Product Catalog List',
                'slug'=> 'inv.product-catalogs.index',
                'description'=> 'Product Catalog list permission',
                'key'=> 'inv.product-catalogs'
            ],

            [
                'name'=> 'Product Catalog Update',
                'slug'=> 'inv.product-catalogs.update',
                'description'=> 'Product Catalog update permission',
                'key'=> 'inv.product-catalogs'
            ],

            [
                'name'=> 'Product Catalog View',
                'slug'=> 'inv.product-catalogs.show',
                'description'=> 'Product Catalog show permission',
                'key'=> 'inv.product-catalogs'
            ],

            [
                'name'=> 'Product Catalog Delete',
                'slug'=> 'inv.product-catalogs.destroy',
                'description'=> 'Product Catalog delete permission',
                'key'=> 'inv.product-catalogs'
            ],

            //product-transfers
            [
                'name'=> 'Create Product Transfer',
                'slug'=> 'inv.product-transfers.create',
                'description'=> 'Product Transfer create permission',
                'key'=> 'inv.product-transfers'
            ],

            [
                'name'=> 'Product Transfer List',
                'slug'=> 'inv.product-transfers.index',
                'description'=> 'Product Transfer list permission',
                'key'=> 'inv.product-transfers'
            ],

            [
                'name'=> 'Product Transfer Update',
                'slug'=> 'inv.product-transfers.update',
                'description'=> 'Product Transfer update permission',
                'key'=> 'inv.product-transfers'
            ],

            [
                'name'=> 'Product Transfer View',
                'slug'=> 'inv.product-transfers.show',
                'description'=> 'Product Transfer show permission',
                'key'=> 'inv.product-transfers'
            ],

            [
                'name'=> 'Product Transfer Delete',
                'slug'=> 'inv.product-transfers.destroy',
                'description'=> 'Product Transfer delete permission',
                'key'=> 'inv.product-transfers'
            ],

            //product-transfer-requests
            [
                'name'=> 'Create Product Transfer',
                'slug'=> 'inv.product-transfer-requests.create',
                'description'=> 'Product Transfer create permission',
                'key'=> 'inv.product-transfer-requests'
            ],

            [
                'name'=> 'Product Transfer List',
                'slug'=> 'inv.product-transfer-requests.index',
                'description'=> 'Product Transfer list permission',
                'key'=> 'inv.product-transfer-requests'
            ],

            [
                'name'=> 'Product Transfer Update',
                'slug'=> 'inv.product-transfer-requests.update',
                'description'=> 'Product Transfer update permission',
                'key'=> 'inv.product-transfer-requests'
            ],

            [
                'name'=> 'Product Transfer View',
                'slug'=> 'inv.product-transfer-requests.show',
                'description'=> 'Product Transfer show permission',
                'key'=> 'inv.product-transfer-requests'
            ],

            [
                'name'=> 'Product Transfer Delete',
                'slug'=> 'inv.product-transfer-requests.destroy',
                'description'=> 'Product Transfer delete permission',
                'key'=> 'inv.product-transfer-requests'
            ],

            
            [
                'name'=> 'Product Transfer Approve',
                'slug'=> 'inv.product-transfer-requests.approve',
                'description'=> 'Product Transfer approve permission',
                'key'=> 'inv.product-transfer-requests'
            ],
            
            //product-offers
            [
                'name'=> 'Create Offers',
                'slug'=> 'inv.offers.create',
                'description'=> 'Offers create permission',
                'key'=> 'inv.offers'
            ],

            [
                'name'=> 'Offers List',
                'slug'=> 'inv.offers.index',
                'description'=> 'Offers list permission',
                'key'=> 'inv.offers'
            ],

            [
                'name'=> 'Offers Update',
                'slug'=> 'inv.offers.update',
                'description'=> 'Offers update permission',
                'key'=> 'inv.offers'
            ],

            [
                'name'=> 'Offers View',
                'slug'=> 'inv.offers.show',
                'description'=> 'Offers show permission',
                'key'=> 'inv.offers'
            ],

            [
                'name'=> 'Offers Delete',
                'slug'=> 'inv.offers.destroy',
                'description'=> 'Offers delete permission',
                'key'=> 'inv.offers'
            ],

            [
                'name'=> 'Create Stocks',
                'slug'=> 'inv.stocks.create',
                'description'=> 'Stocks create permission',
                'key'=> 'inv.stocks'
            ],
            [
                'name'=> 'Stocks List',
                'slug'=> 'inv.stocks.index',
                'description'=> 'Stocks list permission',
                'key'=> 'inv.stocks'
            ],
            [
                'name'=> 'Stocks Update',
                'slug'=> 'inv.stocks.update',
                'description'=> 'Stocks update permission',
                'key'=> 'inv.stocks'
            ],
            [
                'name'=> 'Stocks View',
                'slug'=> 'inv.stocks.show',
                'description'=> 'Stocks show permission',
                'key'=> 'inv.stocks'
            ],
            [
                'name'=> 'Stocks Delete',
                'slug'=> 'inv.stocks.destroy',
                'description'=> 'Stocks delete permission',
                'key'=> 'inv.stocks'
            ],

            //branchs
            [
                'name'=> 'Create Branches',
                'slug'=> 'inv.branchs.create',
                'description'=> 'Branches create permission',
                'key'=> 'inv.branchs'
            ],

            [
                'name'=> 'Branches List',
                'slug'=> 'inv.branchs.index',
                'description'=> 'Branches list permission',
                'key'=> 'inv.branchs'
            ],

            [
                'name'=> 'Branches Update',
                'slug'=> 'inv.branchs.update',
                'description'=> 'Branches update permission',
                'key'=> 'inv.branchs'
            ],

            [
                'name'=> 'Branches View',
                'slug'=> 'inv.branchs.show',
                'description'=> 'Branches show permission',
                'key'=> 'inv.branchs'
            ],

            [
                'name'=> 'Branches Delete',
                'slug'=> 'inv.branchs.destroy',
                'description'=> 'Branches delete permission',
                'key'=> 'inv.branchs'
            ],

            
            //units
            [
                'name'=> 'Create Unit',
                'slug'=> 'inv.settings.units.create',
                'description'=> 'Unit create permission',
                'key'=> 'inv.settings.units'
            ],

            [
                'name'=> 'Units List',
                'slug'=> 'inv.settings.units.index',
                'description'=> 'Units list permission',
                'key'=> 'inv.settings.units'
            ],

            [
                'name'=> 'Units Update',
                'slug'=> 'inv.settings.units.update',
                'description'=> 'Units update permission',
                'key'=> 'inv.settings.units'
            ],

            [
                'name'=> 'Units View',
                'slug'=> 'inv.settings.units.show',
                'description'=> 'Units show permission',
                'key'=> 'inv.settings.units'
            ],

            [
                'name'=> 'Units Delete',
                'slug'=> 'inv.settings.units.destroy',
                'description'=> 'Units delete permission',
                'key'=> 'inv.settings.units'
            ],

            //product-types
            [
                'name'=> 'Create Product Type',
                'slug'=> 'inv.product-types.create',
                'description'=> 'Product Type create permission',
                'key'=> 'inv.product-types'
            ],

            [
                'name'=> 'Product Type List',
                'slug'=> 'inv.product-types.index',
                'description'=> 'Product Type list permission',
                'key'=> 'inv.product-types'
            ],

            [
                'name'=> 'Product Type Update',
                'slug'=> 'inv.product-types.update',
                'description'=> 'Product Type update permission',
                'key'=> 'inv.product-types'
            ],

            [
                'name'=> 'Product Type View',
                'slug'=> 'inv.product-types.show',
                'description'=> 'Product Type show permission',
                'key'=> 'inv.product-types'
            ],

            [
                'name'=> 'Product Type Delete',
                'slug'=> 'inv.product-types.destroy',
                'description'=> 'Product Type delete permission',
                'key'=> 'inv.product-types'
            ],

            //products
            [
                'name'=> 'Create Product',
                'slug'=> 'inv.products.create',
                'description'=> 'Product create permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product List',
                'slug'=> 'inv.products.index',
                'description'=> 'Product list permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product Update',
                'slug'=> 'inv.products.update',
                'description'=> 'Product update permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product View',
                'slug'=> 'inv.products.show',
                'description'=> 'Product show permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product Delete',
                'slug'=> 'inv.products.destroy',
                'description'=> 'Product delete permission',
                'key'=> 'inv.products'
            ],

            //products
            [
                'name'=> 'Create Product',
                'slug'=> 'inv.products.create',
                'description'=> 'Product create permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product List',
                'slug'=> 'inv.products.index',
                'description'=> 'Product list permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product Update',
                'slug'=> 'inv.products.update',
                'description'=> 'Product update permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product View',
                'slug'=> 'inv.products.show',
                'description'=> 'Product show permission',
                'key'=> 'inv.products'
            ],

            [
                'name'=> 'Product Delete',
                'slug'=> 'inv.products.destroy',
                'description'=> 'Product delete permission',
                'key'=> 'inv.products'
            ],

            //approvers
            [
                'name'=> 'Create Approver',
                'slug'=> 'inv.settings.approvers.create',
                'description'=> 'Approver create permission',
                'key'=> 'inv.settings.approvers'
            ],

            [
                'name'=> 'Approver List',
                'slug'=> 'inv.settings.approvers.index',
                'description'=> 'Approver list permission',
                'key'=> 'inv.settings.approvers'
            ],

            [
                'name'=> 'Approver Update',
                'slug'=> 'inv.settings.approvers.update',
                'description'=> 'Approver update permission',
                'key'=> 'inv.settings.approvers'
            ],

            [
                'name'=> 'Approver View',
                'slug'=> 'inv.settings.approvers.show',
                'description'=> 'Approver show permission',
                'key'=> 'inv.settings.approvers'
            ],

            [
                'name'=> 'Approver Delete',
                'slug'=> 'inv.settings.approvers.destroy',
                'description'=> 'Approver delete permission',
                'key'=> 'inv.settings.approvers'
            ],

             //tags
             [
                'name'=> 'Create Tag',
                'slug'=> 'inv.settings.tags.create',
                'description'=> 'Tag create permission',
                'key'=> 'inv.settings.tags'
             ],

             [
                 
                'name'=> 'Tag List',
                'slug'=> 'inv.settings.tags.index',
                'description'=> 'Tag list permission',
                'key'=> 'inv.settings.tags'
             ],

             [
                'name'=> 'Tag Update',
                'slug'=> 'inv.settings.tags.update',
                'description'=> 'Tag update permission',
                'key'=> 'inv.settings.tags'
             ],

             [
                'name'=> 'Tag View',
                'slug'=> 'inv.settings.tags.show',
                'description'=> 'Tag show permission',
                'key'=> 'inv.settings.tags'
             ],

             [
                'name'=> 'Tag Delete',
                'slug'=> 'inv.settings.tags.destroy',
                'description'=> 'Tag delete permission',
                'key'=> 'inv.settings.tags'
             ],

             //units
             [
                'name'=> 'Create Unit',
                'slug'=> 'inv.settings.units.create',
                'description'=> 'Unit create permission',
                'key'=> 'inv.settings.units'
             ],

             [
                'name'=> 'Unit List',
                'slug'=> 'inv.settings.units.index',
                'description'=> 'Unit list permission',
                'key'=> 'inv.settings.units'
             ],

             [
                'name'=> 'Unit Update',
                'slug'=> 'inv.settings.units.update',
                'description'=> 'Unit update permission',
                'key'=> 'inv.settings.units'
             ],

             [
                'name'=> 'Unit View',
                'slug'=> 'inv.settings.units.show',
                'description'=> 'Unit show permission',
                'key'=> 'inv.settings.units'
             ],

             [
                'name'=> 'Unit Delete',
                'slug'=> 'inv.settings.units.destroy',
                'description'=> 'Unit delete permission',
                'key'=> 'inv.settings.units'
             ],


             //branch-types
             [
                'name'=> 'Create Branch Type',
                'slug'=> 'inv.settings.branch-types.create',
                'description'=> 'Branch Type create permission',
                'key'=> 'inv.settings.branch-types'
             ],

             [
                'name'=> 'Branch Type List',
                'slug'=> 'inv.settings.branch-types.index',
                'description'=> 'Branch Type list permission',
                'key'=> 'inv.settings.branch-types'
             ],

             [
                'name'=> 'Branch Type Update',
                'slug'=> 'inv.settings.branch-types.update',
                'description'=> 'Branch Type update permission',
                'key'=> 'inv.settings.branch-types'
             ],

             [
                'name'=> 'Branch Type View',
                'slug'=> 'inv.settings.branch-types.show',
                'description'=> 'Branch Type show permission',
                'key'=> 'inv.settings.branch-types'
             ],

             [
                'name'=> 'Branch Type Delete',
                'slug'=> 'inv.settings.branch-types.destroy',
                'description'=> 'Branch Type delete permission',
                'key'=> 'inv.settings.branch-types'
             ],

             //warehouses
             [
                'name'=> 'Create Warehouse',
                'slug'=> 'inv.warehouses.create',
                'description'=> 'Warehouse create permission',
                'key'=> 'inv.warehouses'
             ],

             [
                'name'=> 'Warehouse List',	
                'slug'=> 'inv.warehouses.index',
                'description'=> 'Warehouse list permission',
                'key'=> 'inv.warehouses'
             ],

             [
                'name'=> 'Warehouse Update',
                'slug'=> 'inv.warehouses.update',
                'description'=> 'Warehouse update permission',
                'key'=> 'inv.warehouses'
             ],

             [
                'name'=> 'Warehouse View',
                'slug'=> 'inv.warehouses.show',
                'description'=> 'Warehouse show permission',
                'key'=> 'inv.warehouses'
             ],

             [
                'name'=> 'Warehouse Delete',
                'slug'=> 'inv.warehouses.destroy',
                'description'=> 'Warehouse delete permission',
                'key'=> 'inv.warehouses'
             ],

            //Divisions

            [
                'name'=> 'Divisions Create',
                'slug'=> 'location_manager.divisions.create',
                'description'=> 'Divisions create permission',
                'key'=> 'location_manager.divisions'
            ],

            [
                'name'=> 'Divisions List',
                'slug'=> 'location_manager.divisions.index',
                'description'=> 'Divisions index permission',
                'key'=> 'location_manager.divisions'
            ],

            [
                'name'=> 'Divisions Update',
                'slug'=> 'location_manager.divisions.update',
                'description'=> 'Divisions update permission',
                'key'=> 'location_manager.divisions'
            ],

            [
                'name'=> 'Divisions View',
                'slug'=> 'location_manager.divisions.show',
                'description'=> 'Divisions show permission',
                'key'=> 'location_manager.divisions'
            ],

            [
                'name'=> 'Divisions Delete',
                'slug'=> 'location_manager.divisions.destroy',
                'description'=> 'Divisions delete permission',
                'key'=> 'location_manager.divisions'
            ],

            //districts

            [
                'name'=> 'Create Districts',
                'slug'=> 'location_manager.districts.create',
                'description'=> 'Districts create permission',
                'key'=> 'location_manager.districts'
             ],

             [
                'name'=> 'Districts List',
                'slug'=> 'location_manager.districts.index',
                'description'=> 'Districts index permission',
                'key'=> 'location_manager.districts'
             ],

             [
                'name'=> 'Districts Update',
                'slug'=> 'location_manager.districts.update',
                'description'=> 'Districts update permission',
                'key'=> 'location_manager.districts'
             ],

             [
                'name'=> 'Districts View',
                'slug'=> 'location_manager.districts.show',
                'description'=> 'Districts show permission',
                'key'=> 'location_manager.districts'
             ],

             [
                'name'=> 'Districts Delete',
                'slug'=> 'location_manager.districts.destroy',
                'description'=> 'Districts delete permission',
                'key'=> 'location_manager.districts'
             ],


            //thanas

            [
                'name'=> 'Create Thanas',
                'slug'=> 'location_manager.thanas.create',
                'description'=> 'Thanas create permission',
                'key'=> 'location_manager.thanas'
             ],

             [
                'name'=> 'Thanas List',
                'slug'=> 'location_manager.thanas.index',
                'description'=> 'Thanas index permission',
                'key'=> 'location_manager.thanas'
             ],

             [
                'name'=> 'Thanas Update',
                'slug'=> 'location_manager.thanas.update',
                'description'=> 'Thanas update permission',
                'key'=> 'location_manager.thanas'
             ],

             [
                'name'=> 'Thanas View',
                'slug'=> 'location_manager.thanas.show',
                'description'=> 'Thanas show permission',
                'key'=> 'location_manager.thanas'
             ],

             [
                'name'=> 'Thanas Delete',
                'slug'=> 'location_manager.thanas.destroy',
                'description'=> 'Thanas delete permission',
                'key'=> 'location_manager.thanas'
             ],

             

            //Areas
            [
                'name'=> 'Create Areas',
                'slug'=> 'location_manager.areas.create',
                'description'=> 'Areas create permission',
                'key'=> 'location_manager.areas'
             ],

             [
                'name'=> 'Areas List',
                'slug'=> 'location_manager.areas.index',
                'description'=> 'Areas list permission',
                'key'=> 'location_manager.areas'
             ],

             [
                'name'=> 'Areas Update',
                'slug'=> 'location_manager.areas.update',
                'description'=> 'Areas update permission',
                'key'=> 'location_manager.areas'
             ],

             [
                'name'=> 'Areas View',
                'slug'=> 'location_manager.areas.show',
                'description'=> 'Areas show permission',
                'key'=> 'location_manager.areas'
             ],

             [
                'name'=> 'Areas Delete',
                'slug'=> 'location_manager.areas.destroy',
                'description'=> 'Areas delete permission',
                'key'=> 'location_manager.areas'
             ],

             //location-types
             [
                'name'=> 'Create Location Type',
                'slug'=> 'location_manager.location-types.create',
                'description'=> 'Location type create permission',
                'key'=> 'location_manager.location-types'
             ],

             [
                'name'=> 'Location Type List',
                'slug'=> 'location_manager.location-types.index',
                'description'=> 'Location type list permission',
                'key'=> 'location_manager.location-types'
             ],

             [
                'name'=> 'Location Type Update',
                'slug'=> 'location_manager.location-types.update',
                'description'=> 'Location type update permission',
                'key'=> 'location_manager.location-types'
             ],

             [
                'name'=> 'Location Type View',
                'slug'=> 'location_manager.location-types.show',
                'description'=> 'Location type show permission',
                'key'=> 'location_manager.location-types'
             ],

             [
                'name'=> 'Location Type Delete',
                'slug'=> 'location_manager.location-types.destroy',
                'description'=> 'Location type delete permission',
                'key'=> 'location_manager.location-types'
             ],

             //locations
            //  [
            //     'name'=> 'Create Location',
            //     'slug'=> 'location_manager.locations.create',
            //     'description'=> 'Location create permission',
            //     'key'=> 'location_manager.locations'
            //  ],

            //  [
            //     'name'=> 'Location List',
            //     'slug'=> 'location_manager.locations.index',
            //     'description'=> 'Location list permission',
            //     'key'=> 'location_manager.locations'
            //  ],

            //  [
            //     'name'=> 'Location Update',
            //     'slug'=> 'location_manager.locations.update',
            //     'description'=> 'Location update permission',
            //     'key'=> 'location_manager.locations'
            //  ],

            //  [
            //     'name'=> 'Location View',
            //     'slug'=> 'location_manager.locations.show',
            //     'description'=> 'Location show permission',
            //     'key'=> 'location_manager.locations'
            //  ],

            //  [
            //     'name'=> 'Location Delete',
            //     'slug'=> 'location_manager.locations.destroy',
            //     'description'=> 'Location delete permission',
            //     'key'=> 'location_manager.locations'
            //  ],


            

             //Requisition
             [
                'name'=> 'Requisition Create',
                'slug'=> 'purchase.requisitions.create',
                'description'=> 'Requisition create permission',
                'key'=> 'purchase.requisitions'
             ],

             [
                'name'=> 'Requisition List',
                'slug'=> 'purchase.requisitions.index',
                'description'=> 'Requisition list permission',
                'key'=> 'purchase.requisitions'
             ],

             [
                'name'=> 'Requisition View',
                'slug'=> 'purchase.requisitions.show',
                'description'=> 'Requisition show permission',
                'key'=> 'purchase.requisitions'
             ],

             [
                'name'=> 'Requisition Update',
                'slug'=> 'purchase.requisitions.update',
                'description'=> 'Requisition update permission',
                'key'=> 'purchase.requisitions'
             ],

             [
                'name'=> 'Requisition Delete',
                'slug'=> 'purchase.requisitions.destroy',
                'description'=> 'Requisition delete permission',
                'key'=> 'purchase.requisitions'
             ],

             [
                'name'=> 'Requisition Approval',
                'slug'=> 'purchase.requisitions.approve',
                'description'=> 'Requisition approval permission',
                'key'=> 'purchase.requisitions'
             ],

             [
                'name'=> 'Requisition Receive',
                'slug'=> 'purchase.requisitions.receive',
                'description'=> 'Requisition Receive permission',
                'key'=> 'purchase.requisitions'
             ],

             //Orders
             [
                'name'=> 'Orders Create',
                'slug'=> 'purchase.orders.create',
                'description'=> 'Orders create permission',
                'key'=> 'purchase.orders'
             ],

             [
                'name'=> 'Orders List',
                'slug'=> 'purchase.orders.index',
                'description'=> 'Orders list permission',
                'key'=> 'purchase.orders'
             ],

             [
                'name'=> 'Orders View',
                'slug'=> 'purchase.orders.show',
                'description'=> 'Orders show permission',
                'key'=> 'purchase.orders'
             ],

             [
                'name'=> 'Orders Update',
                'slug'=> 'purchase.orders.update',
                'description'=> 'Orders update permission',
                'key'=> 'purchase.orders'
             ],

             [
                'name'=> 'Orders Delete',
                'slug'=> 'purchase.orders.destroy',
                'description'=> 'Orders delete permission',
                'key'=> 'purchase.orders'
             ],

             [
                'name'=> 'Orders Approval',
                'slug'=> 'purchase.orders.approve',
                'description'=> 'Orders approval permission',
                'key'=> 'purchase.orders'
             ],

             [
                'name'=> 'Orders Receive',
                'slug'=> 'purchase.orders.receive',
                'description'=> 'Orders Receive permission',
                'key'=> 'purchase.orders'
             ],

             //Offices
             [
                'name'=> 'Offices Create',
                'slug'=> 'purchase.offices.create',
                'description'=> 'Offices create permission',
                'key'=> 'purchase.offices'
             ],

             [
                'name'=> 'Offices List',
                'slug'=> 'purchase.offices.index',
                'description'=> 'Offices list permission',
                'key'=> 'purchase.offices'
             ],

             [
                'name'=> 'Offices View',
                'slug'=> 'purchase.offices.show',
                'description'=> 'Offices show permission',
                'key'=> 'purchase.offices'
             ],

             [
                'name'=> 'Offices Update',
                'slug'=> 'purchase.offices.update',
                'description'=> 'Offices update permission',
                'key'=> 'purchase.offices'
             ],

             [
                'name'=> 'Offices Delete',
                'slug'=> 'purchase.offices.destroy',
                'description'=> 'Offices delete permission',
                'key'=> 'purchase.offices'
             ],

             [
                'name'=> 'Offices Approval',
                'slug'=> 'purchase.offices.approve',
                'description'=> 'Offices approval permission',
                'key'=> 'purchase.offices'
             ],

             [
                'name'=> 'Offices Receive',
                'slug'=> 'purchase.offices.receive',
                'description'=> 'Offices Receive permission',
                'key'=> 'purchase.offices'
             ],
             //suppliers
             [
                'name'=> 'Create Supplier',
                'slug'=> 'purchase.suppliers.create',
                'description'=> 'Supplier create permission',
                'key'=> 'purchase.suppliers'
             ],

             [
                'name'=> 'Supplier List',
                'slug'=> 'purchase.suppliers.index',
                'description'=> 'Supplier list permission',
                'key'=> 'purchase.suppliers'
             ],

             [
                'name'=> 'Supplier Update',
                'slug'=> 'purchase.suppliers.update',
                'description'=> 'Supplier update permission',
                'key'=> 'purchase.suppliers'
             ],

             [
                'name'=> 'Supplier View',
                'slug'=> 'purchase.suppliers.show',
                'description'=> 'Supplier show permission',
                'key'=> 'purchase.suppliers'
             ],

             [
                'name'=> 'Supplier Delete',
                'slug'=> 'purchase.suppliers.destroy',
                'description'=> 'Supplier delete permission',
                'key'=> 'purchase.suppliers'
             ],

             //vendors
             [
                'name'=> 'Create Vendor',
                'slug'=> 'purchase.vendors.create',
                'description'=> 'Vendor create permission',
                'key'=> 'purchase.vendors'
             ],

             [
                'name'=> 'Vendor List',
                'slug'=> 'purchase.vendors.index',
                'description'=> 'Vendor list permission',
                'key'=> 'purchase.vendors'
             ],

             [
                'name'=> 'Vendor Update',
                'slug'=> 'purchase.vendors.update',
                'description'=> 'Vendor update permission',
                'key'=> 'purchase.vendors'
             ],

             [
                'name'=> 'Vendor View',
                'slug'=> 'purchase.vendors.show',
                'description'=> 'Vendor show permission',
                'key'=> 'purchase.vendors'
             ],

             [
                'name'=> 'Vendor Delete',
                'slug'=> 'purchase.vendors.destroy',
                'description'=> 'Vendor delete permission',
                'key'=> 'purchase.vendors'
             ],

             

             //sales orders
             [
                'name'=> 'Create Sales Orders',
                'slug'=> 'sales.sales-orders.create',
                'description'=> 'Sales Orders create permission',
                'key'=> 'sales.sales-orders'
             ],

             [
                'name'=> 'Sales Orders List',
                'slug'=> 'sales.sales-orders.index',
                'description'=> 'Sales Orders list permission',
                'key'=> 'sales.sales-orders'
             ],

             [
                'name'=> 'Sales Orders Update',
                'slug'=> 'sales.sales-orders.update',
                'description'=> 'Sales Orders update permission',
                'key'=> 'sales.sales-orders'
             ],

             [
                'name'=> 'Sales Orders View',
                'slug'=> 'sales.sales-orders.show',
                'description'=> 'Sales Orders show permission',
                'key'=> 'sales.sales-orders'
             ],

             [
                'name'=> 'Sales Orders Delete',
                'slug'=> 'sales.sales-orders.destroy',
                'description'=> 'Sales Orders delete permission',
                'key'=> 'sales.sales-orders'
             ],

             [
                'name'=> 'Sales Orders Approve',
                'slug'=> 'sales.sales-orders.approve',
                'description'=> 'Sales Orders approve permission',
                'key'=> 'sales.sales-orders'
             ],

             [
                'name'=> 'Sales Orders Receive',
                'slug'=> 'sales.sales-orders.receive',
                'description'=> 'Sales Orders receive permission',
                'key'=> 'sales.sales-orders'
             ],

            //sales order deliveries

             [
                'name'=> 'Sales Order Deliveries Create',
                'slug'=> 'sales.sales-order-deliveries.create',
                'description'=> 'Sales Order Deliveries create permission',
                'key'=> 'sales.sales-order-deliveries'
             ],

             [
                'name'=> 'Sales Order Deliveries List',
                'slug'=> 'sales.sales-order-deliveries.index',
                'description'=> 'Sales Order Deliveries list permission',
                'key'=> 'sales.sales-order-deliveries'
             ],

             [
                'name'=> 'Sales Order Deliveries Update',
                'slug'=> 'sales.sales-order-deliveries.update',
                'description'=> 'Sales Order Deliveries update permission',
                'key'=> 'sales.sales-order-deliveries'
             ],

             [
                'name'=> 'Sales Order Deliveries View',
                'slug'=> 'sales.sales-order-deliveries.show',
                'description'=> 'Sales Order Deliveries show permission',
                'key'=> 'sales.sales-order-deliveries'
             ],

             [
                'name'=> 'Sales Order Deliveries Delete',
                'slug'=> 'sales.sales-order-deliveries.destroy',
                'description'=> 'Sales Order Deliveries delete permission',
                'key'=> 'sales.sales-order-deliveries'
             ],

             [
                'name'=> 'Sales Order Deliveries Approve',
                'slug'=> 'sales.sales-order-deliveries.approve',
                'description'=> 'Sales Order Deliveries approve permission',
                'key'=> 'sales.sales-order-deliveries'
             ],

             [
                'name'=> 'Sales Order Deliveries Receive',
                'slug'=> 'sales.sales-order-deliveries.receive',
                'description'=> 'Sales Order Deliveries receive permission',
                'key'=> 'sales.sales-order-deliveries'
             ],


            //sales requisitions

            [
                'name'=> 'Sales Requisitions Create',
                'slug'=> 'sales.sales-requisitions.create',
                'description'=> 'Sales Requisitions create permission',
                'key'=> 'sales.sales-requisitions'
             ],

             [
                'name'=> 'Sales Requisitions List',
                'slug'=> 'sales.sales-requisitions.index',
                'description'=> 'Sales Requisitions list permission',
                'key'=> 'sales.sales-requisitions'
             ],

             [
                'name'=> 'Sales Requisitions Update',
                'slug'=> 'sales.sales-requisitions.update',
                'description'=> 'Sales Requisitions update permission',
                'key'=> 'sales.sales-requisitions'
             ],

             [
                'name'=> 'Sales Requisitions View',
                'slug'=> 'sales.sales-requisitions.show',
                'description'=> 'Sales Requisitions show permission',
                'key'=> 'sales.sales-requisitions'
             ],

             [
                'name'=> 'Sales Requisitions Delete',
                'slug'=> 'sales.sales-requisitions.destroy',
                'description'=> 'Sales Requisitions delete permission',
                'key'=> 'sales.sales-requisitions'
             ],

             [
                'name'=> 'Sales Requisitions Approve',
                'slug'=> 'sales.sales-requisitions.approve',
                'description'=> 'Sales Requisitions approve permission',
                'key'=> 'sales.sales-requisitions'
             ],

             [
                'name'=> 'Sales Requisitions Receive',
                'slug'=> 'sales.sales-requisitions.receive',
                'description'=> 'Sales Requisitions receive permission',
                'key'=> 'sales.sales-requisitions'
             ],

            //backup challans

             [
                'name'=> 'Backup Challans Create',
                'slug'=> 'sales.backup-challans.create',
                'description'=> 'Backup Challans create permission',
                'key'=> 'sales.backup-challans'
             ],

             [
                'name'=> 'Backup Challans List',
                'slug'=> 'sales.backup-challans.index',
                'description'=> 'Backup Challans list permission',
                'key'=> 'sales.backup-challans'
             ],

             [
                'name'=> 'Backup Challans Update',
                'slug'=> 'sales.backup-challans.update',
                'description'=> 'Backup Challans update permission',
                'key'=> 'sales.backup-challans'
             ],

             [
                'name'=> 'Backup Challans View',
                'slug'=> 'sales.backup-challans.show',
                'description'=> 'Backup Challans show permission',
                'key'=> 'sales.backup-challans'
             ],

             [
                'name'=> 'Backup Challans Delete',
                'slug'=> 'sales.backup-challans.destroy',
                'description'=> 'Backup Challans delete permission',
                'key'=> 'sales.backup-challans'
             ],

             [
                'name'=> 'Backup Challans Approve',
                'slug'=> 'sales.backup-challans.approve',
                'description'=> 'Backup Challans approve permission',
                'key'=> 'sales.backup-challans'
             ],


            //quotations
            [
                'name'=> 'Quotations Create',
                'slug'=> 'sales.quotations.create',
                'description'=> 'Quotations create permission',
                'key'=> 'sales.quotations'
            ],

            [
                'name'=> 'Quotations List',
                'slug'=> 'sales.quotations.index',
                'description'=> 'Quotations list permission',
                'key'=> 'sales.quotations'
            ],

            [
                'name'=> 'Quotations Update',
                'slug'=> 'sales.quotations.update',
                'description'=> 'Quotations update permission',
                'key'=> 'sales.quotations'
            ],

            [
                'name'=> 'Quotations View',
                'slug'=> 'sales.quotations.show',
                'description'=> 'Quotations show permission',
                'key'=> 'sales.quotations'
            ],

            [
                'name'=> 'Quotations Delete',
                'slug'=> 'sales.quotations.destroy',
                'description'=> 'Quotations delete permission',
                'key'=> 'sales.quotations'
            ],

            [
                'name'=> 'Quotations Approve',
                'slug'=> 'sales.quotations.approve',
                'description'=> 'Quotations approve permission',
                'key'=> 'sales.quotations'
            ],

            //Dongle Or Serial Entries

            [
                'name'=> 'Dongle Or Serial Entries Create',
                'slug'=> 'licenses.dongle-or-serial-entries.create',
                'description'=> 'Dongle Or Serial Entries create permission',
                'key'=> 'licenses.dongle-or-serial-entries'
            ],

            [
                'name'=> 'Dongle Or Serial Entries List',
                'slug'=> 'licenses.dongle-or-serial-entries.index',
                'description'=> 'Dongle Or Serial Entries list permission',
                'key'=> 'licenses.dongle-or-serial-entries'
            ],

            [
                'name'=> 'Dongle Or Serial Entries Update',
                'slug'=> 'licenses.dongle-or-serial-entries.update',
                'description'=> 'Dongle Or Serial Entries update permission',
                'key'=> 'licenses.dongle-or-serial-entries'
            ],

            [
                'name'=> 'Dongle Or Serial Entries View',
                'slug'=> 'licenses.dongle-or-serial-entries.show',
                'description'=> 'Dongle Or Serial Entries show permission',
                'key'=> 'licenses.dongle-or-serial-entries'
            ],

            [
                'name'=> 'Dongle Or Serial Entries Delete',
                'slug'=> 'licenses.dongle-or-serial-entries.destroy',
                'description'=> 'Dongle Or Serial Entries delete permission',
                'key'=> 'licenses.dongle-or-serial-entries'
            ],

            //usg-opg-license-requisitions
            [
                'name'=> 'USG OPG License Requisitions Create',
                'slug'=> 'licenses.usg-opg-license-requisitions.create',
                'description'=> 'USG OPG License Requisitions create permission',
                'key'=> 'licenses.usg-opg-license-requisitions'
            ],

            [
                'name'=> 'USG OPG License Requisitions List',
                'slug'=> 'licenses.usg-opg-license-requisitions.index',
                'description'=> 'USG OPG License Requisitions list permission',
                'key'=> 'licenses.usg-opg-license-requisitions'
            ],

            [
                'name'=> 'USG OPG License Requisitions Update',
                'slug'=> 'licenses.usg-opg-license-requisitions.update',
                'description'=> 'USG OPG License Requisitions update permission',
                'key'=> 'licenses.usg-opg-license-requisitions'
            ],

            [
                'name'=> 'USG OPG License Requisitions View',
                'slug'=> 'licenses.usg-opg-license-requisitions.show',
                'description'=> 'USG OPG License Requisitions show permission',
                'key'=> 'licenses.usg-opg-license-requisitions'
            ],

            [
                'name'=> 'USG OPG License Requisitions Delete',
                'slug'=> 'licenses.usg-opg-license-requisitions.destroy',
                'description'=> 'USG OPG License Requisitions delete permission',
                'key'=> 'licenses.usg-opg-license-requisitions'
            ],


            //cbc-license-requisitions
            [
                'name'=> 'CBC License Requisitions Create',
                'slug'=> 'licenses.cbc-license-requisitions.create',
                'description'=> 'CBC License Requisitions create permission',
                'key'=> 'licenses.cbc-license-requisitions'
            ],

            [
                'name'=> 'CBC License Requisitions List',
                'slug'=> 'licenses.cbc-license-requisitions.index',
                'description'=> 'CBC License Requisitions list permission',
                'key'=> 'licenses.cbc-license-requisitions'
            ],

            [
                'name'=> 'CBC License Requisitions Update',
                'slug'=> 'licenses.cbc-license-requisitions.update',
                'description'=> 'CBC License Requisitions update permission',
                'key'=> 'licenses.cbc-license-requisitions'
            ],

            [
                'name'=> 'CBC License Requisitions View',
                'slug'=> 'licenses.cbc-license-requisitions.show',
                'description'=> 'CBC License Requisitions show permission',
                'key'=> 'licenses.cbc-license-requisitions'
            ],

            [
                'name'=> 'CBC License Requisitions Delete',
                'slug'=> 'licenses.cbc-license-requisitions.destroy',
                'description'=> 'CBC License Requisitions delete permission',
                'key'=> 'licenses.cbc-license-requisitions'
            ],

            //service
            [
                'name'=> 'Service Create',
                'slug'=> 'services.service.create',
                'description'=> 'Service create permission',
                'key'=> 'services.service',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service List',
                'slug'=> 'services.service.index',
                'description'=> 'Service list permission',
                'key'=> 'services.service',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service Update',
                'slug'=> 'services.service.update',
                'description'=> 'Service update permission',
                'key'=> 'services.service',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service View',
                'slug'=> 'services.service.show',
                'description'=> 'Service show permission',
                'key'=> 'services.service',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service Delete',
                'slug'=> 'services.service.destroy',
                'description'=> 'Service delete permission',
                'key'=> 'services.service',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service Type Create',
                'slug'=> 'services.settings.service-types.create',
                'description'=> 'Service type create permission',
                'key'=> 'services.settings.service-types',
                'parent_key' => 'services.settings',
            ],

            [
                'name'=> 'Service Type List',
                'slug'=> 'services.settings.service-types.index',
                'description'=> 'Service type list permission',
                'key'=> 'services.settings.service-types',
                'parent_key' => 'services.settings',
            ],

            [
                'name'=> 'Service Type Update',
                'slug'=> 'services.settings.service-types.update',
                'description'=> 'Service type update permission',
                'key'=> 'services.settings.service-types',
                'parent_key' => 'services.settings',
            ],

            [
                'name'=> 'Service Type View',
                'slug'=> 'services.settings.service-types.show',
                'description'=> 'Service type show permission',
                'key'=> 'services.settings.service-types',
                'parent_key' => 'services.settings',
            ],

            [
                'name'=> 'Service Type Delete',
                'slug'=> 'services.settings.service-types.destroy',
                'description'=> 'Service type delete permission',
                'key'=> 'services.settings.service-types',
                'parent_key' => 'services.settings',
            ],

            //service-assign
            [
                'name'=> 'Service Assign Create',
                'slug'=> 'services.service-assign.create',
                'description'=> 'Service assign create permission',
                'key'=> 'services.service-assign',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service Assign List',
                'slug'=> 'services.service-assign.index',
                'description'=> 'Service assign list permission',
                'key'=> 'services.service-assign',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service Assign Update',
                'slug'=> 'services.service-assign.update',
                'description'=> 'Service assign update permission',
                'key'=> 'services.service-assign',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service Assign View',
                'slug'=> 'services.service-assign.show',
                'description'=> 'Service assign show permission',
                'key'=> 'services.service-assign',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service Assign Delete',
                'slug'=> 'services.service-assign.destroy',
                'description'=> 'Service assign delete permission',
                'key'=> 'services.service-assign',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service My Task Create',
                'slug'=> 'services.service-my-task.create',
                'description'=> 'Service my task create permission',
                'key'=> 'services.service-my-task',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service My Task List',
                'slug'=> 'services.service-my-task.index',
                'description'=> 'Service my task list permission',
                'key'=> 'services.service-my-task',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service My Task Update',
                'slug'=> 'services.service-my-task.update',
                'description'=> 'Service my task update permission',
                'key'=> 'services.service-my-task',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service My Task View',
                'slug'=> 'services.service-my-task.show',
                'description'=> 'Service my task show permission',
                'key'=> 'services.service-my-task',
                'parent_key' => 'services',
            ],

            [
                'name'=> 'Service My Task Delete',
                'slug'=> 'services.service-my-task.destroy',
                'description'=> 'Service my task delete permission',
                'key'=> 'services.service-my-task',
                'parent_key' => 'services',
            ],
 
        ];

        foreach ($permissions as $permission) {
            $master = PermissionMaster::where('key', $permission['key'])->first();
            // $master->permissions()->updateOrCreate([
            //     'slug' => $permission['slug'],
            // ], [
            //     'name' => $permission['name'],
            //     'slug' => $permission['slug'],
            //     'description' => $permission['description']
            // ]);
            
            DB::table('permissions')->insert([
                
            ]);
            Permission::updateOrCreate([
                'slug' => $permission['slug'],
            ], [
                'name' => $permission['name'],
                'slug' => $permission['slug'],
                'description' => $permission['description'],
                'permission_master_id' => $master->id
            ]);
        }
    }
}
