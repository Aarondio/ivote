<?php

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Lga;
use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('election_type', ['national', 'state', 'local'])->default('national');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignIdFor(Faculty::class)->nullable()->default(0);
            $table->foreignIdFor(Department::class)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
