<?php
namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Produit extends Model
{   use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */


    public function favories()
    {
        return $this->belongsToMany('App\Models\Favorie');
    }
    public function paniers()
    {
        return $this->belongsToMany('App\Models\Panier');
    }
    public function commandes()
    {
        return $this->belongsToMany('App\Models\Commande');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    protected $table = 'produits';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function scopeGetProductImage(){
        return "storage/" . $this->imgPath;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setimgPathAttribute($value)
    {
        $attribute_name = "imgPath";
        $disk = "public"; // or use your own disk, defined in config/filesystems.php
        $destination_path = "uploads/product_images"; // path relative to the disk above

        // if the image was erased
    if ($value==null) {
        // delete the image from disk
        Storage::disk($disk)->delete($this->{$attribute_name});

        // set null in the database column
        $this->attributes[$attribute_name] = null;
    }

    // if a base64 was sent, store it in the db
    if (starts_with($value, 'data:image'))
    {
        // 0. Make the image
        $image = Image::make($value);
        // 1. Generate a filename.
        $filename = md5($value.time()).'.jpg';
        // 2. Store the image on disk.
        Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
        // 3. Save the path to the database
        $this->attributes[$attribute_name] = $destination_path.'/'.$filename;

    }
    }
}
