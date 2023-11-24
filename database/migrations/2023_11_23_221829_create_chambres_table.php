<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Chambre;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix');
            $table->integer('nombre_lits');
            $table->integer('max_adultes')->nullable();
            $table->integer('enfants_max')->nullable();
            $table->json('attributs')->nullable();
            $table->enum('statut', ['Disponible', 'Non disponible'])->default('Disponible');
            $table->timestamps();
        });

        // Ajoutez des exemples de chambres
        Chambre::create([
            'nom' => 'Chambre 102',
            'description' => 'Chambre confortable avec un lit double',
            'prix' => 100.00,
            'nombre_lits' => 1,
            'max_adultes' => 2,
            'enfants_max' => 1,
            'attributs' => ['Télévision', 'Service de nettoyage'],
            'statut' => 'Disponible',
        ]);

        Chambre::create([
            'nom' => 'Suite Deluxe 202',
            'description' => 'Suite spacieuse avec vue panoramique',
            'prix' => 200.00,
            'nombre_lits' => 2,
            'max_adultes' => 4,
            'enfants_max' => 2,
            'attributs' => ['Télévision', 'Service de réveil', 'Petit déjeuner'],
            'statut' => 'Disponible',
        ]);

        Chambre::create([
            'nom' => 'Chambre Familiale',
            'description' => 'Chambre parfaite pour les familles',
            'prix' => 150.00,
            'nombre_lits' => 3,
            'max_adultes' => 2,
            'enfants_max' => 3,
            'attributs' => ['Télévision', 'Service de nettoyage', 'Petit déjeuner'],
            'statut' => 'Disponible',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('chambres');
    }
}
