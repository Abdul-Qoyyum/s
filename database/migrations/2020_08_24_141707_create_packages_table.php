<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->integer('quantity');
            $table->float('discount');
            $table->float('tax_rate')->default(0.10);
            $table->timestamps();
        });

        DB::table('packages')->insert([
          ['name'=>'Bronze Family Portrait Package',
          'description'=>'<p>The perfect starter package for families with high-resolution images.</p>\r\n<ul>\r\n<li>1 Hour photography session</li>\r\n<li>10 High resolution digital files, retouched and ready to print</li>\r\n</ul>',
          'price'=>995.00,
          'quantity'=>1,
          'discount'=>0.00,
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now(),
          ],
          ['name'=>'Bronze Wedding Package',
          'description'=>"<p>The perfect starter package with great coverage and high-resolution images.</p>\r\n<ul>\r\n<li>6 Hours photography</li>\r\n<li>400+ Photos</li>\r\n<li>Includes high and low resolution photos, retouched and ready to print</li>\r\n<li>Online slideshow movie</li>\r\n<li>Pre wedding consultation</li>\r\n<li>No copyright protection. No watermarks</li>\r\n</ul>",
          'price'=>2995.00,
          'quantity'=>1,
          'discount'=>0.00,
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now(),
          ],
          ['name'=>'Gold Family Portrait Package',
          'description'=>"<p>The first-class package with all your images and a complete set of canvases and prints to show off your walls.</p>\r\n<ul>\r\n<li>1 Hour photography session</li>\r\n<li>All high resolution digital files, retouched and ready to print</li>\r\n<li>2x Large 40\" x 30\" Canvases</li>\r\n<li>4x Medium 16\" x 24\" Framed Prints</li>\r\n<li>20x Small 5\" x 7\" Prints presented in a beautiful print box</li>\r\n</ul>",
          'price'=>2995.00,
          'quantity'=>1,
          'discount'=>0.00,
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now(),
          ],
          ['name'=>'Gold Wedding Package',
          'description'=>"<p>The first-class package with the most comprehensive coverage, a beautifully designed album and superior canvas prints.</p>\r\n<ul>\r\n<li>10 Hours photography</li>\r\n<li>24 page Wedding Album</li>\r\n<li>2x Large 40\" x 30\" Canvases</li>\r\n<li>20x Small 5\" x 7\" Prints</li>\r\n<li>700+ Photos.</li>\r\n<li>Includes high and low resolution photos, retouched and ready to print.</li>\r\n<li>Online slideshow movie.</li>\r\n<li>Pre wedding consultation.</li>\r\n<li>No copyright protection. No watermarks.</li>\r\n</ul>",
          'price'=>4995.00,
          'quantity'=>1,
          'discount'=>0.00,
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now(),
          ],
          ['name'=>'Silver Family Portrait Package',
          'description'=>"<p>&nbsp;</p>\r\n<p>The ideal total package with more high-resolution images and superior canvases for your home.</p>\r\n<ul>\r\n<li>1 Hour photography session</li>\r\n<li>20 High resolution digital files, retouched and ready to print</li>\r\n<li>2x Large 40\" x 30\" Canvases</li>\r\n</ul>",
          'price'=>1995.00,
          'quantity'=>1,
          'discount'=>0.00,
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now(),
          ],
          ['name'=>'Silver Wedding Package',
          'description'=>"<p>The ideal total package with extensive coverage and a beautifully designed album.</p>\r\n<ul>\r\n<li>8 Hours photography</li>\r\n<li>24 page Wedding Album</li>\r\n<li>550+ Photos</li>\r\n<li>Includes high and low resolution photos, retouched and ready to print</li>\r\n<li>Online slideshow movie</li>\r\n<li>Pre wedding consultation</li>\r\n<li>No copyright protection. No watermarks</li>\r\n</ul>",
          'price'=>3995.00,
          'quantity'=>1,
          'discount'=>0.00,
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now(),
          ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
