<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });
        //#regio insert
            DB::insert("INSERT INTO permissions (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
            (1, 'sync HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (2, 'closeShift HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (3, 'setLang HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (4, 'summery HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (5, 'index HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (6, 'clearCache HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (7, 'migrate HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (8, 'restore HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (9, 'cleanDB HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (10, 'closeYear HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (11, 'developer HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (12, 'dailyreport HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (13, 'backup HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (14, 'profit HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (15, 'importProduct HomeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (16, 'regionsReport ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (17, 'priceList2 ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (18, 'getReport ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (19, 'getProductBarcode ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (20, 'generateBarCode ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (21, 'priceList ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (22, 'getProductList ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (23, 'getReturnsList ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (24, 'getCriticalQuantity ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (25, 'index ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (26, 'create ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (27, 'store ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (28, 'show ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (29, 'edit ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (30, 'update ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (31, 'destroy ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (32, 'getProductsByCategory ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (33, 'getPriceHistory ProductsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (34, 'getSalesDebt OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (35, 'getDetails OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (36, 'getSales OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (37, 'create OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (38, 'store OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (39, 'show OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (40, 'edit OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (41, 'update OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (42, 'destroy OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (43, 'createSales OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (44, 'createPurchase OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (45, 'getPurchases OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (46, 'getPrint OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (47, 'changeStatus OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (48, 'workorders OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (49, 'report OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (50, 'getWorkOrders OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (51, 'getPrintBarcode OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (52, 'allworkorders OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (53, 'deleteworkorder OrdersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (54, 'representativesReport EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (55, 'getRepresentativesDetail EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (56, 'representativesSalesReport EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (57, 'getRepresentativesSalesReportDetail EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (58, 'getEmployeeList EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (59, 'addPunishmentsRewards EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (60, 'index EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (61, 'create EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (62, 'store EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (63, 'show EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (64, 'edit EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (65, 'update EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (66, 'destroy EmployeesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (67, 'getPersonList PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (68, 'getDetails PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (69, 'addPayment PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (70, 'getClientSupplier PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (71, 'deleteTransaction PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (72, 'support PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (73, 'index PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (74, 'create PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (75, 'store PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (76, 'show PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (77, 'edit PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (78, 'update PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (79, 'destroy PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (80, 'clientCreate PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (81, 'clientIndex PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (82, 'supplierIndex PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (83, 'supplierCreate PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (84, 'getCalander PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (85, 'payments PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (86, 'deleteInstalment PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (87, 'getPersonInvoices PersonsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (88, 'deleteLogo SettingController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (89, 'index SettingController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (90, 'update SettingController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (91, 'index RegionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (92, 'create RegionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (93, 'store RegionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (94, 'show RegionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (95, 'edit RegionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (96, 'update RegionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (97, 'destroy RegionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (98, 'index UnitsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (99, 'create UnitsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (100, 'store UnitsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (101, 'show UnitsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (102, 'edit UnitsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (103, 'update UnitsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (104, 'destroy UnitsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (105, 'index StoresController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (106, 'create StoresController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (107, 'store StoresController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (108, 'show StoresController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (109, 'edit StoresController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (110, 'update StoresController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (111, 'destroy StoresController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (112, 'index CategoriesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (113, 'create CategoriesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (114, 'store CategoriesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (115, 'show CategoriesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (116, 'edit CategoriesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (117, 'update CategoriesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (118, 'destroy CategoriesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (119, 'index PartnersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (120, 'create PartnersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (121, 'store PartnersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (122, 'show PartnersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (123, 'edit PartnersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (124, 'update PartnersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (125, 'destroy PartnersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (126, 'index MovementsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (127, 'create MovementsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (128, 'store MovementsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (129, 'show MovementsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (130, 'edit MovementsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (131, 'update MovementsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (132, 'destroy MovementsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (133, 'index ExpensesTypeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (134, 'create ExpensesTypeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (135, 'store ExpensesTypeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (136, 'show ExpensesTypeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (137, 'edit ExpensesTypeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (138, 'update ExpensesTypeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (139, 'destroy ExpensesTypeController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (140, 'index ServicesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (141, 'create ServicesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (142, 'store ServicesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (143, 'show ServicesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (144, 'edit ServicesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (145, 'update ServicesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (146, 'destroy ServicesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (147, 'getPrint ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (148, 'index ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (149, 'create ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (150, 'store ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (151, 'show ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (152, 'edit ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (153, 'update ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (154, 'destroy ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (155, 'createSales ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (156, 'createPurchase ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (157, 'getSales ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (158, 'getPurchases ReturnsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (159, 'index ExpensesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (160, 'create ExpensesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (161, 'store ExpensesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (162, 'show ExpensesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (163, 'edit ExpensesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (164, 'update ExpensesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (165, 'destroy ExpensesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (166, 'index TresuryTranactionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (167, 'create TresuryTranactionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (168, 'store TresuryTranactionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (169, 'show TresuryTranactionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (170, 'edit TresuryTranactionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (171, 'update TresuryTranactionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (172, 'destroy TresuryTranactionsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (173, 'index UsersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (174, 'create UsersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (175, 'store UsersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (176, 'show UsersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (177, 'edit UsersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (178, 'update UsersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (179, 'destroy UsersController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (180, 'index RolesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (181, 'create RolesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (182, 'store RolesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (183, 'show RolesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (184, 'edit RolesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (185, 'update RolesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (186, 'destroy RolesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (187, 'addTransaction BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (188, 'index BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (189, 'create BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (190, 'store BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (191, 'show BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (192, 'edit BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (193, 'update BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (194, 'destroy BanksController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (195, 'index CurrenciesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (196, 'create CurrenciesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (197, 'store CurrenciesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (198, 'show CurrenciesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (199, 'edit CurrenciesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (200, 'update CurrenciesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (201, 'destroy CurrenciesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (202, 'index DamagesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (203, 'create DamagesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (204, 'store DamagesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (205, 'show DamagesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (206, 'edit DamagesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (207, 'update DamagesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (208, 'destroy DamagesController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02'),
            (209, 'index LogsController', 'web', '2020-12-06 07:53:02', '2020-12-06 07:53:02')");
        //#endregion
        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('guard_name');
            $table->timestamps();
        });
        DB::table('roles')->insert(
            array(
                [
                    'name'=>'admin',
                    'display_name'=>'مسئول للنظام',
                    'guard_name'=>'web',
                    'created_at'=>'2020-12-06 09:53:02',
                    'updated_at'=>'2020-12-06 09:53:02',
                ],
                [
                    'name'=>'user',
                    'display_name'=>'مستخدم',
                    'guard_name'=>'web',
                    'created_at'=>'2020-12-06 09:53:02',
                    'updated_at'=>'2020-12-06 09:53:02',
                ]
            )
        );
        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->integer('permission_id')->unsigned();

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type', ]);

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->primary(['permission_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->integer('role_id')->unsigned();

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type', ]);

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['role_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
        });
        
        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
            
            app('cache')
                ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
                ->forget(config('permission.cache.key'));
        });
        DB::table('model_has_roles')->insert(
            array(
                [
                    'role_id'=>1,
                    'model_type'=>'App\User',
                    'model_id'=>1,
                ], [
                    'role_id'=>2,
                    'model_type'=>'App\User',
                    'model_id'=>3,
                ], [
                    'role_id'=>2,
                    'model_type'=>'App\User',
                    'model_id'=>4,
                ], [
                    'role_id'=>1,
                    'model_type'=>'App\User',
                    'model_id'=>5,
                ], [
                    'role_id'=>2,
                    'model_type'=>'App\User',
                    'model_id'=>6,
                ], [
                    'role_id'=>2,
                    'model_type'=>'App\User',
                    'model_id'=>8,
                ], [
                    'role_id'=>2,
                    'model_type'=>'App\User',
                    'model_id'=>7,
                ], [
                    'role_id'=>1,
                    'model_type'=>'App\User',
                    'model_id'=>2,
                ]
            )
        );
        DB::insert("INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES(1, 1),(1, 2),(2, 1),(2, 2),(3, 1),(3, 2),(4, 1),(4, 2),(5, 1),(5, 2),(6, 1),(6, 2),(7, 1),(7, 2),(8, 1),(8, 2),(9, 1),(9, 2),(10, 1),(10, 2),(11, 1),(11, 2),(12, 1),(12, 2),(13, 1),(13, 2),(14, 1),(14, 2),(15, 1),(15, 2),(16, 1),(16, 2),(17, 1),(17, 2),(18, 1),(18, 2),(19, 1),(19, 2),(20, 1),(20, 2),(21, 1),(21, 2),(22, 1),(22, 2),(23, 1),(23, 2),(24, 1),(24, 2),(25, 1),(25, 2),(26, 1),(26, 2),(27, 1),(27, 2),(28, 1),(28, 2),(29, 1),(29, 2),(30, 1),(30, 2),(31, 1),(31, 2),(32, 1),(32, 2),(33, 1),(33, 2),(34, 1),(34, 2),(35, 1),(35, 2),(36, 1),(36, 2),(37, 1),(37, 2),(38, 1),(38, 2),(39, 1),(39, 2),(40, 1),(40, 2),(41, 1),(41, 2),(42, 1),(42, 2),(43, 1),(43, 2),(44, 1),(44, 2),(45, 1),(45, 2),(46, 1),(46, 2),(47, 1),(47, 2),(48, 1),(48, 2),(49, 1),(49, 2),(50, 1),(50, 2),(51, 1),(51, 2),(52, 1),(52, 2),(53, 1),(53, 2),(54, 1),(54, 2),(55, 1),(55, 2),(56, 1),(56, 2),(57, 1),(57, 2),(58, 1),(58, 2),(59, 1),(59, 2),(60, 1),(60, 2),(61, 1),(61, 2),(62, 1),(62, 2),(63, 1),(63, 2),(64, 1),(64, 2),(65, 1),(65, 2),(66, 1),(66, 2),(67, 1),(67, 2),(68, 1),(68, 2),(69, 1),(69, 2),(70, 1),(70, 2),(71, 1),(71, 2),(72, 1),(72, 2),(73, 1),(73, 2),(74, 1),(74, 2),(75, 1),(75, 2),(76, 1),(76, 2),(77, 1),(77, 2),(78, 1),(78, 2),(79, 1),(79, 2),(80, 1),(80, 2),(81, 1),(81, 2),(82, 1),(82, 2),(83, 1),(83, 2),(84, 1),(84, 2),(85, 1),(85, 2),(86, 1),(86, 2),(87, 1),(87, 2),(88, 1),(88, 2),(89, 1),(89, 2),(90, 1),(90, 2),(91, 1),(91, 2),(92, 1),(92, 2),(93, 1),(93, 2),(94, 1),(94, 2),(95, 1),(95, 2),(96, 1),(96, 2),(97, 1),(97, 2),(98, 1),(98, 2),(99, 1),(99, 2),(100, 1),(100, 2),(101, 1),(101, 2),(102, 1),(102, 2),(103, 1),(103, 2),(104, 1),(104, 2),(105, 1),(105, 2),(106, 1),(106, 2),(107, 1),(107, 2),(108, 1),(108, 2),(109, 1),(109, 2),(110, 1),(110, 2),(111, 1),(111, 2),(112, 1),(112, 2),(113, 1),(113, 2),(114, 1),(114, 2),(115, 1),(115, 2),(116, 1),(116, 2),(117, 1),(117, 2),(118, 1),(118, 2),(119, 1),(119, 2),(120, 1),(120, 2),(121, 1),(121, 2),(122, 1),(122, 2),(123, 1),(123, 2),(124, 1),(124, 2),(125, 1),(125, 2),(126, 1),(126, 2),(127, 1),(127, 2),(128, 1),(128, 2),(129, 1),(129, 2),(130, 1),(130, 2),(131, 1),(131, 2),(132, 1),(132, 2),(133, 1),(133, 2),(134, 1),(134, 2),(135, 1),(135, 2),(136, 1),(136, 2),(137, 1),(137, 2),(138, 1),(138, 2),(139, 1),(139, 2),(140, 1),(140, 2),(141, 1),(141, 2),(142, 1),(142, 2),(143, 1),(143, 2),(144, 1),(144, 2),(145, 1),(145, 2),(146, 1),(146, 2),(147, 1),(147, 2),(148, 1),(148, 2),(149, 1),(149, 2),(150, 1),(150, 2),(151, 1),(151, 2),(152, 1),(152, 2),(153, 1),(153, 2),(154, 1),(154, 2),(155, 1),(155, 2),(156, 1),(156, 2),(157, 1),(157, 2),(158, 1),(158, 2),(159, 1),(159, 2),(160, 1),(160, 2),(161, 1),(161, 2),(162, 1),(162, 2),(163, 1),(163, 2),(164, 1),(164, 2),(165, 1),(165, 2),(166, 1),(166, 2),(167, 1),(167, 2),(168, 1),(168, 2),(169, 1),(169, 2),(170, 1),(170, 2),(171, 1),(171, 2),(172, 1),(172, 2),(173, 1),(173, 2),(174, 1),(174, 2),(175, 1),(175, 2),(176, 1),(176, 2),(177, 1),(177, 2),(178, 1),(178, 2),(179, 1),(179, 2),(180, 1),(180, 2),(181, 1),(181, 2),(182, 1),(182, 2),(183, 1),(183, 2),(184, 1),(184, 2),(185, 1),(185, 2),(186, 1),(186, 2),(187, 1),(187, 2),(188, 1),(188, 2),(189, 1),(189, 2),(190, 1),(190, 2),(191, 1),(191, 2),(192, 1),(192, 2),(193, 1),(193, 2),(194, 1),(194, 2),(195, 1),(195, 2),(196, 1),(196, 2),(197, 1),(197, 2),(198, 1),(198, 2),(199, 1),(199, 2),(200, 1),(200, 2),(201, 1),(201, 2),(202, 1),(202, 2),(203, 1),(203, 2),(204, 1),(204, 2),(205, 1),(205, 2),(206, 1),(206, 2),(207, 1),(207, 2),(208, 1),(208, 2),(209, 1),(209, 2)
            
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
