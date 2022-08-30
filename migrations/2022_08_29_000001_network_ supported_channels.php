<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class NetworkSupportedChannels extends Migration
{
    private $tableName = 'network';

    public function up()
    {
        $capsule = new Capsule();
        
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            // This doesn't work on some versions of MySQL
            // $table->string('supported_channels', 1024)->nullable()->change();
            $table->dropColumn('supported_channels');
        });
        
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->text('supported_channels')->nullable();
        });

    }

    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->dropColumn('supported_channels');
        });
        
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->string('supported_channels')->nullable();
        });
    }
}
