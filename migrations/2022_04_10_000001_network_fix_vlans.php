<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class NetworkFixVlans extends Migration
{
    private $tableName = 'network';

    public function up()
    {
        $capsule = new Capsule();
        
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            // DROP index
            $table->dropIndex('vlans');
            // Then change to TEXT
            $table->text('vlans')->change();
            // Now add an index again?
        });
    }

    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->string('vlans')->change();
        });
    }
}
