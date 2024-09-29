<?php

namespace Database\Seeders;

use App\Models\AccessControl\PermissionMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Users',
                'description' => "Permission of Add, Remove, Update, Delete Users",
                'key' => 'users',
            ],
            // hrm
            [
                'title' => 'Hrm & Payroll',
                'description' => "Permission of Add, Remove, Update, Delete Hrm & Payroll",
                'key' => 'hrm',
            ],
            //employees
            [
                'title' => 'Employee',
                'description' => "Permission of Add, Remove, Update, Delete Employee",
                'key' => 'hrm.employees',
                'parent_key' => 'hrm',
            ],

            //Attendance
            [
                'title' => 'Attendance',
                'description' => "Permission of Add, Remove, Update, Delete Employee Attendance",
                'key' => 'hrm.attendances',
                'parent_key' => 'hrm',
            ],
            //Leave Application
            [
                'title' => 'Leave Application',
                'description' => "Permission of Add, Remove, Update, Delete Employee Leave Application",
                'key' => 'hrm.leaves',
                'parent_key' => 'hrm',
            ],
            //NoticeBoard
            [
                'title' => 'NoticeBoard',
                'description' => "Permission of Add, Remove, Update, Delete NoticeBoard",
                'key' => 'hrm.noticeboards',
                'parent_key' => 'hrm',
            ],
            //Bills & Allowances
            [
                'title' => 'Bills & Allowances',
                'description' => "Permission of Add, Remove, Update, Delete Bills & Allowances",
                'key' => 'hrm.bills',
                'parent_key' => 'hrm',
            ],
            //crm
            [
                'title' => 'Crm',
                'description' => "Permission of Add, Remove, Update, Delete Crm",
                'key' => 'crm',
            ],
            //customers
            [
                'title' => 'Customer',
                'description' => "Permission of Add, Remove, Update, Delete Customer",
                'key' => 'crm.customers',
                'parent_key' => 'crm',
            ],
            //brokers
            [
                'title' => 'Broker',
                'description' => "Permission of Add, Remove, Update, Delete Broker",
                'key' => 'crm.brokers',
                'parent_key' => 'crm',
            ],
            //customer-ratings
            [
                'title' => 'Customer Ratings',
                'description' => "Permission of Add, Remove, Update, Delete Customer Ratings",
                'key' => 'crm.customer-ratings',
                'parent_key' => 'crm',
            ],
            //customer-shippings
            [
                'title' => 'Customer Shippings',
                'description' => "Permission of Add, Remove, Update, Delete Customer Shippings",
                'key' => 'crm.customer-shippings',
                'parent_key' => 'crm',
            ],
            //customer-types
            [
                'title'=> 'Customer Types',
                'description' => "Permission of Add, Remove, Update, Delete Customer Types",
                "key"=> "crm.customer-types",
                'parent_key' => 'crm',
            ],
            //daily-calls
            [
                'title' => 'Daily Calls',
                'description' => 'Permission of Add, Remove, Update, Delete Daily Calls',
                'key' => 'crm.daily-calls',
                'parent_key' => 'crm',
            ],
            //inv
            [
                'title' => 'Inventory',
                'description' => 'Permission of Add, Remove, Update, Delete Inventory',
                'key' => 'inv',
            ],
            //brands
            [
                'title' => 'Brands',
                'description' => 'Permission of Add, Remove, Update, Delete Brands',
                'key' => 'inv.brands',
                'parent_key' => 'inv',
            ],
            //issue-products
            [
                'title' => 'Issue Products',
                'description' => 'Permission of Add, Remove, Update, Delete Issue Products',
                'key' => 'inv.issue-products',
                'parent_key' => 'inv',
            ],
            //product-catalogs
            [
                'title' => 'Product Catalogs',
                'description' => 'Permission of Add, Remove, Update, Delete Product Catalogs',
                'key' => 'inv.product-catalogs',
                'parent_key' => 'inv',
            ],
            
            //product-transfers
            [
                'title' => 'Product Transfers',
                'description' => 'Permission of Add, Remove, Update, Delete Product Transfers',
                'key' => 'inv.product-transfers',
                'parent_key' => 'inv',
            ],

            //product-transfer-requests
            [
                'title' => 'Product Transfers Requests',
                'description' => 'Permission of Add, Remove, Update, Delete Product Transfers Requests',
                'key' => 'inv.product-transfer-requests',
                'parent_key' => 'inv',
            ],

            //gift/offers
            [
                'title' => 'Offers Requests',
                'description' => 'Permission of Add, Remove, Update, Delete Offers Requests',
                'key' => 'inv.offers',
                'parent_key' => 'inv',
            ],

            //branchs
            [
                'title' => 'Branches',
                'description' => 'Permission of Add, Remove, Update, Delete Branches',
                'key' => 'inv.branchs',
                'parent_key' => 'inv',
            ],

            //stocks
            [
                'title' => 'Stocks',
                'description' => 'Permission of Add, Remove, Update, Delete Stocks',
                'key' => 'inv.stocks',
                'parent_key' => 'inv',
            ],

            
            //inventory settings
            [
                'title' => 'Inventory Settings',
                'description' => 'Permission of Add, Remove, Update, Delete Inventory Settings',
                'key' => 'inv.settings',
                'parent_key' => 'inv',
            ],

            //inventory settings units
            [
                'title' => 'Inventory Settings Units',
                'description' => 'Permission of Add, Remove, Update, Delete Inventory Settings Units',
                'key' => 'inv.settings.units',
                'parent_key' => 'inv.settings',
            ],
            //product-types
            [
                'title' => 'Product Types',
                'description' => 'Permission of Add, Remove, Update, Delete Product Types',
                'key' => 'inv.product-types',
                'parent_key' => 'inv',
            ],

            //brands
            [
                'title' => 'Brands',
                'description' => 'Permission of Add, Remove, Update, Delete Brands',
                'key' => 'inv.brands',
                'parent_key' => 'inv',
            ],

            //products
            [
                'title' => 'Products',
                'description' => 'Permission of Add, Remove, Update, Delete Products',
                'key' => 'inv.products',
                'parent_key' => 'inv',
            ],
            //settings
            [
                'title' => 'Settings',
                'description' => 'Permission of Add, Remove, Update, Delete Settings',
                'key' => 'inv.settings',
                'parent_key' => 'inv',
            ],

            //approvers
            [
                'title' => 'Approvers',
                'description' => 'Permission of Add, Remove, Update, Delete Approvers',
                'key' => 'inv.settings.approvers',
                'parent_key' => 'inv.settings',
            ],

            //tags
            [
                'title' => 'Tags',
                'description' => 'Permission of Add, Remove, Update, Delete Tags',
                'key' => 'inv.settings.tags',
                'parent_key' => 'inv.settings',
            ],
            //units
            [
                'title' => 'Units',
                'description' => 'Permission of Add, Remove, Update, Delete Units',
                'key' => 'inv.settings.units',
                'parent_key' => 'inv.settings',
            ],
            //Branch Types
            [
                'title' => 'Branch Types',
                'description' => 'Permission of Add, Remove, Update, Delete Branch Types',
                'key' => 'inv.settings.branch-types',
                'parent_key' => 'inv.settings',
            ],

            //warehouses
            [
                'title' => 'Warehouses',
                'description' => 'Permission of Add, Remove, Update, Delete Warehouses',
                'key' => 'inv.warehouses',
                'parent_key' => 'inv',
            ],

            //location-manager
            [
                'title' => 'Location Manager',
                'description' => 'Permission of Add, Remove, Update, Delete Location Manager',
                'key' => 'location_manager',
            ],

            //divisions
            [
                'title' => 'Divisions',
                'description' => 'Permission of Add, Remove, Update, Delete Divisions',
                'key' => 'location_manager.divisions',
                'parent_key' => 'location_manager',
            ],
            //districts
            [
                'title' => 'Districts',
                'description' => 'Permission of Add, Remove, Update, Delete Districts',
                'key' => 'location_manager.districts',
                'parent_key' => 'location_manager',
            ],
            //thanas
            [
                'title' => 'Thanas',
                'description' => 'Permission of Add, Remove, Update, Delete Thanas',
                'key' => 'location_manager.thanas',
                'parent_key' => 'location_manager',
            ],

            //areas
            [
                'title' => 'Areas',
                'description' => 'Permission of Add, Remove, Update, Delete Areas',
                'key' => 'location_manager.areas',
                'parent_key' => 'location_manager',
            ],

            //location-types
            [
                'title' => 'Location Types',
                'description' => 'Permission of Add, Remove, Update, Delete Location Types',
                'key' => 'location_manager.location-types',
                'parent_key' => 'location_manager',
            ],

            //locations
            [
                'title' => 'Locations',
                'description' => 'Permission of Add, Remove, Update, Delete Locations',
                'key' => 'location_manager.locations',
                'parent_key' => 'location_manager',
            ],

            //purchase
            [
                'title' => 'Purchase',
                'description' => 'Permission of Add, Remove, Update, Delete Purchase',
                'key' => 'purchase',
            ],
            //requisitions
            [
                'title' => 'Requisition',
                'description' => 'Permission of Add, Remove, Update, Delete Requisition',
                'key' => 'purchase.requisitions',
                'parent_key' => 'purchase',
            ],

            //orders
            [
                'title' => 'Orders',
                'description' => 'Permission of Add, Remove, Update, Delete Orders',
                'key' => 'purchase.orders',
                'parent_key' => 'purchase',
            ],

            //offices
            [
                'title' => 'Offices',
                'description' => 'Permission of Add, Remove, Update, Delete Offices',
                'key' => 'purchase.offices',
                'parent_key' => 'purchase',
            ],

            //suppliers
            [
                'title' => 'Suppliers',
                'description' => 'Permission of Add, Remove, Update, Delete Suppliers',
                'key' => 'purchase.suppliers',
                'parent_key' => 'purchase',
            ],
            
            //vendors
            [
                'title' => 'Vendors',
                'description' => 'Permission of Add, Remove, Update, Delete Vendors',
                'key' => 'purchase.vendors',
                'parent_key' => 'purchase',
            ],

            

            //sales
            [
                'title' => 'Sales',
                'description' => 'Permission of Add, Remove, Update, Delete Sales',
                'key' => 'sales',
            ],
            
            //sales orders
            [
                'title' => 'Sales Orders',
                'description' => 'Permission of Add, Remove, Update, Delete Sales Orders',
                'key' => 'sales.sales-orders',
                'parent_key' => 'sales',
            ],

            
            //sales order deliveries
            [
                'title' => 'Sales Order Deliveries',
                'description' => 'Permission of Add, Remove, Update, Delete Sales Order Deliveries',
                'key' => 'sales.sales-order-deliveries',
                'parent_key' => 'sales',
            ],
            
            //sales requisitions
            [
                'title' => 'Sales Requisitions',
                'description' => 'Permission of Add, Remove, Update, Delete Sales Requisitions',
                'key' => 'sales.sales-requisitions',
                'parent_key' => 'sales',
            ],
            
            //backup challans
            [
                'title' => 'Backup Challans',
                'description' => 'Permission of Add, Remove, Update, Delete Backup Challans',
                'key' => 'sales.backup-challans',
                'parent_key' => 'sales',
            ],
            
            //quotations
            [
                'title' => 'Quotations',
                'description' => 'Permission of Add, Remove, Update, Delete Quotations',
                'key' => 'sales.quotations',
                'parent_key' => 'sales',
            ],

            // Licenses
            [
                'title' => 'Licenses',
                'description' => "Licenses of Add, Remove, Update, Delete Hrm & Payroll",
                'key' => 'licenses',
            ],
            //Dongle Or Serial Entries
            [
                'title' => 'Dongle Or Serial Entries',
                'description' => "Dongle Or Serial Entries of Add, Remove, Update, Delete Employee",
                'key' => 'licenses.dongle-or-serial-entries',
                'parent_key' => 'licenses',
            ],
            
            //usg-opg-license-requisitions
            [
                'title' => 'USG OPG License Requisitions',
                'description' => "USG OPG License Requisitions of Add, Remove, Update, Delete Employee",
                'key' => 'licenses.usg-opg-license-requisitions',
                'parent_key' => 'licenses',
            ],

            //cbc-license-requisitions
            [
                'title' => 'CBC License Requisitions',
                'description' => "CBC License Requisitions of Add, Remove, Update, Delete",
                'key' => 'licenses.cbc-license-requisitions',
                'parent_key' => 'licenses',
            ],

            //services
            [
                'title' => 'Services',
                'description' => "Services of Add, Remove, Update, Delete",
                'key' => 'services',
            ],

            //service
            [
                'title' => 'Service',
                'description' => "Service of Add, Remove, Update, Delete",
                'key' => 'services.service',
                'parent_key' => 'services',
            ],
            //service assign
            [
                'title' => 'Service Assign',
                'description' => "Service of Add, Remove, Update, Delete",
                'key' => 'services.service-assign',
                'parent_key' => 'services',
            ],

            //service my task
            [
                'title' => 'My Task',
                'description' => "Service of Add, Remove, Update, Delete",
                'key' => 'services.service-my-task',
                'parent_key' => 'services',
            ],

            //service settings
            [
                'title' => 'Service Settings',
                'description' => "Service Settings of Add, Remove, Update, Delete",
                'key' => 'services.settings',
                'parent_key' => 'services',
            ],

            //service types
            [
                'title' => 'Service Types',
                'description' => "Service Types of Add, Remove, Update, Delete",
                'key' => 'services.settings.service-types',
                'parent_key' => 'services.settings',
            ],



            


            









        ];
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();
        PermissionMaster::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        foreach ($data as $value) {
            if (isset($value['parent_key'])) {
                $parent = PermissionMaster::where('key', $value['parent_key'])->first();
                if($parent == null) {
                    dd($value['parent_key']);
                }
                PermissionMaster::updateOrCreate(
                    ['key' => $value['key']],
                    [
                        'title' => $value['title'],
                        'description' => $value['description'],
                        'key' => $value['key'],
                        'parent_id' => $parent->id
                    ]
                );
            } else {
                PermissionMaster::updateOrCreate(
                    ['key' => $value['key']],
                    [
                        'title' => $value['title'],
                        'description' => $value['description'],
                        'key' => $value['key'],
                        'parent_id' => null
                    ]
                );
            }
        }
    }
}
