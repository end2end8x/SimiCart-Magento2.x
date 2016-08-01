<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Simi\Simisimiconnector\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.2') < 0) {

            /**
             * Creating table simiconnector key
             */
            $table_key_name = $setup->getTable('simiconnector_key');
            if ($setup->getConnection()->isTableExists($table_key_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_key'));
            }
            $table_key = $setup->getConnection()->newTable(
                $table_key_name
            )->addColumn(
                'key_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Key Id'
            )->addColumn(
                'key_secret',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Key Secret'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                ['nullable' => false],
                'Website Id'
            );
            $setup->getConnection()->createTable($table_key);
            // end create table simiconnector key

            /**
             * Creating table simiconnector notice
             */
            $table_notice_name = $setup->getTable('simiconnector_notice');
            if ($setup->getConnection()->isTableExists($table_notice_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_notice'));
            }
            $table_notice = $setup->getConnection()->newTable(
                $table_notice_name
            )->addColumn(
                'notice_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Notice Id'
            )->addColumn(
                'notice_title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => null],
                'Notice Title'
            )->addColumn(
                'notice_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => null],
                'Notice Url'
            )->addColumn(
                'notice_content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                ['nullable' => true, 'default' => null],
                'Notice Content'
            )->addColumn(
                'notice_sanbox',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true],
                'Notice Sanbox'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Website Id'
            )->addColumn(
                'device_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Device Id'
            )->addColumn(
                'type',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                5,
                ['nullable' => false],
                'Type'
            )->addColumn(
                'category_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Category Id'
            )->addColumn(
                'product_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Product Id'
            )->addColumn(
                'image_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Image Url'
            )
            ->addColumn(
                'latitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => false],
                'Latitude'
            )->addColumn(
                'longitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => false],
                'Longitude'
            )->addColumn(
                'address',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Address'
            )->addColumn(
                'city',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'City'
            )->addColumn(
                'country',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Country'
            )->addColumn(
                'zipcode',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                25,
                ['nullable' => false],
                'Zipcode'
            )->addColumn(
                'state',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                25,
                ['nullable' => false],
                'Zipcode'
            )->addColumn(
                'show_popup',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                255,
                ['nullable' => true, 'default' => null],
                'Show Popup'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Created At'
            );
            $setup->getConnection()->createTable($table_notice);
            // end create table simiconnector notice

            /**
             * Creating table simiconnector app
             */

            $table_app_name =  $setup->getTable('simiconnector_app');
            if ($setup->getConnection()->isTableExists($table_app_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_app'));
            }
            $table_app = $setup->getConnection()->newTable(
                $table_app_name
            )->addColumn(
                'app_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'App Id'
            )->addColumn(
                'app_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'App Name'
            )->addColumn(
                'device_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Device Id'
            )->addColumn(
                'expired_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Expired Time'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Status'
            )->addColumn(
                'categories',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Categories'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Website Id'
            );
            $setup->getConnection()->createTable($table_app);
            // end create table simiconnector app

            /**
             * Creating table simiconnector plugin
             */
            $table_plugin_name =  $setup->getTable('simiconnector_plugin');
            if ($setup->getConnection()->isTableExists($table_plugin_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_plugin'));
            }
            $table_plugin = $setup->getConnection()->newTable(
                $table_plugin_name
            )->addColumn(
                'plugin_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Plugin Id'
            )->addColumn(
                'plugin_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Plugin Name'
            )->addColumn(
                'plugin_version',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Plugin Version'
            )->addColumn(
                'plugin_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Plugin Code'
            )->addColumn(
                'expired_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Expired Time'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Status'
            )->addColumn(
                'plugin_sku',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Plugin Sku'
            )->addColumn(
                'device_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Device'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Website Id'
            );
            $setup->getConnection()->createTable($table_plugin);
            // end create table simiconnector plugin

            /**
             * Creating table simiconnector design
             */
            $table_design_name =  $setup->getTable('simiconnector_design');
            if ($setup->getConnection()->isTableExists($table_design_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_design'));
            }
            $table_design = $setup->getConnection()->newTable(
                $table_design_name
            )->addColumn(
                'design_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Design Id'
            )->addColumn(
                'theme_color',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Theme Color'
            )->addColumn(
                'device_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Device Id'
            )->addColumn(
                'theme_logo',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Theme Logo'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Website Id'
            );
            $setup->getConnection()->createTable($table_design);
            // end create table simiconnector design

            /**
             * Creating table simiconnector device
             */
            $table_device_name =  $setup->getTable('simiconnector_device');
            if ($setup->getConnection()->isTableExists($table_device_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_device'));
            }
            $table_device = $setup->getConnection()->newTable(
                $table_device_name
            )->addColumn(
                'device_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Device Id'
            )->addColumn(
                'device_token',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Device Token'
            )->addColumn(
                'plaform_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Platform'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Website Id'
            )->addColumn(
                'device_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Device'
            )->addColumn(
                'latitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => false],
                'Latitude'
            )->addColumn(
                'longitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => false],
                'Longitude'
            )->addColumn(
                'address',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Address'
            )->addColumn(
                'city',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'City'
            )->addColumn(
                'country',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Country'
            )->addColumn(
                'zipcode',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                25,
                ['nullable' => false],
                'Zipcode'
            )->addColumn(
                'state',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                25,
                ['nullable' => false],
                'Zipcode'
            )->addColumn(
                'created_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false],
                'Created Time'
            );
            $setup->getConnection()->createTable($table_device);
            // end create table simiconnector device

            /**
             * Creating table simiconnector design
             */
            $table_banner_name =  $setup->getTable('simiconnector_banner');
            if ($setup->getConnection()->isTableExists($table_banner_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_banner'));
            }
            $table_banner = $setup->getConnection()->newTable(
                $table_banner_name
            )->addColumn(
                'banner_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Banner Id'
            )->addColumn(
                'banner_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Banner Name'
            )->addColumn(
                'banner_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Banner Url'
            )->addColumn(
                'banner_title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Banner Title'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Status'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Website Id'
            )->addColumn(
                'type',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false, 'default' => 3],
                'Type'
            )->addColumn(
                'category_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Category'
            )->addColumn(
                'product_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Product'
            );
            $setup->getConnection()->createTable($table_banner);
            // end create table simiconnector design

            /**
             * Creating table simiconnector cms
             */
            $table_cms_name =  $setup->getTable('simiconnector_cms');
            if ($setup->getConnection()->isTableExists($table_cms_name) == true) {
                $setup->getConnection()->dropTable($setup->getConnection()->getTableName('simiconnector_cms'));
            }
            $table_cms = $setup->getConnection()->newTable(
                $table_cms_name
            )->addColumn(
                'cms_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'CMS'
            )->addColumn(
                'cms_title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'CMS Title'
            )->addColumn(
                'cms_image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'CMS Image'
            )->addColumn(
                'cms_content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'CMS Content'
            )->addColumn(
                'cms_status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false],
                'CMS Status'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Website Id'
            );
            $setup->getConnection()->createTable($table_cms);
            // end create table simiconnector cms

//            }
        }

        $setup->endSetup();
    }
}
